<?php
	namespace Models;
	//aby będąc w inne przestrzeni nazw móc korzystać z PDO
	use \PDO;
	abstract class Model{
		//wszystkie operacje na bazie wykonujemy przy pomocy PDO
		protected $pdo;
		
		public function  __construct() {
			//konstruktor modelu łaczy się z bazą danych
			try {
				//dane dostępu do bazy znajdują się w pliku konfiguracyjnym
			
                
				$this->pdo = \Config\dbconf::getHandle();
			}
			catch(\PDOException $e) {
                $this->pdo = null;
			}
		}
	}
?>