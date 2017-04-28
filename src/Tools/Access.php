<?php
	namespace Tools;
	
	class Access extends Session {
		private static $login = 'user';
		private static $loginTime = 'logintime';
		private static $sessionTime = 10000;
		private static $typKonta = 'typkonta';
		
		//zaloguj
		public static function login($login, $typ) {
			//sprawdzenie istniej�cej sesji
			if(parent::check() === true)
			{
				//zmieniaj�c poziom dost�pu regenrerujemy sesj�
				parent::regenerate();
				
				parent::set(self::$login, $login);
				parent::set(self::$loginTime, time());
				parent::set(self::$typKonta,$typ);
			}
		}
		//wyloguj
		public static function logout() {
			parent::clear(self::$login);
			parent::clear(self::$loginTime);
			parent::regenerate();
			
		
		}
		//sprawd� czy jest zalogowany
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