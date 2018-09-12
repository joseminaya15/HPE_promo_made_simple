<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('M_solicitud');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
    public function index(){
        $html   = '';
        $opt    = '';
        $combo1 = '';
        $combo2 = '';
        $user   = $this->session->userdata('Id_user');
        $idioma = 'en';
        $pais1  = $this->session->userdata('id_pais') == '' ? 53 : $this->session->userdata('id_pais');
        $arrPais = explode(',', $pais1);
        $pais2   = (count($arrPais) == 1) ? array($pais1) : $arrPais ;
        $nomPais = $this->M_solicitud->getNombrePais($pais2);
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('tipo_user');
        $nombre  = explode(" ", ucwords($this->session->userdata('nombre')));
        $datos   = $this->M_solicitud->getDatosCategorias($user);
        $options = $this->M_solicitud->getPaises('en');
        $relas   = $this->M_solicitud->getRelacionXCates1();
        $combina1= '';
        $combina2= '';
        $relacion = '';
        $cont     = 1;
        $html1    = '';
        foreach ($options as $val) {
            if($val->Nombre == 'Bolivia') {
                $combina1 .= $val->Nombre.' / Ecuador';
                $opt .= '<option value="'.$combina1.'">'.$combina1.'</option>';
            } else if($val->Nombre == 'Ecuador') {
                $opt .= '';
            } else if($val->Nombre == 'Uruguay') {
                $opt .= '';
            } else if($val->Nombre == 'Paraguay') {
                $combina2 .= $val->Nombre.' / Uruguay';
                $opt .= '<option value="'.$combina2.'">'.$combina2.'</option>';
            } else {
                $opt .= '<option value="'.$val->Nombre.'">'.$val->Nombre.'</option>';
            }
        }
        $var = '';
        $relas2 = $this->M_solicitud->getRelacionXCates2($pais2);
        foreach ($relas as $rel) {
            $html1 = '';
            $var   = '';
            $html .= '<div class="mdl-promociones js-flip">
                        <div class="js-flip__front">
                            <div class="mdl-card__title">
                                <div class="promocion-imagen '.$rel->img.'"></div>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="'.$rel->color.'">'.$rel->nombre_en.'</h2>
                            </div>
                        </div>
                        <div class="js-flip__back">
                            <div class="js-categorias">
                                <h2>'.$rel->nombre_en.'</h2>
                                <ul>';
            foreach ($relas2 as $rels) {
                if($rels->nom_rel == $rel->relacion){
                    $html1 .= '<li><a id="p'.$rels->Id.'" onclick="goToCategorias(this.id)" data-id="'.$rels->Nombre.'">'.$rels->Nombre.'</a></li>';
                    $var  = $html1;
                }
            }
            $html .= $var.' </ul>
                            </div>
                        </div>
                    </div>';
        }
        foreach ($datos as $key) {
            if($key->Id == 6 || $key->Id == 5 || $key->Id == 15){
                $combo2 .= '<a class="mdl-menu__item" onclick="triggerCategoria(&quot;p'.$key->Id.'&quot;)">'.$key->Nombre.'</a>';
            }else if($key->Id == 13 || $key->Id == 1 || $key->Id == 2 || $key->Id == 11 || $key->Id == 10){
                $combo1 .= '<a class="mdl-menu__item" onclick="triggerCategoria(&quot;p'.$key->Id.'&quot;)">'.$key->Nombre.'</a>';
            }
        }
        $data['contenido'] = $html;
        $data['nombre']    = ucwords($nombre[0]);
        $data['options']   = $opt;
        $data['combo1']    = $combo1;
        $data['combo2']    = $combo2;
        if ($idioma == 'en') {
            $data['pais']  = (count($nomPais) == 1) ? $nomPais[0]->Nombre : ($nomPais[0]->Nombre.' y '.$nomPais[1]->Nombre);
        }
        $this->load->view('en/v_principal', $data);
    }
    
    function ingresar(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
            $data['mensaje'] = '';
            $usuario  = $this->input->post('usuario');
            $password = $this->input->post('password');
            $idioma   = $this->session->userdata('idioma');
            $username = $this->M_solicitud->verificarUsuario($usuario);
            $i = 0;
            foreach ($username as $key) {
                if ($key->idioma == 'en') {
                    $i = $i;
                    break;
                } else {
                    $i++;   
                }
            }
            $paises = count($username) == 2 ? $username[0]->Pais != $username[1]->Pais : 0 == 0;
            if(count($username) != 0){
                if($username[$i]->idioma == 'en' && $paises){
                    $arrPais  = explode(' / ', $username[$i]->Pais);
                    $pais2    = (count($arrPais) == 1) ? array($username[$i]->Pais) : $arrPais ;
                    $id_pais  = $this->M_solicitud->getIdPais($pais2);
                    $idpais   = (count($id_pais) == 1) ? $id_pais[0]->Id : ($id_pais[0]->Id.', '.$id_pais[1]->Id);
                    $reg      = $this->valid_email(explode('@',$username[$i]->Email)[1]);
                    if(strtolower($username[$i]->Email) == strtolower($usuario)){
                        if( $reg == true) {
                            $data['mensaje'] = 'Las nuevas políticas de HPE no permiten el ingreso de cuentas gratuitas. Por favor cree una nueva cuenta utilizando un correo corporativo ';
                        } else {
                            if($password == base64_decode($username[$i]->pass)){
                                $session = array('usuario'   => $usuario,
                                                 'tipo_user' => $username[$i]->tipo_user,
                                                 'nombre'    => $username[$i]->Nombre,
                                                 'id_pais'   => $idpais,
                                                 'Id_user'   => $username[$i]->Id,
                                                 'idioma'    => $username[$i]->idioma);
                                $this->session->set_userdata($session);
                                if($username[$i]->tipo_user == TIPO_USER){
                                   $data['redirect'] = 'Home'; 
                                }
                                $data['error'] = EXIT_SUCCESS;
                            }else {
                                $data['pass']  = 'Contraseña incorrecta';
                            }
                        }
                    } 
                } else {
                    $data['pass'] = 'Su correo fue registrado en otro idioma';
                }
            } else {
                $data['pass'] = 'Usuario no registrado';
            }
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function valid_email($val) {
        if (preg_match('/(hotmail.com|yahoo.com|gmail.com)/', $val)) {
            return true;
        }
        return false;
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
            $empresa       = $this->input->post('empresa');
            $arrPais       = explode(' / ', $pais);
            $pais2         = (count($arrPais) == 1) ? array($pais) : $arrPais ;
            $id_pais       = $this->M_solicitud->getIdPais($pais2);
            $idpais        = (sizeof($id_pais) == 1) ? $id_pais[0]->Id : ($id_pais[0]->Id.', '.$id_pais[1]->Id) ;
            $correo_verifi = $this->M_solicitud->verificarUsuario($usuario, $pais);
            if(count($correo_verifi) == 0) {
                $arrayInsert = array('Nombre'    => $nombre,
                                     'Email'     => $usuario,
                                     'pass'      => base64_encode($passRegister),
                                     'Pais'      => $pais,
                                     'empresa'   => $empresa,
                                     'tipo_user' => TIPO_USER,
                                     'id_pais'   => $idpais);
                $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'users');
                $session    = array('nombre'     => $nombre,
                                    'usuario'    => $usuario,
                                    'pais'       => $pais,
                                    'pass'       => $passRegister,
                                    'id_capitan' => $datoInsert['Id']);
                $this->session->set_userdata($session);
                $this->sendGmail($usuario);
                $data['error'] = EXIT_SUCCESS;
                $data['msj']   = 'Registro exitoso';
            } else if($usuario == $correo_verifi[0]->Email){
                $data['msj']   = 'Correo ya registrado';
            }
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
            session_destroy();
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function goToCategorias(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $cate    = trim($this->input->post('cate'));
            $id_cate = $this->M_solicitud->getIdByNameCate($cate);
            $session = array('id_cates' => $id_cate);
            $this->session->set_userdata($session);
            $data['pais']  = $this->session->userdata('id_pais');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e) {
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
            $datos = $this->M_solicitud->searchProductxCatexPais($texto);
            if(count($datos) == 0){
                $html = '<tr>
                            <td></td>
                            <td></td>
                        </tr>';
            }else {
                foreach ($datos as $key) {
                    $html .= '<tr onclick="directPromos('.$key->id_categoria.')" style="cursor: pointer;color: #7991F4;text-decoration: underline;">
                                <td>'.$key->sku.'</td>
                                <td>'.$key->product_desc.'</td>
                                <td>'.$key->Nombre.'</td>
                            </tr>';
                }
            }            
            $data['promociones'] = $html;
            $data['error']       = EXIT_SUCCESS;
        }catch(Exception $e) {
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
                            'smtp_pass' => 'h#120918Pe',
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
      }catch (Exception $e) {
        $data['msj'] = $e->getMessage();
      }
      echo json_encode(array_map('utf8_encode', $data));
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
    function recuperarPass(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $user = $this->input->post('usuario');
            $datosUser = $this->M_solicitud->getDatosUser($user);
            if(count($datosUser) == 0){
                $data['msj'] = 'No existe este usuario';
            }else {
                $this->enviarEmailPass($user, $datosUser[0]->pass);
                $data['error'] = EXIT_SUCCESS;
            }
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function enviarEmailPass($user, $pass){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {  
            $this->load->library("email");
            $configGmail = array('protocol' => 'smtp',
                                'smtp_host' => 'smtpout.secureserver.net',
                                'smtp_port' => 3535,
                                'smtp_user' => 'info@marketinghpe.com',
                                'smtp_pass' => 'h#120918Pe',
                                'mailtype'  => 'html',
                                'charset'   => 'utf-8',
                                'newline'   => "\r\n");    
            $this->email->initialize($configGmail);
            $this->email->from('info@marketinghpe.com');
            $this->email->to('jhonatanibericom@gmail.com');
            $this->email->subject('Recuperó su contraseña en HPE promo made simple');
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
                                                                <td><a href="#"><img src="http://test.brainblue.com/HPE_promo_made_simple/public/img/logo/logo_header.png" width="125" alt="alternative text" border="0" style="display: block;"></a></td>
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
                                                    <td style="text-align: center;padding: 0;margin: 0;"><font style="font-family: arial;color: #000000;font-size: 18px;font-weight: 600">Tu contraseña ha sido recuperada con &eacute;xito</font></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;padding-top: 10px;padding-bottom: 0;"><font style="font-family: arial;color: #757575;font-size: 14px;">Inicia sesi&oacute;n con tu usuario y contrase&ntilde;a</font></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0;">
                                                        <table width="360" cellspacing="0" cellpadding="0" border="0" align="center" style="border: solid 1px #ccc;padding: 20px;">
                                                            <tr>
                                                                <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Usuario:</font></td>
                                                                <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #00B388;font-size: 14px;">'.$user.'</font></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: right;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;color: #757575;">Contrase&ntilde;a:</font></td>
                                                                <td style="text-align: left;padding: 2px 10px;"><font style="font-family: arial;color: #757575;font-size: 14px;">'.base64_decode($pass).'</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;padding: 20px 0"><a href="http://www.hpepromosmadesimple.com/Home" target="_blank" style="font-family: arial;color: #00B388;font-size: 14px; text-decoration: underline;font-weight: 600;">Regresar al portal</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;"><font style="font-family: arial;color: #757575;font-size: 12px;">&copy;Copyright 2018 Hewlett Packard Enterprise Development LP</font></td>
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
