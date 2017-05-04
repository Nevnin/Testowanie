<?php
namespace Views;

class Raport extends View {
	//wyświetlenie widoku z Doradca
	public function index(){
		//pobranie z modelu listy Doradca
		$model = $this->getModel('Raport');
		if($model) {
			$data = $model->getAll();
			if(isset($data['doradca']))
				$this->set('allDorR', $data['doradca']);
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			//przetworzenie szablonu do wyświetlania listy kategorii
			
			$this->render('raport');
			
			
			
	}
}