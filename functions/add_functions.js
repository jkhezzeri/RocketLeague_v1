function setAddCategory(id) {
	var img;
	if (id === 1) {
		img = "image_black";
	} if (id === 2) {
		img = "image_white";
	}
	$.ajax({
		type: "POST",
		url: "php/add_category.php",
		data: {img: img},
		success: function(result){
			$('#add_body').nextAll().remove();
			$('#add_category').append(result);
			if (idCategory != 0) {
				addCategory(idCategory);
			}
		}
	});
};

function check_item_exists(name, rarity, category) {
	$.ajax({
		type: "POST",
		url: "php/exist_item.php",
		data: {name: name, rarity: rarity, category: category},
		success: function(result){
			$('#add_errors').append(result);
		}
	});
};

function check_decal_exists(name, body) {
	$.ajax({
		type: "POST",
		url: "php/exist_decal.php",
		data: {name: name, body: body},
		success: function(result){
			$('#add_errors').append(result);
		}
	});
};

function submit_add(table, data_array) {
	$.ajax({
		type: "POST",
		url: "php/add_item.php",
		data: {table: table, data_array: data_array},
		success: function(result){
			$('#test_popup').html(result);
		}
	});
};

function submit_modify(id, table, data_array) {
	$.ajax({
		type: "POST",
		url: "php/modify_item.php",
		data: {id: id, table: table, data_array: data_array},
		success: function(result){
			$('#test_popup').html(result);
		}
	});
};

var modify_data = {};
var id_data = 0;
var table_data = '';

function modify_add(id, table) {
	$.ajax({
		type: "POST",
		url: "php/modify_add.php",
		data: {id: id, table: table},
		success: function(result){
			console.log(result);
			modify_data = JSON.parse(result);
			console.log(modify_data);
			id_data = modify_data['id'];
			table_data = table;
			delete modify_data['id'];
			$('#new_name').val(modify_data['name']);
			modify_url = modify_data['default'].replace('https://rocket-league.com', '');
			$('#url_default').val(modify_url);
			if (modify_data['info']) {
				$('#menu_info li').each(function() {
					if ($(this).text() == modify_data['info']) {
						$(this).click();
					}
				});
			} else {
				delete modify_data['info'];
			}
			$('#add_rarity button').each(function() {
				if ($(this).attr('class') == modify_data['rarity'].toLowerCase().replace(/ /gi,"_")) {
					$(this).click();
				}
			});
			$('#add_category button').each(function() {
				if ($(this).attr('class') == table) {
					$(this).click();
					
					if (table == 'decals') {
						if (modify_data['type'] == 'Animated Decal') {
							$('#animated_check').click();
						}
						$('#menu_body li').each(function() {
							if ($(this).text() == modify_data['bodies']) {
								$(this).click();
							}
						});
					}
				}
			});
			if (modify_data['black'] || modify_data['titanium_white'] || modify_data['grey'] || modify_data['crimson'] || modify_data['pink'] || modify_data['cobalt'] || modify_data['sky_blue'] || modify_data['burnt_sienna'] || modify_data['saffron'] || modify_data['lime'] || modify_data['forest_green'] || modify_data['orange'] || modify_data['purple']) {
				$('#paint_check').click();
				$('#add_paint button').each(function() {
					if (!modify_data[$(this).attr('class').split(' ')[0]]) {
						delete modify_data[$(this).attr('class').split(' ')[0]];
						$(this).click();
					}
				});
			}
			$('#button_test').click();
			console.log(modify_data);
		}
	});
};




var testType = '';
var testCategory = '';
var classCategory = '';
var idCategory = 0;

function addCategory(id) {
	$('[onclick="addCategory('+id+')"]').addClass('selected');
	$('[onclick="addCategory('+id+')"]').siblings().removeClass('selected');
	
	classCategory = $('[onclick="addCategory('+id+')"]').attr('class').split(' ')[0];
	testCategory = $('[onclick="addCategory('+id+')"] div').text();
	idCategory = id;
	
	if (id == 1 || id == 2 || id == 4 || id == 6) {
		enabledPaints();
	} else {
		disabledPaints();
	}
	
	if (id == 5) {
		enabledDecals();
	} else {
		disabledDecals();
	}
	
	if (id == 1) { testType = 'Body'; }
	if (id == 2) { testType = 'Wheels'; }
	if (id == 3) { testType = 'Rocket Boost'; }
	if (id == 4) { testType = 'Antenna'; }
	if (id == 5) { checkAnimated(); }
	if (id == 6) { testType = 'Topper'; }
	if (id == 7) { testType = 'Trail'; }
	if (id == 8) { testType = 'Goal Explosion'; }
	if (id == 9) { testType = 'Paint Finish'; }
	if (id == 10) { testType = 'Player Banner'; }
	if (id == 11) { testType = 'Engine Audio'; }
	if (id == 12) { testType = 'Avatar Border'; }
	if (id == 13) { testType = 'Player Title'; }
	if (id == 14) { testType = 'Blueprint'; }
	
};

