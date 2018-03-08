<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->load->model('M_solicitud');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index(){
        $promociones = $this->M_solicitud->getPromociones();
        $html        = '';
        $cont        = 1;
        $exp         = 1;
        $datos_sales = "";
        $datos_bu    = "";
        $dato_noti   = null;
        $mes         = null;
        $deal_number = null;
        $data['codigo'] = '<h2><strong>'.substr($promociones[0]->Codigo, 0, 2).'</strong>'.substr($promociones[0]->Codigo, 2, 6).'</h2>';
        foreach (explode(",", $promociones[0]->Contactos_sales) as $val){
            $datos_sales .= '<p>'.$val.'</p>';
        }
        foreach (explode(",", $promociones[0]->Contactos_sales) as $dat){
            $datos_bu .= '<p>'.$dat.'</p>';
        }
        foreach ($promociones as $key){
            $date = date_create($key->fecha_vencimiento);
            $mes = date_format($date,"F");
            $dato_noti = $key->Noticia == '' ? '' : '<div class="promocion"><h2 class="title">What’s New!</h2><p>'.$key->Noticia.'</p></div>';
            $deal_number = $key->Tipo_distribuidor == '' ? '' : '<div class="promocion"><h2 class="title">Deal Number</h2><p>'.$key->Deal_number.'</p></div>';
            $html .= '<div class="mdl-card mdl-card-promocion">
                        <div class="mdl-header">
                            <h2>'.$key->Titulo.'</h2>
                            <p>Valid until '.$mes.' '.substr($key->fecha_vencimiento, 8, 10).'</p>
                        </div>
                        <div class="mdl-contenido">
                            <div class="contenido">
                                <div class="promocion">
                                    <h2 class="title">Commercial Objective</h2>
                                    <p>'.$key->Objetivo_comercial.'</p>
                                </div>
                                <div class="promocion">
                                    <p>'.$dato_noti.'</p>
                                </div>
                                <div class="promocion">
                                    <p></p>
                                </div>
                                <div class="promocion">
                                    <h2 class="title">Countries that apply</h2>
                                    <p>'.$key->Ciudades.'</p>
                                </div>
                                <div class="promocion">
                                    <h2 class="title">Contacts</h2>
                                    <p>Sales</p>
                                    '.$datos_sales.'
                                    </br>
                                    <p>BU:</p>
                                    '.$datos_bu.'
                                </div>
                                <div class="promocion">
                                    <h2 class="title">Conditions</h2>
                                    <p>Includes special prices for Pointnext attach
                                    services (local deal)
                                    Some promotions do not apply to all Distributors.
                                    Please review the terms and conditions of this
                                    promotion in pComm.</p>
                                </div>
                            </div>
                            <div class="imagenes text-center">
                                <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                <div class="footer-promocion">
                                    <img src="'.RUTA_IMG.'promo/sellers.png">
                                    <img src="'.RUTA_IMG.'promo/iquote.png">
                                </div>
                            </div>
                        </div>
                    </div>';
            $cont++;
        }
        $data['promociones'] = $html;
		$this->load->view('v_promo', $data);
	}
}
