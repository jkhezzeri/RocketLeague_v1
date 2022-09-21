<?php

	echo '<li id="background_list" class="'.$rarity.'">';

			if (isset ($data['category'])) {
				$table = $data['category'];
			}

			echo '<div id="change_paint">';

			if (isset ($data['black']) || isset ($data['titanium_white']) || isset ($data['grey']) || isset ($data['crimson']) || isset ($data['pink']) || isset ($data['cobalt']) || isset ($data['sky_blue']) || isset ($data['burnt_sienna']) || isset ($data['saffron']) || isset ($data['lime']) || isset ($data['forest_green']) || isset ($data['orange']) || isset ($data['purple'])) {

				echo '<div id="menu_tag">
					<div id="result_tag_paint"></div>
					<div id="menu_tag_paint">';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="default" title="Default" onclick="changePaintView(1, '.$data['id'].', \''.$table.'\')">Default</div>
					</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="black';
					if (!isset ($data['black'])) { echo ' none'; }
					echo'" title="Black" onclick="changePaintView(2, '.$data['id'].', \''.$table.'\')">Black</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="titanium_white';
					if (!isset ($data['titanium_white'])) { echo ' none'; }
					echo'" title="Titanium White" onclick="changePaintView(3, '.$data['id'].', \''.$table.'\')">Titanium White</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="grey';
					if (!isset ($data['grey'])) { echo ' none'; }
					echo'" title="Grey" onclick="changePaintView(4, '.$data['id'].', \''.$table.'\')">Grey</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="crimson';
					if (!isset ($data['crimson'])) { echo ' none'; }
					echo'" title="Crimson" onclick="changePaintView(5, '.$data['id'].', \''.$table.'\')">Crimson</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="pink';
					if (!isset ($data['pink'])) { echo ' none'; }
					echo'" title="Pink" onclick="changePaintView(6, '.$data['id'].', \''.$table.'\')">Pink</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="cobalt';
					if (!isset ($data['cobalt'])) { echo ' none'; }
					echo'" title="Cobalt" onclick="changePaintView(7, '.$data['id'].', \''.$table.'\')">Cobalt</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="sky_blue';
					if (!isset ($data['sky_blue'])) { echo ' none'; }
					echo'" title="Sky Blue" onclick="changePaintView(8, '.$data['id'].', \''.$table.'\')">Sky Blue</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="burnt_sienna';
					if (!isset ($data['burnt_sienna'])) { echo ' none'; }
					echo'" title="Burnt Sienna" onclick="changePaintView(9, '.$data['id'].', \''.$table.'\')">Burnt Sienna</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="saffron';
					if (!isset ($data['saffron'])) { echo ' none'; }
					echo'" title="Saffron" onclick="changePaintView(10, '.$data['id'].', \''.$table.'\')">Saffron</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="lime';
					if (!isset ($data['lime'])) { echo ' none'; }
					echo'" title="Lime" onclick="changePaintView(11, '.$data['id'].', \''.$table.'\')">Lime</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="forest_green';
					if (!isset ($data['forest_green'])) { echo ' none'; }
					echo'" title="Forest Green" onclick="changePaintView(12, '.$data['id'].', \''.$table.'\')">Forest Green</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="orange';
					if (!isset ($data['orange'])) { echo ' none'; }
					echo'" title="Orange" onclick="changePaintView(13, '.$data['id'].', \''.$table.'\')">Orange</div>
				</div>';

				echo '<div id="tag_paint">
						<div id="choose_paint" class="purple';
					if (!isset ($data['purple'])) { echo ' none'; }
					echo'" title="Purple" onclick="changePaintView(14, '.$data['id'].', \''.$table.'\')">Purple</div>
				</div>';

			echo '</div>
				</div>';
			}
		echo '</div>';

			if (isset ($modify)) {
				echo '<div id="item_image" onclick="modifyItem('.$data['id'].', \''.$table.'\')">
					<img src="'.$data['default'].'" title="'.$data['name'].'"/>
				</div>';
			} else {
				echo '<div id="item_image" onclick="popupItem('.$data['id'].', \''.$rarity.'\', \''.$table.'\')">
					<img src="'.$data['default'].'" title="'.$data['name'].'"/>
				</div>';
			}

			// echo '<div id="item_image" onclick="popupItem('.$data['id'].', \''.$rarity.'\', \''.$table.'\')">
				// <img src="'.$data['default'].'" title="'.$data['name'].'"/>
			// </div>';
			echo '<div id="item_name">'.$item_name.'</div>';
			if ($item_name == 'Key' || $item_name == 'Decryptor') {
				echo '<div id="item_rarity" class="'.$table.'">'.$data['type'].'</div>';
			} else {
				echo '<div id="item_rarity" class="'.$table.'">'.$data['rarity'].' '.$data['type'].'</div>';
			}
			if (isset ($data['info'])) {
				echo '<div id="item_info">'.$data['info'].'</div>';
			}
	echo '</li>';
?>
