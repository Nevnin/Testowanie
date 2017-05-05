<?php
namespace Models;
use \PDO;
class Raport extends Model {
	//model zwraca tablicę wszystkich kategorii

	public function getAll(){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
			else
				try
				{
					$doradca = array();

					$stmt = $this->pdo->query('SELECT SID, doradca.id AS idDoradca, doradca.imie as imieD, doradca.nazwisko as nazwiskoD, koordynator.imie as imieK, koordynator.nazwisko as nazwiskoK FROM  `doradca` inner join `koordynator` ON `koordynator`.`id`=`doradca`.`koordynator`' );
					$doradcy = $stmt->fetchAll();

					//$stmt->closeCursor();

					foreach($doradcy as $doradca)
					{
						$id = $doradca[1];

						$stmt1 = $this->pdo->prepare('SELECT Sprzedane, PlanowanaSprzedaz, DataWprowadzenia from `predykcja`WHERE IdDoradca = :id ' );
						$stmt1->bindValue(':id',$id,PDO::PARAM_STR);
						$result = $stmt1->execute();
						$preds = $stmt1->fetchAll();

						$i=0;

						// d($preds);
						//$dor= {Doradca} => {$doradca[0]};
						$ID = decode($doradca['imieD']);
						$ND = decode($doradca['nazwiskoD']);
						$IK = decode($doradca['imieK']);
						$NK = decode($doradca['nazwiskoK']);

						$IND = $ID[0].". ".$ND[0].".";
						$INK = $IK[0]."".$IK[1]."".$NK[0]."".$NK[1];
						if(isset($preds[0]['DataWprowadzenia'])){
							$myDate = decode($preds[0]['DataWprowadzenia']);
							$time = strtotime($myDate);
							if(date('Y')==date('Y',$time)){
								$date = date('m',$time);
							}else {
								$date = '0';
							}
							// d($date);
						}
						else {
							$date = '0';
						}
						//$dor[1]=$IND;
						//$dor[2]=$INK;

// 						$dorr = getInfo($id);
// 						d($dorr);
						if(isset ($preds[0][0]))
						$dor[]=array('IdDoradcy'=>$id,'SID'=>decode($doradca[0]),'Doradca'=>$IND,'DBPL'=>$INK,'t1'=>decode($preds[0][0]),'t1p'=>decode($preds[0][1]),'t2'=>decode($preds[1][0]),'t2p'=>decode($preds[1][1]),'t3'=>decode($preds[2][0]),'t3p'=>decode($preds[2][1]),'t4'=>decode($preds[3][0]),'t4p'=>decode($preds[3][1]), 'dataWp'=>$date);
						else
						$dor[]=array('IdDoradcy'=>$id,'SID'=>decode($doradca[0]),'Doradca'=>$IND,'DBPL'=>$INK,'t1'=>0,'t1p'=>0,'t2'=>0,'t2p'=>0,'t3'=>0,'t3p'=>0,'t4'=>0,'t4p'=>0, 'dataWp'=>$date);
						// d($dor);

					}
					if($doradca && !empty($doradca))
						$data['doradca'] = $dor;
						else
							$data['doradca'] = array();
							$data['msg'] = 'OK';
			}
			catch(\PDOException $e)
			{
				$data['msg'] = 'B��d odczytu danych z bazy!';
			}
			return $data;
	}

	public function getInfo($id){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
			else
				try
				{
					$doradca = array();

					$stmt = $this->pdo->prepare('SELECT Sprzedane, PlanowanaSprzedaz from `predykcja`WHERE IdDoradca = :id ' );
					$stmt->bindValue(':id',$id,PDO::PARAM_STR);
					$result = $stmt->execute();
					$preds = $stmt->fetchAll();

// 					foreach($preds as $pred)
// 					{
// 						//$dor= {Doradca} => {$doradca[0]};
// 						$ID = $doradca[2];
// 						$ND = $doradca[3];
// 						$IK = $doradca[4];
// 						$NK = $doradca[5];
// 						$IND = $ID[0].". ".$ND[0].".";
// 						$INK = $IK[0]."".$IK[1]."".$NK[0]."".$NK[1];
// 						//$dor[1]=$IND;
// 						//$dor[2]=$INK;
// 						$dor[]=array('IdDoradcy'=>$doradca[1],'SID'=>$doradca[0],'Doradca'=>$IND,'DBPL'=>$INK);


// 					}

					$stmt->closeCursor();
					if($preds&& !empty($preds))
						$data['preds'] = $preds;
						else
							$data['preds'] = array();
							$data['msg'] = 'OK';
			}
			catch(\PDOException $e)
			{
				$data['msg'] = 'B��d odczytu danych z bazy!';
			}
			//d($data);
			return $data;

	}






	function getSprzedazNaKoniec($idDor, $myDate){
		$data = array();
		if($idDor === "" || $idDor === NULL || $myDate === "" || $myDate === NULL)
			$data['error'] = 'Nieokreślona nazwa!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try {
						$myDate = $myDate.'%';
						$stmt = $this->pdo->prepare('SELECT SUM(Sprzedane) AS SprzedazNaKoniec FROM predykcja WHERE IdDoradca=:id AND DataWprowadzenia LIKE :myDate');
						$stmt->bindValue(':id', $idDor, PDO::PARAM_INT);
						$stmt->bindValue(':myDate', $myDate, PDO::PARAM_STR);
						$stmt->execute();
						$SprzedazNaKoniec = $stmt->fetchAll();
						if($SprzedazNaKoniec && !empty($SprzedazNaKoniec))
							$data['doradca'] = $SprzedazNaKoniec;
							else
								$data['doradca'] = array();
								$data['msg'] = 'OK';
				} catch(\PDOException $e) {
					$data['error'] = 'Błąd odczytu danych z bazy!';
				}
				return $data;
	}
	function getIdDor($sid){
		$data = array();
		if($sid === "" || $sid === NULL)
			$data['error'] = 'Nieokreślona nazwa!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try {
						$stmt = $this->pdo->prepare('SELECT id FROM doradca WHERE SID=:sid');
						$stmt->bindValue(':sid', $sid, PDO::PARAM_STR);
						$stmt->execute();
						$doradcaSid = $stmt->fetchAll();
						if($doradcaSid && !empty($doradcaSid)){
							$data['doradca'] = $doradcaSid;
							$data['msg'] = 'OK';
						}
						else
							$data['error'] = 'Nieznaleziono doradcy';
				} catch(\PDOException $e) {
					$data['error'] = 'Błąd odczytu danych do bazy!';
				}
				return $data;
	}
}
?>
