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
                        <div class="col-xs-6 text-left p-0 opacity">
                            <a href="Distis"><img src="<?php echo RUTA_IMG?>logo/logo_header.svg"></a>
                        </div>
                        <div class="col-xs-6 text-right p-0 opacity">
                            <div class="menu_header">
                                <p>Welcome <?php echo $nombre ?></p>
                                <a href="Home" class="home">Home<i class="mdi mdi-home"></i></a>
                            </div>
                            <div class="menu_desplegable col-xs-12 p-0">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-menu"></i>Menu
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="col-sm-6 col-xs-12 p-0">
                                        <p>Value</p>
                                        <a id="p4" class="mdl-menu__item" onclick="goToCategorias(this.id)">HPE Pointnext</a>
                                        <a id="p7" class="mdl-menu__item" onclick="goToCategorias(this.id)">HPE Simplivity</a>
                                        <a id="p8" class="mdl-menu__item" onclick="goToCategorias(this.id)">Datacenter Networking - ToR</a>
                                        <a id="p11" class="mdl-menu__item" onclick="goToCategorias(this.id)">3PAR Avalanche & Store Once</a>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 dropdown-menu__border p-0">
                                        <p>Volume</p>
                                        <a id="p2" class="mdl-menu__item" onclick="goToCategorias(this.id)">Server & Storage Flex Attach</a>
                                        <a id="p6" class="mdl-menu__item" onclick="goToCategorias(this.id)">Storage Accelerate</a>
                                        <a id="p12" class="mdl-menu__item" onclick="goToCategorias(this.id)">Aruba Market Take Over</a>
                                        <a id="p13" class="mdl-menu__item" onclick="goToCategorias(this.id)">Aruba 3x2 Switches</a>
                                        <a id="p14" class="mdl-menu__item" onclick="goToCategorias(this.id)">Aruba Mobility</a>
                                        <a id="p15" class="mdl-menu__item" onclick="goToCategorias(this.id)">InstaSale</a>
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
        <section id="productos" class="col-xs-12">
            <div class="mdl-container">
                <div class="col-xs-12">
                    <a href="Home" class="return"><i class="mdi mdi-arrow_back"></i>Back to Home</a>
                    <h2 id="namePromocion"></h2>
                    <div class="header_promocion">
                        <div class="col-xs-6 p-0">
                            <div id="Ep2" class="encabezado">
                                <p><strong>Promo name:</strong><span>Server & Storage Flex Attach</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep2T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep4" class="encabezado">
                                <p><strong>Promo name:</strong><span>HPE Pointnext</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep4T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep6" class="encabezado">
                                <p><strong>Promo name:</strong><span>Storage Accelerate</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep6T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep7" class="encabezado">
                                <p><strong>Promo name:</strong><span>Promo Simplivity</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep7T"  onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep8" class="encabezado">
                                <p><strong>Promo name:</strong><span>DCN Promo</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep8T"  onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep11" class="encabezado">
                                <p><strong>Promo name:</strong><span>3PAR Avalanche & Store Once</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep11T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep12" class="encabezado">
                                <p><strong>Promo name:</strong><span>Aruba Market Take Over</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep12T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep13" class="encabezado">
                                <p><strong>Promo name:</strong><span>Aruba 3x2 Switches</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep13T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                            <div id="Ep14" class="encabezado">
                                <p><strong>Promo name:</strong><span>Aruba Mobility</span></p>
                                <p><strong>Start date:</strong><span><?php echo $start_date ?></span></p>
                                <p><strong>End date:</strong><span><?php echo $end_date ?></span></p>
                                <small id="Ep14T" onclick="openModalTerminos(this.id)">Terms and Conditions</small>
                            </div>
                        </div>
                        <div class="col-xs-6 p-0 text-right">
                            <img class="header_promocion--iquote" src="<?php echo RUTA_IMG?>logo/logo_iquote.png" data-toggle="modal" data-target="#ModalIquote">
                            <p class="click_here">Request a quote today. <a data-toggle="modal" data-target="#ModalIquote">Click Here.</a></p>
                        </div>
                    </div>
                    <div class="mdl-container__promocion col-xs-12 p-0">
                        <div class="promocion_categoria"></div>
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
            </div>
        </section>
        <div class="modal fade" id="ModalTerminos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-large" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2 id="nameTerminos"></h2>
                            <p>Terms and Conditions</p>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div id="Ep2Terminos" class="conditions">
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
                            <div id="Ep4Terminos" class="conditions">
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
                            <div id="Ep6Terminos" class="conditions">
                                <p>Terms and Conditions for Latin America Region - Rebates Discounts 12/01/2010</p>
                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                            <div id="Ep7Terminos" class="conditions">
                                <p>Terms and Conditions for Latin America Region - Rebates Discounts 12/01/2010</p>
                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                            <div id="Ep8Terminos" class="conditions">
                                <p>Terms and Conditions DCN TOP-OF-RACK:</p>
                                <h2>DCN TOR:</h2>
                                <p>The DCN Top-Of-Rack promotion was created as bundles (of hardware and service included) to be used as 'Attach' on Data Center business (eg: Servers, Storage) as Top-Of-Rack Switches. Do not forget to include it in all your business!</p>
                                <p>Bundle 1: DCN TOR 5700 Bundle (JG896A HPE 5700 40XG 2QSFP + Switch)</p>
                                <p>Bundle 2: DCN TOR 5940 Bundle (JH395A HPE FF 5940 48SFP + 6QSFP + Switch)</p>
                                <h2>Additional components:</h2>
                                <ul>
                                    <li>JD097C HPE X240 10G SFP + SFP + 3m DAC Cable</li>
                                    <li>JD095C HPE X240 10G SFP + SFP + 0.65m DAC Cable</li>
                                    <li>JG081C HPE X240 10G SFP + SFP + 5m DAC Cable</li>
                                    <li>JD096C HPE X240 10G SFP + SFP + 1.2m DAC Cable</li>
                                    <li>JG326A HPE X240 40G QSFP + QSFP + 1m DAC Cable</li>
                                    <li>JL439A HPE X130 10G SFP + LC LR DC XCVR</li>
                                    <li>JG325B HPE X140 40G QSFP + MPO SR4 XCVR</li>
                                    <li>JG330A HPE X240 QSFP + 4x10G SFP + 3m DAC Cable</li>
                                    <li>JG327A HPE X240 40G QSFP + QSFP + 3m DAC Cable</li>
                                    <li>H6Z42A HPE 16Gb FC / 10GbE 100m SFP + XCVR</li>
                                    <li>JL437A HPE X130 10G SFP + LC SR DC XCVR</li>
                                    <li>JC683A HPE 58x0AF Frt (prt) Bck (pwr) Fan Tray</li>
                                    <li>JC682A HPE 58x0AF Bck (pwr) Frt (prt) Fan Tray</li>
                                    <li>JG552A HPE X711 Frt (prt) Bck (pwr) HV Fan Tray</li>
                                    <li>JC680A HPE 58x0AF 650W AC Power Supply</li>
                                    <li>JG900A HPE A58x0AF 300W AC Power Supply</li>
                                </ul>
                                <p>The Part numbers of Top-Of-Rack are NOT BEST SELLERS, since it is a promo of value. Because of this, it is NOT created for inventory (but it can be used for this purpose, under consideration and direct responsibility of the wholesaler)</p>
                                <p>Consult at www.hpe3steps.com for the incentives to "attach" TOR in your current deals</p>
                                <p>The promo is subject to changes (price or inclusion / change of bundles when necessary)</p>
                                <p>The prom was created for DCN Attach in Data Center business (Not created to be used in Edge, Mobility and Campus businesses where the offer to position is Aruba) The misuse of the promo can lead to penalties of the wholesaler and his exit from the promo deal.</p>
                                <p>Terms and Conditions for Latin America Region - Rebates Discounts</p>
                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                            <div id="Ep11Terminos" class="conditions">
                                <p>Terms and Conditions DCN TOP-OF-RACK:</p>
                                <h2>BUNDLES AVALANCHE 3PAR</h2>
                                <p>The 3PAR Avalanche promotion 'AFA' and 'Affordable' always involves the purchase of a Base Bundle. Additional optional required, They will work at standard price. You can not buy without the services included in the bundle.</p>
                                <p>Bundle 1: 3PAR 8200 AFA (K2Q36B, HPE 3PAR 8200 2N + SW Storage Field Base) with a RAW capacity of 11.5 TB (6 x 1.92TB SSD) in solid state, all licensed.</p>
                                <p>Bundle 2: 3PAR 8200 Affordable (K2Q36B, HPE 3PAR 8200 2N + SW Storage Field Base) with a RAW capacity of 9.6TB (8 x 1.2TB HDD 10K) on hard disk, all licensed.</p>
                                <p>The Part numbers of Avalanche are NOT BEST SELLERS, since it is a promo of value. Because of this, it is NOT created for inventory (but it can be used for this purpose under consideration and direct responsibility of the wholesaler)</p>
                                <p>The misuse of the promo can lead to penalties of the wholesaler and his exit from the deal.</p>
                                <p>The maximum validity time for order entry on this promo, on October 15 of 2018.</p>
                                <p>Promo valid to be used by distributor with authorized primary ID in the opportunity.</p>
                                <p>Terms and Conditions for Latin America Region - Rebates Discounts</p>
                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                            <div id="Ep12Terminos" class="conditions">
                                <p>Promo for Caribe and Centro America in order to accelerate Run Rate</p>
                                <p>Promo rules</p>
                                <p>Special discount is granted to SMB channels for the Caribbean and Central America, Urguay and Paraguay with the aim of accelerating runrate.</p>
                                <p>Quantities limited to those authorized in the Deal</p>
                                <ul>
                                    <li>The Reseller must sell only in the territories approved in its distribution agreement.</li>
                                    <li>The Reseller must keep the proof of sale under the distribution agreement for purposes audit.</li>
                                    <li>Proof of compliance consists of: invoice, track account air, and export or import declaration.</li>
                                </ul>
                                <p>The Sales Out must be restricted to authorized resellers / wholesalers for the countries authorized as specified in your current Distribution agreement with HPE. The rape of these restrictions will lead to lack of qualification to participate in this or in any future program.</p>
                                <p>Hewlett-Packard Enterprise reserves the right to change or cancel this promotion, and review all related documentation at any time without prior notice All Claims in this promo must include the promotion number.</p>
                                <p>The PDF document is considered the official announcement and the wholesaler must access it through Price Communicator.</p>

                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                            <div id="Ep13Terminos" class="conditions">
                                <ol>
                                    <li>This promo is valid under the condition of purchase of pussycat (3) three switches of the same SKU, Swicthes can not be combined, that is, if 2530 and 2930F are purchased, 3 units of 2530 and 3 units of 2930F must be billed.</li>
                                    <li>Minimum amount 3 Units, maximum amount 15 Units per invoice.</li>
                                    <li>Applies to limited amounts in the deal, Inventory in Stock Miami exclusively.</li>
                                    <li>Caribbean and Central America Territories.</li>
                                </ol>
                                <p>Terms and Conditions for Latin America Region - Rebates Discounts 12/01/2010</p>
                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                            <div id="Ep14Terminos" class="conditions">
                                <h2>If a Customer is specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner End-User Special Negotiated Discount Program Terms.</p>
                                <p>Or</p>
                                <h2>If a Customer is not specified in this quotation:</h2>
                                <p>Partner acknowledges and agrees that, in addition to the Terms contained within this Quotation, that acceptance of this quotation constitutes acceptance of the Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms. The Hewlett Packard Enterprise Partner Product Promotion and Channel Partner Discount Terms that can be found on the Partner Portal apply to commercial Promotions only.</p>
                                <p>These Terms can be found on the Hewlett Packard Enterprise Partner Portal. Customer has the meaning defined in your Hewlett Packard Enterprise Partner Agreement.</p>
                                <h2>Other Notes:</h2>
                                <p>This is not a legal quote. The Terms & Conditions rule the content and processing of the Operational Guideline herein, and is the official document to process and recognize the discount(s) set herein.</p>
                                <h2>Offering Types:</h2>
                                <ul>
                                    <li>Product Line (PL): Offering which applies to all of the Hewlett Packard Enterprise product numbers within the quoted PL.</li>
                                    <li>Product Number (PN): Offering which applies to the designated product number only.</li>
                                    <li>Bundle (BD): Offering which applies to the entire configuration or "bundle" only, purchased as a group.</li>
                                    <li>BD Net Price: Fixed Big Deal / End-User Special Negotiated Discount Net Price offered on the product number or bundle.</li>
                                    <li>Offering Type: Indication of which non-standard offering is authorized for each item on the quote; BD Net Price, % off Hewlett Packard Enterprise List.</li>
                                </ul>
                                <h2>Dates:</h2>
                                <p>Promotion Begin/End Date: This is the period of the validity of the promotion. The fields used in Eclipse to indicate the dates are: Ship Begin / Ship End.</p>
                                <p>Channel End Date: This date is used only for rebates and mark the last day when the reseller can submit the information for payment. This must be added in the comments section as External Comments using the special terms and conditions as Channel End Date.</p>
                                <p>Promotion rebate payment end date: This date is used only for rebates and mark the last day Hewlett Packard Enterprise must make the payment of the rebate to the reseller. This must be added in the comments section as External Comments using the special terms and conditions as Promotion rebate payment end date.</p>
                                <p>*The approved amount per unit must be added in the external comments (IDA).</p>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalIquote" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <p>For further information, contact your preferred distributor.</p>
                        </div>
                        <div class="mdl-card__supporting-text text-center">
                            <div class="mdl-card__iquote">
                                <img src="<?php echo RUTA_IMG?>logo/logo_ingram.png">
                                <a href="http://mi.ingrammicro.com/c/HPiQuoteWelcome.aspx" target="_blank">iQuote Tool</a>
                            </div>
                            <div class="mdl-card__iquote">
                                <img src="<?php echo RUTA_IMG?>logo/logo_intcomex.png">
                                <a href="" target="_blank">iQuote Tool</a>
                            </div>
                            <div class="mdl-card__iquote">
                                <img src="<?php echo RUTA_IMG?>logo/logo_solution.png">
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
        <!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
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
                let openCategoria   = sessionStorage.getItem('OPEN_CATEGORIA');
                let nameCategoria   = sessionStorage.getItem('NAME_CATEGORIA');
                let headerCategoria = sessionStorage.getItem('HEADER_CATEGORIA');
                $('.header_categoria').css("background","url('public/img/promociones/"+openCategoria+".jpg') no-repeat center center");
                $('.promocion_categoria').css("background","url('public/img/promociones/"+openCategoria+"-categoria.png') no-repeat top center");
                $('#namePromocion').text(nameCategoria);
                $('#nameTerminos').text(nameCategoria);
                $('.header_promocion').find('#E'+openCategoria).css('display','block');
                $('#ModalTerminos').find('#E'+openCategoria+'Terminos').css('display','block');
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