function buscarPromo(){
	var texto = $('#buscador').val();
	$.ajax({
		data : {texto : texto},
		url  : 'Distis/buscarPromo',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	$('.line').html('');
	    	$('.line').append(data.promociones);
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}
function buscarPromocion(e){
	if(e.keyCode === 13){
		e.preventDefault();
		buscarPromo();
    }
}
function filtroPromociones(){
	var filtro = $('#filtro').val();
	if(filtro != ''){
		$('#title_filtro').text(filtro);
	}else {
		$('#title_filtro').text('Filter');
	}
	$.ajax({
		data : {filtro : filtro},
		url  : 'Distis/filtroPromociones',
		type : 'POST'
	}).done(function(data){
		try{
		    data = JSON.parse(data);
		    if(data.error == 0){
		    	$('.line').html('');
		    	$('.line').append(data.promociones);
		    }else {
		    	return;
		    }
	  	}catch(err){
	    	msj('error',err.message);
	  	}
	});
}
function cerrarCesion(){
	$.ajax({
		url  : 'Distis/cerrarCesion',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	location.href = 'Login';
        }else {
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}