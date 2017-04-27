<?php
	namespace Models;
	use \PDO;
	class Access extends Model {
		public function login($login, $password){
			$stmt = $this->pdo->prepare('SELECT * FROM uzytkownik WHERE (login = :login AND haslo = :haslo)');
			$stmt->bindValue(':login',$login,PDO::PARAM_STR);
			$stmt->bindValue(':haslo',$password,PDO::PARAM_STR);
			
			
			$result = $stmt->execute();
			//d($result);
			$rows = $stmt->rowCount();
			//    d($rows);
			//if($login === 'user' && $password == md5('password'))
			if($result && $rows == 1 )
			{
				//zainicjalizowanie sesji
				\Tools\Access::login($login);
				
				return 0;
			}
			return 1;
		}	
		
		public function logout(){
			\Tools\Access::logout();
		}
	}
