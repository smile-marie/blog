<?php
require __DIR__.'/head.html';
require __DIR__.'/controller.php';

if(isset($_GET['controller'])) {
	if($_GET['controller'] === 'blog') {
		if(class_exists('BlogController')) {
			$controller = new BlogController();
		}
	}
} else {
	require __DIR__.'/home.php';
}

require __DIR__.'/footer.html'; 
