$('#principal .owl-carousel').owlCarousel({
	lazyLoad : true,
	animateOut: 'fadeOut',
	animateIn: 'fadeIn',
	responsive : {
		0 : {
			items : 1
		}
	},
	navigation : false,
	nav : false,
	loop : true,
	autoplay : true,
	autoplayTimeout : 5000
});

function goToCategorias(id){
	var idCategoria = $("#"+id);
	idCategoria.attr({
		href: 'Categorias',
		target: '_blank'
	});
	sessionStorage.setItem('OPEN_CATEGORIA', id);
}