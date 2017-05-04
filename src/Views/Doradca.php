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
	public function szukaj($szukaj){
		//pobranie z modelu listy Doradca
		$model = $this->getModel('Doradca');
		if($model) {
			$data = $model->szukaj($szukaj);
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
				$this->set('kSID',$data['kSID']);

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
				$this->set('customScript', 'addDB');
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
	//wyświetlenie widoku z formularzem do dodawania predykcji
	public function addPred(){
		$model = $this->getModel('Doradca');
		if($model) {
			$idDor = $model->getIdDor($_SESSION['user']);
			//d($idDor['doradca'][0][0]);
			if(isset($idDor['doradca'])){
				$data = $model->getPred($idDor['doradca'][0][0],date("Y-m"));
				$tygodnie = array();
				$tygodnie[] = 1;
				$tygodnie[] = 2;
				$tygodnie[] = 3;
				$tygodnie[] = 4;
				for($i=0; $i<4; $i++){
					if(isset($data['doradca'][$i]['Tydzien'])){
						//d($data);
						unset($tygodnie[$data['doradca'][$i]['Tydzien']-1]);
					}
				}
				$this->set('tyg', $tygodnie);
				if(isset($data['doradca'])){
					$this->set('predDor', $data['doradca']);
					if(isset($data['sumaSp'])){
						$this->set('sumaSp', $data['sumaSp']);
					}else{
						$this->set('sumaSp', 0);
					}
				}
			}
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
		$this->render('addPred');
	}
}



?>
