<?php
namespace Controllers;
//kontroler do obsługi kategorii
//każda metoda odpowiada jednej akcji możliwej
//do wykonania przez kontroler
class Doradca extends Controller {
	//wyświetla widok z listą kategorii
	public function index(){
		//tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
		//w widoku
		$view = $this->getView('Doradca');
		$view->index();

	}

	//usuwa wybraną kategorię
	public function delete($id){
		if($id !== null)
		{
			//za operację na bazie danych odpowiedzialny jest model
			//tworzymy obiekt modelu i zlecamy usunięcie kategorii
			$model=$this->getModel('Doradca');
			if($model)
				$data = $model->delete($id);
				//nie przekazano komunikatów o błędzie


				//powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
				$this->redirect('Doradca/');
		}
		else
			$this->redirect('Doradca/');
	}
	//wyświetla widok formularza umożliwiający dodanie do bazy kategorii
	public function add() {
		$view=$this->getView('Doradca');

		$view->add();



	}
	public function edycja($id)
	{
		$view =$this->getView('Doradca');
		$view->edycja($id);
	}
	//dodaje do bazy kategorię

	public function update() {
		//za operację na bazie danych odpowiedzialny jest model
		//tworzymy obiekt modelu i zlecamy dodanie kategorii
		$model=$this->getModel('Doradca');
		if($model) {
			$data = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko'],$_POST['miasto'],$_POST['sid'],$_POST['koordynator']);
			//nie przekazano komunikatów o błędzie
		}
		$this->redirect('Doradca/');
	}
	public function addPred() {
		$view = $this->getView('Doradca');
		$view->addPred();
	}

	//dodaje do bazy kategorię
	public function insert() {
		//za operację na bazie danych odpowiedzialny jest model
		//tworzymy obiekt modelu i zlecamy dodanie kategorii
		$model=$this->getModel('Doradca');
		if($model) {
			$data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['miasto'],$_POST['sid'],$_POST['koordynator']);
			//nie przekazano komunikatów o błędzie
		}
		$this->redirect('Doradca/');
	}
	public function insertPred() {
		$model=$this->getModel('Doradca');
		if($model) {
			$data = $model->insert($_POST['tydzien'],$_POST['pred'],$_POST['sprzed'],$_POST['data']);
			//nie przekazano komunikatów o błędzie
		}
		$this->redirect('Doradca/addPred');
	}
}
?>
