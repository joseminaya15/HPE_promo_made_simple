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
		//$this->load->view('v_distis');
	}

    function verificarFecha(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $timestamp = date('Y-m-d');
            $dates     = $this->M_solicitud->getPromociones();
            $resta     = '';
            $arr_title = array();
            $arr_fecha = array();
            $arr_tipo  = array();
            foreach ($dates as $key) {
                $resta = substr($key->fecha_vencimiento, 8, 2) - substr($timestamp, 8, 2);
                if($resta <= 15){
                    array_push($arr_title, $key->Titulo);
                    array_push($arr_fecha, $key->fecha_vencimiento);
                    array_push($arr_tipo, $key->Tipo);
                }
            }
           // print_r($arr_title);
            echo $arr_title;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){

        }
        //return json_encode($data);
    }

    function sendGmail($email){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array('protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'confirmaciones@merino.com.pe',
                            'smtp_pass' => 'cFm$17Pe',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n");
       $this->email->initialize($configGmail);
       $this->email->from('info@sap-latam.com');
       $this->email->to('jhiberico@gmail.com');
       $this->email->subject('Estoy interesado en SAP Business One para mi negocio.');
       $texto = '';
       $this->email->message($texto);
       $this->email->send();
       $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
        $data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }
}
