<?php
namespace Models;
use \PDO;
class Koordynator extends Model {
	//model zwraca tablicę wszystkich kategorii
	public function getAll(){
		$data = array();
		if(!$this->pdo)
			$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
				try
				{
					$koordynator = array();
					$stmt = $this->pdo->query('SELECT * from `koordynator` WHERE aktywny=1');
					$koordynator = $stmt->fetchAll();
					$stmt->closeCursor();
					if($koordynator && !empty($koordynator))
						$data['koordynator'] = $koordynator;
						else
							$data['koordynator'] = array();
			}
			catch(\PDOException $e)
			{
				$data['error'] = 'Błąd odczytu danych z bazy!';
			}
			return $data;
	}
	public function update($id,$imie,$nazwisko,$miasto)
	{
		$data = array();
		if($id ===NULL || $imie===NULL || $nazwisko===NULL || $miasto===NULL )
		{
			$data['msg'] = 'Nieokreslone wartosci!';
			return $data;
		}
		try
		{
			$stmt = $this->pdo->prepare('UPDATE `koordynator` SET `imie` = :imie, `nazwisko` = :nazwisko, `miasto` = :miasto WHERE `koordynator`.`id` = :id');
			$stmt->bindValue(':id',$id,PDO::PARAM_INT);
			$stmt->bindValue(':imie',$imie,PDO::PARAM_STR);
			$stmt->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
			$stmt->bindValue(':miasto',$miasto,PDO::PARAM_STR);
			$result =$stmt->execute();
			$rows = $stmt->rowCount();
			$stmt->closeCursor();
			if ($result)
			{
				$stmt = $this->pdo->prepare('SELECT `id`, `imie`, `nazwisko`, `miasto` FROM `koordynator`
                                                WHERE `koordynator`.`id` = :id');
				$stmt->bindValue(':id', $id, PDO::PARAM_INT);
				$result = $stmt->execute();
				$koordynator = $stmt->fetchAll();
				$stmt->closeCursor();
				//czy istnieje kategoria o padanym id
				if($result && $koordynator && !empty($koordynator))
				{
					$data['koordynator'] = $koordynator[0];
					$data['msg'] = 'OK';
				}
				else
				{
					$data['koordynator'] = array();
					$data['msg'] = "Brak koordynatora o id=$id";
				}
			}
			$data['msg'] = $result ? 'OK' : "Nie znaleziono kategorii o id = $id!";
		}
		catch(\PDOException $e)
		{
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
		}
		return $data;
	}
	public function delete($id){
		$data = array();
		if($id === NULL)
			$data['error'] = 'Nieokreślone id!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$stmt = $this->pdo->prepare('UPDATE `koordynator` SET aktywny=0 WHERE `id`=:id');
						$stmt->bindValue(':id', $id, PDO::PARAM_INT);
						$result = $stmt->execute();
						$rows = $stmt->rowCount();
						$stmt->closeCursor();
						$data['msg'] = ($result && $rows > 0) ? 'OK' : "Nie znaleziono ksiazki o id = $id!";}
				catch(\PDOException $e)
				{
					$data['error'] = 'Błąd odczytu danych z bazy!';
				}
				return $data;
	}
	//model dodaje wybraną kategorię
	public function insert($imie,$nazwisko,$miasto) {
		$data = array();
		if($imie === NULL || $imie === "" || $nazwisko === NULL || $nazwisko === "" || $miasto === NULL || $miasto === "")
			$data['error'] = 'Nieokreślona nazwa!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$stmt = $this->pdo->prepare('INSERT INTO `koordynator` (`imie`,`nazwisko`,`miasto`,`aktywny`) VALUES (:imie,:nazwisko,:miasto,1)');
						$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
						$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
						$stmt->bindValue(':miasto', $miasto, PDO::PARAM_STR);
						$stmt->execute();
						$stmt->closeCursor();
				}
				catch(\PDOException $e)
				{
					$data['error'] = 'Błąd zapisu danych do bazy!';
				}
				return $data;
	}
}
?>