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
var globalID = null;
function inputActive(id){
	var lenghtInput = $('#'+id).val();
	var input  = document.getElementById('inputSearch');
	var table  = document.getElementById('tableCategoria');
	var filter = input.value.toUpperCase();
	var tr     = table.getElementsByTagName("tr");
	if(lenghtInput.length > 0){
		$('#buttonClear').css('visibility','visible')
	}else{
		$('#buttonClear').css('visibility','hidden')
	}
	for (var i = 0; i < tr.length; i++) {
		var td0 = tr[i].getElementsByTagName("td")[0];
		var td2 = tr[i].getElementsByTagName("td")[2];
		if (td0 || td2) {
	  		if (td0.innerHTML.toUpperCase().indexOf(filter) > -1) {
		    	tr[i].style.display = "";
		  	}else if (td2.innerHTML.toUpperCase().indexOf(filter) > -1){
		  		tr[i].style.display = "";
		  	}else {
		    	tr[i].style.display = "none";
		  	}
		}       
	}
}
function clearInput(){


}