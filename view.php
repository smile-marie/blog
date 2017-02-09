<?php
class Blogview {
	
	public function display($entries) {
		require __DIR__.'/template-all.php';
	}
	
	public function displayEntry($entry){
		require __DIR__.'/template-one.php';
	}	
			
	public function showForm() {
		require __DIR__.'/form.php';
	}

	
	
	public function displayHome() {
		echo 'Startseite';
	}
}



