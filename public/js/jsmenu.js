$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
})

function showFilter(){
	$('.header-search').toggleClass('showfilter');
	$('.cabecera').find('button').find('i').toggleClass('mdi-close');
}
function initMaskInputs() {
	for(var i = 0; i < arguments.length; i++) {
		var text	= arguments[i];
		var input	= $('#'+text);
		input.mask('00/00/0000');
	}
}