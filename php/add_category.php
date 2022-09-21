<?php
include '../core/database/connect.php';
	
	$img = $_POST['img'];
	
	$requete = "SELECT * FROM category";
	$exec = $pdo->query($requete);
	while ($data = $exec->fetch()){
		$category_name = $data['name'];
		$category = str_replace(" ", "_", strtolower($data['name']));
		echo '<button type="button" id="select_category" class="'.$category.'" title="'.$category_name.'" onclick="addCategory('.$data['id'].')">
				<img src="'.$data[''.$img.''].'"/>
				<div id="">'.$category_name.'</div>
			</button>';
	}
	
?>