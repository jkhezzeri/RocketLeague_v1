function setHeaderCenter(id) {
	var center;
	if (id === 1) {
		center = "image_black";
	} if (id === 2) {
		center = "image_white";
	}
	$.ajax({
		type: "POST",
		url: "php/header_center.php",
		data: {center: center},
		success: function(result){
			$('#header_center').html(result);
		}
	});
};

var image_cat = "image_black";

function setImageCategory(id) {
	if (id === 1) {
		image_cat = "image_black";
	} if (id === 2) {
		image_cat = "image_white";
	}
	$.ajax({
		type: "POST",
		url: "php/image_category.php",
		data: {image_cat: image_cat, language: language},
		success: function(result){
			$('#center_category').html(result);
			if (hasSelectCategory == true) {
				selectCategory(id_cat);
			}
		}
	});
};

function categoryItem(category) {
	$.ajax({
		type: "POST",
		url: "php/category_item.php",
		data: {category: category},
		success: function(result){
			$('#category_item').html(result);
		}
	});
};

function paintItem(item, category) {
	$.ajax({
		type: "POST",
		url: "php/paint_item.php",
		data: {item: item, category: category},
		success: function(result){
			$('#paint_item').html(result);
		}
	});
};

var name_item = "";
var name_table = "";
var name_category = "";
var name_rarity = "";
var name_paint = "";

function getSearch() {
	$.ajax({
		type: "POST",
		url: "php/search.php",
		data: {item: name_item, table: name_table, paint: name_paint},
		success: function(result){
			if (name_item != "" && name_table != "") {
				$("#image").html(result);
			}			
		}
	});
};

