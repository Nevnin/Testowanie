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
						$stmt = $this->pdo->prepare('SELECT * FROM `doradca` WHERE `id`=:id');
						$stmt->bindValue(':id', $id, PDO::PARAM_INT);
						$result = $stmt->execute();
						$doradca = $stmt->fetchAll();
						$stmt->closeCursor();
						foreach ($doradca as $key => $value)
						{
							$string = $value['SID'];
						}
						$SID = substr($string,6,9);
						$data['kSID']= $SID;
						//czy istnieje kategoria o padanym id
						if($result && $doradca && !empty($doradca)){
							$data['doradca'] = $doradca[0];
						}
						else
						{
							//$data['category'] = array();
							$data['error'] = "Brak doradcaa o id=$id!";
						}

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
					$stmt = $this->pdo->prepare('SELECT doradca.id AS idDoradca,doradca.imie,doradca.nazwisko ,concat(koordynator.imie," ",koordynator.nazwisko) AS Koordynator , SID, doradca.miasto, doradca.aktywny,koordynator.aktywny AS aktywnyKor, koordynator.id AS idKoordynator from `doradca` inner join `koordynator` ON `koordynator`.`id`=`doradca`.`koordynator` WHERE doradca.miasto LIKE :miasto OR koordynator.imie LIKE :imie OR koordynator.nazwisko LIKE :nazwisko' );
					$stmt->bindValue(':miasto', "%".$miastoKS."%", PDO::PARAM_STR);
					$stmt->bindValue(':imie', "%".$miastoKS."%", PDO::PARAM_STR);
					$stmt->bindValue(':nazwisko',"%".$miastoKS."%", PDO::PARAM_STR);
					$result = $stmt->execute();
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
						$stmt = $this->pdo->prepare('INSERT INTO `doradca` (`imie`,`nazwisko`,`miasto`,`SID`,`koordynator`,`aktywny`) VALUES (:imie,:nazwisko,:miasto,:SID,:koordynator,1)');
						$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
						$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
						$stmt->bindValue(':miasto', $miasto, PDO::PARAM_STR);
						$stmt->bindValue(':SID', $numer, PDO::PARAM_STR);
						$stmt->bindValue(':koordynator', $koordynator, PDO::PARAM_INT);
						$stmt->execute();
						$stmt->closeCursor();

						$stmt = $this->pdo->prepare('INSERT INTO `uzytkownik` (`login`,`haslo`,`typKonta`) VALUES (:login,:haslo,2)');
						$stmt->bindValue(':login', $SID, PDO::PARAM_STR);
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
		if($tydzien === NULL || $tydzien === "" || $pred === NULL || $pred === "" || !is_numeric($pred) || $sprzed === NULL || $sprzed === "" || !is_numeric($sprzed) || $dataWpr === NULL || $dataWpr === "" || $idDor === NULL || $idDor === "" )
			$data['error'] = 'Nieokreślona nazwa!';
		else if(!$this->pdo)
			$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
				try {
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
				$myDate = $myDate.'%';
				$stmt = $this->pdo->prepare('SELECT IdDoradca, DataWprowadzenia, PlanowanaSprzedaz, Sprzedane, Tydzien FROM predykcja WHERE IdDoradca=:id AND DataWprowadzenia LIKE :myDate ORDER BY Tydzien ASC');
				$stmt->bindValue(':id', $idDor, PDO::PARAM_INT);
				$stmt->bindValue(':myDate', $myDate, PDO::PARAM_STR);
				$stmt->execute();
				$predykcja = $stmt->fetchAll();
				//d($predykcja);
				if($predykcja && !empty($predykcja))
					$data['doradca'] = $predykcja;
				else
					$data['doradca'] = array();
				$data['msg'] = 'OK';
		} catch(\PDOException $e) {
			$data['error'] = 'Błąd odczytu danych z bazy!';
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
