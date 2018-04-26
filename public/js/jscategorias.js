function getTablaPromos(){
	var categoria = $('#id_cate').val();
	$('#inputSearch').val('');
	$.ajax({
		data : {categoria : categoria},
		url  : 'categorias/getCategorias',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	$('#promociones').html('');
	    	$('#promociones').append(data.promociones);
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}
function inputActive(id){
	var lenghtInput = $('#'+id).val();
	if(lenghtInput.length > 0){
		$('#buttonClear').css('visibility','visible')
	}else{
		$('#buttonClear').css('visibility','hidden')
	}
}
$('#inputSearch').on('keyup',function() {
	$('#tableCategoria_filter').find('label').find('input').addClass('name');
	$('.name').trigger('keyup');
});
function clearInput(){
	$('#inputSearch').val('');
	buscarPromo('inputSearch');
}
function buscarPromo(datos){
	var promo 	  = $('#namePromocion').text();
	var categoria = $('#'+datos).parents().find('.filter-categoria').find('.filter-option').text();
	if(promo == 'Server & Storage Flex Attach' && categoria == 'Discos'){
		categoria = 'DISCOS FLEX ATTACH';
	}
	var texto = $('#inputSearch').val();
	$.ajax({
		data : {texto 	 : texto,
				sub_cate : categoria},
		url  : 'categorias/buscarPromo',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	$('#promociones').html('');
	    	$('#promociones').append(data.promociones);
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}
function cerrarCesion(){
	$.ajax({
		url  : 'Categorias/cerrarCesion',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        	location.href = 'Home';
	        }else {
	        	return;
	        }
		}catch(err){
			msj('error',err.message);
		}
	});
}
function verificarDatos(e){
	buscarPromo('inputSearch');
}
function goToCategorias(id){
	var idCategoria = $("#"+id);
	var name_cate   = idCategoria.text();
	let openModal   = sessionStorage.getItem('OPEN_MODAL');
	sessionStorage.setItem('OPEN_CATEGORIA', id);
	sessionStorage.setItem('NAME_CATEGORIA', name_cate);
	if(openModal && openModal == '1') {
        $("#ModalLogin").modal('show');
    }
    else{
        $("#ModalLogin").modal('hide');
        sessionStorage.removeItem('OPEN_MODAL');
		location.href = 'Categorias';
    }
    $.ajax({
		data : {cate : name_cate},
		url  : 'Home/goToCategorias',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        }else {
	        	return;
	        }
		}catch(err){
			msj('error',err.message);
		}
	});
}