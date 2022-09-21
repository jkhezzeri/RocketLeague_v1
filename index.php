<!DOCTYPE html>
<html>
<head>
	<title>Rocket League</title>
	<?php include 'includes/head.php'; ?>

</head>
<body>

<?php include 'includes/header.php'; ?>

<!--<div id="center">

	<div id="item">

		<div id="title_item">Select Item</div>

		<div id="result_item">
			<div id="category_item">
				<img src="images/blank.png"/>
			</div>
			<div id="name_item">Choose Item
			</div>
			<div id="paint_item"></div>
		</div>

		<div id="result">

			<div id="search">
				<button id="button_search" onclick="getSearch()"><div>Search</div></button>
			</div>

			<div id="reset_all">
				<button id="button_reset_all"><div>Reset All</div></button>
			</div>

			<div id="border_image">
				<div id="image">
					<img src="https://rocket-league.com/content/media/items/avatar/220px/bd07f7dd801478026052.png"/>
				</div>
			</div>

			<div id="test">Test</div>
			<div id="test_item">Test2</div>
			<div id="test_table">Test3</div>
			<div id="test_category">Test4</div>
			<div id="test_rarity">Test5</div>
			<div id="test_paint">Test6</div>

		</div>

		<div id="menu">

			<input id="search_item" type="text" placeholder="Search Item">

			<ul id="menu_item">

				<?php
				$requete = "SELECT name FROM category ORDER BY id";
				$exec = $pdo->query($requete);
				while ($data = $exec->fetch()){
					echo '<li disabled><div>'.$data['name'].'</div>
						<ul>';
					$category = str_replace(" ", "_", strtolower($data['name']));
					$requete2 = "SELECT * FROM ".$category." ORDER BY name";
					$exec2 = $pdo->query($requete2);
					while ($data2 = $exec2->fetch()){
						if ($category == 'decals') {
							echo '<li id="'.$data2['id'].'" class="'.$data2['rarity'].'">'.$data2['name'].' ('.$data2['bodies'].')</li>';
						} else {
							echo '<li id="'.$data2['id'].'" class="'.$data2['rarity'].'">'.$data2['name'].'</li>';
						}
					}
					echo '</ul>
					</li>';
				}
				?>

				<div id="no_results" hidden>No Results</div>

			</ul>

		</div>

	</div>

	<div id="option">

		<div id="category">

			<div id="title_category">Select Category</div>

			<ul id="center_category"></ul>

		</div>

		<div id="rarity">

			<div id="title_rarity">Select Rarity</div>

			<ul id="center_rarity"></ul>

		</div>

	</div>

	<div id="paint">

		<div id="title_paint">Select Paint</div>

		<ul id="center_paint"></ul>

	</div>


</div>-->



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
		<div id="top_result">
			<div id="count_result"></div>
			<div id="sort">Sort by
				<div id="menu_sort">
					<div id="result_sort"></div>
					<div id="sort_list">
						<div id="1" onclick="setResult(1)">Name (Ascending Order)</div>
						<div id="2" onclick="setResult(2)">Rarity (Ascending Order)</div>
						<div id="3" onclick="setResult(3)">Name (Descending Order)</div>
						<div id="4" onclick="setResult(4)">Rarity (Descending Order)</div>
					</div>
				</div>
			</div>
		</div>
		<ul id="list_result"></ul>
	</div>

	<div id="popup_text"></div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
