<?php
	namespace Controllers;
	//abstrakcyjna klasa kontrolera
	abstract class Controller {
		
		//przekierowanie na innyc adres
		public function redirect($url) {
			header('location: '.'http://'.$_SERVER["HTTP_HOST"].'/'.
			\Config\Website\Config::$subdir.$url);
            
		}
		public function getModel($name){
			$name = 'Models\\'.$name;
                        return new $name();
                   
		}
		
		//załadowanie widoku
		public function getView($name){
			$name = 'Views\\'.$name;
			 
                return new $name();
            
		}		
	}
?>