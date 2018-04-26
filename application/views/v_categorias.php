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
    	<title>HPE Promos</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.ico">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.carousel.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owl-carousel/owl.theme.default.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
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
                                <p>Bienvenido(a) <?php echo $nombre ?></p>
                                <a href="Home" class="home">Home<i class="mdi mdi-home"></i></a>
                            </div>
                            <div class="menu_desplegable col-xs-12 p-0">
                                <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                    <i class="mdi mdi-menu"></i>Menu
                                </button>
                                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p1">Server & Storage Flex Attach</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p2">HPE Pointnext</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p3">Storage Accelerate</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p8">Simplivity</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p9">DCN TOR</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p10">3PAR Avalanche & Store Once</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p4">Aruba Market Take Over</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p5">Aruba 3x2 Switches</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p6">Aruba Mobility</a>
                                    <a class="mdl-menu__item" onclick="goToCategorias(this.id)" id="p7">InstaSale</a>
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
                        <input type="text" class="form-control" id="inputSearch" placeholder="Search Product Number ID or Product Description" onkeyup="inputActive(this.id);" onkeypress="verificarDatos(event);">
                    </div>
                    <div class="search-clear">
                        <button id="buttonClear" class="mdl-button mdl-js-button mdl-button--icon" onclick="clearInput()"><i class="mdi mdi-close"></i></button>
                    </div>
                    <div class="search-icon"><i class="fa fa-server"></i></div>
                </div>
                <div class="filter-categoria" id="combo">
                    <select class="selectpicker" id="id_cate" title="Categor&iacute;as" onchange="getTablaPromos()">
                        <?php echo $opcion ?>
                    </select>
                </div>
            </div>
        </section>
        <section id="productos" class="col-xs-12">
            <div class="mdl-container">
                <div class="col-xs-12">
                    <a href="Home" class="return"><i class="mdi mdi-arrow_back"></i>Back to Home</a>
                    <h2 id="namePromocion"></h2>
                    <div class="table-responsive">
                        <table id="tableCategoria" class="table table-striped table-bordered">
                            <thead>
                                <tr class="tr-header-reporte">
                                    <?php if($sales == 7) { ?>
                                    <th>Product number ID</th>
                                    <th>Product Description</th>
                                    <?php } else { ?>
                                    <th>Product number ID</th>
                                    <th>Product Description</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody id="promociones">
                                <?php echo $promociones ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="ModalTerminos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-large" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2>Aruba Mobility</h2>
                            <p>Terms and Conditions</p>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="conditions">
                                <h2>Flex Program Objectives:</h2>
                                <p>This is a program designed to increase Run Rate, Options Attach, to facilitate sales processes and also increase market share</p>
                                <h2>Mediciones / Measurements:</h2>
                                <p>Constant market share monitoring and GM% contribution to the Business Unit</p>
                                <h2>Instrucción de Proceso / Order Proccesing Instructions:</h2>
                                <p>Sell-Out claims must be submitted based on the program Terms and Conditions</p>
                                <h2>Program Logic:</h2>
                                <p>The HPE VAR or Reseller will be able to purchase Flexible Bundles or Packages from the Distributor that will include a fixed discount for each part number (PN). In order for this Promotion to be valid, each equipment will have to be sold with minimum four (4) additional options. All products MUST be reported / sold under the same Distributor invoice number, except for the Care Pack or Hardware Support included in this deal, which can be invoiced at a later time (no later than 8 working days after the Hardware is invoiced) and with a different invoice number.</p>
                                <h2>Important:</h2>
                                <p>All other possible options not included in this Deal (Ups, Racks, etc,) can be added with unlimited quantities and will be priced with the authorized pricing (NDP, or separate Deals). Only the options included in this Deal, will be taken into consideration as valid towards the minimum options required to reach the minimum of 4 valid options at special price.</p>
                                <h2>Valid Compute</h2>
                                <p>Configuration examples:</p>
                                <ol>
                                    <li>1 x Server DL 380 Gen10 + 1 x Memory Dimm FlexPro PN + 2 x Hard Drive FlexPro PN + 1 x HW Support Care Pack PN</li>
                                    <li>1 x Server ML 350 PN + 5 x Hard Drive FlexPro PN + 1 x Redundant Power Supply FlexPro PN + 2 x NIC FlexPro PN</li>
                                    <li>1 x Server BL 460p PN + 2 x Hard Disk + 1 CPU + 1 HW Support Care Pack PN + 1 x MS ROK Server Lic + 1 HP UPS</li>
                                </ol>
                                <h2>Valid Storage</h2>
                                <p>Configuration examples:</p>
                                <ol>
                                    <li>1 x MSA 2040 + 1 x SFP 4Pk + 2 x Hard Drive FlexPro PN + 1 x HW Support Care Pack PN</li>
                                    <li>1 x MSA1040 + 5 x Hard Drive FlexPro PN</li>
                                </ol>
                                <h2>Exception:</h2>
                                <p>The PBM will be the only contact authorized to communicate any exception to the conditions of this Program. To approve any exception, the PBM will request approval from the Regional Channels Director, and then will be able to communicate formal approval to the Distributor. The Distributor is required to present proper argumentation via E-mail to the PBM so that the PBM can proceed to request the exception. In order to claim the rebate, the Distributor will be required to present all regular documents and a copy of the approval mail from the PBM. Any approval must be obtained in advanced, previous to invoicing.</p>
                                <h2>Qualifyng Countries:</h2>
                                <p>Uruguay, Paraguay, Bolivia, CALA, Guatemala, Belice, Honduras, El Salvador, Nicaragua, Costa Rica, Panama, Venezuela, Caribe, Anguilla, Antigua and Barbuda Islands, Aruba, Bahamas, Barbados, Belize, Bermuda, Cayman Islands, Grenada, Guyana, Puerto Rico, Saint Lucia, Saint Viccent and Grenadines, Surinam, Trinidad and Tobago, Turks and Caicos Islands, Virgin Islands(British).</p>
                                <p>The terms and conditions from the printed quote are in full force and effect End of Quote.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
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
        <script type="text/javascript" src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jsprincipal.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jscategorias.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                
            }
            $(window).load(function() {
                $('#id_cate').prop('selectedIndex', 3);
                let openCategoria = sessionStorage.getItem('OPEN_CATEGORIA');
                let nameCategoria = sessionStorage.getItem('NAME_CATEGORIA');
                $('.header_categoria').css("background","url('public/img/promociones/"+openCategoria+".jpg') no-repeat center center");
                $('#namePromocion').text(nameCategoria);
                $('.selectpicker').val(1);
                $('.menu_header').css('display','flex');
            });
            $( document ).ready(function() {
                $('#tableCategoria').DataTable({
                    searching: false,
                    paging: false,
                    info: false
                });
                let categoria = sessionStorage.getItem('NAME_CATEGORIA');
                let selectCategoria = sessionStorage.getItem('OPEN_MODAL2');
                if(categoria == 'Server & Storage Flex Attach'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Servidores" selected>Servidores</option>'+
                                            '<option value="Procesadores">Procesadores</option>'+
                                            '<option value="Memoria">Memoria</option>'+
                                            '<option value="DISCOS FLEX ATTACH">Discos</option>'+
                                            '<option value="Opciones">Opciones</option>'+
                                            '<option value="Storage">Storage</option>'+
                                            '<option value="Software/Licencias">Software/Licencias</option>'+
                                         '</select>');
                }else if(categoria == 'HPE Pointnext'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="ISS Attach Program">ISS Attach Program</option>'+
                                            '<option value="HPN Attach Program">HPN Attach Program</option>'+
                                            '<option value="HPSD Attach Program">HPSD Attach Program</option>'+
                                         '</select>');
                }else if(categoria == 'Storage Accelerate'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Servicios">Servicios</option>'+
                                            '<option value="Backup en Cinta">Backup en Cinta</option>'+
                                            '<option value="Opciones">Opciones</option>'+
                                            '<option value="Storage SAN">Storage SAN</option>'+
                                            '<option value="Discos">Discos</option>'+
                                         '</select>');
                }else if(categoria == 'Simplivity'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="SIMPLIVITY BUNDLE 1">SIMPLIVITY BUNDLE 1</option>'+
                                            '<option value="SIMPLIVITY BUNDLE 2">SIMPLIVITY BUNDLE 2</option>'+
                                            '<option value="SIMPLIVITY BUNDLE 3">SIMPLIVITY BUNDLE 3</option>'+
                                            '<option value="SIMPLIVITY BUNDLE 5">SIMPLIVITY BUNDLE 5</option>'+
                                            '<option value="SIMPLIVITY BUNDLE 6">SIMPLIVITY BUNDLE 6</option>'+
                                         '</select>');
                }else if(categoria == 'DCN TOR'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="DCN PROMO PRODUCTS">DCN PROMO PRODUCTS</option>'+
                                            '<option value="DCN BUNDLE 1">DCN BUNDLE 1</option>'+
                                            '<option value="DCN BUNDLE 2">DCN BUNDLE 2</option>'+
                                         '</select>');
                }else if(categoria == '3PAR Avalanche & Store Once'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="3PAR BUNDLE 1">3PAR BUNDLE 1</option>'+
                                            '<option value="3PAR BUNDLE 2">3PAR BUNDLE 2</option>'+
                                         '</select>');
                }else if(categoria == 'Aruba Market Take Over'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Switch Series">Switch Series</option>'+
                                            '<option value="Access Router">Access Router</option>'+
                                            '<option value="Access Points">Access Points</option>'+
                                         '</select>');
                }else if(categoria == 'Aruba 3x2 Switches'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Switch Series">Switch Series</option>'+
                                            '<option value="Office Connect - Switch Series">Office Connect - Switch Series</option>'+
                                         '</select>');
                }else if(categoria == 'Aruba Mobility'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Access Points">Access Points</option>'+
                                            '<option value="Bridge Series">Bridge Series</option>'+
                                            '<option value="Access Router">Access Router</option>'+
                                         '</select>');
                }
            });
        </script>
    </body>
</html>