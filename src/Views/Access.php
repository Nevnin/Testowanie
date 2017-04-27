<?php
	namespace Views;
	
	class Access extends View {
		
		private static $messages = array(
				1 => 'Podane dane s� niepoprawne!',
				100 => 'Nieokre�lony b��d!'
		);
		
		//wy�wietla formularz do logowania
		public function logform($result = null){
			$this->set('customScript', 'logform');
			if(isset($result)){
				if(array_key_exists($result, self::$messages))
					$this->set('message', self::$messages[$result]);
					else
						$this->set('message', self::$messages[100]);
			}
			$this->render('logform');
		}
		
	}


