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
    	<title>Promos Made Simple</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.carousel.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.theme.default.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metricweb.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <section id="promo" class="section">
            <div class="header header--principal">
                <div class="mdl-container row">
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4 text-left p-0 header__left">
                            <a href="Home"><img src="<?php echo RUTA_IMG?>logo/logo_header.svg"></a>
                        </div>
                        <div class="col-sm-6 col-xs-8 text-right p-0 header__right">
                            <div class="menu_header">
                                <p>Welcome <?php echo $nombre ?></p>
                                <a onclick="cerrarCesion()" class="logout">Logout</a>
                            </div>
                            <div class="menu_principal col-xs-12 p-0">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab md-button--search" onclick="showSearch()">
                                    <i class="mdi mdi-search"></i>
                                </button>
                                <div class="menu_desplegable col-xs-12 p-0">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-menu"></i>Menu
                                    </button>
                                    <ul class="dropdown-menu">
                                        <div class="col-sm-6 col-xs-12 dropdown-menu__border p-0">
                                            <p>Value</p>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p6')">3PAR Avalanche & Store Once</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p7')">Aruba Market Take Over</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p8')">Aruba 3x2 Switches</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p9)">Aruba Mobility</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p5')">Datacenter Networking - ToR</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p2')">HPE Pointnext</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p4')">HPE Simplivity</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p14')">Nimble Promo</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p15')">SAP HANA</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p12')">Synergy</a>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 p-0">
                                            <p>Volume</p>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p10')">InstaSale</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p13')">Base Promo</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p1')">Server & Storage Flex Attach</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p3')">Storage Accelerate</a>
                                            <a class="mdl-menu__item" onclick="triggerCategoria('p11')">Tape Backup Media</a>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="search-filter home" style="display: none;">
                            <div class="search-categoria">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" onclick="buscarPromo('inputSearch')"><i class="mdi mdi-search"></i></button>
                                <div class="search-input">
                                    <input type="text" class="form-control" id="inputSearch" placeholder="Search Product Number ID or Product Description" onkeyup="inputActive(this.id);" onkeypress="buscarPromo('inputSearch');">
                                </div>
                                <div class="search-clear">
                                    <button id="buttonClear" class="mdl-button mdl-js-button mdl-button--icon" onclick="clearInput()"><i class="mdi mdi-close"></i></button>
                                </div>
                            </div>
                            <p class="text-important search">All these promos are valid only for Central America and Caribbean.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="principal">
            <div class="logo-top"><img src="<?php echo RUTA_IMG?>logo/logo-top.png"></div>
            <div class="logo-bottom"><img src="<?php echo RUTA_IMG?>logo/logo-bottom.png"></div>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="imagen one"></div>
                    <div class="container">
                        <div class="cont-carousel">
                            <h2>Welcome to Promos Made Simple</h2>
                            <p>You can see all current promotions and those that are about to expire</p>
                        </div>
                    </div>
                </div>
                <div class="item opacity-5">
                    <div class="imagen two"></div>
                    <div class="cont-carousel">
                        <h2>How it works?</h2>
                        <div class="cont-carousel__contenido">
                            <strong>1</strong>
                            <p>Search products by name or SKU.</p>
                        </div>
                        <div class="cont-carousel__contenido">
                            <strong>2</strong>
                            <p>Choose the best promotion that fits with your customer’s need.</p>
                        </div>
                        <div class="cont-carousel__contenido">
                            <strong>3</strong>
                            <p>Access iQuote through the website of your preferred distributor.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="imagen three"></div>
                    <div class="cont-carousel">
                        <img class="img-instasale" src="<?php echo RUTA_IMG?>promociones/Instasale.png">
                        <h2>#Instasale</h2>
                        <p>Find here the products with the highest rotation in market from HPE or Aruba. Best Price & local inventory guaranteed.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <!-- <div class="mdl-container seccion-promociones" id="cardsCates" style="display: block">
                <a id="p13" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen thirteen"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="marron" data-id="Base Promo">Base Promo</h2>
                    </div>
                </a>
                <a id="p1" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen one"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="verde" data-id="Server & Storage Flex Attach">Server & Storage Flex Attach</h2>
                    </div>
                </a>
                <a id="p11" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen eightteen"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="default" data-id="Tape Backup Media">Tape Backup Media</h2>
                    </div>
                </a>
                <a id="p2" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen two"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="purple" data-id="HPE Pointnext">HPE Pointnext</h2>
                    </div>
                </a>
                <a id="p3" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen three"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="purple" data-id="Storage Accelerate">Storage Accelerate</h2>
                    </div>
                </a>
                <a id="p4" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen four"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="verde" data-id="HPE Simplivity">HPE Simplivity</h2>
                    </div>
                </a>
                <a id="p5" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen nineteen"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="marron" data-id="Datacenter Networking - ToR">Datacenter Networking - ToR</h2>
                    </div>
                </a>
                <a id="p12" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen twelve"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="default" data-id="Synergy">Synergy</h2>
                    </div>
                </a>
                <a id="p6" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen three"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="verde" data-id="3PAR Avalanche & Store Once">3PAR Avalanche & Store Once</h2>
                    </div>
                </a>
                <a id="p7" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen seven"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="orange" data-id="Aruba Market Take Over">Aruba Market Take Over</h2>
                    </div>
                </a>
                <a id="p8" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen eight"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="orange" data-id="Aruba 3x2 Switches">Aruba 3x2 Switches</h2>
                    </div>
                </a>
                <a id="p9" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen nine"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="orange" data-id="Aruba Mobility">Aruba Mobility</h2>
                    </div>
                </a>
                <a id="p14" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen fourteen"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="verde" data-id="Nimble Promo">Nimble Promo</h2>
                        <div class="encabezado"></div>
                    </div>
                </a>
                <a id="p15" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen fifteen"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="default" data-id="SAP HANA">SAP HANA</h2>
                        <div class="encabezado"></div>
                    </div>
                </a>
                <a id="p10" class="mdl-card mdl-promociones" onclick="goToCategorias(this.id)">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen seventeen"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="black" data-id="InstaSale">InstaSale</h2>
                        <div class="encabezado"></div>
                    </div>
                </a>
            </div> -->
            <div class="mdl-container seccion-promociones js-seccion--promociones" id="cardsCates" style="display: block">
                <?php echo $contenido ?>
                <a class="mdl-promociones" href="https://www.hpengageandgrow.com/pages/login.php" target="_blank">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen engage-grow"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="black" data-id="InstaSale">ENGAGE & GROW</h2>
                        <div class="encabezado"></div>
                    </div>
                </a>
                <!-- <a class="mdl-promociones js-promocion__engage" href="https://www.hpengageandgrow.com/pages/login.php" target="_blank">
                    <div class="js-engage">
                        <div class="js-engage__left"></div>
                        <div class="js-engage__right">
                            <p>Conoce los incentivos que tenemos para ti este trimestre:</span></p>
                            <img src="<?php echo RUTA_IMG?>promo/logo-engage.png">
                        </div>
                    </div>
                </a> -->
            </div>
            <div class="mdl-container seccion-table" id="tablaCates" style="display: none">
                <div class="mdl-card mdl-table">
                    <div class="mdl-card__supporting-text">
                        <div class="table-responsive">
                            <table id="tableCategoria" class="table table-striped table-bordered" data-page-length="10">
                                <thead>
                                    <tr class="tr-header-reporte">
                                        <th>Product number ID</th>
                                        <th>Product Description</th>
                                        <th>Categorías</th>
                                    </tr>
                                </thead>
                                <tbody id="promociones"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="mdl-container">
                <small>For more information about our Promos, please contact us: <a href="mailto:maria-alejandra.prieto@hpe.com">maria-alejandra.prieto@hpe.com</a></small>
                <p>&copy; Copyright 2018 Hewlett Packard Enterprise Development LP</p>
            </div>
        </footer>
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
                                        <label for="usuario">Email</label>
                                        <input type="text" id="usuario" placeholder="Typically an email address" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input" id="divPassword" style="display: block">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12" style="display: block;" id="divForgot">
                                        <a onclick="cambiarRecuperar();">Forgot your password?</a>
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right" style="display: block" id="divLogin">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="ingresar()">Login</button>
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right" style="display: none" id="divRecuperar">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="recuperar()">Recover</button>
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right" style="display: none" id="divAtras">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="atras()">Go back</button>
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
                                        <label for="empresa">Company</label>
                                        <input type="text" id="empresa" placeholder="Typically an Company" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label>Country</label>
                                        <select class="selectpicker" id="pais" title="Typically your Country">
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Panamá">Panam&aacute;</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Honduras">Honduras</option>
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
                                    <div class="col-xs-12 p-0">
                                        <p class="text-important">All these promos are valid only for Central America and Caribbean.</p>
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
        <div class="modal fade" id="ModalLanguage" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2>Bienvenido / Welcome</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h3>Por favor seleccione su idioma</h3>
                            <p>Please select your language</p>
                        </div>
                        <div class="mdl-card__actions">
                            <a href="es/Home" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Espa&ntilde;ol</a>
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal">English</a>
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
        <script src="<?php echo RUTA_JS?>jsprincipal_en.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
            }
            $(window).load(function() {
                var openLanguage = sessionStorage.getItem('OPEN_LANGUAGE');
                if(openLanguage && openLanguage == '1') {
                    $("#ModalLanguage").modal('hide');
                    $("#ModalLanguage").css('display','none');
                    $('.menu_header').css('display','flex');
                    $('.search-filter.home').css('display','block');
                }
                else{
                    $("#ModalLanguage").modal('show');
                    sessionStorage.removeItem('OPEN_MODAL');
                    $('.menu_header').css('display','none');
                    $('.search-filter.home').css('display','none');
                }
            });
        </script>
    </body>
</html>