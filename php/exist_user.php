<?php
	include '../core/database/connect.php';
	
	$username = $_POST['username'];
	$username = str_replace("'", "''", $username);
	$requete = "SELECT COUNT(id) FROM users WHERE username = '".$username."'";
	$query = $pdo->query($requete);
	$result = $query->fetch();
	
	if ($result[0] > 0) {
		echo '<li>The username \''.$_POST['username'].'\' already exists. Please change your username.</li>';
	}
?>