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
			$stmt = $this->pdo->prepare('UPDATE `doradca` SET `imie` = :imie, `nazwisko` = :nazwisko, `miasto` = :miasto , `SID`=:sid, `koordynator`=:koordynator WHERE `doradca`.`id` = :id');
			$stmt->bindValue(':id',$id,PDO::PARAM_INT);
			$stmt->bindValue(':imie',$imie,PDO::PARAM_STR);
			$stmt->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
			$stmt->bindValue(':miasto',$miasto,PDO::PARAM_STR);
			$stmt->bindValue(':sid',$sid,PDO::PARAM_STR);
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
	public function insertPred($tydzien, $pred, $sprzed, $sprzedNaKoniec, $dataWpr){
		$IdDoradca = 1;
		$data = array();
		if($tydzien === NULL || $tydzien === "" || $pred === NULL || $pred === "" || $sprzed === NULL || $sprzed === "" || $sprzedNaKoniec === NULL || $sprzedNaKoniec === "" || $dataWpr === NULL || $dataWpr === "")
			$data['error'] = 'Nieokreślona nazwa!';
		else if(!$this->pdo)
			$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
				try {
					$stmt = $this->pdo->prepare('INSERT INTO `predykcja`(`IdDoradca`, `DataWprowadzenia`, `PlanowanaSprzedaz`, `Sprzedane`, `SprzedazNaKoniec`, `Tydzien`) VALUES (:IdDoradca,:DataWprowadzenia,:PlanowanaSprzedaz,:Sprzedane,:SprzedazNaKoniec,:Tydzien)');
					$stmt->bindValue(':IdDoradca' ,$IdDoradca, PDO::PARAM_INT);
					$stmt->bindValue(':DataWprowadzenia' ,$dataWpr, PDO::PARAM_STR);
					$stmt->bindValue(':PlanowanaSprzedaz' ,$pred, PDO::PARAM_INT);
					$stmt->bindValue(':Sprzedane' ,$sprzed, PDO::PARAM_INT);
					$stmt->bindValue(':SprzedazNaKoniec' ,$sprzedNaKoniec, PDO::PARAM_INT);
					$stmt->bindValue(':Tydzien' ,$tydzien, PDO::PARAM_INT);
					$stmt->execute();
					$stmt->closeCursor();
				} catch(\PDOException $e) {
					$data['error'] = 'Błąd zapisu danych do bazy!';
				}
				return $data;
	}
	public function getPred(){
		$id = 1;
		$data = array();
		try {
			$stmt = $this->pdo->prepare('SELECT * FROM predykcja WHERE IdDoradca=:id');
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
}
?>
