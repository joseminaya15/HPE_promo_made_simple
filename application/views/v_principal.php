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
                            <p><?php echo $nombre ?></p>
                            <a onclick="cerrarCesion()" class="logout">Logout</a>
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
                        <!-- <h2>Encuentra tu curso</h2> -->
                        <!-- <a href="#horario" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect link-section">Conoce m&aacute;s</a> -->
                    </div>
                </div>
                <div class="item">
                    <div class="imagen three"></div>
                    <div class="cont-carousel">
                       <!-- <h2>Prueba tu ingl&eacute;s</h2> -->
                       <!-- <a href="#prueba" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect link-section">Conoce m&aacute;s</a> -->
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
                $('select').selectpicker();
            }
        </script>
    </body>
</html>