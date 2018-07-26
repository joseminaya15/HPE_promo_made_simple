<!DOCTYPE html>
<html>
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
    	<title>Promos Made Simple</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.carousel.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.theme.default.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet"    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
        <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>metricweb.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <!-- oncontextmenu='return false' -->
    <body>
        <section id="promo" class="section">
            <div class="header">
                <div class="mdl-container row">
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4 text-left p-0 opacity">
                            <a href="Home"><img src="<?php echo RUTA_IMG?>logo/logo_header.svg"></a>
                        </div>
                        <div class="col-sm-6 col-xs-8 text-right p-0 opacity">
                            <div class="menu_header">
                                <p>Bienvenido <?php echo $nombre ?></p>
                                <a href="Home" class="home"><span>Inicio</span><i class="mdi mdi-home"></i></a>
                            </div>
                            <div class="menu_desplegable col-xs-12 p-0">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-menu"></i>Menu
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="col-sm-6 col-xs-12 dropdown-menu__border p-0">
                                        <p>Volumen</p>
                                        <?php echo $combo1 ?>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 p-0">
                                        <p>Valor</p>
                                        <?php echo $combo2 ?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="categoria">
            <div class="header_categoria"></div>
            <div class="search-filter">
                <div class="search-categoria">
                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" onclick="buscarPromo('inputSearch')"><i class="mdi mdi-search"></i></button>
                    <div class="search-input">
                        <input type="text" class="form-control" id="inputSearch" placeholder="Buscar número de producto ID o descripción del producto" onkeyup="inputActive(this.id);" onkeypress="verificarDatos(event);">
                    </div>
                    <div class="search-clear">
                        <button id="buttonClear" class="mdl-button mdl-js-button mdl-button--icon" onclick="clearInput()"><i class="mdi mdi-close"></i></button>
                    </div>
                    <div class="search-icon"><i class="fa fa-server"></i></div>
                </div>
            </div>
        </section>
        <section id="productos" class="col-xs-12 p-0">
            <div class="mdl-container">
                <div class="col-xs-12">
                    <a href="Home" class="js-flex js-go js-return"><i class="mdi mdi-arrow_back"></i>Regresar</a>
                    <h2 id="namePromocion"></h2>
                    <div class="header_promocion">
                        <div class="col-sm-7 col-xs-12 p-0" id="textLeft">
                            <div class="js-encabezado">
                                <div class="js-information">
                                    <p><strong>Deal Number:</strong><span><?php echo $deal_number ?></span></p>
                                    <p><strong>Fecha inicio:</strong><span><?php echo $start_date ?></span></p>
                                    <p><strong>Fecha fin:</strong><span><?php echo $end_date ?></span></p>
                                </div>
                                <div class="js-information">
                                    <div class="js-information__flex">
                                        <h2 class="js-information__left">Objetivo Comercial</h2>
                                    </div>
                                    <p><?php echo $objetivo ?></p>
                                </div>
                                <div class="js-information">
                                    <div class="js-information__flex">
                                        <h2 class="js-information__left">Novedades</h2>
                                        <img src="<?php echo RUTA_IMG?>promo/new.png" data-toggle="tooltip" data-placement="left" title="Conoce las novedades para este trimestre">
                                    </div>
                                    <p><?php echo $novedades ?></p>
                                </div>
                                <div class="js-information">
                                    <div class="js-information__flex">
                                        <h2 class="js-information__left">T&eacute;rminos y Condiciones</h2>
                                    </div>
                                    <p><?php echo $condiciones ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-xs-12 text-right" id="textRight">
                            <div class="js-iquote">
                                <div class="js-iquote__left">
                                    <img src="<?php echo RUTA_IMG?>fondo/fondo1.jpg">
                                </div>
                                <div class="js-iquote__right">
                                    <img class="header_promocion--iquote" src="<?php echo RUTA_IMG?>logo/logo_iquote.png" data-toggle="modal" data-target="#ModalIquote" onclick="abrirModal()" style="display: inline-block;">
                                    <p class="click_here">Ingresa y cotiza directamente a trav&eacute;s de nuestra herramienta iQuote. <a data-toggle="modal" data-target="#ModalIquote" onclick="abrirModal()">Click aquí.</a></p>
                                </div>
                            </div>
                            <div class="js-iquote">
                                <div class="promocion_categoria js-promocion__categoria"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center" id="cardTexto" style="display: none">
                            <h4>¡Próximamente! En esta sección, encontrarás las mejores ofertas y promociones durante un tiempo muy limitado. ¡Mantente al tanto!</h4>
                        </div>
                    </div>
                    <div class="mdl-container__promocion col-xs-12 p-0">
                        <div class="js-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="js-accordion__title" role="tab" id="headingOne">
                                <a class="mdl-button mdl-js-button mdl-js-ripple-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Ver lista detallada de productos en esta promoci&oacute;n
                                </a>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect js-default" onclick="triggerBoton()">descargar en excel</button>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="table-responsive table_categoria">
                                    <table id="tableCategoria" class="table table-striped">
                                        <thead>
                                            <tr class="tr-header-reporte">
                                                <th>Product number ID</th>
                                                <th>Product Description</th>
                                            </tr>
                                        </thead>
                                        <tbody id="promociones">
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
        <footer class="col-xs-12">
            <div class="mdl-container">
                <small>Para obtener más información acerca de nuestras promociones, cont&aacute;ctanos: <a href="mailto:paola.vallejo@hpe.com">paola.vallejo@hpe.com</a></small>
                <p>&copy; Copyright 2018 Hewlett Packard Enterprise Development LP</p>
            </div>
        </footer>
        <div class="modal fade" id="ModalIquote" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="mdl-card js-modal" style="display: block;">
                        <div class="mdl-card__supporting-text text-center p-l-15 p-r-15">
                            <p>Cotiza directamente con nuestro <a href="https://iquote.hpe.com/aspx/signin.aspx" target="_blank">iQuote </a> Universal</p>
                            <a href="https://iquote.hpe.com/aspx/signin.aspx" target="_blank"><img src="<?php echo RUTA_IMG?>logo/logo_iquote.png"></a>
                            <p>O a trav&eacute;s del iQuote de tu mayorista de confianza.</p>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#caribe" id="tab-caribe" aria-controls="caribe" role="tab" data-toggle="tab">Caribe</a></li>
                                <li><a href="#america" id="tab-america" aria-controls="america" role="tab" data-toggle="tab">CentroAm&eacute;rica</a></li>
                            </ul>
                            <div class="tab-content" id="tabla_contenido">
                                <div role="tabpanel" class="tab-pane fade in active" id="caribe"></div>
                                <div role="tabpanel" class="tab-pane fade" id="america"></div>
                            </div>
                            
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>owl-carousel/owl.carousel.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jsprincipal_es.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jscategorias.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                
            }
            $(window).load(function() {
                $('.buttons-excel').css('display', 'none');
                <?php if($texto != null ) {?>
                    $('#cardTexto').css('display', 'block');
                    $('#textRight').css('display', 'none');
                    $('#textLeft').css('display', 'none');
                    $('#tableCategoria').css('display', 'none');
                    $('.js-accordion').css('display','none');
                <?php } else { ?>
                    $('#textRight').css('display', 'block');
                    $('#textLeft').css('display', 'block');
                <?php } ?>
                $('#id_cate').prop('selectedIndex', 3);
                let openCategoria   = sessionStorage.getItem('OPEN_CATEGORIA');
                let nameCategoria   = sessionStorage.getItem('NAME_CATEGORIA');
                let headerCategoria = sessionStorage.getItem('HEADER_CATEGORIA');
                $('.header_categoria').css("background","url('../public/img/promociones/"+openCategoria+".jpg') no-repeat center center");
                // $('.promocion_categoria').css("background","url('../public/img/promociones/"+openCategoria+"-categoria-es.png') no-repeat top center");
                $('.promocion_categoria').append('<img src="<?php echo RUTA_IMG?>promociones/'+openCategoria+'-categoria-es.jpg">');
                $('#namePromocion').text(nameCategoria);
                $('#nameTerminos').text(nameCategoria);
                $('.header_promocion').find('#E'+openCategoria).css('display','block');
                $('#ModalTerminos').find('#E'+openCategoria+'Terminos').css('display','block');
                $('.selectpicker').val(1);
                $('.menu_header').css('display','flex');
            });
            $( document ).ready(function() {
                let categoria = sessionStorage.getItem('NAME_CATEGORIA');
                let selectCategoria = sessionStorage.getItem('OPEN_MODAL2');
                $('[data-toggle="tooltip"]').tooltip();
            });
            $(document).ready(function() {
                $('#tableCategoria').DataTable( {
                    searching : false,
                    responsive: true,
                    dom: 'Bfrtip',
                    aLengthMenu : [10],
                    buttons: [
                        {
                            extend:'excel',
                            text: 'Exportar a Excel'
                        }
                    ],
                    language : {
                        info : "Mostrando _TOTAL_ registros",
                    }
                });
            });
        </script>
    </body>
</html>