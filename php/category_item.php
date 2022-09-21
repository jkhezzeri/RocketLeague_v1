<?php
include '../core/database/connect.php';
	
	$cat = $_POST['category'];
	
	$requete = "SELECT * FROM category WHERE name = '$cat'";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		echo '<img src="'.$data['image_white'].'" title="'.$data['name'].'""/>';
	}
?>