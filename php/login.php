<?php
include '../core/init.php';

if (empty($_POST) === false) {
	$email = $_POST['email'];
	$password = $_POST['password'];
		
	$login = login($email, $password);
	if ($login !== false) {
		$_SESSION['id'] = $login;
		header('Location: ../index.php');
		exit();
	}
}

echo 'Email : '.$email.'';
echo '<br>Password : '.$password.'';

?>