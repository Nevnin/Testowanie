<?php
namespace Controllers;

class Raport extends Controller{
	
	public function index(){
		
		$view = $this->getView('Raport');
		$view->index();
	}
}