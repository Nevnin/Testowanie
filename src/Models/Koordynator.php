<?php
namespace Models;
use \PDO;
class Koordynator extends Model {
	//model zwraca tablicę wszystkich kategorii
	public function getAll(){
		$data = array();
		if(!$this->pdo)
			$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
			else
			try {
				$stmt = $this->pdo->query('SELECT  *  FROM `koordynator`' );
				$tab = $stmt->fetchAll();
				$stmt->closeCursor();
				//czy istnieje kategoria o padanym id
				$i=0;
				$koordynator = array();
				foreach ($tab as $key) {
					$koordynator[$i] = array('id' => $key['id'],
																	'imie' => decode($key['imie']),
																	'nazwisko' => decode($key['nazwisko']),
																	'miasto' => decode($key['miasto']),
																	'aktywny' => $key['aktywny']);
					$i++;
				}
				// d($koordynator);
				if($koordynator && !empty($koordynator))
					$data['koordynator'] = $koordynator;
					else
						$data['koordynator'] = array();
						$data['msg'] = 'OK';
						// d($data);
			}
			catch(\PDOException $e)
			{
				$data['msg'] = 'B��d odczytu danych z bazy!';
			}
			return $data;
	}
	// public function getAllAll(){
	// 	$data = array();
	// 	if(!$this->pdo)
	// 		$data['msg'] = 'Po��czenie z baz� nie powido�o si�!';
	// 		else
	// 			try
	// 			{
	// 				$koordynator = array();
	//
	// 				$stmt = $this->pdo->query('SELECT  *  FROM `koordynator`' );
	// 				// $koordynator = $stmt->fetchAll();
	// 				// $stmt->closeCursor();
	// 				$tab = $stmt->fetchAll();
	// 				$stmt->closeCursor();
	// 				//czy istnieje kategoria o padanym id
	// 				$i=0;
	// 				$koordynator = array();
	// 				foreach ($tab as $key) {
	// 					$koordynator[$i] = array('id' => $key['id'],
	// 																	'imie' => decode($key['imie']),
	// 																	'nazwisko' => decode($key['nazwisko']),
	// 																	'miasto' => decode($key['miasto']),
	// 																	'aktywny' => $key['aktywny']);
	// 					$i++;
	// 				}
	// 				// d($koordynator);
	// 				if($koordynator && !empty($koordynator))
	// 					$data['koordynator'] = $koordynator;
	// 					else
	// 						$data['koordynator'] = array();
	// 						$data['msg'] = 'OK';
	// 						// d($data);
	// 		}
	// 		catch(\PDOException $e)
	// 		{
	// 			$data['msg'] = 'B��d odczytu danych z bazy!';
	// 		}
	// 		return $data;
	// }
	public function getOne($id){
		$data = array();
		if($id === NULL)
			$data['error'] = 'Nieokreślone id!';
			else if(!$this->pdo)
				$data['error'] = 'Połączenie z bazą nie powidoło się!';
				else
					try
					{
						$stmt = $this->pdo->prepare('SELECT id, imie, nazwisko, miasto, aktywny FROM `koordynator` WHERE `id`=:id');
						$stmt->bindValue(':id', $id, PDO::PARAM_INT);
						$result = $stmt->execute();
						$tab = $stmt->fetchAll();
						$stmt->closeCursor();
						//czy istnieje kategoria o padanym id
						$i=0;
						$koordynator = array();
						foreach ($tab as $key) {
							$koordynator[] = array('id' => $key['id'],
																			'imie' => decode($key['imie']),
																			'nazwisko' => decode($key['nazwisko']),
																			'miasto' => decode($key['miasto']),
																			'aktywny' => $key['aktywny']);
						}
						//d($koordynator);
						if($result && $koordynator && !empty($koordynator)){
							$data['koordynator'] = $koordynator[0];
						}
						else
						{
							//$data['category'] = array();
							$data['error'] = "Brak koordynatora o id=$id!";
						}
						//d($data);

				}
				catch(\PDOException $e)
				{
					$data['error'] = 'Błąd odczytu danych z bazy!';
				}
				return $data;
	}
	public function update($id,$imie,$nazwisko,$miasto,$aktywny)
	{
		$data = array();
		if($id ===NULL || $imie===NULL || $nazwisko===NULL || $miasto===NULL )
		{
			$data['msg'] = 'Nieokreslone wartosci!';
			return $data;
		}
		try
		{
			$imie = encode($imie);
			$nazwisko = encode($nazwisko);
			$miasto = encode($miasto);
			$stmt = $this->pdo->prepare('UPDATE `koordynator` SET `imie` = :imie, `nazwisko` = :nazwisko, `miasto` = :miasto, `aktywny`=:aktywny WHERE `koordynator`.`id` = :id');
			$stmt->bindValue(':id',$id,PDO::PARAM_INT);
			$stmt->bindValue(':imie',$imie,PDO::PARAM_STR);
			$stmt->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
			$stmt->bindValue(':miasto',$miasto,PDO::PARAM_STR);
			$stmt->bindValue(':aktywny',$aktywny,PDO::PARAM_INT);
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
						$imie = encode($imie);
						$nazwisko = encode($nazwisko);
						$miasto = encode($miasto);
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
