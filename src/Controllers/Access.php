<?php
	namespace Controllers;
	//kontroler do obsługi logowania
	//każda metoda odpowiada jednej akcji możliwej 
	//do wykonania przez kontroler
	class Access extends Controller {
		//wyświetla formularz do logowania
		public function logform($result = null){
			$view=$this->getView('Access');
			$view->logform($result);
		}
		//zalogowuje do systemu
		public function login(){
			$model=$this->getModel('Access');
			$result = $model->login($_POST['login'],md5($_POST['password']));
			
			if($result === 0)
				$this->redirect('');
				else
					$this->logform($result);
		}
		
		//wylogowuje z systemu
		public function logout(){
			$model=$this->getModel('Access');
			$model->logout();
			$this->redirect('');
		}
		
		
	}
