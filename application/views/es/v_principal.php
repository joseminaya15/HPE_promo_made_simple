<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta http-equiv="Content-Language" content="en-En" />
        <meta name="google" value="notranslate">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="HPE promos made simple">
        <meta name="keywords"               content="HPE promos made simple">
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
                                <p lang="en" translate="no">Bienvenido(a) <?php echo $nombre ?></p>
                                <a onclick="cerrarCesion()" class="logout">Logout</a>
                            </div>
                            <div class="menu_principal col-xs-12 p-0">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab md-button--search" onclick="showSearch()">
                                    <i class="mdi mdi-search"></i>
                                </button>
                                <div class="menu_desplegable col-xs-10 p-0">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-menu"></i>Menu
                                    </button>
                                    <ul class="dropdown-menu">
                                        <div class="col-sm-6 col-xs-12 dropdown-menu__border p-0">
                                            <p>Valor</p>
                                            <?php echo $combo1 ?>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 p-0">
                                            <p>Volumen</p>
                                            <?php echo $combo2 ?>
                                        </div>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <span style="color: #FFFFFF;font-size: 16px"><a onclick="goTo('en')">En</a> / <span style="font-weight: bold;">Es</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="search-filter home" style="display: none;">
                            <div class="search-categoria">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" onclick="buscarPromo('inputSearch')"><i class="mdi mdi-search"></i></button>
                                <div class="search-input">
                                    <input type="text" class="form-control" id="inputSearch" placeholder="Buscar número de producto ID o descripción del producto" onkeyup="inputActive(this.id);" onkeypress="buscarPromo('inputSearch');">
                                </div>
                                <div class="search-clear">
                                    <button id="buttonClear" class="mdl-button mdl-js-button mdl-button--icon" onclick="clearInput()"><i class="mdi mdi-close"></i></button>
                                </div>
                            </div>
                            <p class="text-important search">Todas estas promociones son válidas solo para América Central y el Caribe.</p>
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
                            <h2>Bienvenido a Promos Made Simple</h2>
                            <p>Puede ver todas las promociones actuales y las que están a punto de caducar</p>
                        </div>
                    </div>
                </div>
                <div class="item opacity-5">
                    <div class="imagen two"></div>
                    <div class="cont-carousel">
                        <h2>¿Cómo funciona?</h2>
                        <div class="cont-carousel__contenido">
                            <strong>1</strong>
                            <p>Busque productos por nombre o SKU.</p>
                        </div>
                        <div class="cont-carousel__contenido">
                            <strong>2</strong>
                            <p>Elija la mejor promoción que se adapte a las necesidades de su cliente.</p>
                        </div>
                        <div class="cont-carousel__contenido">
                            <strong>3</strong>
                            <p>Acceda a iQuote a través del sitio web de su distribuidor preferido.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="imagen four"></div>
                    <div class="cont-carousel">
                        <h2>HPE Marketing HUB</h2>
                        <p>Conoce la nueva herramienta que te da acceso al repositorio m&aacute;s completo e innovador de marketing digital. Posiciona tu negocio con las nuevas tecnolog&iacute;as.</p>
                        <a href="http://www.hpemarketinghub.com/" target="_blank" class="js-flex js-go"><i class="mdi mdi-arrow_forward"></i>Explora Ahora</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="mdl-container seccion-promociones" id="cardsCates" style="display: block">
                <!-- <div class="mdl-promociones js-flip">
                    <div class="js-flip__front">
                        <div class="mdl-card__title">
                            <div class="promocion-imagen server"></div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="verde">Servidores</h2>
                        </div>
                    </div>
                    <div class="js-flip__back">
                        <div class="js-categorias">
                            <h2>Servidores</h2>
                            <ul>
                                <li><a id="p13" onclick="goToCategorias(this.id)" data-id="Base Promo">Base Promo</a></li>
                                <li><a id="p2" onclick="goToCategorias(this.id)" data-id="HPE Pointnext">HPE Pointnext</a></li>
                                <li><a id="p1" onclick="goToCategorias(this.id)" data-id="Server & Storage Flex Attach">Server & Storage Flex Attach</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mdl-promociones js-flip">
                    <div class="js-flip__front">
                        <div class="mdl-card__title">
                            <div class="promocion-imagen storage"></div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="default">Almacenamiento</h2>
                        </div>
                    </div>
                    <div class="js-flip__back">
                        <div class="js-categorias">
                            <h2>Almacenamiento</h2>
                            <ul>
                                <li><a href="">Base Promo</a></li>
                                <li><a href="">HPE Pointnext</a></li>
                                <li><a href="">Server & Storage Flex Attach</a></li>
                                <li><a href="">3PAR Avalanche & Store Once</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mdl-promociones js-flip">
                    <div class="js-flip__front">
                        <div class="mdl-card__title">
                            <div class="promocion-imagen networking"></div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="orange">Redes</h2>
                        </div>
                    </div>
                    <div class="js-flip__back">
                        <div class="js-categorias">
                            <h2>Redes</h2>
                            <ul>
                                <li><a href="">Base Promo</a></li>
                                <li><a href="">HPE Pointnext</a></li>
                                <li><a href="">Datacenter Networking - ToR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mdl-promociones js-flip">
                    <div class="js-flip__front">
                        <div class="mdl-card__title">
                            <div class="promocion-imagen service"></div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <h2 class="purple">Servicios</h2>
                        </div>
                    </div>
                    <div class="js-flip__back">
                        <div class="js-categorias">
                            <h2>Servicios</h2>
                            <ul>
                                <li><a href="">Base Promo</a></li>
                                <li><a href="">HPE Pointnext</a></li>
                                <li><a href="">Datacenter Networking - ToR</a></li>
                                <li><a href="">3PAR Avalanche & Store Once</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <?php echo $contenido ?>
                <div class="mdl-card mdl-promociones">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen seller"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="marron">Best Sellers</h2>
                    </div>
                </div>
                <div class="mdl-card mdl-promociones">
                    <div class="mdl-card__title">
                        <div class="promocion-imagen engage"></div>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="marron">Engage&Grow</h2>
                    </div>
                </div>
                <!-- <?php echo $contenido ?> -->
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
                <small>Para obtener más información acerca de nuestras promociones, contáctenos: <a href="mailto:maria-alejandra.prieto@hpe.com">maria-alejandra.prieto@hpe.com</a></small>
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
                                <li class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Ingresar</a></li>
                                <li><a href="#registro" aria-controls="registro" role="tab" data-toggle="tab">Registrarse</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="login">
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="usuario">Correo</label>
                                        <input type="text" id="usuario" placeholder="Correo electr&oacute;nico" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="password">Contraseña</label>
                                        <input type="password" id="password" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="ingresar()">Ingresar</button>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="registro">
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="nombre">Nombre completo</label>
                                        <input type="text" id="nombre" placeholder="Nombre completo" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="correo">Correo</label>
                                        <input type="text" id="correo" placeholder="Correo electr&oacute;nico" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label>Pais</label>
                                        <select class="selectpicker" id="pais" title="País">
                                            <?php echo $options ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <label for="passRegister">Contraseña</label>
                                        <input type="password" id="passRegister" placeholder="Contraseña" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 p-0">
                                        <p class="text-important">Todas estas promociones son válidas solo para América Central y el Caribe.</p>
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="registrar()">Registrar</button>
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
                var URLactual = window.location;
                // if(URLactual['href'] != 'http://www.hpepromosmadesimple.com/Home'){
                //     location.href = 'http://www.hpepromosmadesimple.com/Home';
                // }
                $('#inputSearch').val('');
                let openModal = sessionStorage.getItem('OPEN_MODAL2');
                if(openModal && openModal == '1') {
                    $("#ModalLogin").modal('hide');
                    $('.menu_header').css('display','flex');
                    $('.search-filter.home').css('display','block');
                }
                else{
                    $("#ModalLogin").modal('show');
                    sessionStorage.removeItem('OPEN_MODAL');
                    $('.menu_header').css('display','none');
                    $('.search-filter.home').css('display','none');
                }
            });
        </script>
    </body>
</html>