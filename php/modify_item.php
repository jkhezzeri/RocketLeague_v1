<?php
	include '../core/database/connect.php';
	
	$id = $_POST['id'];
	$table = $_POST['table'];
	$data_array = $_POST['data_array'];
	$data_array['name'] = str_replace("'", "''", $data_array['name']);
	if (isset($data_array['bodies'])) {
		$data_array['bodies'] = str_replace("'", "''", $data_array['bodies']);
	}
	
	foreach($data_array as $field=>$data) {
		if ($data == null) {
			$update[] = '`'.$field.'` = NULL';
		} else {
			$update[] = '`'.$field.'` = \''.$data.'\'';
		}
	}
	$requete = "UPDATE ".$table." SET ".implode(', ', $update)." WHERE id = ".$id."";
	$query = $pdo->query($requete);
	
	echo '<div>'.implode("<br>", $data_array).'</div>';
	echo '<div>'.$id.'</div>';
	echo '<div>'.$table.'</div>';
	echo '<div>'.implode(', ', $update).'</div>';
?>