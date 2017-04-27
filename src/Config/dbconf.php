<?php 
namespace Config;
use PDO;
class dbconf{
		private static $type;
		private static $host; 
		private static $port; 
		private static $username;
		private static $password;
		private static $database; 		
		
		public static function setDBConfig($database ='testowanie', 
			$username ='root', $password = '', $host = 'localhost', 
			$type = 'mysql', $port = '3306'){
			  
			dbconf::$database = $database; 	
			dbconf::$username = $username;
			dbconf::$password = $password;
			dbconf::$host = $host;
			dbconf::$type = $type;
			dbconf::$port = $port;
		}
		
		public static function getHandle(){
			try{
				$pdo = new PDO(dbconf::$type.':host='.dbconf::$host.';dbname='.dbconf::$database.';port='.dbconf::$port, dbconf::$username, dbconf::$password );
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo 'PoĹÄczenie nawiÄzane!<br>';
				return $pdo;
				
			}catch(PDOException $e){
				echo 'PoĹÄczenie nie mogĹo zostaÄ utworzone.<br>';
			}	
			return null;			
		}
	}