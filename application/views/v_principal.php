<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="HPE promo made simple">
        <meta name="keywords"               content="HPE promo made simple">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Febrero 15, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>HPE PMS</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.carousel.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.theme.default.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metric.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <section id="promo" class="section">
            <div class="header">
                <div class="mdl-container row">
                    <div class="col-xs-12">
                        <div class="col-xs-6 text-left p-0">
                            <a href="Distis"><img src="<?php echo RUTA_IMG?>logo/logo_header.svg"></a>
                        </div>
                        <div class="col-xs-6 text-right p-0">
                            <div class="menu_header">
                                <p><?php echo $nombre ?></p>
                                <a onclick="cerrarCesion()" class="logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="principal">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="imagen one"></div>
                    <div class="container">
                        <div class="cont-carousel">
                            <h2>Welcome to Promo Made Simple</h2>
                            <p>You can see all current promotions and those that are about to expire</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="imagen two"></div>
                    <div class="cont-carousel">
                        <h2>Welcome to Promo Made Simple</h2>
                        <p>You can see all current promotions and those that are about to expire</p>
                    </div>
                </div>
                <div class="item">
                    <div class="imagen three"></div>
                    <div class="cont-carousel">
                        <h2>Welcome to Promo Made Simple</h2>
                        <p>You can see all current promotions and those that are about to expire</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="mdl-container seccion-promociones">
                <a id="p1" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen one"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2>Server & Storage Flex Attach</h2>
                    </div>
                </a>
                <a id="p2" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen two"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2>HPE Pointnext</h2>
                    </div>
                </a>
                <a id="p3" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen three"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2>Storage Accelerate</h2>
                    </div>
                </a>
                <a id="p4" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen four"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2>Aruba Market Take Over</h2>
                    </div>
                </a>
                <a id="p5" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen five"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2>Aruba 3x2 Switches</h2>
                    </div>
                </a>
                <a id="p6" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen six"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2>Aruba Mobility</h2>
                    </div>
                </a>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="mdl-card card-login">
                        <div class="mdl-card__supporting-text">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                                <li><a href="#registro" aria-controls="registro" role="tab" data-toggle="tab">Register</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="login">
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="usuario">Username</label>
                                        <input type="text" id="usuario" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="ingresar()">Login</button>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="registro">
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="nombre">Full Name</label>
                                        <input type="text" id="nombre" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="correo">Email</label>
                                        <input type="text" id="correo" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label>Country</label>
                                        <select class="selectpicker" id="pais" title="Typically your Country">
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
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="passRegister">Password</label>
                                        <input type="password" id="passRegister" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="registrar()">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" onclick="closeModal()"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>owl-carousel/owl.carousel.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsprincipal.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
            }
            $(window).load(function() {
                let openModal = sessionStorage.getItem('OPEN_MODAL2');
                if(openModal && openModal == '1') {
                    $("#ModalLogin").modal('hide');
                    $('.menu_header').css('opacity','1');
                }
                else{
                    $("#ModalLogin").modal('show');
                    sessionStorage.removeItem('OPEN_MODAL');
                }
            });
        </script>
    </body>
</html>