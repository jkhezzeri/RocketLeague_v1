<?php
include '../core/database/connect.php';
	
	$item = $_POST['item'];
	$cat = $_POST['category'];
	
	$aps_item = str_replace("'", "''", $item);
	
	$requete = "SELECT * FROM ".$cat." WHERE name = '$aps_item'";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		if (isset ($data['black']) || isset ($data['titanium_white']) || isset ($data['grey']) || isset ($data['crimson']) || isset ($data['pink']) || isset ($data['cobalt']) || isset ($data['sky_blue']) || isset ($data['burnt_sienna']) || isset ($data['saffron']) || isset ($data['lime']) || isset ($data['forest_green']) || isset ($data['orange']) || isset ($data['purple'])) {
			
			echo '<div id="color_item" class="default" title="None"></div>';
			
			if (isset ($data['black'])) {
				echo '<div id="color_item" class="black" title="Black"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['titanium_white'])) {
				echo '<div id="color_item" class="titanium_white" title="Titanium White"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['grey'])) {
				echo '<div id="color_item" class="grey" title="Grey"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['crimson'])) {
				echo '<div id="color_item" class="crimson" title="Crimson"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['pink'])) {
				echo '<div id="color_item" class="pink" title="Pink"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['cobalt'])) {
				echo '<div id="color_item" class="cobalt" title="Cobalt"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['sky_blue'])) {
				echo '<div id="color_item" class="sky_blue" title="Sky Blue"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['burnt_sienna'])) {
				echo '<div id="color_item" class="burnt_sienna" title="Burnt Sienna"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['saffron'])) {
				echo '<div id="color_item" class="saffron" title="Saffron"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['lime'])) {
				echo '<div id="color_item" class="lime" title="Lime"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['forest_green'])) {
				echo '<div id="color_item" class="forest_green" title="Forest Green"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['orange'])) {
				echo '<div id="color_item" class="orange" title="Orange"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			if (isset ($data['purple'])) {
				echo '<div id="color_item" class="purple" title="Purple"></div>';
			} else {
				echo '<div id="color_item" class="none"></div>';
			}
			
		}
	}
?>