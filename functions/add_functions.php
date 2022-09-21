<?php

function add_rarity() {
	include 'core/database/connect.php';
	$requete = "SELECT * FROM rarity";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		$rarity_name = $data['name'];
		$rarity = str_replace(" ", "_", strtolower($data['name']));
		echo '<button type="button" id="select_rarity" class="'.$rarity.'" title="'.$rarity_name.'" onclick="addRarity('.$data['id'].')"><div>'.$rarity_name.'</div></button>';
	}
}



function output_errors($errors) {
	return '<li>'.implode('</li><li>', $errors).'</li>';
}

function output_success($success) {
	return '<li id="add_success">'.$success.'</li>';
}






?>