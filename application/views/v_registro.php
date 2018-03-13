<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="Registro de Oportunidades DCN">
        <meta name="keywords"               content="Registro de Oportunidades DCN">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Febrero 15, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>HPE promo made simple</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <section>
            <div class="header">
                <div class="mdl-container row">
                    <div class="col-xs-12">
                        <div class="col-xs-6 text-left p-0">
                            <img src="<?php echo RUTA_IMG?>logo/logo_header.png">
                        </div>
                        <div class="col-xs-6 text-right p-0">
                            <p>Promos Made Simple</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center-login">
                <div class="mdl-card mdl-card-login mdl-card-register">
                    <div class="mdl-card__supporting-text">
                        <div class="col-md-7 col-sm-6">
                            <div class="col-xs-12 form-group mdl-input">
                                <label for="nombre">Full Name</label>
                                <input type="text" id="nombre" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="col-xs-12 form-group mdl-input">
                                <label for="correo">Email</label>
                                <input type="text" id="correo" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="col-xs-12 p-0 mdl-card__actions">
                                <p>Type of user</p>
                                <div class="button-user">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Distris</button>
                                </div>
                                <div class="button-user">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Resellers</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <div class="col-xs-12 form-group mdl-input">
                                <label>Country</label>
                                <select class="selectpicker">
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="col-xs-12 form-group mdl-input">
                                <label for="password">Password</label>
                                <input type="text" id="password" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="col-xs-12 p-0 mdl-card__actions text-right">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-register"><i class="mdi mdi-arrow_forward"></i>Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
    </body>
</html>