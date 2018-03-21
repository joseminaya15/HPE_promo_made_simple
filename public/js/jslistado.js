function editarPromocion(Id){
	$.ajax({
		data : {Id_promo : Id},
		url  : 'Listado/editarPromocion',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	location.href = 'Formulario';
        }else {
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
var id_promo = null;
function modalEliminar(row, id){
	id_promo = id;
	var titulo = $(row).parent().parent().find('.titulo_promo').html();
	$('#titulo').text("¿Está seguro de que desea eliminar la promocion de "+titulo+"?");
	modal('ModalBorrarOferta');
}
function eliminarPromo(){
	$.ajax({
		data : {Id_promo : id_promo},
		url  : 'Listado/eliminarPromo',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	//location.href = 'Formulario';
        	$('#tabla_promociones').html('');
        	$('#tabla_promociones').append(data.promociones);
        	modal('ModalBorrarOferta');
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
        url  : 'Listado/cerrarCesion',
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