function checkAnimated() {
	if ($('#animated_check').prop('checked')) {
		testType = 'Animated Decal';
	} else {
		testType = 'Decal';
	}
};

function disabledPaints() {
	$('#add_check').css('pointer-events', 'none');
	$('#add_check').css('opacity', '0.5');
	$('#paint_check').prop('checked', false);
	checkPaint();
};

function enabledPaints() {
	$('#add_check').css('pointer-events', 'all');
	$('#add_check').css('opacity', '1');
};

function disabledDecals() {
	$('#add_animated').css('pointer-events', 'none');
	$('#add_animated').css('opacity', '0.5');
	$('#add_body').css('pointer-events', 'none');
	$('#add_body').css('opacity', '0.5');
	$('#animated_check').prop('checked', false);
	// setBody(0);
	$('#result_body').val('');
};

function enabledDecals() {
	$('#add_animated').css('pointer-events', 'all');
	$('#add_animated').css('opacity', '1');
	$('#add_body').css('pointer-events', 'all');
	$('#add_body').css('opacity', '1');
	// setBody(0);
};

var testRarity = '';
var classRarity = '';

function addRarity(id) {
	$('[onclick="addRarity('+id+')"]').addClass('selected');
	$('[onclick="addRarity('+id+')"]').siblings().removeClass('selected');
	
	classRarity = $('[onclick="addRarity('+id+')"]').attr('class').split(' ')[0];
	testRarity = $('[onclick="addRarity('+id+')"] div').text();
};

var testPaint = '';

function addPaint(id) {
	if ($('[onclick="addPaint('+id+')"]').hasClass('selected')) {
		$('[onclick="addPaint('+id+')"]').removeClass('selected');
	} else {
		
		// $('#test_paint').append('<div id="test_choose" class="'+$('[onclick="addPaint('+id+')"]').attr('class')+'" onclick="changePaintTest()">'+$('[onclick="addPaint('+id+')"]').text()+'</div>');
		
		
		$('[onclick="addPaint('+id+')"]').addClass('selected');
		
		testPaint = $('[onclick="addPaint('+id+')"] div').text();
	}
};

function checkPaint() {
	if ($('#paint_check').prop('checked')) {
		$('#add_paint #select_paint')/*.children()*/.addClass('selected');
		$('#add_paint #select_paint').css('pointer-events', 'all');
		
	} else {
		$('#add_paint #select_paint')/*.children()*/.removeClass('selected');
		$('#add_paint #select_paint').css('pointer-events', 'none');
		addPaint(1);
	}
};

var default_url = 'https://rocket-league.com';

function changePaintTest(id) {
	$('[onclick="changePaintTest('+id+')"]').addClass('selected');
	$('[onclick="changePaintTest('+id+')"]').parent().siblings().children().removeClass('selected');
	$('#result_tag_paint').text($('[onclick="changePaintTest('+id+')"]').text());
	$('#result_tag_paint').removeClass();
	$('#result_tag_paint').addClass($('[onclick="changePaintTest('+id+')"]').attr('class').split(' ')[0]);
	$('#menu_tag_paint').hide();
	
	if ($('#url_default').val()) {
		var url_png = $('#url_default').val().substr($('#url_default').val().lastIndexOf('.'));
		var url_old = $('#url_default').val().substr(0, $('#url_default').val().lastIndexOf('-')+1);
		var url_def = $('#url_default').val().split('.')[0].substr($('#url_default').val().lastIndexOf('-') + 1, $('#url_default').val().lastIndexOf('.') - $('#url_default').val().lastIndexOf('-'));
		if (id == 0) {
			var url_paint = url_def;
		} else {
			var url_paint = $('[onclick="changePaintTest('+id+')"]').text().replace(/ /gi,"");
		}
		var url_new = url_old+url_paint+url_png;
		default_url = 'https://rocket-league.com'+url_new;
		$('#item_image img').attr('src', default_url);
	}
};


var selectInfo = 0;
var writeInfo = 0;

function setInfo(id) {
	$('#result_info').val($('#menu_info>li[id='+id+']').text());
	if (id == 0) {
		selectInfo = 0;
	} else {
		selectInfo = 1;
	}
	$('#menu_info').hide();
	writeInfo = 0;
};

var selectBody = 0;
var writeBody = 0;

function setBody(id) {
	$('#result_body').val($('#menu_body>li[id='+id+']').text());
	if (id == 0) {
		selectBody = 0;
	} else {
		selectBody = 1;
	}
	$('#menu_body').hide();
	writeBody = 0;
};

