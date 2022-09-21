<?php
include '../core/database/connect.php';

	$lang = $_POST['language'];
	
	$requete = "SELECT * FROM paint";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		if ($lang == "english") {
			$paint_name = $data['name'];
		} else if ($lang == "french") {
			$paint_name = $data['name_fr'];
		}
		$paint = str_replace(" ", "_", strtolower($data['name']));
		echo '<li id="border_paint">
				<button id="background_paint" class="'.$paint.'" title="'.$paint_name.'" onclick="selectPaint('.$data['id'].')"><div>'.$paint_name.'</div></button>
			</li>';
	}
?>