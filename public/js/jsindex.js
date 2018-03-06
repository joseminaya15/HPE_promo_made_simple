function solicitarEstimacion(){
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
	var contact_sales	   = $('#contact_sales').val();
	var contact_bu		   = $('#contact_bu').val();
	if(tipo == '' && codigo == '' && titulo == '' && fecha == '' && objetivo_comercial == '' && noticia == '' && ciudades == '' && condiciones == '' 
		&& imagen == '' && last_units == '' && deal_number == '' && contact_sales == '' && contact_bu == ''){
		validarCampos();
	}
	if(nombre_completo == null || nombre_completo == ''){
		msj('error', 'Ingrese su nombre completo');
		return;
	}
	if(empresa == null || empresa == ''){
		msj('error', 'Ingrese su empresa');
		return;
	}
	if(email == null || email == ''){
		msj('error', 'Ingrese su email');
		return;
	}
	if (!validateEmail(email)){
		$('#email').css('border-color','red');
		return;
	}
	if(pais == null || pais == ''){
		msj('error', 'Ingrese su pa&iacute;s');
		return;
	}
	if(cargo == null || cargo == ''){
		msj('error', 'Ingrese su cargo');
		return;
	}
	if(telefono == null || telefono == ''){
		msj('error', 'Ingrese su tel&eacute;fono');
		return;
	}
	if(relacion == null || relacion == ''){
		msj('error', 'Seleccione cu&aacute;l es su relaci&oacute;n con SAP');
		return;
	}
	if(c_email == true){
		contacto = 1;
	}else if(c_telefono == true){
		contacto = 2;
	}else if(c_ambos == true){
		contacto = 3;
	}
	if(contacto == null || contacto == ''){
		msj('error', 'Seleccione el medio por el que quiere ser contactado');
		  return;
	}
	if(terminos == true){
		term_cond = 1
	}else{
		term_cond = 0;
	}
	if(terminos == false){
		msj('error', 'Acepte los t&eacute;rminos y condiciones');
		return;
	}
	$('.button-confirmar').prop("disabled", true);
	$.ajax({
		data : {nombre_completo : nombre_completo,
				empresa 	    : empresa,
				email 		  	: email,
				pais 			: pais,
				cargo 		  	: cargo,
				telefono 		: telefono,
				relacion 		: relacion,
				contacto 		: contacto,
				term_cond       : term_cond},
		url  : 'admin/guardarDatos',
		type : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
				if(confirmar == 1){
					limpiarCampos();
					enviarGracias();
				}
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