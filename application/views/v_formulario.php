<!DOCTYPE html>
<html lang="es">
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
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Brand</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="Promo" target="_blank">Promociones</a></li>
                                <li><a href="#">Cerrar Sesi&oacute;n</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="section">
            <div class="mdl-container">
                <div class="mdl-card mdl-card-listado mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2>Formulario</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><i class="mdi mdi-book"></i></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="titulo" value="<?php echo $titulo == '' ? '' : $titulo; ?>">
                                <label class="mdl-textfield__label" for="titulo">Titulo</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><button class="mdl-button mdl-js-button mdl-button--icon"><i class="mdi mdi-date_range"></i></button></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="fecha" value="<?php echo $fecha == '' ? '' : $fecha; ?>">
                                <label class="mdl-textfield__label" for="fecha">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><i class="mdi mdi-business_center"></i></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="objetivo_comercial" value="<?php echo $objetivo_comercial == '' ? '' : $objetivo_comercial; ?>">
                                <label class="mdl-textfield__label" for="objetivo_comercial">Commercial Objetive</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><i class="mdi mdi-business_center"></i></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="noticia" value="<?php echo $noticia == '' ? '' : $noticia; ?>">
                                <label class="mdl-textfield__label" for="noticia">What's New</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><i class="mdi mdi-language"></i></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="ciudades" value="<?php echo $ciudades == '' ? '' : $ciudades; ?>">
                                <label class="mdl-textfield__label" for="ciudades">Countries that apply</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><i class="mdi mdi-grid_on"></i></div>
                            <div class="mdl-select">
                                <select class="selectpicker" title="Tipo de Oferta" id="tipo_oferta" onchange="mostrarCampo();">
                                    <option value="Resellers">Resellers</option>
                                    <option value="Distis">Distis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group deal_number hidden">
                            <div class="mdl-icon"><i class="mdi mdi-grid_on"></i></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="deal_number">
                                <label class="mdl-textfield__label" for="deal_number">Deal Number</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <!-- <div class="mdl-icon"><i class="mdi mdi-people"></i></div> -->
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect button-contact" data-toggle="modal" data-target="#ModalSale">Contacts</button>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <div class="mdl-icon"><i class="mdi mdi-grid_on"></i></div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="condiciones" value="<?php echo $condiciones == '' ? '' : $condiciones; ?>">
                                <label class="mdl-textfield__label" for="condiciones">Conditions</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mdl-input-group">
                            <form enctype="multipart/form-data" method="post" action="Formulario/guardarDatos">
                                <input type="file" name="img_up">
                                <input value="Subir" type="submit">
                            </form>
                        </div>
                    </div>
                    <div class="mdl-card__actions">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" onclick="crearNuevaPromocion()">Guardar</button>
                    </div>
                </div>
            </div>
        </section>
        <!--MODAL-->
        <div class="modal fade" id="ModalSale" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title">
                            <h2>Contacts</h2>
                        </div>
                        <div class="mdl-card__supporting-text text-left">
                            <div class="col-md-12 mdl-input-group">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label sales">
                                    <input class="mdl-textfield__input" type="text" id="sale">
                                    <label class="mdl-textfield__label" for="sale">Sales</label>
                                    <button class="mdl-button mdl-js-button mdl-button--icon" onclick="agregarSale();"><i class="mdi mdi-add"></i>
                                </div>
                            </div>
                            <div class="col-md-12 mdl-input-group">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label bu">
                                    <input class="mdl-textfield__input" type="text" id="bu">
                                    <label class="mdl-textfield__label" for="bu">BU</label>
                                    <button class="mdl-button mdl-js-button mdl-button--icon" onclick="agregarBU();"><i class="mdi mdi-add"></i>
                                </div>
                            </div>
                        </div> 
                        <div class="mdl-card__actions text-right">                            
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" onclick="guardarAceptar();">Aceptar</button>
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsindex.js?v=<?php echo time();?>"></script>
    </body>
</html>