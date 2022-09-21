<!DOCTYPE html>
<html>
<head>
	<title>Modify an Item</title>
	<?php include 'includes/head.php'; ?>
	
</head>
<body>

<?php
protect_page();
include 'includes/header.php';
?>

	<div id="sub_header">
		<div id="center_sub_header">
			<div id="menu_sub_header">
				
				<div id="modify_name">
					
					<label for="search_name">Name</label>
					<input type="search" name="search_name" id="search_name" placeholder="Enter a Item Name">
					
				</div>
				
				<div id="modify_category">
					
					<label for="search_category">Category</label>
					<div name="search_category" id="search_category">
						<div id="result_category"></div>
						<ul id="menu_category">
							<li id="0" class="all" onclick="setCategory(0)">
								All
								<img src="images/block_black.png"/>
							</li>
							<?php
								$requete = "SELECT * FROM category";
								$exec = $pdo->query($requete);
								while ($data = $exec->fetch()){
									$category = str_replace(" ", "_", strtolower($data['name']));
									echo '<li id="'.$data['id'].'" class="'.$category.'" onclick="setCategory('.$data['id'].')">
										<img src="'.$data['image_black'].'"/>
										'.$data['name'].'
									</li>';
								}
							?>
						</ul>
					</div>
					
				</div>
				
				<div id="modify_rarity">
					
					<label for="search_rarity">Rarity</label>
					<div name="search_rarity" id="search_rarity">
						<div id="result_rarity"></div>
						<ul id="menu_rarity">
							<li id="0" class="all" onclick="setRarity(0)">All</li>
							<?php
								$requete = "SELECT * FROM rarity";
								$exec = $pdo->query($requete);
								while ($data = $exec->fetch()){
									$rarity = str_replace(" ", "_", strtolower($data['name']));
									echo '<li id="'.$data['id'].'" class="'.$rarity.'" onclick="setRarity('.$data['id'].')">'.$data['name'].'</li>';
								}
							?>
						</ul>
					</div>
					
				</div>
				
				<div id="modify_paint">
					
					<label for="search_paint">Paint</label>
					<div name="search_paint" id="search_paint">
						<div id="result_paint"></div>
						<ul id="menu_paint">
							<?php
								$requete = "SELECT * FROM paint";
								$exec = $pdo->query($requete);
								while ($data = $exec->fetch()){
									$paint = str_replace(" ", "_", strtolower($data['name']));
									echo '<li id="'.$data['id'].'" class="'.$paint.'" onclick="setPaint('.$data['id'].')">'.$data['name'].'</li>';
								}
							?>
						</ul>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	<div id="center_modify">
		<ul id="list_result">
		<?php
			$requete = "SELECT *, Null as bodies, 'bodies' as category FROM bodies UNION
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
			SELECT *, Null as black, Null as titanium_white, Null as grey, Null as crimson, Null as pink, Null as cobalt, Null as sky_blue, Null as burnt_sienna, Null as saffron, Null as lime, Null as forest_green, Null as orange, Null as purple, Null as bodies, 'crates' as category FROM crates
			ORDER BY name, type";
			$exec = $pdo->query($requete);
			while ($data = $exec->fetch()){
				// $item_name = $data['name'];
				
				if ($data['category'] == 'wheels' || $data['category'] == 'banners' || $data['category'] == 'crates') {
					$item_name = str_replace("(", "<br>(", $data['name']);
				} else if ($data['category'] == 'decals' && $data['bodies'] != 'Universal') {
					$item_name = $data['name'].'<br>('.$data['bodies'].')';
				} else {
					$item_name = $data['name'];
				}
				
				
				$rarity = str_replace(" ", "_", strtolower($data['rarity']));
				
				$modify = 1;
				
				include 'php/items_view.php';
			}
			
			echo '<li id="background_list" class="none">
					<div id="change_paint"></div>
					<div id="item_image">
						<img src="images/none.png" title="No result"/>
					</div>
					<div id="item_name">None</div>
				</li>';
			
		?>
		</ul>
	</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>