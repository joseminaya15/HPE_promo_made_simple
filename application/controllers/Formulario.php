<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario extends CI_Controller {

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
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        }
        $id_promo    = $this->session->userdata('id_promo') == null ? '' : $this->session->userdata('id_promo');
        $datos_promo = null;
        $datos_promo = $this->M_solicitud->getPromocionesById($id_promo);
        if(count($datos_promo) == 0){
            $data['titulo']      = '';
            $data['fecha']       = '';
            $data['objetivo_comercial'] = '';
            $data['noticia']     = '';
            $data['ciudades']    = '';
            $data['condiciones'] = '';
            $data['tipo_distribuidor'] = 'Resellers';
            $data['deal_number'] = '';
        }else {
            $data['titulo']             = $datos_promo[0]->Titulo == '' ? '' : $datos_promo[0]->Titulo;
            $data['fecha']              = date_format(date_create($datos_promo[0]->Fecha),"d/m/Y") == '' ? '' : date_format(date_create($datos_promo[0]->Fecha),"d/m/Y");
            $data['objetivo_comercial'] = $datos_promo[0]->Objetivo_comercial == '' ? '' : $datos_promo[0]->Objetivo_comercial;
            $data['noticia']            = $datos_promo[0]->Noticia == '' ? '' : $datos_promo[0]->Noticia;
            $data['ciudades']           = $datos_promo[0]->Ciudades == '' ? '' : $datos_promo[0]->Ciudades;
            $data['condiciones']        = $datos_promo[0]->Condiciones == '' ? '' : $datos_promo[0]->Condiciones;
            $data['tipo_distribuidor']  = $datos_promo[0]->Tipo_distribuidor == '' ? '' : $datos_promo[0]->Tipo_distribuidor;
            $data['deal_number']        = $datos_promo[0]->Deal_number == '' ? '' : $datos_promo[0]->Deal_number;
        }  
		$this->load->view('v_formulario', $data);
	}

    function guardarDatos(){
        $data['error']  = EXIT_ERROR;
        $data['msj']    = null;
        try {
            $tipo               = $this->input->post('tipo_oferta');
            $codigo             = $this->input->post('codigo');
            $titulo             = $this->input->post('titulo');
            $fecha              = $this->input->post('fecha');
            $objetivo_comercial = $this->input->post('objetivo_comercial');
            $noticia            = $this->input->post('noticia');
            $sales              = $this->input->post('sales');
            $bu                 = $this->input->post('bu');
            $ciudades           = $this->input->post('ciudades');
            $condiciones        = $this->input->post('condiciones');
            $imagen             = $this->input->post('imagen');
            $deal_number        = $this->input->post('deal_number');

            $arrayInsert = array('Tipo'               => $tipo,
                                 /*'Codigo'             => $codigo,*/
                                 'Titulo'             => $titulo,
                                 'fecha'              => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Imagen'             => $imagen,
                                 'Contactos_sales'    => $sales,
                                 'Contactos_BU'       => $bu,
                                 'Deal_number'        => $deal_number);
            $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'cards');
            $session    = array('Tipo'                => $nombre_completo,
                                 'Codigo'             => $codigo,
                                 'Titulo'             => $titulo,
                                 'fecha_caducidad'    => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Imagen'             => $tmp_name,
                                 'Contactos_sales'    => $sales,
                                 'Contactos_BU'       => $bu,
                                 'Deal_number'        => $deal_number,
                                 'id_promo'            => $datoInsert['Id']);
          $this->session->set_userdata($session);
          $data['msj']   = $datoInsert['msj'];
          $data['error'] = $datoInsert['error'];
        } catch (Exception $e) {
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

    function actualizarPromocion(){
        $data['error']  = EXIT_ERROR;
        $data['msj']    = null;
        try {
            $tipo               = $this->input->post('tipo_oferta');
            $codigo             = $this->input->post('codigo');
            $titulo             = $this->input->post('titulo');
            $fecha              = $this->input->post('fecha');
            $objetivo_comercial = $this->input->post('objetivo_comercial');
            $noticia            = $this->input->post('noticia');
            $sales              = $this->input->post('sales');
            $bu                 = $this->input->post('bu');
            $ciudades           = $this->input->post('ciudades');
            $condiciones        = $this->input->post('condiciones');
            //$imagen             = $this->input->post('imagen');
            $deal_number        = $this->input->post('deal_number');
            $type=$_FILES['img_up']['type'];
            $tmp_name = $_FILES['img_up']["tmp_name"];
            $name = $_FILES['img_up']["name"];

            $arrayUpdate = array('Tipo'               => $tipo,
                                 /*'Codigo'             => $codigo,*/
                                 'Titulo'             => $titulo,
                                 'fecha'              => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Imagen'             => $tmp_name,
                                 'Contactos_sales'    => $sales,
                                 'Contactos_BU'       => $bu,
                                 'Deal_number'        => $deal_number);
            $datoUpdate = $this->M_solicitud->updateDatos($arrayUpdate, $this->session->userdata('id_promo') , 'cards');
            $session    = array('Tipo'                => $nombre_completo,
                                 'Codigo'             => $codigo,
                                 'Titulo'             => $titulo,
                                 'fecha_caducidad'    => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Imagen'             => $tmp_name,
                                 'Contactos_sales'    => $sales,
                                 'Contactos_BU'       => $bu,
                                 'Deal_number'        => $deal_number);
          $this->session->set_userdata($session);
          $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
