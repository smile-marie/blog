
<div class="row">
	<div class="four col">
		<a href="?controller=blog&action=newEntry" class="button success medium">Neuer Blogeintrag</a>
	</div>
	<div class="eight col">
		<?php
		foreach($entries as $row) {
			$result = array_unique($row);
			echo '<div class="entry"><h1><a href="?controller=blog&action=getEntry&id='.$result['id'].'">'.$result['titel'].'</a></h1>';
			echo '<p>'.$result['inhalt'].'</p></div>';
			echo '<hr>';
		} ?>
	</div>
</div>


