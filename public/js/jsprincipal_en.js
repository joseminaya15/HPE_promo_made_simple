$(window).load(function() {
    $("#ModalLanguage").modal('show');
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
	var idCategoria  = $("#"+id);
	var name_cate    = idCategoria.find('h2').attr('data-id');
	var openModal    = sessionStorage.getItem('OPEN_MODAL');
	sessionStorage.setItem('OPEN_CATEGORIA', id);
	sessionStorage.setItem('NAME_CATEGORIA', name_cate);
	$("#ModalLogin").modal('show');
    $.ajax({
		data : {cate : name_cate},
		url  : 'Home/goToCategorias',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        	if(openModal && openModal == '1') {
			        $("#ModalLogin").modal('show');
			    }
			    else{
			        $("#ModalLogin").modal('hide');
			        sessionStorage.removeItem('OPEN_MODAL');
					location.href = 'Categorias';
			    }
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
		url  : 'Home/cerrarCesion',
		type : 'POST'
	}).done(function(data){
		try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	        	location.href = 'Home';
	        	$('.menu_header').css('display','none');
	        	$('.search-filter.home').css('display','none');
	        	sessionStorage.setItem('OPEN_MODAL2', '2');
	        	$('#idioma_change').css('display', 'block');
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
		url  : 'Home/ingresar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	$('#usuario').val("");
        	$('#password').val("");
        	$("#ModalLogin").modal('hide');
        	$('#idioma_change').css('display', 'none');
        	location.href = 'Home';
        	sessionStorage.setItem('OPEN_MODAL2', '1');
        	sessionStorage.removeItem('OPEN_MODAL');
			$('.menu_header').css('display','flex');
			$('.search-filter.home').css('display','flex');
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
	var nombre 	  = $('#nombre').val();
	var correo    = $('#correo').val();
	var passRegister  = $('#passRegister').val();
	var pais 	  = $('#pais').val();
	var tipo_user = 1;
	if(nombre == '' && correo == '' && passRegister == ''){
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
	if(passRegister == ''){
		msj('error', 'Ingrese su contraseña');
		return;
	}
	$.ajax({
		data : {nombre 	      : nombre,
				usuario       : correo,
				passRegister  : passRegister,
				pais 	      : pais,
				tipo_user     : tipo_user},
		url  : 'Home/registrar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
        	$('#nombre').val("");
			$('#passRegister').val("");
			$('#correo').val("");
			$('#pais').val("0");
			$('.selectpicker').selectpicker('refresh');
			msj('error', 'Se registró correctamente');
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
function verificarDatos(e){
	if(e.keyCode === 13){
		e.preventDefault();
		ingresar();
    }
}
function closeModal(){
	sessionStorage.setItem('OPEN_MODAL', '1');
	$("#ModalLogin").modal('hide');
	$('#usuario').val("");
	$('#password').val("");
	$('#nombre').val("");
	$('#passRegister').val("");
	$('#correo').val("");
	$('#pais').val("0");
}
function buscarPromo(datos){
	var texto = $('#inputSearch').val();
	if(texto == null || texto == ''){
		$('#cardsCates').css("display", "block");
	    $('#tablaCates').css("display", "none");
	    return;
	}
	$.ajax({
		data : {texto : texto},
		url  : 'Home/buscarPromo',
		type : 'POST'
	}).done(function(data){
	  try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	$('#cardsCates').css("display", "none");
	    	$('#tablaCates').css("display", "block");
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
function clearInput(){
	$('#inputSearch').val('');
	$('#cardsCates').css("display", "block");
	$('#tablaCates').css("display", "none");
	$('#buttonClear').css('visibility','hidden');
	$('.header--principal').removeClass('active');
}
var cates = null;
function triggerCategoria(id1){
	goToCategorias(id1);
}
function showSearch(){
	$('.header--principal').addClass('active');
}
var cates = null;
function directPromos(id_cates){
	cates = 'p'+id_cates;
	goToCategorias(cates);
}