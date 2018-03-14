function registrar() {
	var nombre 	 = $('#nombre').val();
	var correo   = $('#correo').val();
	var password = $('#password').val();
	var pais 	 = $('#pais').val();
	var tipo_user = null;
	if(nombre == '' && correo == '' && password == ''){
		msj('error', 'Ingrese sus datos');
		return;
	}
	if(nombre == null || nombre == undefined || nombre == ''){
		msj('error', 'Ingrese su nombre');
		return;
	}
	if(correo == ''){
		msj('error', 'Ingrese su correo');
		return;
	}
	if (!validateEmail(correo)){
		msj('error', 'El formato del correo es incorrecto');
		return;
	}
	if(pais == ''){
		msj('error', 'Ingrese su país');
		return;
	}
	if(password == ''){
		msj('error', 'Ingrese su contraseña');
		return;
	}
	if(textUser == 'Resellers'){
		tipo_user = 1;
	}else if(textUser == 'Distris'){
		tipo_user = 2;
	}
	$.ajax({
		data : {nombre 	  : nombre,
				usuario   : correo,
				password  : password,
				pais 	  : pais,
				tipo_user : tipo_user},
		url  : 'registro/registrar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	$('#nombre').val("");
			$('#password').val("");
			$('#correo').val("");
			$('#pais').val("0");
			$('.selectpicker').selectpicker('refresh');
			msj('error', 'Se registró correctamente');
			setTimeout(function(){ 
				location.href = "Login";
			}, 1500);
        }else {
			msj('error', 'Su usuario o contraseña son incorrectos');
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function soloLetras(e){
    key 	     = e.keyCode || e.which;
    tecla 	   = String.fromCharCode(key).toLowerCase();
    letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
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
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
var textUser = null; 
function selectUser(id){
	$('.button-user').find('button').removeClass('userActive');
	var idbutton = $('#'+id);
	idbutton.addClass('userActive');
	var textButton = idbutton.text();
	textUser = textButton;
}