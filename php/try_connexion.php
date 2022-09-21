<?php
	include '../core/init.php';
	
	$email = $_POST['email'];
	$password = $_POST['wordpass'];
	
	$login = login($email, $password);
	if ($login === false) {
		echo '<li>Your email or your password is incorrect.</li>';
	}
?>