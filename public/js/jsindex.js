function crearNuevaPromocion(){
	//var tipo 			   = $('#tipo').val(); 
	//var codigo 	 	   = $('#codigo').val();
	var titulo 	 		   = $('#titulo').val();
	var fecha 	 		   = $('#fecha').val();
	var objetivo_comercial = $('#objetivo_comercial').val();
	var tipo_oferta		   = $('#tipo_oferta').val();
	var noticia			   = $('#noticia').val();
	var ciudades		   = $('#ciudades').val();
	var condiciones		   = $('#condiciones').val();
	//var imagen			   = $('#imagen').val();
	var last_units		   = $('#last_units').val();
	if(tipo_oferta == 'Distis'){
		var deal_number	= $('#deal_number').val();
	}else {
		var deal_number = '';
	}
	/*if(tipo == null || tipo == ''){
		msj('error', 'Ingrese el tipo de producto');
		return;
	}
	if(codigo == null || codigo == ''){
		msj('error', 'Ingrese el código del producto');
		return;
	}*/
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
	if(tipo_oferta == null || tipo_oferta == ''){
		msj('error', 'Ingrese el tipo de oferta');
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
	$('.button-guardar').prop("disabled", true);
	$.ajax({
		data : {/*tipo 			   : tipo,
				codigo 	    	   : codigo,*/
				titulo 		  	   : titulo,
				fecha 			   : fecha,
				objetivo_comercial : objetivo_comercial,
				tipo_oferta		   : tipo_oferta,
				noticia 		   : noticia,
				ciudades 		   : ciudades,
				condiciones 	   : condiciones,
				//imagen       	   : imagen,
				last_units         : last_units,
				deal_number        : deal_number},
		url  : 'Formulario/guardarDatos',
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
var cont_s = 1;
var cont_b = 1;
function agregarSale(){
	$(".sales").append('<div class="col-md-12 mdl-input-group">'+
							'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
						       '<input class="mdl-textfield__input" type="text" id="sale'+cont_s+'">'+
	                           '<label class="mdl-textfield__label" for="sale'+cont_s+'">Sales</label>'+
                       		'</div>'+
                       '</div>');
	cont_s++;
	componentHandler.upgradeAllRegistered();
}
function agregarBU(){
	$(".bu").append('<div class="col-md-12 mdl-input-group">'+
					 	'<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
					 		'<input class="mdl-textfield__input" type="text" id="bu'+cont_b+'">'+
                     		'<label class="mdl-textfield__label" for="bu'+cont_b+'">BU</label>'+
                     	'</div>'+
                     '</div>');
	cont_b++;
	componentHandler.upgradeAllRegistered();
}
var array_sales = [];
var array_bu 	= [];
function guardarContactos(){
	$(".sales").find('input:text')
	.each(function() {
	    if($(this).val() == '' || $(this).val() == null){
	    	$(this).css('border-color','red');
	    }else {
	    	array_sales.push($(this).val());
	    	$(this).val("");
	    }
	});
	$(".bu").find('input:text')
	.each(function() {
	    if($(this).val() == '' || $(this).val() == null){
	    	$(this).css('border-color','red');
	    }else {
	    	array_bu.push($(this).val());
	    	$(this).val("");
	    }
	});
	/*console.log(array_sales);
	console.log(array_bu);*/
}
function mostrarCampo(){
	var tipo_oferta	= $('#tipo_oferta').val();
	if(tipo_oferta == 'Distis'){
		$('.deal_number').removeClass("hidden");
	}else {
		$('.deal_number').addClass("hidden");
	}
}
function actualizarPromocion(){
	//var tipo 			   = $('#tipo').val(); 
	//var codigo 	 		   = $('#codigo').val();
	var titulo 	 		   = $('#titulo').val();
	var fecha 	 		   = $('#fecha').val();
	var objetivo_comercial = $('#objetivo_comercial').val();
	var tipo_oferta		   = $('#tipo_oferta').val();
	var noticia			   = $('#noticia').val();
	var ciudades		   = $('#ciudades').val();
	var condiciones		   = $('#condiciones').val();
	//var imagen			   = $('#imagen').val();
	var last_units		   = $('#last_units').val();
	if(tipo_oferta == 'Distis'){
		var deal_number	= $('#deal_number').val();
	}else {
		var deal_number = '';
	}
	/*if(tipo == null || tipo == ''){
		msj('error', 'Ingrese el tipo de producto');
		return;
	}
	if(codigo == null || codigo == ''){
		msj('error', 'Ingrese el código del producto');
		return;
	}*/
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
	if(tipo_oferta == null || tipo_oferta == ''){
		msj('error', 'Ingrese el tipo de oferta');
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
	$('.button-guardar').prop("disabled", true);
	$.ajax({
		data : {/*tipo 			   : tipo,
				codigo 	    	   : codigo,*/
				titulo 		  	   : titulo,
				fecha 			   : fecha,
				objetivo_comercial : objetivo_comercial,
				tipo_oferta		   : tipo_oferta,
				noticia 		   : noticia,
				ciudades 		   : ciudades,
				condiciones 	   : condiciones,
				//imagen       	   : imagen,
				last_units         : last_units,
				deal_number        : deal_number},
		url  : 'Formulario/actualizarPromocion',
		type : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
				limpiarCampos();
				msj('error', 'Su promoción se actualizó correctamente');
        	}else{
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}