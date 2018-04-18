<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distis extends CI_Controller {

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
        if($this->session->userdata('tipo_user') != 2){
            header("location: Login");
        }
        $promociones = $this->M_solicitud->getPromocionesDistis();
        if(count($promociones) != 0){
            $html           = '';
            $cont           = 1;
            $exp            = 1;
            $datos_sales    = "";
            $datos_bu       = "";
            $dato_noti      = null;
            $mes            = null;
            $deal_number    = null;
            $color          = null;
            $last_units     = "";
            $data['codigo'] = '<h2><strong>'.substr($promociones[0]->Codigo, 0, 2).'</strong>'.substr($promociones[0]->Codigo, 2, 6).'</h2>';
            foreach ($promociones as $key){
                if($key->Tipo == 'Valor'){
                    $color = '#F69779';
                }else if($key->Tipo == 'Volumen'){
                    $color = '#624967';
                }
                if($key->Last_units == 0){
                    $last_units = '<div class="sale">
                                        <h2>FINAL SALE!</h2>
                                        <p>LAST UNITS</p>
                                    </div>';
                    $data['titulo'] = 'Only For Limited Time';
                }else {
                    $last_units = "";
                    $data['titulo'] = 'HIT Volumen Promo';
                }
                $date        = date_create($key->fecha_vencimiento);
                $mes         = date_format($date,"F");
                $dato_noti   = $key->Noticia == '' ? '' : '<div class="promocion"><h2 class="title">What’s New!</h2><p>'.$key->Noticia.'</p></div>';
                $deal_number = $key->Tipo_distribuidor == '' ? '' : '<div class="promocion"><h2 class="title">Deal Number</h2><p>'.$key->Deal_number.'</p></div>';
                $html .= '<div class="mdl-card mdl-card-promocion">
                            <div class="mdl-header" style="background-color: '.$color.' !important">
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
                                        <p>'.$deal_number.'</p>
                                    </div>
                                    <div class="promocion">
                                        <h2 class="title">Conditions</h2>
                                        <p>'.$key->Condiciones.'</p>
                                    </div>
                                </div>
                                <div class="imagenes text-center">
                                    '.$last_units.'
                                    <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                    <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                    <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                    <div class="footer-promocion col-xs-12">
                                        <div class="col-xs-6">
                                            <img src="'.RUTA_IMG.'promo/sellers.png">
                                        </div>
                                        <div class="col-xs-6">
                                            <img src="'.RUTA_IMG.'promo/iquote.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                $cont++;
            }
            $data['promociones'] = $html;
        }
        $data['nombre'] = ucwords($this->session->userdata('nombre'));
		$this->load->view('v_distis', $data);
	}
    function buscarPromo(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try{
            $texto       = $this->input->post('texto');
            $promociones = $this->M_solicitud->buscarPromocionDistis($texto);
            if(count($promociones) == 0){
                $data['msj'] = 'No se encontró ninguna promoción';
            }else {
                $html        = '';
                $cont        = 1;
                $datos_sales = "";
                $datos_bu    = "";
                $color       = null;
                $last_units  = "";
                foreach ($promociones as $key){
                    if($key->Tipo == 'Valor'){
                        $color = '#F69779';
                    }else if($key->Tipo == 'Volumen'){
                        $color = '#624967';
                    }
                    if($key->Last_units == 0){
                        $last_units = '<div class="sale">
                                            <h2>FINAL SALE!</h2>
                                            <p>LAST UNITS</p>
                                        </div>';
                        $data['titulo'] = 'Only For Limited Time';
                    }else {
                        $last_units = "";
                        $data['titulo'] = 'HIT Volumen Promo';
                    }
                    $date        = date_create($key->fecha_vencimiento);
                    $mes         = date_format($date,"F");
                    $dato_noti   = $key->Noticia == '' ? '' : '<div class="promocion"><h2 class="title">What’s New!</h2><p>'.$key->Noticia.'</p></div>';
                    $deal_number = $key->Tipo_distribuidor == '' ? '' : '<div class="promocion"><h2 class="title">Deal Number</h2><p>'.$key->Deal_number.'</p></div>';
                    $html .= '<div class="mdl-card mdl-card-promocion">
                                <div class="mdl-header" style="background-color: '.$color.' !important">
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
                                            <h2 class="title">Conditions</h2>
                                            <p>'.$key->Condiciones.'</p>
                                        </div>
                                    </div>
                                    <div class="imagenes text-center">
                                        '.$last_units.'
                                        <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                        <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                        <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                        <div class="footer-promocion col-xs-12">
                                            <div class="col-xs-6">
                                                <img src="'.RUTA_IMG.'promo/sellers.png">
                                            </div>
                                            <div class="col-xs-6">
                                                <img src="'.RUTA_IMG.'promo/iquote.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    $cont++;
                }
                $data['promociones'] = $html;
                $data['error']       = EXIT_SUCCESS;
            }
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function filtroPromociones(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $filtro      = $this->input->post('filtro');
            $promociones = $this->M_solicitud->getDatosFiltro($filtro, 'Distis');
            if(count($promociones) == 0){
                return;
            }
            $html        = '';
            $cont        = 1;
            $datos_sales = "";
            $datos_bu    = "";
            $color       = null;
            $last_units  = "";
            foreach ($promociones as $key){
                if($key->Tipo == 'Valor'){
                    $color = '#F69779';
                }else if($key->Tipo == 'Volumen'){
                    $color = '#624967';
                }
                if($key->Last_units == 0){
                    $last_units = '<div class="sale">
                                        <h2>FINAL SALE!</h2>
                                        <p>LAST UNITS</p>
                                    </div>';
                    $data['titulo'] = 'Only For Limited Time';
                }else {
                    $last_units = "";
                    $data['titulo'] = 'HIT Volumen Promo';
                }
                $date        = date_create($key->fecha_vencimiento);
                $mes         = date_format($date,"F");
                $dato_noti   = $key->Noticia == '' ? '' : '<div class="promocion"><h2 class="title">What’s New!</h2><p>'.$key->Noticia.'</p></div>';
                $deal_number = $key->Tipo_distribuidor == '' ? '' : '<div class="promocion"><h2 class="title">Deal Number</h2><p>'.$key->Deal_number.'</p></div>';
                $html .= '<div class="mdl-card mdl-card-promocion">
                            <div class="mdl-header" style="background-color: '.$color.' !important">
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
                                        <h2 class="title">Conditions</h2>
                                        <p>'.$key->Condiciones.'</p>
                                    </div>
                                </div>
                                <div class="imagenes text-center">
                                    '.$last_units.'
                                    <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                    <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                    <img class="imagen-promocion" src="'.RUTA_IMG.'promo/promo1.png">
                                    <div class="footer-promocion col-xs-12">
                                        <div class="col-xs-6">
                                            <img src="'.RUTA_IMG.'promo/sellers.png">
                                        </div>
                                        <div class="col-xs-6">
                                            <img src="'.RUTA_IMG.'promo/iquote.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                $cont++;
            }
            $data['promociones'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('Id_user');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
