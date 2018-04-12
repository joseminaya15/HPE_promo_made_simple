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
    	<title>HPE PMS</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metric.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <section class="section">
            <div class="header">
                <div class="mdl-container row">
                    <div class="col-xs-12">
                        <div class="col-xs-6 text-left p-0">
                            <img src="<?php echo RUTA_IMG?>logo/logo_header.svg">
                        </div>
                        <div class="col-xs-6 text-right p-0">
                            <p>Manager</p>
                            <a onclick="cerrarCesion()" class="logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-container">
                <div class="promociones">
                    <div class="title-manager">
                        <h2>Content Management System</h2>
                    </div>
                    <div class="col-xs-12 p-0 cards">
                        <div class="cabecera border-none m-b-15 title-header">
                            <h2 class="titulo">Promos Made Simple</h2>
                            <select class="selectpicker selectQ" id="idQ">
                                <option value="Q3 FY18">Q3 FY18</option>
                                <option value="Q4 FY18">Q4 FY18</option>
                            </select>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Lista" role="tab" data-toggle="tab">Lista de Promociones</a></li>
                        <li role="presentation"><a id="tabCarga" href="#Carga" role="tab" data-toggle="tab">Carga de data</a></li>
                        <li role="presentation"><a id="tabCarga" href="#Historico" role="tab" data-toggle="tab" onclick="getHistorico()">Historico de Promociones</a></li>
                    </ul>
                    <div class="tab-content m-t-20">
                        <div role="tabpanel" class="tab-pane fade in active" id="Lista">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre Promoci&oacute;n</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>Deal Lead</th>
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
                        <div role="tabpanel" class="tab-pane fade" id="Carga">
                            <div class="mdl-card-listado">
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Country</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <select class="selectpicker" multiple data-actions-box="true" id="pais" title="País" multiple>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Curacao">Curacao</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="St. Kitts & Nevis">St. Kitts & Nevis</option>
                                            <option value="St. Maarten">St. Maarten</option>
                                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Virgin Islands (U.S)">Virgin Islands (U.S)</option>
                                            <option value="Antigua & Bermuda">Antigua & Bermuda</option>
                                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Turks & Caicos">Turks & Caicos</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="St Barthelem">St Barthelem</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Cayman">Cayman</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option value="Bermuda">Bermuda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Type of user</p>
                                    </div>
                                    <div class="col-sm-7 p-0" id="divUser">
                                        <select class="selectpicker" id="usuario" title="Tipo de usuario" onchange="mostrarCampo()">
                                            <option value="Distis">Distis</option>
                                            <option value="Resellers">Resellers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Type of Oferta</p>
                                    </div>
                                    <div class="col-sm-7 p-0" id="divOferta">
                                        <select class="selectpicker" id="oferta" title="Tipo de oferta">
                                            <option value="Valor"><div class="bg-tipo valor"></div>Value</option>
                                            <option value="Volumen"><div class="bg-tipo volumen"></div>Volumen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Only For Limited Time</p>
                                    </div>
                                    <div id="chckRadio"  class="col-sm-7 input-radio">
                                        <div class="col-xs-6">
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                                                <input type="radio" id="option-1" class="mdl-radio__button" name="optradio" value="si" checked>
                                                <span class="mdl-radio__label">S&iacute;</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                                <input type="radio" id="option-2" class="mdl-radio__button" name="optradio" value="no">
                                                <span class="mdl-radio__label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Title</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <input class="form-control" type="text" id="titulo">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Fecha de inicio</p>
                                    </div>
                                    <div class="col-sm-7 p-0 input-group-fecha">
                                        <div class="mdl-icon"><button class="mdl-button mdl-js-button mdl-button--icon"><i class="mdi mdi-date_range"></i></button></div>
                                        <input class="form-control" type="text" id="fecha_ini" value="">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Caducidad</p>
                                    </div>
                                    <div class="col-sm-7 p-0 input-group-fecha">
                                        <div class="mdl-icon"><button class="mdl-button mdl-js-button mdl-button--icon"><i class="mdi mdi-date_range"></i></button></div>
                                        <input class="form-control" type="text" id="fecha" value="">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Objetivo Comercial</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <input class="form-control" type="text" id="objetivo_comercial">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Deal Lead</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <input class="form-control" type="text" id="deal_lead">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>What's New!</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <input class="form-control" type="text" id="noticia">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Deal Number</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <input class="form-control" type="text" id="deal_number">
                                    </div>
                                </div>
                                <div class="col-xs-12 input-group-listado">
                                    <div class="col-sm-5 p-0">
                                        <p>Conditions</p>
                                    </div>
                                    <div class="col-sm-7 p-0">
                                        <input class="form-control" type="text" id="condiciones">
                                    </div>
                                </div>
                                <div class="mdl-card__actions text-left col-xs-12">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" onclick="crearNuevaPromocion()" id="btnGuardar"><i class="mdi mdi-save"></i>Guardar Informaci&oacute;n</button>
                                    <!-- <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar" onclick="galeria()"><i class="mdi mdi-save"></i>abrir Galería</button> -->
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-guardar hidden" onclick="actualizarPromocion()" id="btnActualizar">Actualizar</button>
                                </div>
                            </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Historico">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre Promoci&oacute;n</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fecha Vencimiento</th>
                                            <th>Deal Lead</th>
                                            <th>T. Producto</th>
                                            <th>Pa&iacute;s</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla_promociones_historico">
                                        <?php echo $promociones ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--MODAL-->
        <div class="modal fade" id="ModalBorrarOferta" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title text-left">
                            <p id="tituloOferta">&iquest;Est&aacute; seguro que desea eliminar esta promoci&oacute;n?</p>
                        </div>
                        <div class="mdl-card__actions text-right">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" onclick="eliminarPromo();">Aceptar</button>
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal">
                                <i class="mdi mdi-close"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalGaleria" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="      false" style="height: 500px;">
            <div class="modal-dialog modal-lg text-center">
                <div class="modal-content">
                    <div class="mdl-card" >
                        <div class="mdl-card__title">
                            <p id="titulo">Seleccione una imagen</p>
                        </div>
                        <div class="galeria" class="col-sm-7 input-radio">
                            <div class="col-xs-6">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                                    <input type="radio" id="option-1" class="mdl-radio__button" name="optradio" value="si" checked>
                                    <span class="mdl-radio__label"><img src="<?php echo RUTA_IMG?>promo/sellers.png"></span>
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                    <input type="radio" id="option-2" class="mdl-radio__button" name="optradio" value="no">
                                    <span class="mdl-radio__label"><img src="<?php echo RUTA_IMG?>promo/iquote.png"></span>
                                </label>
                            </div>
                            <div class="col-xs-6" style="margin-top: 130px;">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                    <input type="radio" id="option-2" class="mdl-radio__button" name="optradio" value="no">
                                    <span class="mdl-radio__label"><img src="<?php echo RUTA_IMG?>promo/promo1.png"></span>
                                </label>
                            </div>
                            <div class="col-xs-6" style="margin-top: 130px;">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                    <input type="radio" id="option-2" class="mdl-radio__button" name="optradio" value="no">
                                    <span class="mdl-radio__label"><img src="<?php echo RUTA_IMG?>promo/engage.png"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mdl-card__actions text-right">                   
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" onclick="insetarImagen();" style="margin-top: 160px;">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
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
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
            initMaskInputs('fecha');
            initButtonCalendarDaysMinToday('fecha');
            initMaskInputs('fecha_ini');
            initButtonCalendarDaysMinToday('fecha_ini');
        </script>
    </body>
</html>