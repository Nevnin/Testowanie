<?php
	//automatyczne ładowanie potrzebnych klas
	require ('./vendor/autoload.php');
	//use Config\Database\DBConfig as DB;
	\Config\dbconf::setDBConfig();
	//przykład uwzględnia obsługę jednego kontrolera,
	//który wykonuje określone akcje $action
	//i może otrzymywać parametry poprzez zmienną $id
\Config\Website\Config::$subdir ='Testowanie/';
\Tools\Session::initialize();

if(\Tools\Access::islogin() !== true) {
	$mycontroller = new \Controllers\Access();
	//Logowanie do systemu
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$mycontroller->login();
	}
	//Wy�wietlenie formularza do zalogowania
	else {
		$mycontroller->logform();
	}
}
else {
if(isset($_GET['Controller']))
    $controller = $_GET['Controller'];
else
    $controller = 'Koordynator';
	if(isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = 'index';
	if(isset($_GET['id']))
		$id = $_GET['id'];
	else	
		$id = null;
	//print($_SERVER["SERVER_NAME"]);
//print($_SERVER["HTTP_HOST"]);
	//tworzymy kontroler
	$controller = 'Controllers\\'.$controller;
    $controller1 = new $controller();
	//wykonujemy akcję dla kontrolera
	
    $controller1->$action($id);
    
}
?>


