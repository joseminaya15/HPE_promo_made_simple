function recover(){
  var usuario  = $('#usuario').val();
  if(usuario == null || usuario == ''){
    msj('error', 'Ingrese su usuario');
    return;
  }
  $.ajax({
    data : {usuario  : usuario},
    url  : 'Recuperar/recover',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          $('#usuario').val("");
          //location.href = data.redirect;
          msj('error', data.msj);
        }else {
          msj('error', data.msj);
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}