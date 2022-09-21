<?php
	include '../core/database/connect.php';
	
	$email = $_POST['email'];
	
	$requete = "SELECT COUNT(id) FROM users WHERE email = '".$email."'";
	$query = $pdo->query($requete);
	$result = $query->fetch();
	
	if ($result[0] > 0) {
		echo '<li>The email \''.$_POST['email'].'\' already exists. Please change your email.</li>';
	}
?>