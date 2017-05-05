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
				$Doradca=$data['doradca'];
				foreach($Doradca as $id=>$value){
				$data1 = $model->getInfo($value['IdDoradcy']);
				}//d($data1['preds']);
		}
		if(isset($data['error']))
			$this->set('error', $data['error']);
			//przetworzenie szablonu do wyświetlania listy kategorii

			$this->render('raport');



	}
}
