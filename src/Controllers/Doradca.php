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
		
	}public function indexJ()
	{
	
		$view = $this->getView('Doradca');
		$model = $this->getModel('Doradca');
		$view->renderJSON($model->getAll());
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
	//dodaje do bazy kategorię
	public function insert() {
		//za operację na bazie danych odpowiedzialny jest model
		//tworzymy obiekt modelu i zlecamy dodanie kategorii
		$model=$this->getModel('Doradca');
		if($model) {
			$data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['miasto']);
			//nie przekazano komunikatów o błędzie
		}
		$this->redirect('Doradca/');
	}
}
?>