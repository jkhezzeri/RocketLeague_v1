<?php
	include '../core/database/connect.php';
	
	$id = $_POST['id'];
	$table = $_POST['table'];
	
	// $fields = '`'.implode('`, `', array_keys($data_array)).'`';
	// $data = '\''.implode('\', \'', $data_array).'\'';
	
	$requete = "SELECT * FROM ".$table." WHERE id = ".$id."";
	$exec = $pdo->query($requete);
	// echo '<div>'.implode("<br>", $data_array).'</div>';
	// echo '<div>'.$data.'</div>';
	// echo '<div>'.$table.'</div>';
	// echo '<div>'.$fields.'</div>';
	// echo '<div>'.$exec.'</div>';
	
	while ($data = $exec->fetch(PDO::FETCH_ASSOC)){
		echo json_encode($data);
	}
?>