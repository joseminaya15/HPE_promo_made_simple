function buscarPromo(){
	var texto = $('#buscador').val();
	if(texto == null || texto == ''){
		return;
	}
	$.ajax({
		data : {texto : texto},
		url  : 'Resellers/buscarPromocion',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	$('#buscador').val("");
	    	$('.promociones').html('');
	    	$('.promociones').append(data.promociones);
	    }else {
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