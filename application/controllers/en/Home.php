<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");
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
        $nombre = explode(" ", ucwords($this->session->userdata('nombre')));
        $data['nombre'] = $nombre[0];
        $this->load->view('en/v_principal', $data);
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
                            $data['pass']     = 'Contraseña incorrecta';
                            $data['redirect'] = 'Home';
                        }
                        if($username[0]->tipo_user == 1){
                           $data['redirect'] = 'Home'; 
                        }else if($username[0]->tipo_user == 2){
                            $data['redirect'] = 'Home'; 
                        }
                        $data['error'] = EXIT_SUCCESS;
                    }else {
                        $data['pass']  = 'Contraseña incorrecta';
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
                                'pass'       => $passRegister,
                                'id_capitan' => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $this->sendGmail($usuario);
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
    function goToCategorias(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $cate    = $this->input->post('cate');
            $id_cate = $this->M_solicitud->getIdByNameCate($cate);
            $session = array('id_cates' => $id_cate);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function buscarPromo(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html  = null;
            $cate  = null;
            $texto = $this->input->post('texto');
            $datos = $this->M_solicitud->getDatosBuscadorProductsByCate($texto);
            if(count($datos) == 0){
                $html = '<tr>
                            <td></td>
                            <td></td>
                        </tr>';
            }else {
                foreach ($datos as $key) {
                    $html .= '<tr onclick="directPromos('.$key->id_cates.')" style="cursor: pointer;color: #7991F4;text-decoration: underline;">
                                <td>'.$key->product_id.'</td>
                                <td>'.$key->product_desc.'</td>
                                <td>'.$key->Nombre.'</td>
                            </tr>';
                }
            }            
            $data['promociones'] = $html;
            $data['error']       = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function sendGmail($email){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array('protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'info@marketinghpe.com',
                            'smtp_pass' => 'hpeinfo18',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n");
       $this->email->initialize($configGmail);
       $this->email->from('info@marketinghpe.com');
       $this->email->to($this->session->userdata('usuario'));
       $this->email->subject('Bienvenido a Promo Made Simple');
       $texto = '<!DOCTYPE html>
                <html>
                    <body>
                        <table width="500px" cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #ccc;">
                            <tr>
                                <td>
                                    <table width="500" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #415564;padding: 10px 20px;">
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><img src="'.RUTA_HPE.'public/img/logo/logo_header.png" width="120" border="0" style="display: block;"></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                    <tr>
                                                        <td><font style="font-family: arial;color: #FFFFFF;font-weight: 600;">Promos Made Simple</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="400" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 30px 0">
                                        <tr>
                                            <td style="text-align: center;padding: 20px 0;margin: 0;"><font style="font-family: arial;color: #000000;font-size: 18px;font-weight: 600">Welcome to Promos Made Simple</font></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;padding-top: 10px;padding-bottom: 0;"><font style="font-family: arial;color: #757575;font-size: 14px;">Login with your username and password</font></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0;">
                                                <table width="360" cellspacing="0" cellpadding="0" border="0" align="center" style="border: solid 1px #ccc;padding: 20px;">
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">Username:</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">'.$this->session->userdata('usuario').'</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">Password:</font></td>
                                                        <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">'.$this->session->userdata('pass').'</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;padding: 20px 0"><a href="http://marketinghpe.com/HPE_promo_made_simple/Home" target="_blank" style="font-family: arial;color: #00B388;font-size: 14px; text-decoration: underline;font-weight: 600;">Back to portal</a></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><font style="font-family: arial;color: #D3D3D3;font-size: 12px;">&copy;2018 Hewlett Packard Enterprise Development LP</font></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>';
       $this->email->message($texto);
       $this->email->send();
       $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
        $data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }
    function goTo(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $idioma  = $this->input->post('idioma');
            $session = array('idioma' => $idioma);
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('Id_user');
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}