$(window).load(function() {
    $("#ModalLogin").modal('show');
});
$('#principal .owl-carousel').owlCarousel({
	lazyLoad : true,
	animateOut: 'fadeOut',
	animateIn: 'fadeIn',
	responsive : {
		0 : {
			items : 1
		}
	},
	navigation : false,
	nav : false,
	loop : true,
	autoplay : true,
	autoplayTimeout : 5000
});
function goToCategorias(id){
	var idCategoria = $("#"+id);
	var name_cate   = idCategoria.find('h2').text();
	idCategoria.attr({
		href: 'Categorias',
		target: '_blank'
	});
	sessionStorage.setItem('OPEN_CATEGORIA', id);
	sessionStorage.setItem('NAME_CATEGORIA', name_cate);
}
function cerrarCesion(){
	$.ajax({
		url  : 'Principal/cerrarCesion',
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
function ingresar(){
	var usuario  = $('#usuario').val();
	var password = $('#password').val();
  if($('#remember').is(':checked') == true){
    sessionStorage.setItem('CHECK', '1');
    sessionStorage.setItem('USERNAME', usuario);
    sessionStorage.setItem('PASS', password);
  }else{
    sessionStorage.setItem('CHECK', '0');
  }
	if(usuario == null || usuario == ''){
    msj('error', 'Ingrese su usuario');
    return;
  }
	if(password == null || password == ''){
    msj('error', 'Ingrese su contraseña');
		return;
	}
	$.ajax({
		data : {usuario  : usuario,
				    password : password},
		url  : 'Login/ingresar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	$('#usuario').val("");
        	$('#password').val("");
          //location.href = data.redirect;
        }else {
          if(data.pass == null || data.pass == '') {
            msj('error', 'alguno de sus datos son incorrectos');
          }else {
            msj('error', data.pass);
          }
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function registrar() {
	var nombre 	 = $('#nombre').val();
	var correo   = $('#correo').val();
	var password = $('#password').val();
	var pais 	 = $('#pais').val();
	var tipo_user = 1;
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
	/*if(textUser == 'Resellers'){
		tipo_user = 1;
	}else if(textUser == 'Distis'){
		tipo_user = 2;
	}*/
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
			/*setTimeout(function(){ 
				location.href = "Login";
			}, 1500);*/
        }else {
			msj('error', 'Su usuario o contraseña son incorrectos');
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}