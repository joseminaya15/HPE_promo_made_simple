function editarPromocion(Id){
    $('#tabCarga').trigger('click');
    componentHandler.upgradeAllRegistered();
	$.ajax({
		data : {Id_promo : Id},
		url  : 'Listado/editarPromocion',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
            var combo = '';
            var comboOfe = '';
            var checked = '';
            $('#pais').val(data.pais);
            if(data.tp_user == 'Resellers'){
                combo = '<select class="selectpicker" id="usuario" onchange="mostrarCampo()" style="display: block !important">'+
                            '<option value="Resellers">Resellers</option>'+
                            '<option value="Distis">Distis</option>'+
                        '</select>';
                componentHandler.upgradeAllRegistered();
                $("#divUser").html('');
                $("#divUser").append(combo);
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                    $('select').selectpicker('mobile');
                } else {
                    $('select').selectpicker();
                }
                $('#deal_number').prop("disabled", true);
            }else {
                combo = '<select class="selectpicker" id="usuario" onchange="mostrarCampo()" style="display: block !important">'+
                            '<option value="Distis">Distis</option>'+
                            '<option value="Resellers">Resellers</option>'+
                        '</select>';
                componentHandler.upgradeAllRegistered();
                $("#divUser").html('');
                $("#divUser").append(combo);
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                    $('select').selectpicker('mobile');
                } else {
                    $('select').selectpicker();
                }
            }
            if(data.tipo == 'Value'){
                comboOfe = '<select class="selectpicker" id="oferta" style="display: block !important">'+
                            '<option value="Value">Value</option>'+
                            '<option value="Volumen">Volumen</option>'+
                        '</select>';
                componentHandler.upgradeAllRegistered();
                $("#divOferta").html('');
                $("#divOferta").append(comboOfe);
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                    $('select').selectpicker('mobile');
                } else {
                    $('select').selectpicker();
                }
            }else {
                comboOfe = '<select class="selectpicker" id="oferta" style="display: block !important">'+
                            '<option value="Volumen">Volumen</option>'+
                            '<option value="Value">Value</option>'+
                        '</select>';
                componentHandler.upgradeAllRegistered();
                $("#divOferta").html('');
                $("#divOferta").append(comboOfe);
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                    $('select').selectpicker('mobile');
                } else {
                    $('select').selectpicker();
                }
            }
            //radio
            if(data.limit == 1){
                checked = '<div class="radio">'+
                                '<label><input type="radio" name="optradio" value="si">Sí</label>'+
                            '</div>'+
                            '<div class="radio">'+
                                '<label><input type="radio" name="optradio" value="no" checked>No</label>'+
                            '</div>';
                componentHandler.upgradeAllRegistered();
                $("#chckRadio").html('');
                $("#chckRadio").append(checked);
            }else {
                checked = '<div class="radio">'+
                                '<label><input type="radio" name="optradio" value="si" checked>Sí</label>'+
                            '</div>'+
                            '<div class="radio">'+
                                '<label><input type="radio" name="optradio" value="no">No</label>'+
                            '</div>';
                componentHandler.upgradeAllRegistered();
                $("#chckRadio").html('');
                $("#chckRadio").append(checked);
            }
            $('#titulo').val(data.titulo);
            $('#fecha').val(data.fecha);
            $('#objetivo_comercial').val(data.objetivo);
            $('#noticia').val(data.new);
            $('#condiciones').val(data.condi);
            $('#btnGuardar').addClass('hidden');
            $('#btnActualizar').removeClass('hidden');
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
function abrirGaleria(){
    modal('ModalGaleria');
}
function crearNuevaPromocion(){
    var pais               = $('#pais').val(); 
    var usuario            = $('#usuario').val();
    var oferta             = $('#oferta').val();
    var titulo             = $('#titulo').val();
    var fecha              = $('#fecha').val();
    var objetivo_comercial = $('#objetivo_comercial').val();
    var noticia            = $('#noticia').val();
    var condiciones        = $('#condiciones').val();
    var units              = $( "input:checked" ).val();
    var last_units         = "";
    if(usuario == 'Distis'){
        var deal_number = $('#deal_number').val();
    }else {
        var deal_number = '';
    }
    if(pais == null || pais == ''){
        msj('error', 'Ingrese su país');
        return;
    }
    if(usuario == null || usuario == ''){
        msj('error', 'Ingrese su tipo de usuario');
        return;
    }
    if(oferta == null || oferta == ''){
        msj('error', 'Ingrese el tipo de oferta');
        return;
    }
    if(units == 'si'){
        last_units = 0;
    }else {
        last_units = 1;
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
    if(condiciones == null || condiciones == ''){
        msj('error', 'Ingrese las condiciones de la oferta');
        return;
    }
    $('.button-guardar').prop("disabled", true);
    $.ajax({
        data : {pais               : pais,
                usuario            : usuario,
                oferta             : oferta,
                titulo             : titulo,
                fecha              : fecha,
                objetivo_comercial : objetivo_comercial,
                noticia            : noticia,
                condiciones        : condiciones,
                last_units         : last_units,
                deal_number        : deal_number},
        url  : 'Listado/guardarDatos',
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
    key            = e.keyCode || e.which;
    tecla          = String.fromCharCode(key).toLowerCase();
    letras         = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales     = "8-37-39-46";
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
    patron      =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function limpiarCampos(){
    $('#pais').val(null); 
    $('#usuario').val(null);
    $('#oferta').val(null);
    $('#titulo').val(null);
    $('#fecha').val(null);
    $('#objetivo_comercial').val(null);
    $('#noticia').val(null);
    $('#condiciones').val(null);
    $('#deal_number').val(null);
}
function mostrarCampo(){
    var tipo_oferta = $('#usuario').val();
    if(tipo_oferta == 'Distis'){
        $('.deal_number').removeClass("hidden");
    }else {
        $('.deal_number').addClass("hidden");
    }
}
function actualizarPromocion(){
    var pais               = $('#pais').val(); 
    var usuario            = $('#usuario').val();
    var oferta             = $('#oferta').val();
    var titulo             = $('#titulo').val();
    var fecha              = $('#fecha').val();
    var objetivo_comercial = $('#objetivo_comercial').val();
    var noticia            = $('#noticia').val();
    var condiciones        = $('#condiciones').val();
    var units              = $( "input:checked" ).val();
    var last_units         = "";
    if(usuario == 'Distis'){
        var deal_number = $('#deal_number').val();
    }else {
        var deal_number = '';
    }
    if(pais == null || pais == ''){
        msj('error', 'Ingrese su país');
        return;
    }
    if(usuario == null || usuario == ''){
        msj('error', 'Ingrese su tipo de usuario');
        return;
    }
    if(oferta == null || oferta == ''){
        msj('error', 'Ingrese el tipo de oferta');
        return;
    }
    if(units == 'si'){
        last_units = 0;
    }else {
        last_units = 1;
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
    if(condiciones == null || condiciones == ''){
        msj('error', 'Ingrese las condiciones de la oferta');
        return;
    }
    $('.button-guardar').prop("disabled", true);
    $.ajax({
        data : {pais               : pais,
                usuario            : usuario,
                oferta             : oferta,
                titulo             : titulo,
                fecha              : fecha,
                objetivo_comercial : objetivo_comercial,
                noticia            : noticia,
                condiciones        : condiciones,
                last_units         : last_units,
                deal_number        : deal_number},
        url  : 'Listado/actualizarPromocion',
        type : 'POST'
    }).done(function(data){
        try{
            data = JSON.parse(data);
            if(data.error == 0){
                limpiarCampos();
                $('#tabla_promociones').html('');
                $('#tabla_promociones').append(data.promociones);
            }else{
                return;
            }
      } catch (err){
        msj('error',err.message);
      }
    });
}