function check_errors() {
	$('#add_errors').empty();
	if (!$('#new_name').val()) {
		$('#add_errors').append('<li>An Item Name is required.</li>');
	}
	if (!$('#url_default').val()) {
		if (classCategory != 'engine_audio' && classCategory != 'titles') {
			$('#add_errors').append('<li>An Image URL is required.</li>');
		}
	}
	if (!testRarity) {
		$('#add_errors').append('<li>A Rarity is required.</li>');
	}
	if (!testCategory) {
		$('#add_errors').append('<li>A Category is required.</li>');
	}
	if (testCategory == 'Decals' && !$('#result_body').val()) {
		$('#add_errors').append('<li>A Body is required.</li>');
	}
	if ($('#result_info').val() && writeInfo == 1) {
		$('#add_errors').append('<li>Information is incorrect.</li>');
	}
	if ($('#result_body').val() && writeBody == 1) {
		$('#add_errors').append('<li>Body is incorrect.</li>');
	}
	if ($('#add_errors').html()) {
		return false;
	}
};

function check_url() {
	if (classCategory != 'engine_audio' && classCategory != 'titles') {
		if ($('#url_default').val().match("^/content/media/items/avatar/") && $('#url_default').val().match(".png$")) {
			return true;
		} else {
			$('#add_errors').append('<li>URL is invalid.</li>');
			return false;
		}
	}
};


function testItem() {
	// check_errors();
	
	// $('#test_new_item').removeClass();
	// $('#test_new_item').addClass(classRarity);
	$('#background_list').attr('class', classRarity);
	
	$('#change_paint').empty();
	
	if ($('#paint_check').prop('checked')) {
		// var i = 0;
		
		// $('#add_paint button').each(function() {
			// if ($(this).hasClass('selected')) {
				// var colorPaint = $(this).attr('class').split(' ')[0];
				// var textPaint = $(this).text();
				// $('#change_paint').append('<div id="test_choose" class="'+colorPaint+'" title="'+textPaint+'" onclick="changePaintTest('+i+')">'+textPaint+'</div>');
			// }
			// i++;
		// });
		// $('#test_choose').first().addClass('selected');
		
		$('#change_paint').append('<div id="menu_tag"><div id="result_tag_paint"></div><div id="menu_tag_paint"></div></div>');
		var i = 0;
		$('#add_paint button').each(function() {
			var colorPaint = $(this).attr('class').split(' ')[0];
			var textPaint = $(this).text();
			if ($(this).hasClass('selected')) {
				$('#menu_tag_paint').append('<div id="tag_paint"><div id="choose_paint" class="'+colorPaint+'" title="'+textPaint+'" onclick="changePaintTest('+i+')">'+textPaint+'</div></div>');
			} else {
				$('#menu_tag_paint').append('<div id="tag_paint"><div id="choose_paint" class="'+colorPaint+' none" title="'+textPaint+'" onclick="changePaintTest('+i+')">'+textPaint+'</div></div>');
			}
			i++;
		});
		
		$('#menu_tag_paint').children('#tag_paint:first-child').children().click();
		
		$('#menu_tag').hover( function() {
			$(this).children('#menu_tag_paint').show();
		}, function() {
			$(this).children('#menu_tag_paint').hide();
		});
		$('#background_list').mouseover( function() {
			$(this).children('#item_image').children('img').css('width', '220px');
			$(this).children('#item_image').children('img').css('height', '220px');
			$(this).children('#item_image').children('img').css('margin', '0');
		});
		$('#background_list').mouseout( function() {
			$(this).children('#item_image').children('img').css('width', '200px');
			$(this).children('#item_image').children('img').css('height', '200px');
			$(this).children('#item_image').children('img').css('margin', '10px');
		});
		
	}
	
	// var default_url = 'https://rocket-league.com'+$('#url_default').val();
	
	if ($('#url_default').val()) {
		default_url = 'https://rocket-league.com'+$('#url_default').val();
		$('#item_image img').attr('src', default_url);
	} else {
		default_url = 'https://rocket-league.com';
		$('#item_image img').attr('src', '');
	}
	
	if (selectBody == 1) {
		$('#item_name').html($('#new_name').val()+'<br>('+$('#result_body').val()+')');
	} else {
		$('#item_name').text($('#new_name').val());
	}
	
	if ($('#animated_check').prop('checked')) {
		testType = 'Animated Decal';
	}
	
	$('#item_rarity').text(testRarity+' '+testType);
	
	if (selectInfo == 1) {
		$('#item_info').text($('#result_info').val());
	} else {
		$('#item_info').text('');
	}
	
};


// var table_data = classCategory;
var array_data = {};

