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
        <section id="categoria">
            <div class="header_categoria"></div>
            <div class="search-filter">
                <div class="search-categoria">
                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="mdi mdi-search"></i></button>
                    <div class="search-input">
                        <input type="text" class="form-control" id="inputSearch" placeholder="Search Product Number ID or Product Description" onkeyup="inputActive(this.id)">
                    </div>
                    <div class="search-clear">
                        <button id="buttonClear" class="mdl-button mdl-js-button mdl-button--icon" onclick="clearInput()"><i class="mdi mdi-close"></i></button>
                    </div>
                    <div class="search-icon"><i class="fa fa-server"></i></div>
                </div>
                <div class="filter-categoria" id="combo">
                    <select class="selectpicker" id="id_cate" title="Categor&iacute;as" onchange="getTablaPromos('')">
                        <option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>
                        <option value="HPE Pointnext">HPE Pointnext</option>
                        <option value="Storage Accelerate">Storage Accelerate</option>
                        <option value="Aruba Market Take Over">Aruba Market Take Over</option>
                        <option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>
                        <option value="Aruba Mobility">Aruba Mobility</option>
                    </select>
                </div>
            </div>
        </section>
        <section>
            <div class="mdl-container">
                <div class="tab-content m-t-20">
                    <div role="tabpanel" class="tab-pane fade in active" id="Lista">
                        <div class="table-responsive">
                            <table id="tableCategoria" class="table">
                                <thead>
                                    <tr>
                                        <th>Product number ID</th>
                                        <th>Part Number</th>
                                        <th>Product Description</th>
                                        <th>Product Line</th>
                                        <th>Net Price</th>
                                        <th>Efective Date</th>
                                        <th>End Date</th>
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
        <script src="<?php echo RUTA_JS?>jscategorias.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
            $(window).load(function() {
                $('#id_cate').prop('selectedIndex', 3);
                let openCategoria = sessionStorage.getItem('OPEN_CATEGORIA');
                console.log(openCategoria);
                $('.header_categoria').css("background","url('public/img/promociones/"+openCategoria+".jpg') no-repeat center center");
            });
            $( document ).ready(function() {
                let categoria = sessionStorage.getItem('NAME_CATEGORIA');
                console.log(categoria);
                if(categoria == 'Server & Storage Flex Attach'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>'+
                                            '<option value="HPE Pointnext">HPE Pointnext</option>'+
                                            '<option value="Storage Accelerate">Storage Accelerate</option>'+
                                            '<option value="Aruba Market Take Over">Aruba Market Take Over</option>'+
                                            '<option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>'+
                                            '<option value="Aruba Mobility">Aruba Mobility</option>'+
                                         '</select>');
                }else if(categoria == 'HPE Pointnext'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="HPE Pointnext">HPE Pointnext</option>'+
                                            '<option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>'+
                                            '<option value="Storage Accelerate">Storage Accelerate</option>'+
                                            '<option value="Aruba Market Take Over">Aruba Market Take Over</option>'+
                                            '<option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>'+
                                            '<option value="Aruba Mobility">Aruba Mobility</option>'+
                                         '</select>');
                }else if(categoria == 'Storage Accelerate'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Storage Accelerate">Storage Accelerate</option>'+
                                            '<option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>'+
                                            '<option value="HPE Pointnext">HPE Pointnext</option>'+
                                            '<option value="Aruba Market Take Over">Aruba Market Take Over</option>'+
                                            '<option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>'+
                                            '<option value="Aruba Mobility">Aruba Mobility</option>'+
                                         '</select>');
                }else if(categoria == 'Aruba Market Take Over'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Aruba Market Take Over">Aruba Market Take Over</option>'+
                                            '<option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>'+
                                            '<option value="HPE Pointnext">HPE Pointnext</option>'+
                                            '<option value="Storage Accelerate">Storage Accelerate</option>'+
                                            '<option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>'+
                                            '<option value="Aruba Mobility">Aruba Mobility</option>'+
                                         '</select>');
                }else if(categoria == 'Aruba 3x2 Switches'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>'+
                                            '<option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>'+
                                            '<option value="HPE Pointnext">HPE Pointnext</option>'+
                                            '<option value="Storage Accelerate">Storage Accelerate</option>'+
                                            '<option value="Aruba Market Take Over">Aruba Market Take Over</option>'+
                                            '<option value="Aruba Mobility">Aruba Mobility</option>'+
                                         '</select>');
                }else if(categoria == 'Aruba Mobility'){
                    $('#combo').html('');
                    $('#combo').append('<select class="selectpicker" id="id_cate" onchange="getTablaPromos()">'+
                                            '<option value="Aruba Mobility">Aruba Mobility</option>'+
                                            '<option value="Server & Storage Flex Attach">Server & Storage Flex Attach</option>'+
                                            '<option value="HPE Pointnext">HPE Pointnext</option>'+
                                            '<option value="Storage Accelerate">Storage Accelerate</option>'+
                                            '<option value="Aruba Market Take Over">Aruba Market Take Over</option>'+
                                            '<option value="Aruba 3x2 Switches">Aruba 3x2 Switches</option>'+
                                         '</select>');
                }
                getTablaPromos(categoria);
            });
        </script>
    </body>
</html>