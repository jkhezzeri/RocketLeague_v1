<?php
include '../core/database/connect.php';

	// $center = $_POST['center'];

	// $requete = "SELECT * FROM category";
	// $exec = $pdo->query($requete);
	// while ($data = $exec->fetch()){
		// $name = str_replace(" ", "_", strtolower($data['name']));
		// echo '<a href="'.$name.'.php" id="'.$data['id'].'" title="'.$data['name'].'">
				// <img src="'.$data[''.$center.''].'"/>'.$data['name'].'
			// </a>';
	// }

	echo '<div id="header_items">
			<img src="images/items_black.png"/>
			<div id="header_items_title">Items</div>
			<ul id="header_items_menu">';

	$center = $_POST['center'];

	$requete = "SELECT * FROM category";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		$name = str_replace(" ", "_", strtolower($data['name']));
		$jump_name = str_replace(" ", "<br>", $data['name']);
		echo '<li>
				<a href="'.$name.'.php" id="'.$data['id'].'" title="'.$data['name'].'">
					<img src="'.$data[''.$center.''].'"/>
					<div>'.$data['name'].'</div>
				</a>
			</li>';
	}

	echo '</ul>';

?>
