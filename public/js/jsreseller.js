function buscarPromocion(e){
	if(e.keyCode === 13){
		e.preventDefault();
		var texto = $('#buscador').val();
		$.ajax({
			data : {texto : texto},
			url  : 'Resellers/buscarPromocion',
			type : 'POST'
		}).done(function(data){
			try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        	//location.href = 'Login';
	        }else {
	        	return;
	        }
	      }catch(err){
	        msj('error',err.message);
	      }
		});
    }
}