<?php
namespace Controllers;
//kontroler do obsługi kategorii
//każda metoda odpowiada jednej akcji możliwej
//do wykonania przez kontroler
class Koordynator extends Controller {
	//wyświetla widok z listą kategorii
	public function index(){
		//tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
		//w widoku
		$view = $this->getView('Koordynator');
		$view->index();
	}
	
	
	//usuwa wybraną kategorię
	public function delete($id){
		if($id !== null)
		{
			//za operację na bazie danych odpowiedzialny jest model
			//tworzymy obiekt modelu i zlecamy usunięcie kategorii
			$model=$this->getModel('Koordynator');
			if($model)
				$data = $model->delete($id);
				//nie przekazano komunikatów o błędzie
				
				
				//powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
				$this->redirect('Koordynator/');
		}
		else
			$this->redirect('Koordynator/');
	}
	//wyświetla widok formularza umożliwiający dodanie do bazy kategorii
	public function add() {
		$view=$this->getView('Koordynator');
		
		$view->add();
		
		
		
	}
	public function edycja($id)
	{
		$view =$this->getView('Koordynator');
		$view->edycja($id);
	}
	//dodaje do bazy kategorię
	
	public function update() {
		//za operację na bazie danych odpowiedzialny jest model
		//tworzymy obiekt modelu i zlecamy dodanie kategorii
		$model=$this->getModel('Koordynator');
		if($model) {
			$data = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko'],$_POST['miasto']);
			//nie przekazano komunikatów o błędzie
		}
		$this->redirect('Koordynator/');
	}
	public function insert() {
		//za operację na bazie danych odpowiedzialny jest model
		//tworzymy obiekt modelu i zlecamy dodanie kategorii
		$model=$this->getModel('Koordynator');
		if($model) {
			$data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['miasto']);
			//nie przekazano komunikatów o błędzie
		}
		$this->redirect('Koordynator/');
	}
}
?>