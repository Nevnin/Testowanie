<?php
namespace Views;

class Koordynator extends View {
	//wyświetlenie widoku z Koordynator
		//wyświetlenie widoku z formularzem do dodawania kategorii
	public function index(){
		//pobranie z modelu listy Doradca
		$model = $this->getModel('Koordynator');
		if($model) {
			$data = $model->getAll();
			if(isset($data['koordynator']))
				$this->set('allKor', $data['koordynator']);
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			//przetworzenie szablonu do wyświetlania listy kategorii
			
			$this->render('indexKS');
			
			
			
	}
	//wyświetlenie widoku z wybraną kategorią
	public function showone($id){
		//pobranie wybranej kategorii
		$model = $this->getModel('Doradca');
		if($model) {
			$data = $model->getOne($id);
			if(isset($data['doradca']))
				$this->set('oneDor', $data['doradca']);
				
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			$this->render('oneDB');
			
			
			
	}
	
	public function add(){
		$this->set('customScript', 'addKS');
		$this->render('addKS');
	}
	public function edycja($id){
		$model = $this->getModel('Koordynator');
		if($model) {
			$data = $model->getOne($id);
			if(isset($data['koordynator']))
				$this->set('oneKor', $data['koordynator']);
				
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			
			$this->render('edycjaKS');
			
			
			
	}
		
	
}



?>