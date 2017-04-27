<?php
	namespace Tools;
	
	class Access extends Session {
		private static $login = 'user';
		private static $loginTime = 'logintime';
		private static $sessionTime = 60;
		
		//zaloguj
		public static function login($login) {
			//sprawdzenie istniej¹cej sesji
			if(parent::check() === true)
			{
				//zmieniaj¹c poziom dostêpu regenrerujemy sesjê
				parent::regenerate();
				
				parent::set(self::$login, $login);
				parent::set(self::$loginTime, time());
			}
		}
		//wyloguj
		public static function logout() {
			parent::clear(self::$login);
			parent::clear(self::$loginTime);
			parent::regenerate();
		}
		//sprawdŸ czy jest zalogowany
		public static function islogin() {
			if(parent::is(self::$login) === true) {
				
				if(time() > parent::get(self::$loginTime) + self::$sessionTime) {
					//przekroczono czas sesji, wyloguj
					self::logout();
					return false;
				}
				parent::set(self::$loginTime, time());
				return true;
			}
			return false;
		}
	}