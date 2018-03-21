<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperar extends CI_Controller {

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
		$this->load->view('v_recuperar_pass');
	}

    function recover(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
            $usuario  = $this->input->post('usuario');
            $username = $this->M_solicitud->verificarUsuario($usuario);
            if(count($username) == 0){
                $data['msj'] = 'No se encuentra registrado';
            }else {
                $data['msj'] = 'Se le envió un email con sus datos';
                //enviar Email
                $data['error'] = EXIT_SUCCESS;
            }
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
