<?php
	include '../core/database/connect.php';
	
	$paint = $_POST['paint'];
	$table = $_POST['table'];
	$item = $_POST['item'];
	
	$requete = "SELECT * FROM ".$table." WHERE id = ".$item."";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		echo '<img src="'.$data[$paint].'" title="'.$data['name'].'"/>';
	}
?>