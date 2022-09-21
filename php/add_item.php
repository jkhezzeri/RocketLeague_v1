<?php
	include '../core/database/connect.php';
	
	$table = $_POST['table'];
	$data_array = $_POST['data_array'];
	$data_array['name'] = str_replace("'", "''", $data_array['name']);
	if (isset($data_array['bodies'])) {
		$data_array['bodies'] = str_replace("'", "''", $data_array['bodies']);
	}
	
	foreach($data_array as $key => $value) {
		if ($value == null) {
			unset($data_array[$key]);
		}
	}
	
	$fields = '`'.implode('`, `', array_keys($data_array)).'`';
	$data = '\''.implode('\', \'', $data_array).'\'';
	
	$requete = "INSERT INTO ".$table." (".$fields.") VALUES (".$data.")";
	$query = $pdo->query($requete);
	
	echo '<div>'.implode("<br>", $data_array).'</div>';
	echo '<div>'.$data.'</div>';
	echo '<div>'.$table.'</div>';
	echo '<div>'.$fields.'</div>';
?>