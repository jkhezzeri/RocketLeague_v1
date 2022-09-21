<!DOCTYPE html>
<html>
<head>
	<title>Add an Item</title>
	<?php include 'includes/head.php'; ?>
	
</head>
<body>

<?php
protect_page();
include 'includes/header.php';
?>

	<div id="center_add">
		<?php if (isset($_GET['id']) === true && isset($_GET['table']) === true) { ?>
		
		<form action="" method="post" id="modify_form">
		
		<?php } else { ?>
		
		<form action="" method="post" id="add_form">
		
		<?php } ?>
			<div id="add_left">
				<div id="add_general">
					
					<div id="title_add_item">Item</div>
					
					<div id="item_general">
						<label for="new_name">Item Name</label>
						<input type="text" name="new_name" id="new_name" placeholder="Name of the new Item">
					</div>
					
					<div id="add_default">
						<label for="url_default">Image URL</label>
						<textarea name="url_default" id="url_default" style="overflow:hidden" placeholder="URL of the Default Image of the Item"></textarea>
					</div>
					<div id="add_info">
						<label for="more_info">Information</label>
						<div name="more_info" id="more_info">
							<!--<div id="result_info"></div>-->
							<input type="text" id="result_info" placeholder="Select an Information">
							<ul id="menu_info">
								<li id="0" onclick="setInfo(0)"></li>
								<?php
									$requete = "SELECT * FROM infos ORDER BY name";
									$exec = $pdo->query($requete);
									while ($data = $exec->fetch()){
										echo '<li id="'.$data['id'].'" onclick="setInfo('.$data['id'].')">'.$data['name'].'</li>';
									}
								?>
							</ul>
						</div>	
					</div>
					
				</div>
				
				<div id="add_rarity">
					
					<div id="title_add_rarity">Rarity</div>
					
					<?php
						// $requete = "SELECT * FROM rarity";
						// $exec = $pdo->query($requete);
						// while ($data = $exec->fetch()){
							// $rarity_name = $data['name'];
							// $rarity = str_replace(" ", "_", strtolower($data['name']));
							// echo '<button type="button" id="select_rarity" class="'.$rarity.'" title="'.$rarity_name.'" onclick="addRarity('.$data['id'].')"><div>'.$rarity_name.'</div></button>';
						// }
						
						add_rarity();
					?>
					
				</div>
			</div>	
			<div id="add_category">
				
				<div id="title_add_category">Category</div>
				
				<div id="add_animated">
					<label for="animated_check">Animated</label>
					<label for="animated_check" id="animated_switch">
						<input type="checkbox" name="animated_check" id="animated_check" onclick="checkAnimated()">
						<span id="animated_slider"></span>
					</label>
				</div>
				
				<div id="add_body">
					<label for="body">Body</label>
					<div name="body" id="body">
						<!--<div id="result_body"></div>-->
						<input type="text" id="result_body" placeholder="Select a Body">
						<ul id="menu_body">
							<li id="0" onclick="setBody(0)">Universal</li>
							<?php
								$requete = "SELECT * FROM bodies ORDER BY name";
								$exec = $pdo->query($requete);
								while ($data = $exec->fetch()){
									echo '<li id="'.$data['id'].'" onclick="setBody('.$data['id'].')">'.$data['name'].'</li>';
								}
							?>
						</ul>
					</div>	
				</div>
				
			</div>
			
			<div id="add_paint">
				
				<div id="title_add_paint">Paint</div>
				
				<div id="add_check">
					<label for="paint_check">Painted</label>
					<label for="paint_check" id="add_switch">
						<input type="checkbox" name="paint_check" id="paint_check" onclick="checkPaint()">
						<span id="add_slider"></span>
					</label>
				</div>
				
				<?php
					$requete = "SELECT * FROM paint";
					$exec = $pdo->query($requete);
					while ($data = $exec->fetch()){
						$paint_name = $data['name'];
						$paint = str_replace(" ", "_", strtolower($data['name']));
						echo '<button type="button" id="select_paint" class="'.$paint.'" title="'.$paint_name.'" onclick="addPaint('.$data['id'].')"><div>'.$paint_name.'</div></button>';
					}
				?>
			</div>
			
			<div id="add_right">
			
				<div id="background_list" class="">
					<div id="change_paint">
						<!--<div id="test_choose" class="default selected" title="Default" onclick="changePaintTest()">Default</div>-->
					</div>
					<div id="item_image">
						<img src="" title=""/>
					</div>
					<div id="item_name"></div>
					<div id="item_rarity"></div>
					<div id="item_info"></div>
				</div>
				
				<ul id="add_errors">
					
					<?php
					
					if (empty($_POST) === false && isset($_GET['id']) === true && isset($_GET['table']) === true) {
						$success = 'This item has been modified successfully.';
						echo output_success($success);
					} else if (empty($_POST) === false) {
						$success = 'A new item has been added successfully.';
						echo output_success($success);
					}
					
					?>
					
				</ul>
			
				<div id="add_test">
					<button type="button" id="button_test" onclick="testItem()"><div>Test</div></button>
				</div>
				<div id="submit_add">
					<?php if (isset($_GET['id']) === true && isset($_GET['table']) === true) { ?>
					
					<button type="submit" id="button_add"><div>Modify</div></button>
					
					<?php } else { ?>
					
					<button type="submit" id="button_add"><div>Add</div></button>
					
					<?php } ?>
				</div>
				
			</div>
			
		</form>
		
		
		<div id="test_popup"></div>
		
	</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>