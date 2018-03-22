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
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
    <div class="header">
        <div class="mdl-container row">
            <div class="col-xs-12">
                <div class="col-xs-6 text-left p-0">
                    <img src="<?php echo RUTA_IMG?>logo/logo_header.png">
                </div>
                <div class="col-xs-6 text-right p-0">
                    <p>Manager</p>
                    <h5></h5>
                    <a onclick="cerrarCesion()" class="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-offset-2 cards">
        <div class="title_table">
            <h1>Promo Made Simple</h1>
            <h4>Q3 FY18</h4>
        </div>
    </div>
    <div class="container listado">
        <div class="tab-content">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Lista de Promociones</a></li>
                <li><a data-toggle="tab" href="#menu1">Carga data</a></li>
            </ul>
            <div id="home" class="tab-pane fade in active">
              <section class="section table">
                <div class="mdl-container">
                    <div class="mdl-card mdl-card-listado mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2>Listado</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre Promoci&oacute;n</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>T. Distribuidor</th>
                                            <th>T. Producto</th>
                                            <th>Pa&iacute;s</th>
                                            <th class="text-center">Acci&oacute;n</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla_promociones">
                                        <?php echo $promociones ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mdl-card__menu">
                            <a href="Formulario" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="mdi mdi-add"></i><label>Nueva Promoci&oacute;n</label></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
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
                                    <input class="mdl-textfield__input" type="text" id="pais" value="">
                                    <label class="mdl-textfield__label" for="pais">País</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <select class="selectpicker" id="usuario" title="Tipo de usuario">
                                    <option value="Distis">Distis</option>
                                    <option value="Resellers">Resellers</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <select class="selectpicker" id="oferta" title="Tipo de oferta">
                                    <option value="Valor">Value</option>
                                    <option value="Volumen">Volumen</option>
                                    <option value="0">Only For Limited Time</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <div class="mdl-icon"><i class="mdi mdi-business_center"></i></div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="titulo" value="">
                                    <label class="mdl-textfield__label" for="titulo">Titulo</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <div class="mdl-icon"><button class="mdl-button mdl-js-button mdl-button--icon"><i class="mdi mdi-date_range"></i></button></div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="fecha" value="">
                                    <label class="mdl-textfield__label" for="fecha">Caducidad</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <div class="mdl-icon"><i class="mdi mdi-business_center"></i></div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="objetivo_comercial" value="">
                                    <label class="mdl-textfield__label" for="objetivo_comercial">Objetivo comercial</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <div class="mdl-icon"><i class="mdi mdi-business_center"></i></div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="noticia" value="">
                                    <label class="mdl-textfield__label" for="noticia">What's New</label>
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
                                <div class="mdl-icon"><i class="mdi mdi-grid_on"></i></div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="condiciones" value="">
                                    <label class="mdl-textfield__label" for="condiciones">Conditions</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mdl-input-group">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" onclick="abrirGaleria()">Abrir Galería</button>
                            </div>
                        </div>
                        <div class="mdl-card__actions">
                            <!--<?php if($titulo == ''){ ?>-->
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" onclick="crearNuevaPromocion()">Guardar</button>
                           <!-- <?php } else { ?>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" onclick="actualizarPromocion()">Actualizar</button>
                            <?php } ?>-->
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
        <!--MODAL-->
        <div class="modal fade" id="ModalBorrarOferta" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title">
                            <p id="titulo">&iquest;Est&aacute; seguro que desea eliminar esta promoci&oacute;n?</p>
                        </div>
                        <div class="mdl-card__actions text-right">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" data-dismiss="modal">Cancelar</button>                       
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" onclick="eliminarPromo();">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalGaleria" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title">
                            <p id="titulo">Seleccione una imagen</p>
                        </div>
                        <div class="galeria">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" style="height: 80px;"><img src="<?php echo RUTA_IMG?>promo/sellers.png"></button>
                            <img src="<?php echo RUTA_IMG?>promo/iquote.png">
                        </div>
                        <div class="mdl-card__actions text-right">                   
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" onclick="insetarImagen();">Aceptar</button>
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
        <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jslistado.js?v=<?php echo time();?>"></script>
    </body>
</html>