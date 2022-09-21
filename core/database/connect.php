<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=rocketleague_v1', 'root', '');
}
catch(exception $e) {
	die('Erreur '.$e->getMessage());
}
$pdo->exec("SET CHARACTER SET utf8");
?>
