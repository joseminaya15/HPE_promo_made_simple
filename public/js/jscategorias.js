function getTablaPromos(cate){
	var categoria = $('#id_cate').val();
	if(cate == null || cate == ''){
		categoria = cate;
	}
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
	$('#tableCategoria').find('tbody').find('tr').css('display','');
}