<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

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
        $timestamp = date('Y-m-d');
        $dates     = $this->M_solicitud->getPromociones();
        $resta     = '';
        $arr_datos = array();
        $html      = '';
        foreach ($dates as $key) {
            $resta = substr($key->fecha_vencimiento, 0, 2) - substr($timestamp, 8, 2);
            if($resta <= 15){
                $html .= '<tr>
                            <td style="text-align: left;border: 1px solid #cccccc;padding: 5px;"><font style="font-family: arial;font-size: 12px;">'.$key->Titulo.'</font></td>
                            <td style="text-align: center;border: 1px solid #cccccc;padding: 5px;"><font style="font-family: arial;font-size: 12px;">'.$key->Tipo.'</font></td>
                            <td style="text-align: center;border: 1px solid #cccccc;padding: 5px;"><font style="font-family: arial;font-size: 12px;">'.$key->fecha_vencimiento.'</font></td>
                        </tr>';
            }
        }
       array_push($arr_datos, $html);
       if(count($arr_datos) > 0){
         $this->sendGmail($arr_datos);
       }
	}

    function sendGmail($html){
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
       $this->email->from('info@sap-latam.com');
       $this->email->to('jhonatanibericom@gmail.com,jose.minayac15@gmail.com,claudia.maguina@merino.com.pe');
       $this->email->subject('Promociones por vencer en HPE promo made simple');
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
                                                        <td><a href="#"><img src="http://test.brainblue.com/HPE_promo_made_simple/public/img/logo/logo_header.svg" width="125" alt="alternative text" border="0" style="display: block;"></a></td>
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
                                            <td style="text-align: center;padding: 0;margin: 0;"><font style="font-family: arial;color: #000000;font-size: 18px;font-weight: 600">Promociones por vencer</font></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0;">
                                                <table width="450" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 20px;">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: left;border: 1px solid #cccccc;padding: 5px;"><font style="font-family: arial;font-size: 14px;">Nombre</font></th>
                                                            <th style="border: 1px solid #cccccc;padding: 5px;"><font style="font-family: arial;font-size: 14px;">Tipo</font></th>
                                                            <th style="border: 1px solid #cccccc;padding: 5px;"><font style="font-family: arial;font-size: 14px;">Fecha de Caducidad</font></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        '.$html[0].'
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;padding-bottom: 20px"><a href="http://test.brainblue.com/HPE_promo_made_simple/Login" target="_blank" style="font-family: arial;color: #00B388;font-size: 14px; text-decoration: underline;font-weight: 600;">Regresar al portal</a></td>
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
