<?php

if(isset($_SESSION['user']))
{
	$zmienna = $_SESSION['user'];
	$this->set("user",$zmienna);
	
}

if(isset($_SESSION['typkonta']))
{
	$zmienna2 = $_SESSION['typkonta'];
	$this->set("typkonta",$zmienna2);
	
}