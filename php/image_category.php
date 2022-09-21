<?php
include '../core/database/connect.php';
	
	$image = $_POST['image_cat'];
	$lang = $_POST['language'];
	
	if ($lang == "english") {
		$any = "All";
	} else if ($lang == "french") {
		$any = "Tou<br>tes";
	}
	
	echo '<li id="border_category">
			<button id="background_category" class="any" title="'.$any.'" onclick="selectCategory(0)"><div>'.$any.'</div></button>
		</li>';
	
	$requete = "SELECT * FROM category";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		if ($lang == "english") {
			$category_name = $data['name'];
		} else if ($lang == "french") {
			$category_name = $data['name_fr'];
		}
		$category = str_replace(" ", "_", strtolower($data['name']));
		echo '<li id="border_category">
				<button id="background_category" class="'.$category.'" title="'.$category_name.'" onclick="selectCategory('.$data['id'].')">
					<img src="'.$data[''.$image.''].'">
				</button>
			</li>';
	}
?>