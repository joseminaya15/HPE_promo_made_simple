<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index() {
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        }
		$data['nombre'] = 'hola';
		$this->load->view('v_admin', $data);
	}

    function guardarDatos(){
        $data['error']  = EXIT_ERROR;
        $data['msj']    = null;
        try {
            $tipo               = $this->input->post('tipo');
            $codigo             = $this->input->post('codigo');
            $titulo             = $this->input->post('titulo');
            $fecha              = $this->input->post('fecha');
            $objetivo_comercial = $this->input->post('objetivo_comercial');
            $noticia            = $this->input->post('noticia');
            $ciudades           = $this->input->post('ciudades');
            $condiciones        = $this->input->post('condiciones');
            $imagen             = $this->input->post('imagen');
            $last_units         = $this->input->post('last_units');
            $deal_number        = $this->input->post('deal_number');
            $arrayInsert = array('Tipo'               => $nombre_completo,
                                 'Codigo'             => $codigo,
                                 'Titulo'             => $titulo,
                                 'fecha'              => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Imagen'             => $imagen,
                                 'Last_units'         => $last_units,
                                 'Deal_number'        => $deal_number);
            $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'usuario');
            $session    = array('Tipo'                => $nombre_completo,
                                 'Codigo'             => $codigo,
                                 'Titulo'             => $titulo,
                                 'fecha_caducidad'    => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Imagen'             => $imagen,
                                 'Last_units'         => $last_units,
                                 'Deal_number'        => $deal_number,
                                 'id_card'            => $datoInsert['Id']);
          $this->session->set_userdata($session);
          $data['msj']  = $datoInsert['msj'];
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
}
