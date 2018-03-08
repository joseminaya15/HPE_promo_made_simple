function crearNuevaPromocion(){
	var tipo 			   = $('#tipo').val(); 
	var codigo 	 		   = $('#codigo').val();
	var titulo 	 		   = $('#titulo').val();
	var fecha 	 		   = $('#fecha').val();
	var objetivo_comercial = $('#objetivo_comercial').val();
	var noticia			   = $('#noticia').val();
	var ciudades		   = $('#ciudades').val();
	var condiciones		   = $('#condiciones').val();
	var imagen			   = $('#imagen').val();
	var last_units		   = $('#last_units').val();
	var deal_number		   = $('#deal_number').val();
	if(tipo == null || tipo == ''){
		msj('error', 'Ingrese el tipo de producto');
		return;
	}
	if(codigo == null || codigo == ''){
		msj('error', 'Ingrese el código del producto');
		return;
	}
	if(titulo == null || titulo == ''){
		msj('error', 'Ingrese el título de la oferta');
		return;
	}
	if(fecha == null || fecha == ''){
		msj('error', 'Ingrese la fecha de expiración del producto');
		return;
	}
	if(objetivo_comercial == null || objetivo_comercial == ''){
		msj('error', 'Ingrese el objetivo comercial de la oferta');
		return;
	}
	if(noticia == null || noticia == ''){
		msj('error', 'Ingrese la notovedad que tiene');
		return;
	}
	if(ciudades == null || ciudades == ''){
		msj('error', 'Ingrese las ciudades a las que abarca');
		return;
	}
	if(condiciones == null || condiciones == ''){
		msj('error', 'Ingrese las condiciones de la oferta');
		return;
	}
	if(imagen == null || imagen == ''){
		msj('error', 'Seleccione una imagen');
		return;
	}
	if(deal_number == null || deal_number == ''){
		msj('error', 'Ingrese el Deal number');
		return;
	}
	$('.button-confirmar').prop("disabled", true);
	$.ajax({
		data : {tipo 			   : tipo,
				codigo 	    	   : codigo,
				titulo 		  	   : titulo,
				fecha 			   : fecha,
				objetivo_comercial : objetivo_comercial,
				noticia 		   : noticia,
				ciudades 		   : ciudades,
				condiciones 	   : condiciones,
				imagen       	   : imagen,
				last_units         : last_units,
				deal_number        : deal_number},
		url  : 'admin/guardarDatos',
		type : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
				limpiarCampos();
        	}else{
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}
function soloLetras(e){
    key 	   	   = e.keyCode || e.which;
    tecla 	   	   = String.fromCharCode(key).toLowerCase();
    letras     	   = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales 	   = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }
     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
 function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    patron 		=/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function limpiarCampos(){
	$('#tipo').val(null); 
	$('#codigo').val(null);
	$('#titulo').val(null);
	$('#fecha').val(null);
	$('#objetivo_comercial').val(null);
	$('#noticia').val(null);
	$('#ciudades').val(null);
	$('#condiciones').val(null);
	$('#imagen').val(null);
	$('#last_units').val(null);
	$('#deal_number').val(null);
}
function cerrarCesion(){
	$.ajax({
		url  : 'Formulario/cerrarCesion',
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
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        var name_file = input.files[0].name;
        $('#nombre_img').val(name_file);
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imgInp").change(function(){
    readURL(this);
});