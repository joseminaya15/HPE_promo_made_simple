<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperar extends CI_Controller {

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
                $this->sendGmail($usuario, base64_decode($username[0]->pass));
                $data['msj'] = 'Se le envió un email con sus datos';
                $data['error'] = EXIT_SUCCESS;
            }
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function sendGmail($email, $pass){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $configGmail = array('protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'info@sap-latam.com',
                            'smtp_pass' => 'sapinfo18',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n");
       $this->email->initialize($configGmail);
       $this->email->from('info@marketinghpe.com');
       $this->email->to($email);
       $this->email->subject('Su contraseña fue recuperada en HPE Promo Made Simple');
       $texto = '<!DOCTYPE html>
                    <html>
                        <body>
                            <table width="500px" cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #ccc;">
                                <tr>
                                    <td>
                                        <table width="500" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #415564;padding: 20px;">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td><img src="http://test.brainblue.com/HPE_promo_made_simple/public/img/logo/logo_header.svg" width="125" alt="alternative text" border="0" style="display: block;"></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                        <tr>
                                                            <td><font style="font-family: arial;color: #FFFFFF;font-weight: 600;">Promo Made Simple</font></td>
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
                                                <td style="text-align: center;padding: 0;margin: 0;"><font style="font-family: arial;color: #000000;font-size: 18px;font-weight: 600">Tu contraseña ha sido recuperada con &eacute;xito</font></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;padding-top: 10px;padding-bottom: 0;"><font style="font-family: arial;color: #757575;font-size: 14px;">Inicia sesi&oacute;n con tu usuario y contrase&ntilde;a</font></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px 0;">
                                                    <table width="360" cellspacing="0" cellpadding="0" border="0" align="center" style="border: solid 1px #ccc;padding: 20px;">
                                                        <tr>
                                                            <td style="text-align: right;padding: 2px 10px;"><fonts style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Usuario</font></td>
                                                            <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #00B388;font-size: 14px;">'.$email.'</font></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Contrase&ntilde;a</font></td>
                                                            <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #00B388;font-size: 14px;">'.$pass.'</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;padding: 20px 0"><a href="http://test.brainblue.com/HPE_promo_made_simple/Login" target="_blank" style="font-family: arial;color: #00B388;font-size: 14px; text-decoration: underline;font-weight: 600;">Regresar al portal</a></td>
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
}
