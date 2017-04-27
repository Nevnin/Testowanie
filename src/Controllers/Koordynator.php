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
	public function indexJSON()
	{
		$view = $this->getView('Koordynator');
		$model = $this->getModel('Koordynator');
		$view->renderJSON($model->getAll());
	}
	
	//usuwa wybraną kategorię
	public function delete($id){
		$view = $this->getView('Koordynator');
		$model = $this->getModel('Koordynator');
		$view->renderJSON($model->delete($id));	
	}
	//wyświetla widok formularza umożliwiający dodanie do bazy kategorii
	public function add() {
		$view=$this->getView('Koordynator');
		
		$view->add();
		
		
		
	}
	public function update()
	{
		$view = $this->getView('Koordynator');
		$model = $this->getModel('Koordynator');
		$view->renderJSON($model->update($_GET['id'], $_GET['imie'],$_GET['nazwisko'],$_GET['miasto']));
	}
	//dodaje do bazy kategorię
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