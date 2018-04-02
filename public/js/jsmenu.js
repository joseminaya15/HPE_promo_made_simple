$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
})

function showFilter(){
	$('.header-search').toggleClass('showfilter');
	$('.cabecera').find('button').find('i').toggleClass('mdi-close');
}