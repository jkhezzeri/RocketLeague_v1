<?php

function logged_in() {
	return (isset($_SESSION['id'])) ? true : false;
}

function logged_in_redirect() {
	if (logged_in() === true) {
		header('Location: index.php');
		exit();
	}
}

function protect_page() {
	if (logged_in() === false) {
		header('Location: index.php');
		exit();
	}
}

function user_data($id_user) {
	// include 'core/database/connect.php';
	global $pdo;
	$data = array();
	$id_user = (int)$id_user;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = implode(', ', $func_get_args);
		$requete = "SELECT ".$fields." FROM users WHERE id = ".$id_user."";
		$data = $pdo->query($requete);
		$result = $data->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
}

function login($email, $password) {
	// include '../core/database/connect.php';
	global $pdo;
	$user_id = user_id_from_email($email);
	$password = md5($password);
	$requete = "SELECT COUNT(id) FROM users WHERE email = '".$email."' AND password = '".$password."'";
	$query = $pdo->query($requete);
	$result = $query->fetch();
	return ($result[0] == 1) ? $user_id : false;
}

function user_id_from_email($email) {
	// include '../core/database/connect.php';
	global $pdo;
	$requete = "SELECT id FROM users WHERE email = '".$email."'";
	$query = $pdo->query($requete);
	$result = $query->fetch();
	return ($result[0]);
}

?>