var classCategory = '';
var classRarity = '';
var classPaint = 'default';
var selectCategory = 0;
var selectRarity = 0;
var selectPaint = 0;
var idCategory = 0;
var idRarity = 0;
var idPaint = 1;

function setCategory(id) {
	$('#result_category').text($('#menu_category>li[id='+id+']').text());
	$('#menu_category').hide();
	classCategory = $('[onclick="setCategory('+id+')"]').attr('class');
	idCategory = id;
	if (id == 0) {
		selectCategory = 0;
	} else {
		selectCategory = 1;
	}
	updateCategory(classCategory);
};

function setRarity(id) {
	$('#result_rarity').text($('#menu_rarity>li[id='+id+']').text());
	$('#menu_rarity').hide();
	classRarity = $('[onclick="setRarity('+id+')"]').attr('class');
	idRarity = id;
	$('#result_rarity').removeClass();
	$('#result_rarity').addClass(classRarity);
	if (id == 0) {
		selectRarity = 0;
	} else {
		selectRarity = 1;
	}
	updateRarity(classRarity);
};

function setPaint(id) {
	$('#result_paint').text($('#menu_paint>li[id='+id+']').text());
	$('#menu_paint').hide();
	classPaint = $('[onclick="setPaint('+id+')"]').attr('class');
	idPaint = id;
	$('#result_paint').removeClass();
	$('#result_paint').addClass(classPaint);
	if (id == 0) {
		selectPaint = 0;
	} else {
		selectPaint = 1;
	}
	updatePaint(classPaint);
};




function updateCategory(category) {
	$('#list_result').children('li').each(function() {
		if (category == "all") {
			$(this).show();
		} else {
			$(this).toggle($(this).children('#item_rarity').attr('class') == category);
		}
	});
	visibleName();
	visibleRarity(classRarity);
	visiblePaint(classPaint);
	if($('#list_result').children('li:visible').length == 0) {
		$('#background_list.none').show();
		$('#top_result').hide();
	} else {
		$('#background_list.none').hide();
		$('#top_result').show();
		$('#count_result').text('Result : '+$('#list_result').children('li:visible').length);
	}
	$(window).scrollTop(0);
};

function updateRarity(rarity) {
	$('#list_result').children('li').each(function() {
		if (rarity == "all") {
			$(this).show();
		} else {
			$(this).toggle($(this).attr('class') == rarity);
		}
	});
	visibleName();
	visibleCategory(classCategory);
	visiblePaint(classPaint);
	if($('#list_result').children('li:visible').length == 0) {
		$('#background_list.none').show();
		$('#top_result').hide();
	} else {
		$('#background_list.none').hide();
		$('#top_result').show();
		$('#count_result').text('Result : '+$('#list_result').children('li:visible').length);
	}
	$(window).scrollTop(0);
};

function updatePaint(paint) {
	$('#list_result').children('li').each(function() {
		if (paint == "default") {
			$(this).show();
		} else {
			$(this).toggle($(this).children('#change_paint').children().children('#menu_tag_paint').children().children().is('.'+paint+':not(".none")'));
		}
	});
	visibleName();
	visibleCategory(classCategory);
	visibleRarity(classRarity);
	if($('#list_result').children('li:visible').length == 0) {
		$('#background_list.none').show();
		$('#top_result').hide();
	} else {
		$('#background_list.none').hide();
		$('#top_result').show();
		$('#count_result').text('Result : '+$('#list_result').children('li:visible').length);
	}
	$(window).scrollTop(0);
};

var hasTaping = false;

