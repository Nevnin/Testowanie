<?php
namespace Models;
use \PDO;
class Doradca extends Model {
	//model zwraca tablicę wszystkich kategorii
	public function getAll(){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Połączenie z bazą nie powidoło się!';
			else
				try
				{
					$doradca = array();
					$stmt = $this->pdo->query('SELECT doradca.id,doradca.imie,doradca.nazwisko ,concat(koordynator.imie," ",koordynator.nazwisko) AS Koordynator , SID, doradca.miasto, doradca.aktywny,koordynator.aktywny from `doradca` inner join `koordynator` ON `koordynator`.`id`=`doradca`.`koordynator`');
					$doradca = $stmt->fetchAll();
					$stmt->closeCursor();
					if($doradca && !empty($doradca))
						$data['doradca'] = $doradca;
						else
							$data['doradca'] = array();
			}
			catch(\PDOException $e)
			{
				$data['msg'] = 'Błąd odczytu danych z bazy!';
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
						$stmt = $this->pdo->prepare('DELETE FROM `doradca` WHERE `id`=:id');
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
	public function insert($imie,$nazwisko,$miasto) {
		$data = array();
		if($imie === NULL || $imie === "" || $nazwisko === NULL || $nazwisko === "" || $miasto === NULL || $miasto === "")
			$data['error'] = 'Nieokreślona nazwa!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$stmt = $this->pdo->prepare('INSERT INTO `doradca` (`imie`,`nazwisko`,`miasto`,`aktywny`) VALUES (:imie,:nazwisko,:miasto,1)');
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