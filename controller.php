<?php
require __DIR__.'/model.php';
require __DIR__.'/view.php';

class BlogController {
	private $view;
	private $model;
	
	public function __construct(){
		if(isset($_GET['action'])) {
			$action = $_GET['action'];	
			if(isset($_GET['id'])) {
				$id = $_GET['id'];
			} 			
			if(method_exists($this, $action)) {
				$this->$action(@$id);
			}
		}
		else {
			$this->allEntries();
		}
	}	
	
	public function getEntry($id){
		$this->model= new Blogmodel();
		$this->model->getOne($id);
		$view = new Blogview();
		$view->displayEntry($this->model->getOne($id));
	}

	public function allEntries(){
		$this->model = new Blogmodel();
		$this->model->getAll();
		$view = new Blogview();
		$view->display($this->model->getAll());
	}
	
	public function newEntry() {
		$view = new Blogview();
		$view->showForm();
		$this->model = new Blogmodel();
		$this->model->setTitle();
		$this->model->setText();
		$this->model->newEntry();			
	}	
	
	

	public function updateEntry($id) 
	{
		$view = new Blogview();
		$view->showForm();
		$this->model = new Blogmodel();
		$this->model->setTitle();
		$this->model->setText();
		$this->model->update($id);
	}

	public function deleteEntry($id) {
		$this->model = new Blogmodel();
		$this->model->delete($id);
	}





}

