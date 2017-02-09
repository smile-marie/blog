<div class="row">
	<div class="four col">
		<a href="?controller=blog" class="button success medium">zurück</a>
		<a href="?controller=blog&action=deleteEntry&id=<?php echo $_GET['id'];?>" class="button danger medium">Löschen</a>			
		<a href="?controller=blog&action=updateEntry&id=<?php echo $_GET['id'];?>" class="button default medium">Ändern</a>		
	</div>
	<div class="eight col">
		<?php
		$result = array_unique($entry);
		echo '<div class="entry"><h1>'.$result['titel'].'</h1>';
		echo '<p>'.$result['inhalt'].'</p></div>';
		?>
	</div>
</div>