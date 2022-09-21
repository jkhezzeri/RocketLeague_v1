<?php
	include '../core/database/connect.php';
	
	$item = $_POST['item'];
	$table = $_POST['table'];
	$paint = $_POST['paint'];
	
	if ($paint == 'none'){
		$paint = 'default';
	}
	
	$aps_item = str_replace("'", "''", $item);

	$requete = "SELECT * FROM ".$table." WHERE ".$table.".name = '".$aps_item."'";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		if ($data[$paint] != null) {
			echo '<img src="'.$data[$paint].'"/>';
		} else {
			echo '<img src="https://rocket-league.com/content/media/items/avatar/220px/bd07f7dd801478026052.png"/>';
		}
	}
?>