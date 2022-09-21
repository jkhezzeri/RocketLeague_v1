<?php
	include '../core/database/connect.php';
	include '../core/init.php';

	$blob = '0x'.bin2hex(file_get_contents($_FILES['change_image']['tmp_name']));
	$requete = "UPDATE users SET image = ".$blob." WHERE id = ".$user_data['id']."";
	$query = $pdo->query($requete);
?>