function setSort(id) {
	$.ajax({
		type: "POST",
		url: "php/sort_item.php",
		data: {table: $('title').text().toLowerCase().replace(/ /gi,"_"), id: id},
		success: function(result){
			$('#list').html(result);
			$('#result_sort').text($('#sort_list>div[id='+id+']').text());
			$('#sort_list').hide();
			$('#list li').each( function() {
				$(this).children('#change_paint').children().children('#menu_tag_paint').children('#tag_paint:first-child').children().click();
				$(this).children('#change_paint').children().hover( function() {
					$(this).children('#menu_tag_paint').show();
				}, function() {
					$(this).children('#menu_tag_paint').hide();
				});
				
				// $(this).hover( function() {
					// $(this).children('#item_image').children('img').css('width', '220px');
					// $(this).children('#item_image').children('img').css('height', '220px');
					// $(this).children('#item_image').children('img').css('margin', '0');
				// }, function() {
					// $(this).children('#item_image').children('img').css('width', '200px');
					// $(this).children('#item_image').children('img').css('height', '200px');
					// $(this).children('#item_image').children('img').css('margin', '10px');
				// });
				
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
	sessionStorage.setItem('sortBy', id);
};

function changePaintView(id, item, table) {
	var paint = $('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').attr('class');
	var name_paint = $('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').text();
	// var table = $('title').text().toLowerCase().replace(/ /gi,"_");
	// var table = $('[onclick="changePaintView('+id+', '+item+')"]').parent().siblings('#item_rarity').attr('class');
	$.ajax({
		type: "POST",
		url: "php/paint_view.php",
		data: {paint: paint, table: table, item: item},
		success: function(result){
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').parent().parent().parent().parent().siblings('#item_image').html(result);
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').addClass('selected');
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').parent().siblings().children().removeClass('selected');
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').parent().parent().siblings('#result_tag_paint').text(name_paint);
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').parent().parent().siblings('#result_tag_paint').removeClass();
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').parent().parent().siblings('#result_tag_paint').addClass(paint);
			$('[onclick="changePaintView('+id+', '+item+', \''+table+'\')"]').parent().parent().hide();
		}
	});
};

function changePaintViewPopup(id, item, table) {
	var paint = $('[onclick="changePaintViewPopup('+id+', '+item+', \''+table+'\')"]').attr('class');
	// var table = $('title').text().toLowerCase().replace(/ /gi,"_");
	$.ajax({
		type: "POST",
		url: "php/paint_view.php",
		data: {paint: paint, table: table, item: item},
		success: function(result){
			// $('[onclick="changePaintViewPopup('+id+', '+item+')"]').parent().siblings('#popup_image').html(result);
			$('#popup_image').html(result);
			$('[onclick="changePaintViewPopup('+id+', '+item+', \''+table+'\')"]').addClass('selected');
			$('[onclick="changePaintViewPopup('+id+', '+item+', \''+table+'\')"]').siblings().removeClass('selected');
		}
	});
};


var tempclass = '';
function popupItem(item, rarity, table) {
	// var table = $('title').text().toLowerCase().replace(/ /gi,"_");
	// var table = $('[onclick="popupItem('+item+', \''+rarity+'\')"]').siblings('#item_rarity').attr('class');
	var category = $('title').text();
	// var tempclass = '';
	$.ajax({
		type: "POST",
		url: "php/popup_item.php",
		data: {table: table, item: item},
		success: function(result){
			$('#popup_text').html(result);
			$('#popup_text').dialog({
				position: { my: "center", at: "center", of: window },
				draggable: false,
				resizable: false,
				modal: true,
				autoOpen: false,
				open: function(event, ui) {
					$('.ui-widget-overlay').bind('click', function(){
						$('#popup_text').dialog('close');
						// $('.ui-dialog').removeClass(tempclass);
						// tempclass = rarity;
					});
				},
				show: {
					effect: "fade",
					duration: 500
				},
				hide: {
					effect: "fade",
					duration: 500
				}
			});
			$('.ui-dialog-titlebar').hide();
			$('#popup_text').dialog('open');
			$('.ui-dialog').removeClass(tempclass);
			$('.ui-dialog').addClass(rarity);
			tempclass = rarity;
		}
	});
};






var language = "english";

var trad = {
	en: {
		item_title: "Select Item",
		item_name: "Choose Item",
		search_button: "Search",
		reset_all_button: "Reset All",
		item_search: "Search Item",
		category_title: "Select Category",
		rarity_title: "Select Rarity",
		paint_title: "Select Paint"
	},
	fr: {
		item_title: "Sélectionner un Objet",
		item_name: "Choisir un Objet",
		search_button: "Rechercher",
		reset_all_button: "Tout Effacer",
		item_search: "Rechercher un Objet",
		category_title: "Sélectionner une Catégorie",
		rarity_title: "Sélectionner une Rareté",
		paint_title: "Sélectionner une Couleur"
	}
};
/*	
if (window.location.hash) {
	if (window.location.hash === "#fr") {
		$('#title_item').text(language.fr.item_title);
	}
};*/

function selectLanguage(id) {
	$('[onclick="selectLanguage('+id+')"]').addClass('selected');
	$('[onclick="selectLanguage('+id+')"]').css('pointer-events', 'none');
	$('[onclick="selectLanguage('+id+')"]').siblings().removeClass('selected');
	$('[onclick="selectLanguage('+id+')"]').siblings().css('pointer-events', 'all');
	sessionStorage.setItem('lang', id);
	
	
	
	if (id == 0){
		language = "english";
		$('#title_item').text(trad.en.item_title);
		$('#name_item').text(trad.en.item_name);
		// $('#button_search').attr('value', trad.en.search_button);
		// $('#button_reset_all').text(trad.en.reset_all_button);
		$('#search_item').attr('placeholder', trad.en.item_search);
		$('#title_category').text(trad.en.category_title);
		$('#title_rarity').text(trad.en.rarity_title);
		$('#title_paint').text(trad.en.paint_title);
	} else if (id == 1){
		language = "french";
		$('#title_item').text(trad.fr.item_title);
		$('#name_item').text(trad.fr.item_name);
		// $('#button_search').attr('value', trad.fr.search_button);
		// $('#button_reset_all').text(trad.fr.reset_all_button);
		$('#search_item').attr('placeholder', trad.fr.item_search);
		$('#title_category').text(trad.fr.category_title);
		$('#title_rarity').text(trad.fr.rarity_title);
		$('#title_paint').text(trad.fr.paint_title);
	}
	
	$.ajax({
		type: "POST",
		url: "php/image_category.php",
		data: {image_cat: image_cat, language: language},
		success: function(result){
			$('#center_category').html(result);
			if (hasSelectCategory == true) {
				selectCategory(id_cat);
			}
		}
	});
	
	$.ajax({
		type: "POST",
		url: "php/home_rarity.php",
		data: {language: language},
		success: function(result){
			$('#center_rarity').html(result);
			if (hasSelectRarity == true) {
				selectRarity(id_rar);
			}
		}
	});
	
	$.ajax({
		type: "POST",
		url: "php/home_paint.php",
		data: {language: language},
		success: function(result){
			$('#center_paint').html(result);
			if (hasSelectPaint == true) {
				selectPaint(id_pai);
			}
		}
	});
	
};

var id_cat = 0;
var id_rar = 0;
var id_pai = 1;

var hasSelectCategory = false;
var hasSelectRarity = false;
var hasSelectPaint = false;

function selectCategory(id) {
	$('[onclick="selectCategory('+id+')"]').addClass('selected');
	$('[onclick="selectCategory('+id+')"]').parent().siblings().children().removeClass('selected');
	id_cat = id;
	name_category = $('[onclick="selectCategory('+id+')"]').attr('class').replace(/ .*/,"");
	$('#test_category').text(name_category);
	updateMenu(name_category, name_rarity);
	hasSelectCategory = true;
};

function selectRarity(id) {
	$('[onclick="selectRarity('+id+')"]').addClass('selected');
	$('[onclick="selectRarity('+id+')"]').parent().siblings().children().removeClass('selected');
	id_rar = id;
	name_rarity = $('[onclick="selectRarity('+id+')"]').attr('class').replace(/ .*/,"");
	$('#test_rarity').text(name_rarity);
	updateMenu(name_category, name_rarity);
	hasSelectRarity = true;
};

function selectPaint(id) {
	$('[onclick="selectPaint('+id+')"]').addClass('selected');
	$('[onclick="selectPaint('+id+')"]').parent().siblings().children().removeClass('selected');
	id_pai = id;
	name_paint = $('[onclick="selectPaint('+id+')"]').attr('class').replace(/ .*/,"");
	$('#test_paint').text(name_paint);
	hasSelectPaint = true;
};

var change_theme = false;

function updateMenu(category, rarity) {
	if(change_theme == false){
		$('#menu_item>li').each(function() {
			if (category == "any" && rarity == "any") {
				$(this).show();
				$(this).children('ul').show();
				$(this).children().children('li').each(function() {
					$(this).show();
				});
			} else if (category != "any" && rarity == "any") {
				if ($(this).children('div').text().toLowerCase().replace(/ /gi,"_") != category) {
					$(this).hide();
				} else {
					$(this).show();
					$(this).children('ul').show();
					$(this).children().children('li').each(function() {
						$(this).show();
					});
				}
			} else if (category == "any" && rarity != "any") {
				$(this).show();
				$(this).children('ul').show();
				$(this).children().children('li').each(function() {
					if ($(this).attr('class').toLowerCase().replace(/ /gi,"_") != rarity) {
						$(this).hide();
					} else {
						$(this).show();
					}
				});
			} else if (category != "any" && rarity != "any") {
				if ($(this).children('div').text().toLowerCase().replace(/ /gi,"_") != category) {
					$(this).hide();
				} else {
					$(this).show();
					$(this).children('ul').show();
					$(this).children().children('li').each(function() {
						if ($(this).attr('class').toLowerCase().replace(/ /gi,"_") != rarity) {
							$(this).hide();
						} else {
							$(this).show();
						}
					});
				}
			}		
			if($(this).children().children('li:visible').length == 0) {
				$(this).hide();
				$(this).children('ul').hide();
			}
		});
		
		if($('#menu_item').children('li:visible').length == 0) {
			$('#no_results').show();
			$('#no_results').text('No Results');
		} else {
			$('#no_results').hide();
		}
		
		$('#search_item').focus();
		$('#menu_item').scrollTop(0);
		
	} else if(change_theme == true){
		change_theme = false;
	}
};

function changeCSS(id, cssFile) {
	id.attr('href', cssFile);
};







var connexion_success = false;

function check_connexion(email, wordpass) {
	$.ajax({
		type: "POST",
		async: false,
		url: "php/try_connexion.php",
		data: {email: email, wordpass: wordpass},
		success: function(result){
			if (result) {
				$('#errors_connexion').append(result);
				connexion_success = false;
			} else {
				connexion_success = true;
			}
		}
	});
};

function connexion() {
	$('#errors_connexion').empty();
	
	var regex_email = /^[\w-.+]+@[a-zA-Z0-9.-]+\.[a-zA-z0-9]{2,4}$/;
	if (!$('#email_connexion').val()) {
		$('#errors_connexion').append('<li>Please enter an email.</li>');
	}
	else if (!$('#email_connexion').val().match(regex_email)) {
		$('#errors_connexion').append('<li>A valid email address is required.</li>');
	}
	if (!$('#password_connexion').val()) {
		$('#errors_connexion').append('<li>Please enter a password.</li>');
	} else if ($('#password_connexion').val().length < 8) {
		$('#errors_connexion').append('<li>Your password is too short.</li>');
	}
	
	if (!$('#errors_connexion').is(':empty')) {
		return false;
	} else {
		check_connexion($('#email_connexion').val(), $('#password_connexion').val());
		
		if (connexion_success == false) {
			return false;
		} else {
			return true;
		}
	}
}















$(document).ready(function () {
	
	$(window).on("beforeunload", function(){
		$(window).scrollTop(0);
	});
	
	$('#search_item').val('');
	$('#search_item').focus();	
	
	// if (window.location.href.indexOf("home") > -1) {
		// selectRarity(0);
		// selectPaint(1);
    // }
	
	
	$('#test_item').text(name_item);
	$('#test_table').text(name_table);
	$('#test_category').text(name_category);
	$('#test_rarity').text(name_rarity);
	$('#test_paint').text(name_paint);
	
	
	var toggleMode = document.querySelector('#dark_checkbox');
	var currentMode = localStorage.getItem('theme');

	if (currentMode) {
		document.documentElement.setAttribute('data-theme', currentMode);
		if (currentMode === 'dark') {
			toggleMode.checked = true;
			setHeaderCenter(2);
			setImageCategory(2);
			setAddCategory(2);
			
			$('#header').addClass("dark");
			$('#footer').addClass("dark");
			$('body').addClass("dark");
		} else {
			setHeaderCenter(1);
			setImageCategory(1);
			setAddCategory(1);
		}
	}

	function switchMode(e) {
		$('#header').css('transition', '0s');
		if (e.target.checked) {
			document.documentElement.setAttribute('data-theme', 'dark');
			localStorage.setItem('theme', 'dark');
			setHeaderCenter(2);
			setImageCategory(2);
			setAddCategory(2);
			
			$('#header').addClass("dark");
			$('#footer').addClass("dark");
			$('body').addClass("dark");
		} else {
			document.documentElement.setAttribute('data-theme', 'light');
			localStorage.setItem('theme', 'light');
			setHeaderCenter(1);
			setImageCategory(1);
			setAddCategory(1);
			
			$('#header').removeClass("dark");
			$('#footer').removeClass("dark");
			$('body').removeClass("dark");
		}
		$('#search_item').focus();
		change_theme = true;
	}

	toggleMode.addEventListener('change', switchMode, false);
	
	
	var toggleColor = document.querySelector('#color_checkbox');
	var currentColor = localStorage.getItem('class');

	if (currentColor) {
		document.documentElement.setAttribute('data-class', currentColor);
		if (currentColor === 'orange') {
			toggleColor.checked = true;
			$('#home a img').attr('src', 'images/home_black.png');
			$('#header').addClass("orange");
			$('#footer').addClass("orange");
			$('body').addClass("orange");
		} else {
			$('#home a img').attr('src', 'images/home_white.png');
		}
	}

	function switchColor(e) {
		if (e.target.checked) {
			document.documentElement.setAttribute('data-class', 'orange');
			localStorage.setItem('class', 'orange');
			$('#home a img').attr('src', 'images/home_black.png');
			$('#header').addClass("orange");
			$('#footer').addClass("orange");
			$('body').addClass("orange");
		} else {
			document.documentElement.setAttribute('data-class', 'blue');
			localStorage.setItem('class', 'blue');
			$('#home a img').attr('src', 'images/home_white.png');
			$('#header').removeClass("orange");
			$('#footer').removeClass("orange");
			$('body').removeClass("orange");
		}
		$('#search_item').focus();
		change_theme = true;
	}

	toggleColor.addEventListener('change', switchColor, false);
	
	
	
	
	
	var sortBy = sessionStorage.getItem('sortBy');
	if (sortBy) {
		setSort(parseInt(sortBy));
	} else {
		setSort(1);
	}
	
	var lang = sessionStorage.getItem('lang');
	if (lang) {
		selectLanguage(parseInt(lang));
	} else {
		selectLanguage(0);
	}
	
	
	
	
    $('#menu_item>li>ul>li').click(function () {
		$('#name_item').text($(this).text()/* + ' (' + $(this).parent().parent().children('div').text() + ')'*/);
		
		$('#menu_item').scrollTop(0);
		
		$('#result_item').removeClass();
		$('#result_item').addClass($(this).attr('class').toLowerCase().replace(/ /gi,"_"));
		
		name_item = $(this).text();
		name_table = $(this).parent().parent().children('div').text().toLowerCase().replace(/ /gi,"_");
		$('#test_item').text(name_item);
		$('#test_table').text(name_table);
		
		categoryItem($(this).parent().parent().children('div').text());
		paintItem($(this).text(), $(this).parent().parent().children('div').text().toLowerCase().replace(/ /gi,"_"));
    });
	
	
	$('#menu_item>li>div').click(function () {
		if ($(this).parent().children().children('li:visible').length == 0) {
			$(this).parent().children('ul').show();
		} else {
			$(this).parent().children('ul').hide();
		}
		$('#search_item').focus();
		
    });
	
	
	$('#reset_item').click(function () {
		$('#result_item').text('Item');
	});
	
	
	$('#fixed').click(function () {
		
		$('#menu_item>li').each(function(){
			if ($(this).children().children('li:visible').length == 0 && $(this).children('div').text() == $('#fixed').text()) {
				$(this).children('ul').show();
				$('#search_item').focus();
				//$('#menu_item').scrollTop(0);
				$('#fixed').hide();
			} else if ($(this).children().children('li:visible').length > 0 && $(this).children('div').text() == $('#fixed').text()) {
				$(this).children('ul').hide();
				$('#search_item').focus();
				//$('#menu_item').scrollTop(0);
				$('#menu_item').scrollTop($(this).prevAll().height());
			}
			
		});
		
		$('#search_item').focus();
		
    });
	
	
    $('#search_item').keyup(function () {
        var input_content = $.trim($(this).val());
        if (!input_content) {
			$('#menu_item>li').show();
			$('#menu_item>li>ul>li').show();
			$('#menu_item').scrollTop(0);
			$('#fixed').hide();
        } else {
			
			$('#menu_item>li').each(function(){
				
				if (!$(this).is(':visible')) {
					$(this).show();
				}
				if($(this).children('ul:visible').length == 0) {
				
					$(this).children('ul').show();
					
					$(this).children().children('li').each(function(){
						if($(this).html().toLowerCase().search(new RegExp(input_content.toLowerCase())) !== -1)
							$(this).show();
						else
							$(this).hide();
					});
					
					if($(this).children().children('li:visible').length == 0) {
						$(this).children('ul').hide();
						$(this).hide();
					} else if($(this).children().children('li:visible').length > 0) {
						$(this).children('ul').hide();
					}
					
				} else if($(this).children('ul:visible').length > 0) {
				
					$(this).children().children('li').each(function(){
						if($(this).html().toLowerCase().search(new RegExp(input_content.toLowerCase())) !== -1)
							$(this).show();
						else
							$(this).hide();
					});
					
					if($(this).children().children('li:visible').length == 0) {
						$(this).hide();
					}
				}
			});
			
			
			$('#menu_item').scrollTop(0);
			$('#fixed').hide();
			$('#fixed').removeAttr('width');
			$('#fixed').css('width', '239px');
			
			if($('#menu_item').children('li:visible').length == 0) {
				$('#no_results').show();
				$('#no_results').text('No Results Match "' + $('#search_item').val() + '"');
			} else {
				$('#no_results').hide();
			}
        }
    });
		
	
	$('#button_reset_all').click(function () {
		/*id_category = 0;
		id_paint = 0;
		id_rarity = 0;
		$('#result_paint').removeClass();
		$('#result_rarity').removeClass();
		$('#result_category').text('Category');
		$('#result_paint').text('Paint');
		$('#result_rarity').text('Rarity');*/
		
		
		
		$('#name_item').text('Choose Item');
		$('#category_item img').attr('src', 'images/blank.png');
		$('#paint_item').empty();
		$('#result_item').removeClass();
		$('#image img').attr('src', 'https://rocket-league.com/content/media/items/avatar/220px/bd07f7dd801478026052.png');
		$('#search_item').val('');
		$('#search_item').focus();
		$('#menu_item').scrollTop(0);
		name_item = "";
		name_table = "";
		selectCategory(0);
		selectRarity(0);
		selectPaint(1);
	});	
	
	$('#menu_sort').hover( function(){
		$('#sort_list').show();
	}, function() {
		$('#sort_list').hide();
	});
	
	// $('#header_center').hover( function(){
		// $('#header_items_category').show();
	// }, function() {
		// $('#header_items_category').hide();
	// });
	
	// $('#header_login').mouseout( function() {
		// $('#email_connexion').blur();
		// $('#password_connexion').blur();
	// });
	
	$('#header_login').hover( function() {}, function() {
		$('#email_connexion').blur();
		$('#password_connexion').blur();
	});
	
});

