<!DOCTYPE html>
<html>
<head>
	<title>Paints</title>
	<?php include 'includes/head.php'; ?>
	
</head>
<body>

<?php include 'includes/header.php'; ?>

	<div id="center_list">
	
		<div id="title_list">Items - Paint Finishes
			<div id="sort">Sort by
				<div id="menu_sort">
					<div id="result_sort">Rarity (Ascending Order)</div>
					<div id="sort_list">
						<div id="1" onclick="setSort(1)">Rarity (Ascending Order)</div>
						<div id="2" onclick="setSort(2)">Name (Ascending Order)</div>
						<div id="3" onclick="setSort(3)">Rarity (Descending Order)</div>
						<div id="4" onclick="setSort(4)">Name (Descending Order)</div>
					</div>
				</div>
			</div>
		</div>

		<div id="list"></div>
		
		<div id="popup_text"></div>
	
	</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>