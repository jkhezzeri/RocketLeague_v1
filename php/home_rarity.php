<?php
include '../core/database/connect.php';

	$lang = $_POST['language'];
	
	if ($lang == "english") {
		$any = "All";
	} else if ($lang == "french") {
		$any = "Toutes";
	}
	
	echo '<li id="border_rarity">
			<button id="background_rarity" class="any" title="'.$any.'" onclick="selectRarity(0)"><div>'.$any.'</div></button>
		</li>';
	
	$requete = "SELECT * FROM rarity";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		if ($lang == "english") {
			$rarity_name = $data['name'];
		} else if ($lang == "french") {
			$rarity_name = $data['name_fr'];
		}
		$rarity = str_replace(" ", "_", strtolower($data['name']));
		echo '<li id="border_rarity">
				<button id="background_rarity" class="'.$rarity.'" title="'.$rarity_name.'" onclick="selectRarity('.$data['id'].')"><div>'.$rarity_name.'</div></button>
			</li>';
	}
?>