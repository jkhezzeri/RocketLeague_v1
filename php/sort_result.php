<?php
	include '../core/database/connect.php';
	
	$id = $_POST['id'];
	
	$requete1 = "SELECT *, Null as bodies, 'bodies' as category FROM bodies UNION
			SELECT *, Null as bodies, 'wheels' as category FROM wheels UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'boosts' as category FROM boosts UNION
			SELECT *, Null as bodies, 'antennas' as category FROM antennas UNION
			SELECT id, name, rarity, type, info, `default`, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, bodies, 'decals' as category FROM decals UNION
			SELECT *, Null as bodies, 'toppers' as category FROM toppers UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'trails' as category FROM trails UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'goal_explosions' as category FROM goal_explosions UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'paints' as category FROM paints UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'banners' as category FROM banners UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'engine_audio' as category FROM engine_audio UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'avatar_borders' as category FROM avatar_borders UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'titles' as category FROM titles UNION
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'crates' as category FROM crates";
	
	$requete2 = "SELECT tables.* FROM (".$requete1.") AS tables, rarity WHERE tables.rarity = rarity.name";
	
	if ($id == 1) {
		$requete = $requete1." ORDER BY name, type";
	} else if ($id == 2) {
		$requete = $requete2." ORDER BY rarity.id, tables.name, type";
	} else if ($id == 3) {
		$requete = $requete1." ORDER BY name DESC, type";
	} else if ($id == 4) {
		$requete = $requete2." ORDER BY rarity.id DESC, tables.name, type";
	}
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		if ($data['category'] == 'wheels' || $data['category'] == 'banners' || $data['category'] == 'crates') {
			$item_name = str_replace("(", "<br>(", $data['name']);
		} else if ($data['category'] == 'decals' && $data['bodies'] != 'Universal') {
			$item_name = $data['name'].'<br>('.$data['bodies'].')';
		} else {
			$item_name = $data['name'];
		}
		$rarity = str_replace(" ", "_", strtolower($data['rarity']));
		include 'items_view.php';
	}
	
	echo '<li id="background_list" class="none">
			<div id="change_paint"></div>
			<div id="item_image">
				<img src="images/none.png" title="No result"/>
			</div>
			<div id="item_name">None</div>
		</li>';
?>