function create_array() {
	// var table_data = classCategory;
	array_data = {};
	array_data['name'] = $('#new_name').val();
	array_data['info'] = null;
	if (selectInfo == 1) {
		array_data['info'] = $('#result_info').val();
	}
	array_data['rarity'] = testRarity;
	array_data['type'] = testType;
	if (classCategory == 'decals') {
		array_data['bodies'] = $('#result_body').val();
	}
	if (classCategory != 'engine_audio' && classCategory != 'titles') {
		array_data['default'] = 'https://rocket-league.com'+$('#url_default').val();
	}
	if ($('#paint_check').prop('checked')) {
		$('#add_paint button').each(function() {
			var colorPaint = $(this).attr('class').split(' ')[0];
			var textPaint = $(this).text().replace(/ /gi,"");
			if (colorPaint != 'default') {
				if ($(this).hasClass('selected')) {
					var url_png = $('#url_default').val().substr($('#url_default').val().lastIndexOf('.'));
					var url_old = $('#url_default').val().substr(0, $('#url_default').val().lastIndexOf('-')+1);
					var url_new = 'https://rocket-league.com'+url_old+textPaint+url_png;
					array_data[colorPaint] = url_new;
				} else {
					array_data[colorPaint] = null;
				}
			}
			
			if (colorPaint == 'default') {
				if (!$(this).hasClass('selected')) {
					delete array_data['default'];
				}
			}
			
		});
	} else {
		if (classCategory == 'bodies' || classCategory == 'wheels' || classCategory == 'antennas' || classCategory == 'toppers' ) {
			$('#add_paint button').each(function() {
				var colorPaint = $(this).attr('class').split(' ')[0];
				var textPaint = $(this).text().replace(/ /gi,"");
				if (colorPaint != 'default') {
					array_data[colorPaint] = null;
				}
			});
		}
	}
};





$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}


function diff(obj1, obj2) {
    var result = {};
    $.each(obj1, function (key, value) {
        if (!obj2.hasOwnProperty(key) || obj2[key] !== obj1[key]) {
            result[key] = value;
        }
    });

    return result;
}

function sleep(milliseconds) {
	const date = Date.now();
	let currentDate = null;
	do {
		currentDate = Date.now();
	} while (currentDate - date < milliseconds);
}


$(document).ready(function () {
	// addPaint(1);
	// checkPaint();
	// setInfo(0);
	// setBody(0);
	disabledDecals();
	disabledPaints();
	
	if ($.urlParam('id') && $.urlParam('table')) {
		modify_add($.urlParam('id'), $.urlParam('table'));
	}
	
	$('#more_info').hover( function(){
		$('#menu_info').show();
	}, function() {
		$('#menu_info').hide();
	});
	
	$('#body').hover( function(){
		$('#menu_body').show();
	}, function() {
		$('#menu_body').hide();
	});
	
	
	
	$("#result_info").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#menu_info li:not(:first-child)").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
		writeInfo = 1;
		$('#menu_info li').each(function() {
			if ($(this).text().toLowerCase() == value) {
				$(this).click();
			}
		});
	});
	
	$("#result_body").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#menu_body li:not(:first-child)").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
		writeBody = 1;
		$('#menu_body li').each(function() {
			if ($(this).text().toLowerCase() == value) {
				$(this).click();
			}
		});
	});
	
	
	
	
	$('#add_form').submit(function () {
		if (check_errors() === false) {
			// check_errors();
			return false;
		} else {
			$('#add_errors').empty();
			if (testCategory !== "Decals" && check_item_exists($('#new_name').val(), testRarity, classCategory) === false) {
				return false;
			}
			if (testCategory === "Decals" && check_decal_exists($('#new_name').val(), $('#result_body').val()) === false) {
				return false;
			}
			if (check_url() === false) {
				return false;
			} else {
				create_array();
				
				table_data = classCategory;
				
				$('#add_errors').empty();
				submit_add(table_data, array_data);
				sleep(100);
				// return false;
				return true;
			}
			
		}
	});
	
	
	$('#modify_form').submit(function () {
		if (check_errors() === false) {
			// check_errors();
			return false;
		} else {
			$('#add_errors').empty();
			if (check_url() === false) {
				return false;
			}
			
			create_array();
			
			// var table_data = classCategory;
			// var id_data = modify_data['id'];
			// if (modify_data['id']) {
				// var id_data = modify_data['id'];
				// delete modify_data['id'];
			// }
			
			console.log(modify_data);
			console.log(array_data);
			
			console.log(diff(array_data, modify_data));
			console.log(diff(modify_data, array_data));
			
			if (jQuery.isEmptyObject(diff(modify_data, array_data)) && jQuery.isEmptyObject(diff(array_data, modify_data))) {
				$('#add_errors').append('<li>There is no modification.</li>');
				return false;
			}
			submit_modify(id_data, table_data, array_data);
			sleep(100);
			return true;
			// return false;
		}
		
	});
	
});