function visibleName() {
	if (hasTaping == true) {
		var value = $("#search_name").val().toLowerCase();
		$("#list_result li:visible #item_name").filter(function() {
			$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
	}
};

function visibleCategory(category) {
	$('#list_result').children('li:visible').each(function() {
		if (category == "all") {
			$(this).show();
		} else {
			$(this).toggle($(this).children('#item_rarity').attr('class') == category);
		}
	});
};

function visibleRarity(rarity) {
	$('#list_result').children('li:visible').each(function() {
		if (rarity == "all") {
			$(this).show();
		} else {
			$(this).toggle($(this).attr('class') == rarity);
		}
	});
};

function visiblePaint(paint) {
	$('#list_result').children('li:visible').each(function() {
		if (paint == "default") {
			$(this).show();
		} else {
			$(this).toggle($(this).children('#change_paint').children().children('#menu_tag_paint').children().children().is('.'+paint+':not(".none")'));
		}
	});
};




function setResult(id) {
	$.ajax({
		type: "POST",
		url: "php/sort_result.php",
		data: {id: id},
		success: function(result){
			$('#list_result').html(result);
			setCategory(idCategory);
			setRarity(idRarity);
			setPaint(idPaint);
			$('#result_sort').text($('#sort_list>div[id='+id+']').text());
			$('#sort_list').hide();
			$('#list_result li').each( function() {
				$(this).children('#change_paint').children().children('#menu_tag_paint').children('#tag_paint:first-child').children().click();
				$(this).children('#change_paint').children().hover( function() {
					$(this).children('#menu_tag_paint').show();
				}, function() {
					$(this).children('#menu_tag_paint').hide();
				});
				$(this).mouseover( function() {
					$(this).children('#item_image').children('img').css('width', '220px');
					$(this).children('#item_image').children('img').css('height', '220px');
					$(this).children('#item_image').children('img').css('margin', '0');
				});
				$(this).mouseout( function() {
					$(this).children('#item_image').children('img').css('width', '200px');
					$(this).children('#item_image').children('img').css('height', '200px');
					$(this).children('#item_image').children('img').css('margin', '10px');
				});
			});
		}
	});
	sessionStorage.setItem('sortResult', id);
};



function modifyItem(id, table) {
	// window.location.href = "add.php?id="+id+"&table="+table;
	window.open("add.php?id="+id+"&table="+table, '_blank');
};










$(document).ready(function () {
	setCategory(0);
	setRarity(0);
	setPaint(1);
	
	// $('#count_result').text('Result : '+$('#list_result').children('li:visible').length);
	
	$('#search_category').hover( function(){
		$('#menu_category').show();
	}, function() {
		$('#menu_category').hide();
	});
	
	$('#search_rarity').hover( function(){
		$('#menu_rarity').show();
	}, function() {
		$('#menu_rarity').hide();
	});
	
	$('#search_paint').hover( function(){
		$('#menu_paint').show();
	}, function() {
		$('#menu_paint').hide();
	});
	
	var sortResult = sessionStorage.getItem('sortResult');
	if (sortResult && window.location.href.indexOf("modify") <= -1) {
		setResult(parseInt(sortResult));
	} else if (window.location.href.indexOf("modify") <= -1) {
		setResult(1);
	}
	
	$('#list_result li').each( function() {
		$(this).children('#change_paint').children().children('#menu_tag_paint').children('#tag_paint:first-child').children().click();
		$(this).children('#change_paint').children().hover( function() {
			$(this).children('#menu_tag_paint').show();
		}, function() {
			$(this).children('#menu_tag_paint').hide();
		});
		$(this).mouseover( function() {
			$(this).children('#item_image').children('img').css('width', '220px');
			$(this).children('#item_image').children('img').css('height', '220px');
			$(this).children('#item_image').children('img').css('margin', '0');
		});
		$(this).mouseout( function() {
			$(this).children('#item_image').children('img').css('width', '200px');
			$(this).children('#item_image').children('img').css('height', '200px');
			$(this).children('#item_image').children('img').css('margin', '10px');
		});
	});
	
	// if (window.location.href.indexOf("home") > -1) {
		// selectRarity(0);
		// selectPaint(1);
    // }
	
	$("#search_name").on("keyup", function() {
		hasTaping = true;
		var value = $(this).val().toLowerCase();
		$("#list_result li #item_name").filter(function() {
			$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
		
		visibleCategory(classCategory);
		visibleRarity(classRarity);
		visiblePaint(classPaint);
		
		if($('#list_result').children('li:visible').length == 0) {
			$('#background_list.none').show();
			$('#top_result').hide();
		} else {
			$('#background_list.none').hide();
			$('#top_result').show();
			$('#count_result').text('Result : '+$('#list_result').children('li:visible').length);
		}
		$(window).scrollTop(0);
	});
	
});