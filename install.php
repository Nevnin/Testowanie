<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Witaj świecie!</title>
</head>
<body>
<?php
	require './vendor/autoload.php';

	use Config\dbconf as DB;
	DB::setDBConfig();
	$pdo = DB::getHandle();

	try
	{
		$drop1 = 'DROP TABLE IF EXISTS `predykcja` ';
		$pdo->exec($drop1);
		$drop1 = 'DROP TABLE IF EXISTS `doradca` ';
		$pdo->exec($drop1);
        $drop1 = 'DROP TABLE IF EXISTS `koordynator` ';
         $pdo->exec($drop1);
         $drop1 = 'DROP TABLE IF EXISTS `uzytkownik` ';
         $pdo->exec($drop1);

        $query = "CREATE TABLE IF NOT EXISTS `koordynator`(
        `id` int NOT NULL AUTO_INCREMENT,
		`imie` varchar(100) NOT NULL,
		`nazwisko` varchar(100) NOT NULL,
        `miasto` varchar(100) NOT NULL,
		`aktywny` boolean NOT NULL,
        PRIMARY KEY(id))";
        $pdo->exec($query);
		$query1 = "CREATE TABLE IF NOT EXISTS `doradca`(
        `id` int NOT NULL AUTO_INCREMENT,
        `imie` varchar(100) NOT NULL,
        `nazwisko` varchar(100) NOT NULL,
		`miasto` varchar(100) NOT NULL,
		`SID` char(9) NOT NULL,
		`koordynator` int NOT NULL,
		`aktywny` boolean NOT NULL,
        PRIMARY KEY(id))";
        $pdo->exec($query1);

        $query1 = "CREATE TABLE IF NOT EXISTS `uzytkownik`(
        `id` int NOT NULL AUTO_INCREMENT,
        `login` varchar(100) NOT NULL,
        `haslo` varchar(100) NOT NULL,
		`typKonta` int(1) NOT NULL,
        PRIMARY KEY(id))";
        $pdo->exec($query1);

       $query3= "ALTER TABLE doradca ADD CONSTRAINT   FOREIGN KEY (`koordynator`) REFERENCES koordynator(`id`) ON DELETE CASCADE";
        $pdo->exec($query3);

        $query = "CREATE TABLE `predykcja` (
        		`IdPredykcja` int(11) NOT NULL AUTO_INCREMENT,
        		`IdDoradca` int NOT NULL,
        		`DataWprowadzenia` date NOT NULL,
        		`PlanowanaSprzedaz` int(11) NOT NULL,
        		`Sprzedane` int(11) NOT NULL,
        		`Tydzien` varchar(5) NOT NULL,
				PRIMARY KEY(IdPredykcja)
        		)";
		$pdo->exec($query);

        $query3= "ALTER TABLE predykcja ADD CONSTRAINT   FOREIGN KEY (`IdDoradca`) REFERENCES doradca(`id`) ON DELETE CASCADE";
        $pdo->exec($query3);


        $koordynator = array();
        $koordynator[] = array('imie'=>'Jan','nazwisko'=>'Kowalski','miasto'=>'Kalisz','aktywny'=>'1');
        $koordynator[] = array('imie'=>'Andrzej','nazwisko'=>'Nowak','miasto'=>'Kalisz','aktywny'=>'1');
        $koordynator[] = array('imie'=>'Maria','nazwisko'=>'B�k','miasto'=>'Kalisz','aktywny'=>'1');
        $koordynator[] = array('imie'=>'Jakub','nazwisko'=>'Mickiewicz','miasto'=>'Kalisz','aktywny'=>'1');
        $koordynator[] = array('imie'=>'Damian','nazwisko'=>'Sadownik','miasto'=>'Kalisz','aktywny'=>'1');
        $koordynator[] = array('imie'=>'Marcin','nazwisko'=>'Bukiewicz','miasto'=>'Kalisz','aktywny'=>'1');
        $stmt = $pdo->prepare('INSERT INTO `koordynator`(`imie`,`nazwisko`,`miasto`,`aktywny`) VALUES (:imie,:nazwisko,:miasto,:aktywny)');
        foreach($koordynator as $kor)
        {
        	$stmt->bindValue(':imie',$kor['imie'],PDO::PARAM_STR);
        	$stmt->bindValue(':nazwisko',$kor['nazwisko'],PDO::PARAM_STR);
        	$stmt->bindValue(':miasto',$kor['miasto'],PDO::PARAM_STR);
        	$stmt->bindValue(':aktywny',$kor['aktywny'],PDO::PARAM_INT);
        	$stmt->execute();
        }
        $doradcy = array();
        $doradcy[] = array('imie'=>'Jan','nazwisko'=>'Dab','miasto'=>'Kalisz','SID'=>'D00319545','koordynator'=>'1','aktywny'=>'1');
        $doradcy[] = array('imie'=>'Marek','nazwisko'=>'Klon','miasto'=>'Kalisz','SID'=>'D00319456','koordynator'=>'1','aktywny'=>'1');
        $doradcy[] = array('imie'=>'Arek','nazwisko'=>'Sosna','miasto'=>'Kalisz','SID'=>'D00319123','koordynator'=>'2','aktywny'=>'1');
        $doradcy[] = array('imie'=>'Darek','nazwisko'=>'Kowalski','miasto'=>'Kalisz','SID'=>'D00319765','koordynator'=>'3','aktywny'=>'1');
        $doradcy[] = array('imie'=>'Mateusz','nazwisko'=>'Pyc','miasto'=>'Kalisz','SID'=>'D00319653','koordynator'=>'4','aktywny'=>'1');
        $doradcy[] = array('imie'=>'Kamil','nazwisko'=>'Bizan','miasto'=>'Kalisz','SID'=>'D00319752','koordynator'=>'4','aktywny'=>'1');

        $stmt = $pdo -> prepare('INSERT INTO `doradca`(`imie`,`nazwisko`,`miasto`,`SID`,`koordynator`,`aktywny`) VALUES(:imie,:nazwisko,:miasto,:SID,:koordynator,:aktywny)');
        foreach($doradcy as $doradca)
        {
        	$stmt->bindValue(':imie',$doradca['imie'],PDO::PARAM_STR);
        	$stmt->bindValue(':nazwisko',$doradca['nazwisko'],PDO::PARAM_STR);
        	$stmt->bindValue(':miasto',$doradca['miasto'],PDO::PARAM_STR);
        	$stmt->bindValue(':SID',$doradca['SID'],PDO::PARAM_STR);
        	$stmt->bindValue(':koordynator',$doradca['koordynator'],PDO::PARAM_INT);
        	$stmt->bindValue(':aktywny',$doradca['aktywny'],PDO::PARAM_INT);
        	$stmt->execute();
        }
        $uzytkownicy = array();
        $dobrehaslo  = md5("admin");
        $dobrehaslo2 = md5("123");
        $uzytkownicy[] = array('login'=>'admin','haslo'=>$dobrehaslo,'typKonta'=>1);
        $uzytkownicy[] = array('login'=>'123123123','haslo'=>'f5bb0c8de146c67b44babbf4e6584cc0','typKonta'=>2);
        $uzytkownicy[] = array('login'=>'D00319123','haslo'=>$dobrehaslo2,'typKonta'=>2);
        //hasla: admin, db

        $stmt = $pdo -> prepare('INSERT INTO `uzytkownik`(`login`,`haslo`,`typKonta`) VALUES(:login,:haslo,:typKonta)');
        foreach($uzytkownicy as $uzytkownik)
        {
        	$stmt->bindValue(':login',$uzytkownik['login'],PDO::PARAM_STR);
        	$stmt->bindValue(':haslo',$uzytkownik['haslo'],PDO::PARAM_STR);
        	$stmt->bindValue(':typKonta',$uzytkownik['typKonta'],PDO::PARAM_INT);

        	$stmt->execute();
        }

	}
	catch(PDOException $e)
	{
		echo 'Wystąpił błąd biblioteki PDO: ' . $e->getMessage();
	}




?>
</body>
</html>
