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
	$('#buttonClear').css('visibility','hidden');
	buscarPromo('inputSearch');
}
function buscarPromo(datos){
	var promo = $('#namePromocion').text();
	var texto = $('#inputSearch').val();
	$.ajax({
		data : {texto : texto},
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
	var openModal   = sessionStorage.getItem('OPEN_MODAL');
	sessionStorage.setItem('OPEN_CATEGORIA', id);
	sessionStorage.setItem('NAME_CATEGORIA', name_cate);
    $.ajax({
		data : {cate : name_cate},
		url  : 'Categorias/goToCategorias',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        	if(openModal && openModal == '1') {
			        $("#ModalLogin").modal('show');
			    }
			    else{
			        $("#ModalLogin").modal('hide');
			        sessionStorage.removeItem('OPEN_MODAL');
			    }
	        	location.href = 'Categorias';
	        }else {
	        	return;
	        }
		}catch(err){
			msj('error',err.message);
		}
	});
}
function openModalTerminos(id){
	var modal = $('#ModalTerminos');
	modal.find('#E'+id+'Terminos').css("display","block");
	modal.modal('toggle');
}
function abrirModal(){
    $.ajax({
		//data : {cate : name_cate},
		url  : 'Categorias/abrirModal',
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