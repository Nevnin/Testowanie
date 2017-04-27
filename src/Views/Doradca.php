<?php
namespace Views;

class Doradca extends View {
	//wyświetlenie widoku z Doradca
	public function index(){
		//pobranie z modelu listy Doradca
		$model = $this->getModel('Doradca');
		if($model) {
			$data = $model->getAll();
			if(isset($data['doradca']))
				$this->set('allDor', $data['doradca']);
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			//przetworzenie szablonu do wyświetlania listy kategorii

			$this->render('indexDB');



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
	public function edycja($id){
		$model = $this->getModel('Doradca');
		if($model) {
			$data = $model->getOne($id);
			if(isset($data['doradca']))
				$this->set('oneDor', $data['doradca']);

		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			$model1 = $this->getModel('Koordynator');
			if($model1) {
				$data = $model1->getAll();
				if(isset($data['koordynator']))
					$this->set('allKorAll', $data['koordynator']);
			}
			if(isset($data['error']))
				$this->set('error', $data['error']);
			$this->render('edycjaDB');



	}
	public function add(){
		$model = $this->getModel('Koordynator');
		if($model) {
			$data = $model->getAll();
			if(isset($data['koordynator']))
				$this->set('allKor', $data['koordynator']);
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);

				$this->set('customScript', 'addDB');
				$this->render('addDB');
	}
	//wyświetlenie widoku z formularzem do dodawania kategorii
	public function addPred(){
		$info = getDate();
		$dataS = array('dzien' => $info['mday'],'miesiac' => $info['month'], 'miesiacNum' => $info['mon'], 'rok' => $info['year']);
		$this->set('dataS', $dataS);
		$this->render('addPred');
	}
}



?>
