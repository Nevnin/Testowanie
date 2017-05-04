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
						//$dor= {Doradca} => {$doradca[0]};
						$ID = $doradca[2];
						$ND = $doradca[3];
						$IK = $doradca[4];
						$NK = $doradca[5];
						$IND = $ID[0].". ".$ND[0].".";
						$INK = $IK[0]."".$IK[1]."".$NK[0]."".$NK[1];
						//$dor[1]=$IND;
						//$dor[2]=$INK;
						$dor[]=array('SID'=>$doradca[0],'Doradca'=>$IND,'DBPL'=>$INK);
					
						
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
	
	public function getInfo(){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
			else
				try
				{
					$doradca = array();
					
					$stmt = $this->pdo->query('SELECT doradca.id AS idDoradca,doradca.imie,doradca.nazwisko ,concat(koordynator.imie," ",koordynator.nazwisko) AS Koordynator , SID, doradca.miasto, doradca.aktywny,koordynator.aktywny AS aktywnyKor, koordynator.id AS idKoordynator from `doradca` inner join `koordynator` ON `koordynator`.`id`=`doradca`.`koordynator` WHERE doradca.aktywny=1 ' );
					$doradca = $stmt->fetchAll();
					
					$stmt->closeCursor();
					if($doradca && !empty($doradca))
						$data['doradca'] = $doradca;
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
