<?php
	include '../core/database/connect.php';
	
	$table = $_POST['table'];
	$id = $_POST['id'];
	
	if ($table == 'decals') {
		$decals = "SELECT bodies FROM ".$table." GROUP BY bodies ORDER BY CASE WHEN bodies = 'Universal' THEN 1 ELSE 2 END, decals.bodies";
		$bodies = $pdo->query($decals);
		while ($sticker = $bodies->fetch()){
			$stick = str_replace("'", "''", $sticker['bodies']);
			if ($id == 1) {
				$requete = "SELECT ".$table.".* FROM ".$table.", rarity WHERE ".$table.".rarity = rarity.name AND bodies = '".$stick."' ORDER BY rarity.id, ".$table.".name";
			} else if ($id == 2) {
				$requete = "SELECT * FROM ".$table." WHERE bodies = '".$stick."' ORDER BY name";
			} else if ($id == 3) {
				$requete = "SELECT ".$table.".* FROM ".$table.", rarity WHERE ".$table.".rarity = rarity.name AND bodies = '".$stick."' ORDER BY rarity.id DESC, ".$table.".name";
			} else if ($id == 4) {
				$requete = "SELECT * FROM ".$table." WHERE bodies = '".$stick."' ORDER BY name DESC";
			}
			echo '<div id="decal_bodies">'.$sticker['bodies'].'</div>';
			$exec = $pdo->query($requete);
			while ($data = $exec->fetch()){
				if ($data['bodies'] == 'Universal') {
					$item_name = $data['name'];
				} else {
					$item_name = $data['name'].'<br>('.$data['bodies'].')';
				}
				$rarity = str_replace(" ", "_", strtolower($data['rarity']));
				include 'items_view.php';
			}
		}
	} else {
		if ($id == 1) {
			$requete = "SELECT ".$table.".* FROM ".$table.", rarity WHERE ".$table.".rarity = rarity.name ORDER BY rarity.id, ".$table.".name";
		} else if ($id == 2) {
			$requete = "SELECT * FROM ".$table." ORDER BY name";
		} else if ($id == 3) {
			$requete = "SELECT ".$table.".* FROM ".$table.", rarity WHERE ".$table.".rarity = rarity.name ORDER BY rarity.id DESC, ".$table.".name";
		} else if ($id == 4) {
			$requete = "SELECT * FROM ".$table." ORDER BY name DESC";
		}
		$exec = $pdo->query($requete);
		while ($data = $exec->fetch()){
			if ($table == 'wheels' || $table == 'banners' || $table == 'crates') {
				$item_name = str_replace("(", "<br>(", $data['name']);
			} else {
				$item_name = $data['name'];
			}
			$rarity = str_replace(" ", "_", strtolower($data['rarity']));
			include 'items_view.php';
		}
	}
?>