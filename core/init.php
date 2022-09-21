<?php
session_start();

require 'database/connect.php';

require __DIR__ .'/../functions/add_functions.php';
require __DIR__ .'/../functions/general_functions.php';

if (logged_in() === true) {
	$session_user_id = $_SESSION['id'];
	$user_data = user_data($session_user_id, 'id', 'username', 'email', 'password', 'image');
}

$errors = array();
?>