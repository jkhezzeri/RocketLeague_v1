<?php
	include '../core/database/connect.php';
	
	$name = $_POST['name'];
	$rarity = $_POST['rarity'];
	$category = $_POST['category'];
	
	$name = str_replace("'", "''", $name);
	
	$requete = "SELECT COUNT(id) FROM ".$category." WHERE name = '".$name."' AND rarity = '".$rarity."'";
	$query = $pdo->query($requete);
	$result = $query->fetch();
	
	if ($result[0] > 0) {
		echo '<li>This item (with this rarity) already exists in this category.</li>';
		return false;
	} else {
		return true;
	}
?>