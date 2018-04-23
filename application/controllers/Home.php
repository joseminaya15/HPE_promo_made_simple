<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('tipo_user');
        $this->session->unset_userdata('Id_user');
        $data['nombre'] = ucwords($this->session->userdata('nombre'));
        $this->load->view('v_principal', $data);
	}
    function ingresar(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
            $usuario  = $this->input->post('usuario');
            $password = $this->input->post('password');
            $username = $this->M_solicitud->verificarUsuario($usuario);
            if(count($username) != 0){
                if(strtolower($username[0]->Email) == strtolower($usuario)){
                    if($password == base64_decode($username[0]->pass)){
                        $session = array('usuario'   => $usuario,
                                         'tipo_user' => $username[0]->tipo_user,
                                         'nombre'    => $username[0]->Nombre,   
                                         'Id_user'   => $username[0]->Id);
                        $this->session->set_userdata($session);
                        if($username[0]->tipo_user == 0 && $usuario == 'admin'){
                            $data['redirect'] = 'Listado';
                        }else {
                            $data['pass'] = 'Contraseña incorrecta';
                            $data['redirect'] = 'Home';
                        }
                        if($username[0]->tipo_user == 1){
                           $data['redirect'] = 'Home'; 
                        }else if($username[0]->tipo_user == 2){
                            $data['redirect'] = 'Home'; 
                        }
                        $data['error'] = EXIT_SUCCESS;
                    }else {
                        $data['pass'] = 'Contraseña incorrecta';
                    }
                }
            }
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function registrar(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
            $nombre        = $this->input->post('nombre');
            $usuario       = $this->input->post('usuario');
            $passRegister  = $this->input->post('passRegister');
            $pais          = $this->input->post('pais');
            $tipo_user     = $this->input->post('tipo_user');
            $arrayInsert   = array('Nombre'    => $nombre,
                                 'Email'     => $usuario,
                                 'pass'      => base64_encode($passRegister),
                                 'Pais'      => $pais,
                                 'tipo_user' => 1);
            $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'users');
            $session    = array('nombre'     => $nombre,
                                'usuario'    => $usuario,
                                'pais'       => $pais,
                                'id_capitan' => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
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
