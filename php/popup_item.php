<?php
	include '../core/database/connect.php';
	
	$table = $_POST['table'];
	$item = $_POST['item'];
	
	$requete = "SELECT * FROM ".$table." WHERE id = ".$item."";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		echo '<div id="popup_size">
				<div id="popup_item">
					<div id="popup_image">
						<img src="'.$data['default'].'" title="'.$data['name'].'"/>
					</div>
				</div><div id="popup_info">';
					
					if ($table == 'decals') {
						if ($data['bodies'] == 'Universal') {
							$data['name'] = str_replace("- ", "-<br>", $data['name']);
							echo '<div id="popup_name">'.$data['name'].'</div>';
						} else {
							echo '<div id="popup_name">'.$data['bodies'].' :<br>'.$data['name'].'</div>';
						}
					} else {
						$name_before = array("- ", ": ", " (");
						$name_after = array("-<br>", ":<br>", "<br>(");
						$name = str_replace($name_before, $name_after, $data['name']);
						echo '<div id="popup_name">'.$name.'</div>';
					}
					
					echo '<div id="popup_rarity">'.$data['rarity'].'</div>
					<div id="popup_category">'.$data['type'].'</div>';
				
				if (isset ($data['info'])) {
					$info = str_replace("- ", "<br>", $data['info']);
					echo '<div id="popup_more">'.$info.'</div>';
				}
				
				echo '<div id="popup_change">';
				
				if (isset ($data['black']) || isset ($data['titanium_white']) || isset ($data['grey']) || isset ($data['crimson']) || isset ($data['pink']) || isset ($data['cobalt']) || isset ($data['sky_blue']) || isset ($data['burnt_sienna']) || isset ($data['saffron']) || isset ($data['lime']) || isset ($data['forest_green']) || isset ($data['orange']) || isset ($data['purple'])) {
				
					echo '<div id="popup_paint" class="default selected" title="Default" onclick="changePaintViewPopup(1, '.$data['id'].', \''.$table.'\')">Default</div>';
			
					if (isset ($data['black'])) {
						echo '<div id="popup_paint" class="black" title="Black" onclick="changePaintViewPopup(2, '.$data['id'].', \''.$table.'\')">Black</div>';
					}
					if (isset ($data['titanium_white'])) {
						echo '<div id="popup_paint" class="titanium_white" title="Titanium White" onclick="changePaintViewPopup(3, '.$data['id'].', \''.$table.'\')">Titanium White</div>';
					}
					if (isset ($data['grey'])) {
						echo '<div id="popup_paint" class="grey" title="Grey" onclick="changePaintViewPopup(4, '.$data['id'].', \''.$table.'\')">Grey</div>';
					}
					if (isset ($data['crimson'])) {
						echo '<div id="popup_paint" class="crimson" title="Crimson" onclick="changePaintViewPopup(5, '.$data['id'].', \''.$table.'\')">Crimson</div>';
					}
					if (isset ($data['pink'])) {
						echo '<div id="popup_paint" class="pink" title="Pink" onclick="changePaintViewPopup(6, '.$data['id'].', \''.$table.'\')">Pink</div>';
					}
					if (isset ($data['cobalt'])) {
						echo '<div id="popup_paint" class="cobalt" title="Cobalt" onclick="changePaintViewPopup(7, '.$data['id'].', \''.$table.'\')">Cobalt</div>';
					}
					if (isset ($data['sky_blue'])) {
						echo '<div id="popup_paint" class="sky_blue" title="Sky Blue" onclick="changePaintViewPopup(8, '.$data['id'].', \''.$table.'\')">Sky Blue</div>';
					}
					if (isset ($data['burnt_sienna'])) {
						echo '<div id="popup_paint" class="burnt_sienna" title="Burnt Sienna" onclick="changePaintViewPopup(9, '.$data['id'].', \''.$table.'\')">Burnt Sienna</div>';
					}
					if (isset ($data['saffron'])) {
						echo '<div id="popup_paint" class="saffron" title="Saffron" onclick="changePaintViewPopup(10, '.$data['id'].', \''.$table.'\')">Saffron</div>';
					}
					if (isset ($data['lime'])) {
						echo '<div id="popup_paint" class="lime" title="Lime" onclick="changePaintViewPopup(11, '.$data['id'].', \''.$table.'\')">Lime</div>';
					}
					if (isset ($data['forest_green'])) {
						echo '<div id="popup_paint" class="forest_green" title="Forest Green" onclick="changePaintViewPopup(12, '.$data['id'].', \''.$table.'\')">Forest Green</div>';
					}
					if (isset ($data['orange'])) {
						echo '<div id="popup_paint" class="orange" title="Orange" onclick="changePaintViewPopup(13, '.$data['id'].', \''.$table.'\')">Orange</div>';
					}
					if (isset ($data['purple'])) {
						echo '<div id="popup_paint" class="purple" title="Purple" onclick="changePaintViewPopup(14, '.$data['id'].', \''.$table.'\')">Purple</div>';
					}
				}
				
				echo '</div>';
				
			echo '</div>
		</div>';
		
	}
?>