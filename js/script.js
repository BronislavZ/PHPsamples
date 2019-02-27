jQuery('document').ready(function(){
	jQuery('body').append('<a href="http://gogole.com">Перейти в Гугл!</a>');
	jQuery('div').remove();
	var p_clone;
	p_clone = jQuery('p').clone();
	jQuery('body').append(p_clone);
});

