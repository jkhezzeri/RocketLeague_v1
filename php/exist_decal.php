<?php
	include '../core/database/connect.php';
	
	$name = $_POST['name'];
	$body = $_POST['body'];
	
	$name = str_replace("'", "''", $name);
	$body = str_replace("'", "''", $body);
	
	$requete = "SELECT COUNT(id) FROM decals WHERE name = '".$name."' AND bodies = '".$body."'";
	$query = $pdo->query($requete);
	$result = $query->fetch();
	
	if ($result[0] == 1) {
		echo '<li>This decal (with this body) already exists.</li>';
		return false;
	} else {
		return true;
	}
?>