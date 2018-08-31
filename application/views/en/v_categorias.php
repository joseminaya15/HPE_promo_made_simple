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
                                <p>Welcome <?php echo $nombre ?></p>
                                <a href="Home" class="home"><span>Home</span><i class="mdi mdi-home"></i></a>
                            </div>
                            <div class="menu_desplegable col-xs-12 p-0">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-menu"></i>Menu
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="col-sm-6 col-xs-12 dropdown-menu__border p-0">
                                        <p>Value</p>
                                        <?php echo $combo1 ?>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 p-0">
                                        <p>Volume</p>
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
                        <input type="text" class="form-control" id="inputSearch" placeholder="Search Product Number ID or Product Description in this list" onkeyup="inputActive(this.id);" onkeypress="verificarDatos(event);">
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
                    <a href="Home" class="js-flex js-go js-return"><i class="mdi mdi-arrow_back"></i>Back to Home</a>
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
                                        <h2 class="js-information__left">Commercial Objetive</h2>
                                    </div>
                                    <p><?php echo $objetivo ?></p>
                                </div>
                                <div class="js-information">
                                    <div class="js-information__flex">
                                        <h2 class="js-information__left">What's New</h2>
                                        <img src="<?php echo RUTA_IMG?>promo/new.png" data-toggle="tooltip" data-placement="left" title="Conoce las novedades para este trimestre">
                                    </div>
                                    <p><?php echo $novedades ?></p>
                                </div>
                                <div class="js-information">
                                    <div class="js-information__flex">
                                        <h2 class="js-information__left">Terms and Conditions</h2>
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
                                    <p class="click_here">Enter and quote directly through our iQuote tool. <a data-toggle="modal" data-target="#ModalIquote" onclick="abrirModal()">Click Here.</a></p>
                                </div>
                            </div>
                            <div class="js-iquote">
                                <div class="promocion_categoria"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center" id="cardTexto" style="display: none">
                            <h4>Coming Soon! In this section you will find the best offers and promotions for a very limited time. Stay tuned!</h4>
                        </div>
                    </div>
                    <div class="mdl-container__promocion col-xs-12 p-0">
                        <div class="js-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="js-accordion__title" role="tab" id="headingOne">
                                <a class="mdl-button mdl-js-button mdl-js-ripple-effect" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                See detailed list of products in this promotion
                                </a>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect js-default" onclick="triggerBoton()">download excel</button>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="table-responsive table_categoria">
                                    <table id="tableCategoria" class="table table-striped">
                                        <thead>
                                            <tr class="tr-header-reporte">
                                                <?php if($sales == 7) { ?>
                                                <th>Product number ID</th>
                                                <th>Product Description</th>
                                                <?php } else { ?>
                                                <th>Product number ID</th>
                                                <th>Product Description</th>
                                                <?php if($qty != '' || $qty != null) { ?>
                                                <th>Est. Qty</th>
                                                <?php } ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody id="promociones">
                                            <?php echo $promociones ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="tableOculta" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="display: none;">
                                <div class="table-responsive table_categoria">
                                    <table id="tableCategoriaOculta" class="table table-striped">
                                        <thead>
                                            <tr class="tr-header-reporte">
                                                <?php if($sales == 14 || $sales == 12) { ?>
                                                <th>Product number ID</th>
                                                <th>Product Description</th>
                                                <th style="display: none">Category</th>
                                                <?php } else { ?>
                                                <th>Product number ID</th>
                                                <th>Product Description</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody id="promociones2">
                                            <?php echo $promociones2 ?>
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
                <small>For more information about our Promos, please contact us: <a href="mailto:maria-alejandra.prieto@hpe.com">maria-alejandra.prieto@hpe.com</a></small>
                <p>&copy; Copyright 2018 Hewlett Packard Enterprise Development LP</p>
            </div>
        </footer>
        <!--  NO BORRAR  -->
        <div class="modal fade" id="ModalIquote" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="mdl-card js-modal" style="display: block;">
                        <div class="mdl-card__supporting-text text-center p-l-15 p-r-15">
                            <p>Quote directly with our Universal <a href="https://iquote.hpe.com/aspx/signin.aspx" target="_blank">iQuote </a></p>
                            <a href="https://iquote.hpe.com/aspx/signin.aspx" target="_blank"><img src="<?php echo RUTA_IMG?>logo/logo_iquote.png"></a>
                            <p>Or through the iQuote of your trusted wholesaler.</p>
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
        <!-- <div class="modal fade" id="ModalIquote" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="mdl-card Ip1 Ip2">
                        <div class="mdl-card__title">
                            <p>For further information, contact your preferred distributor. If you don't have access to the Iquote of any wholesaler you can enter <a href="https://iquote.hpe.com/aspx/signin.aspx" target="_blank">here.</a></p>
                        </div>
                        <div class="mdl-card__supporting-text text-center p-l-15 p-r-15">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#caribe" aria-controls="caribe" role="tab" data-toggle="tab">Caribe</a></li>
                                <li><a href="#america" aria-controls="america" role="tab" data-toggle="tab">CentroAm&eacute;rica</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="caribe">
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_ingram.png">
                                        <a href="http://mi.ingrammicro.com/c/HPiQuoteWelcome.aspx" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <a href="https://store.intcomex.com/Account/Login" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/solutionbox.png">
                                        <a href="https://www.solutionboxusa.com/configuradores?conf=iQuote" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_techdata.png">
                                        <a href="https://sso.techdata.com/as/authorization.oauth2?client_id=shop_client&response_type=code&redirect_uri=https://shop.techdata.com/oauth&pfidpadapterid=ShieldBaseAuthnAdaptor" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_westham.png">
                                        <a href="https://www.wtrade.com/iquote/default.aspx" target="_blank">iQuote Tool</a>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="america">
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <span>Costa Rica</span>
                                        <a href="http://store.intcomex.com/iquote" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_tecnobodega.png">
                                        <span>Guatemala</span>
                                        <a href="https://live.hpiquote.net/aspx/Tree.aspx?lid=10401609075948000547" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <span>El Salvador</span>
                                        <a href="https://live.hpiquote.net/aspx/Tree.aspx?lid=13740954574110992044" target="_blank">iQuote Tool</a>
                                    </div>
                                    <div class="mdl-card__iquote">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <span>Guatemala</span>
                                        <a href="https://live.hpiquote.net/aspx/Tree.aspx?lid=8933099990886705432" target="_blank">iQuote Tool</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                    <div class="mdl-card Ip3 Ip4 Ip5 Ip6 Ip7 Ip8 Ip9 Ip10 Ip11 Ip12 Ip13 Ip14 Ip15 Ip16">
                        <div class="mdl-card__title">
                            <p>For further information, contact your preferred distributor.</a></p>
                        </div>
                        <div class="mdl-card__supporting-text text-center p-l-15 p-r-15">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#caribe1" aria-controls="caribe1" role="tab" data-toggle="tab">Caribe</a></li>
                                <li><a href="#america1" aria-controls="america1" role="tab" data-toggle="tab">CentroAm&eacute;rica</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="caribe1">
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_ingram.png">
                                        <a href="mailto:Erika.MenaMachuca@ingrammicro.com">Erika.MenaMachuca@ingrammicro.com</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <a href="mailto:Anderson.Mendoza@intcomex.com">Anderson.Mendoza@intcomex.com</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/solutionbox.png">
                                        <a href="mailto:ricky_altez@solutionboxusa.com">ricky_altez@solutionboxusa.com</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_techdata.png">
                                        <a href="mailto:LAHPEGSales@techdata.com">LAHPEGSales@techdata.com</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_westham.png">
                                        <a href="mailto:Tatiana.Gomez@wtrade.com">Tatiana.Gomez@wtrade.com</a>
                                    </div>  
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="america1">
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <span>Costa Rica</span>
                                        <a href="mailto:jviquez@intcomex.com">jviquez@intcomex.com</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_tecnobodega.png">
                                        <span>Guatemala</span>
                                        <a href="mailto:acaceres@tecnobodega.com.gt">acaceres@tecnobodega.com.gt</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <span>El Salvador</span>
                                        <a href="mailto:Lilian.Gonzalez@intcomex.com">Lilian.Gonzalez@intcomex.com</a>
                                    </div>
                                    <div class="mdl-card__iquote any">
                                        <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                        <span>Guatemala</span>
                                        <a href="mailto:mariaj.garcia@intcomex.com">mariaj.garcia@intcomex.com</a>
                                    </div>
                                </div>
                            </div>                   
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
        <script type="text/javascript" src="<?php echo RUTA_JS?>jsprincipal_en.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jscategorias1.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                
            }
            $(window).load(function() {
                $('.odd').css('display', 'none');
                $('.buttons-excel').css('display', 'none');
                <?php if($texto != null ) {?>
                    $('#cardTexto').css('display', 'block');
                    $('#textRight').css('display', 'none');
                    $('#textLeft').css('display', 'none');
                    $('#tableCategoriaOculta').css('display', 'none');
                    $('#tableCategoria').css('display', 'none');
                <?php } else { ?>
                    $('#textRight').css('display', 'block');
                    $('#textLeft').css('display', 'block');
                <?php } ?>
                $('#id_cate').prop('selectedIndex', 3);
                let openCategoria   = sessionStorage.getItem('OPEN_CATEGORIA');
                let nameCategoria   = sessionStorage.getItem('NAME_CATEGORIA');
                let headerCategoria = sessionStorage.getItem('HEADER_CATEGORIA');
                $('.header_categoria').css("background","url('../HPE_promo_made_simple/public/img/promociones/"+openCategoria+".jpg') no-repeat center center");
                $('.promocion_categoria').css("background","url('../HPE_promo_made_simple/public/img/promociones/"+openCategoria+"-categoria-en.png') no-repeat top center");
                $('.I'+openCategoria).css('display','block');
                $('#namePromocion').text(nameCategoria);
                $('#nameTerminos').text(nameCategoria);
                $('.header_promocion').find('#E'+openCategoria).css('display','block');
                $('#ModalTerminos').find('#E'+openCategoria+'Terminos').css('display','block');
                $('.selectpicker').val(1);
                $('.menu_header').css('display','flex');
                if(nameCategoria == 'Base Promo' || nameCategoria == 'Server & Storage Flex Attach'){
                    $('.header_promocion--iquote').css('display','inline-block');
                }
            });
            $( document ).ready(function() {
                let categoria = sessionStorage.getItem('NAME_CATEGORIA');
                let selectCategoria = sessionStorage.getItem('OPEN_MODAL2');
            });
            $(document).ready(function() {
                $('#tableCategoriaOculta').DataTable( {
                    searching : false,
                    responsive: true,
                    dom: 'Bfrtip',
                    aLengthMenu : [10],
                    buttons: [
                        {
                            extend:'excel',
                            text: 'Export to Excel'
                        }
                    ],
                    "order": [2, "asc"],
                    language : {
                        info : "Mostrando _TOTAL_ registros",
                    }
                });
            });
            $(document).ready(function() {
                $('#tableCategoria').DataTable( {
                    searching : false,
                    responsive: true,
                    dom: 'Bfrtip',
                    aLengthMenu : [10],
                    buttons: [],
                    language : {
                        info : "Mostrando _TOTAL_ registros",
                    }
                });
            });
        </script>
    </body>
</html>