
( function( $ ) {
$( document ).ready(function() {


/** MENU EFFECTS - Control the submenu effects */
$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
	$('#cssmenu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});

/** BUTTON ACTIVE - Make the button change to a active style according to its id using the url*/


	var url = window.location.href;		
	var menu_button_id = "menu_";

	if(url.indexOf('about') != -1){
		menu_button_id += 'about';
	} else if(url.indexOf('student') != -1){
		menu_button_id += 'student';
	} else if(url.indexOf('donate') != -1){
		menu_button_id += 'donate';
	} else if(url.indexOf('blog') != -1){
		menu_button_id += 'blog';
	} else if(url.indexOf('newsletter') != -1){
		menu_button_id += 'newsletter';
	} else if(url.indexOf('events') != -1){
		menu_button_id += 'events';
	} else if(url.indexOf('volunteers') != -1){
		menu_button_id += 'volunteers';
	} else {
		menu_button_id += 'home';
	}
	
	$('#' + menu_button_id).closest( "li" ).addClass("active");


});

} )( jQuery );

