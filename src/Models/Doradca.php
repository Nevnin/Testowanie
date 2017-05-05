<?php
namespace Models;
use \PDO;
class Doradca extends Model {
	//model zwraca tablicę wszystkich kategorii
	public function getAll(){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
			else
				try
				{
					$doradca = array();

					$stmt = $this->pdo->query('SELECT doradca.id AS idDoradca,doradca.imie,doradca.nazwisko ,koordynator.imie AS kImie, koordynator.nazwisko AS kNazwisko , SID, doradca.miasto, doradca.aktywny,koordynator.aktywny AS aktywnyKor, koordynator.id AS idKoordynator from `doradca` inner join `koordynator` ON `koordynator`.`id`=`doradca`.`koordynator` WHERE doradca.aktywny=1 ' );
					$tab = $stmt->fetchAll();
					$doradca = array();
					$i=0;
					foreach ($tab as $key) {
						$doradca[$i]['idDoradca'] = $key['idDoradca'];
						$doradca[$i]['imie'] = decode($key['imie']);
						$doradca[$i]['nazwisko'] = decode($key['nazwisko']);
						$doradca[$i]['Koordynator'] = decode($key['kImie']).' '.decode($key['kNazwisko']);
						$doradca[$i]['SID'] = decode($key['SID']);
						$doradca[$i]['miasto'] = decode($key['miasto']);
						$doradca[$i]['aktywny'] = $key['aktywny'];
						$doradca[$i]['aktywnyKor'] = $key['aktywnyKor'];
						$doradca[$i]['idKoordynator'] = $key['idKoordynator'];
						$i++;
					}
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
	public function update($id,$imie,$nazwisko,$miasto,$sid,$koordynator)
	{
		$data = array();
		if($id ===NULL || $imie===NULL || $nazwisko===NULL || $miasto===NULL )
		{
			$data['msg'] = 'Nieokreslone wartosci!';
			return $data;
		}
		try
		{
			$numer= "D00319".$sid;
			$imie = encode($imie);
			$nazwisko = encode($nazwisko);
			$miasto = encode($miasto);
			$numer = encode($numer);

			$stmt = $this->pdo->prepare('UPDATE `doradca` SET `imie` = :imie, `nazwisko` = :nazwisko, `miasto` = :miasto , `SID`=:sid, `koordynator`=:koordynator WHERE `doradca`.`id` = :id');
			$stmt->bindValue(':id',$id,PDO::PARAM_INT);
			$stmt->bindValue(':imie',$imie,PDO::PARAM_STR);
			$stmt->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
			$stmt->bindValue(':miasto',$miasto,PDO::PARAM_STR);
			$stmt->bindValue(':sid',$numer,PDO::PARAM_STR);
			$stmt->bindValue(':koordynator',$koordynator,PDO::PARAM_INT);
			$result =$stmt->execute();
			$rows = $stmt->rowCount();
			$stmt->closeCursor();

			$data['msg'] = $result ? 'OK' : "Nie znaleziono kategorii o id = $id!";
		}
		catch(\PDOException $e)
		{
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
		}
		return $data;
	}
	//model zwraca wybraną kategorię
	public function getOne($id){
		$data = array();
		if($id === NULL)
			$data['error'] = 'Nieokreślone id!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$stmt = $this->pdo->prepare('SELECT id, imie, nazwisko, miasto, SID, koordynator, aktywny FROM `doradca` WHERE `id`=:id');
						$stmt->bindValue(':id', $id, PDO::PARAM_INT);
						$result = $stmt->execute();
						$tab = $stmt->fetchAll();
						$stmt->closeCursor();
						// foreach ($doradca as $key => $value)
						// {
						// 	$string = $value['SID'];
						// 	$value['imie'] = decode($value['imie']);
						// }
						$i=0;
						$doradca = array();
						foreach ($tab as $key) {
							// $doradca[$i]['id'] = $key['id'];
							// $doradca[$i]['imie'] = decode($key['imie']);
							// $doradca[$i]['nazwisko'] = decode($key['nazwisko']);
							// $doradca[$i]['miasto'] = decode($key['miasto']);
							// $doradca[$i]['kSID'] = substr(decode($key['SID']),6,9);
							// $doradca[$i]['koordynator'] = $key['koordynator'];
							// $doradca[$i]['aktywny'] = $key['aktywny'];
							// $i++;
							$doradca[] = array('id' => $key['id'],
																'imie' => decode($key['imie']),
																'nazwisko' => decode($key['nazwisko']),
																'miasto' => decode($key['miasto']),
																'kSID' => substr(decode($key['SID']),6,9),
																'koordynator' => $key['koordynator'],
																'aktywny' => $key['aktywny']);
						}
						d($doradca);
						// $string = decode($string);
						// $SID = substr($string,6,9);
						// d($SID,$string);
						// $data['kSID']= $SID;
						//czy istnieje kategoria o padanym id
						if($result && $doradca && !empty($doradca)){
							$data['doradca'] = $doradca[0];
						}
						else
						{
							//$data['category'] = array();
							$data['error'] = "Brak doradcaa o id=$id!";
						}
						d($data);

				}
				catch(\PDOException $e)
				{
					$data['error'] = 'Błąd odczytu danych z bazy!';
				}
				return $data;
	}
	public function szukaj($miastoKS){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
			else
				try
				{
					$doradca = array();
					$miastoKS = encode($miastoKS);
					d($miastoKS);
					$stmt = $this->pdo->prepare('SELECT doradca.id AS idDoradca,doradca.imie,doradca.nazwisko ,koordynator.imie AS kImie,koordynator.nazwisko AS kNazw , SID, doradca.miasto, doradca.aktywny,koordynator.aktywny AS aktywnyKor, koordynator.id AS idKoordynator from `doradca` inner join `koordynator` ON `koordynator`.`id`=`doradca`.`koordynator` WHERE doradca.miasto LIKE :miasto OR koordynator.imie LIKE :imie OR koordynator.nazwisko LIKE :nazwisko' );
					$stmt->bindValue(':miasto', "%".$miastoKS."%", PDO::PARAM_STR);
					$stmt->bindValue(':imie', "%".$miastoKS."%", PDO::PARAM_STR);
					$stmt->bindValue(':nazwisko',"%".$miastoKS."%", PDO::PARAM_STR);
					$result = $stmt->execute();
					$tab = $stmt->fetchAll();
					$stmt->closeCursor();

					// d($tab);
					$i=0;
					$doradca = array();
					foreach ($tab as $key) {
						$doradca[$i] = array('idDoradca' => $key['idDoradca'],
															'imie' => decode($key['imie']),
															'nazwisko' => decode($key['nazwisko']),
															'miasto' => decode($key['miasto']),
															'SID' => substr(decode($key['SID']),6,9),
															'Koordynator' => decode($key['kImie']).' '.decode($key['kNazw']),
															'aktywnyKor' => $key['aktywnyKor']);
						$i++;
					}
					d($doradca);
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
	//model usuwa wybraną kategorię
	public function delete($id){
		$data = array();
		if($id === NULL)
			$data['error'] = 'Nieokreślone id!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$stmt = $this->pdo->prepare('UPDATE `doradca` SET aktywny=0 WHERE `id`=:id');
						$stmt->bindValue(':id', $id, PDO::PARAM_INT);
						$result = $stmt->execute();
						$rows = $stmt->rowCount();
						$stmt->closeCursor();
						if(!$result && $rows <= 0)
							$data['error'] = "Nie znaleziono kategorii o id = $id!";
				}
				catch(\PDOException $e)
				{
					$data['error'] = 'Błąd odczytu danych z bazy!';
				}
				return $data;
	}
	//model dodaje wybraną kategorię
	public function insert($imie,$nazwisko,$miasto,$SID,$koordynator,$haslo) {
		$data = array();
		if($imie === NULL || $imie === "" || $nazwisko === NULL || $nazwisko === "" || $miasto === NULL || $miasto === "")
			$data['error'] = 'Nieokreślona nazwa!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$numer= "D00319".$SID;
						$imie = encode($imie);
						$nazwisko = encode($nazwisko);
						$miasto = encode($miasto);
						$numer = encode($numer);
						//$koordynator = encode($koordynator);
						$stmt = $this->pdo->prepare('INSERT INTO `doradca` (`imie`,`nazwisko`,`miasto`,`SID`,`koordynator`,`aktywny`) VALUES (:imie,:nazwisko,:miasto,:SID,:koordynator,1)');
						$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
						$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
						$stmt->bindValue(':miasto', $miasto, PDO::PARAM_STR);
						$stmt->bindValue(':SID', $numer, PDO::PARAM_STR);
						$stmt->bindValue(':koordynator', $koordynator, PDO::PARAM_INT);
						$stmt->execute();
						$stmt->closeCursor();

						$stmt = $this->pdo->prepare('INSERT INTO `uzytkownik` (`login`,`haslo`,`typKonta`) VALUES (:login,:haslo,2)');
						$stmt->bindValue(':login', $numer, PDO::PARAM_STR);
						$stmt->bindValue(':haslo', $haslo, PDO::PARAM_STR);
						$stmt->execute();
						$stmt->closeCursor();
				}
				catch(\PDOException $e)
				{
					$data['error'] = 'Błąd zapisu danych do bazy!';
				}
				return $data;
	}
	public function insertPred($tydzien, $pred, $sprzed, $dataWpr, $idDor){
		$data = array();
		if($tydzien === NULL || $tydzien === "" || !is_numeric($tydzien) || $pred === NULL || $pred === "" || !is_numeric($pred) || $sprzed === NULL || $sprzed === "" || !is_numeric($sprzed) || $dataWpr === NULL || $dataWpr === "" || $idDor === NULL || $idDor === "" || !is_numeric($idDor))
			$data['error'] = 'Nieokreślona nazwa!';
		else if(!$this->pdo)
			$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
				try {
					$dataWpr = encode($dataWpr);
					$pred = encode($pred);
					$sprzed = encode($sprzed);
					$stmt = $this->pdo->prepare('INSERT INTO `predykcja`(`IdDoradca`, `DataWprowadzenia`, `PlanowanaSprzedaz`, `Sprzedane`, `Tydzien`) VALUES (:IdDoradca,:DataWprowadzenia,:PlanowanaSprzedaz,:Sprzedane,:Tydzien)');
					$stmt->bindValue(':IdDoradca' ,$idDor, PDO::PARAM_INT);
					$stmt->bindValue(':DataWprowadzenia' ,$dataWpr, PDO::PARAM_STR);
					$stmt->bindValue(':PlanowanaSprzedaz' ,$pred, PDO::PARAM_INT);
					$stmt->bindValue(':Sprzedane' ,$sprzed, PDO::PARAM_INT);
					$stmt->bindValue(':Tydzien' ,$tydzien, PDO::PARAM_INT);
					$stmt->execute();
					$stmt->closeCursor();
				} catch(\PDOException $e) {
					$data['error'] = 'Błąd zapisu danych do bazy!';
				}
				return $data;
	}
	public function getPred($idDor, $myDate){
		$data = array();
		if($idDor === "" || $idDor === NULL || $myDate === "" || $myDate === NULL)
			$data['error'] = 'Nieokreślona nazwa!';
		else if(!$this->pdo)
			$data['error'] = 'Połączenie z bazą nie powidoło się!';
		else
			try {
				$myDate = encode($myDate);
				$myDate = $myDate.'%';
				$stmt = $this->pdo->prepare('SELECT IdDoradca, DataWprowadzenia, PlanowanaSprzedaz, Sprzedane, Tydzien FROM predykcja WHERE IdDoradca=:id AND DataWprowadzenia LIKE :myDate ORDER BY Tydzien ASC');
				$stmt->bindValue(':id', $idDor, PDO::PARAM_INT);
				$stmt->bindValue(':myDate', $myDate, PDO::PARAM_STR);
				$stmt->execute();
				$tab = $stmt->fetchAll();
				// d($predykcja);
				$predykcja = array();
				$i=0;
				$suma = 0;
				foreach ($tab as $key) {
					$predykcja[$i]['IdDoradca'] = $key['IdDoradca'];
					$predykcja[$i]['DataWprowadzenia'] = decode($key['DataWprowadzenia']);
					$predykcja[$i]['PlanowanaSprzedaz'] = decode($key['PlanowanaSprzedaz']);
					$predykcja[$i]['Sprzedane'] = decode($key['Sprzedane']);
					$predykcja[$i]['Tydzien'] = $key['Tydzien'];
					$suma += decode($key['Sprzedane']);
					$i++;
				}
				// d($predykcja);
				if($predykcja && !empty($predykcja)){
					$data['doradca'] = $predykcja;
					$data['sumaSp'] = $suma;
				}
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
				$sid = encode($sid);
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
