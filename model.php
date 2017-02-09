<?php
ini_set('error_reporting', E_ALL);

class BlogModel {
	protected $pdo;
	protected $entries = array();
	protected $entry = array();
	public $title = "";
	public $text = "";
	
	public function __construct(){
		$this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
	}
	public function getAll() {
	    $statement = $this->pdo->prepare("SELECT id, titel, inhalt FROM blog"); 
        $statement->execute(); 
        $this->entries = $statement->fetchAll();
        return $this->entries;
	}
	
	
	public function getOne($id){
		$statement = $this->pdo->prepare("SELECT id, titel, inhalt FROM blog WHERE id = ?");
		$statement->execute(array($id));
		$this->entry = $statement->fetch();		
		return $this->entry;
	}

	public function setTitle() {
		$this->title = @$_POST['titel'];
	}	
	public function getTitle() {
		return $this->title;
	}

	
	public function setText(){
		$this->text = @$_POST['text'];
		return $this->text;
	}
	
	public function newEntry(){	
		$statement = $this->pdo->prepare("INSERT INTO blog (titel, inhalt) VALUES (:titel, :inhalt)");
		$statement->execute(array('titel' => $this->title, 'inhalt' => $this->text));
	}

	public function delete($id)
	{
		$statement = $this->pdo->prepare("DELETE FROM blog WHERE id = ?");
		$statement->execute(array($id)); 
		echo '<a href="?controller=blog">zurück</a>';
	}

	public function update($id) {
		$statement = $this->pdo->prepare("UPDATE blog SET titel = :title_new, inhalt = :content_new WHERE id= :id");
		$statement->execute(array('id' => $id, 'title_new' => $this->title, 'content_new' => $this->text));
	}



	
}


$blog = new BlogModel();


