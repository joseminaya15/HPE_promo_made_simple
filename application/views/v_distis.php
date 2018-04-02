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
    	<title>PMS</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <!-- <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>"> -->
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
                            <p class="tipo-user">Distis</p>
                            <a onclick="cerrarCesion()" class="logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-container">
                <div class="promociones">
                    <div class="header-search">
                        <div class="col-xs-12 buscador">
                            <div class="form-group search">
                                <input type="email" class="form-control" id="buscador" placeholder="Search" onkeyup="buscarPromocion(event);">
                            </div>
                            <div class="button-search">
                                <button class="mdl-button mdl-js-button mdl-button--icon" onclick="buscarPromo()"><i class="mdi mdi-search"></i></button>
                            </div>
                        </div>
                        <div class="col-xs-12 filtro">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" id="title_filtro">Filter</li>
                            </ol>
                            <div class="mdl-select">
                                <select class="selectpicker" onchange="filtroPromociones()" id="filtro">
                                    <option value="">Filter</option>
                                    <option value="Only For Limited Time">Only For Limited Time</option>
                                    <option value="Instasale - Firesale">Instasale - Firesale</option>
                                    <option value="Valor - Switches TOR">Valor - Switches TOR</option>
                                    <option value="Valor - Blades">Valor - Blades</option>
                                    <option value="Valor - Avalanche">Valor - Avalanche</option>
                                    <option value="Volumen - Flex Servers">Volumen - Flex Servers</option>
                                    <option value="Volumen - Storage">Volumen - Storage</option>
                                    <option value="Networking - Aruba Mobility Flex">Networking - Aruba Mobility Flex</option>
                                    <option value="Networking - Aruba Central">Networking - Aruba Central</option>
                                    <option value="Networking - Switching Flex">Networking - Switching Flex</option>
                                    <option value="Carepacks - Tablero de control">Carepacks - Tablero de control</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 p-0 cards">
                        <div class="cabecera">
                            <div>
                                <h2 class="titulo">Promo Made Simple</h2>
                                <button class="mdl-button mdl-js-button mdl-button--icon" onclick="showFilter()"><i class="mdi mdi-filter_list"></i></button>
                            </div>
                            <h3 class="codigo">Q3 FY18</h3>
                            <p class="subtitle"><?php echo $titulo ?></p>
                        </div>
                        <div class="line">
                            <?php echo $promociones ?>
                        </div>
                    </div>
                    <div class="footer col-xs-12">
                        <div class="col-md-3">
                            <div class="col-xs-3 p-0">
                                <img src="<?php echo RUTA_IMG?>promo/sellers.png">
                            </div>
                            <div class="col-xs-9">
                                <p>Review the list of Best Seller products available for FY18. Take advantage of immediate availability at your local retailer and earn more E&G points</p>
                                <a href="http://www.marketinghpe.com/eblast/promosQ/launch/distis/Best_Seller_Consolidation_FY18.xlsx" target="_blank">Download here</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-xs-4 p-0">
                                <img src="<?php echo RUTA_IMG?>promo/engage.png">
                            </div>
                            <div class="col-xs-8">
                                <p>The best automated online platform to support the development and growth of companies that distribute and sell HPE products</p>
                                <a href="http://www.hpeeangageandgrow.com/" target="_blank">www.hpeeangageandgrow.com</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-xs-4 p-0">
                                <img src="<?php echo RUTA_IMG?>promo/iquote.png">
                            </div>
                            <div class="col-xs-8">
                                <p>Most of our Best Seller product promotions are available through iQuote. Visit the portal of your trusted local Distributor</p>
                                <a href="http://www.iquote.hpe.com/" target="_blank">www.iquote.hpe.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 descripcion-promo">
                        <div class="col-sm-6 col-xs-12">
                            <div class="col-xs-6">
                                <div class="fondo-color volumen"></div>
                                <p>HIT Volumen Promo</p>
                            </div>
                            <div class="col-xs-6">
                                <div class="fondo-color valor"></div>
                                <p>HIT Value & Growth Promo</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <h2>MCA DISTRIBUTORS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="section col-xs-12">
            <div class="container">
                <div class="col-xs-12 p-0">
                    <img src="<?php echo RUTA_IMG?>logo/logo_footer.svg">
                </div>
                <div class="col-xs-6 p-0 left">
                    <p>&copy;Copyright 2018 Hewlett Packard Enterprise Development, L.P.</p>
                </div>
                <div class="col-xs-6 p-0 right">
                    <ul>
                        <li>Terms of use</li>
                        <li>Privacy</li>
                        <li>Report Bug</li>
                    </ul>
                </div>
            </div>
        </footer>
        
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <!-- <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script> -->
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsdistis.js?v=<?php echo time();?>"></script>
    </body>
</html>