<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

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
        $html           = null;
        $opciones       = '<option><option>';
        $data['sales']  = $this->session->userdata('id_cates');
        $data['nombre'] = ucwords($this->session->userdata('nombre'));
        if($this->session->userdata('id_cates') == 7){
            $datos = $this->M_solicitud->getDatosInstaSales();
            $opciones = '<option value="SERVIDORES">SERVIDORES</option>'.
                        '<option value="PROCESADORES">PROCESADORES</option>'.
                        '<option value="DISCOS FLEX ATTACH">DISCOS</option>'.
                        '<option value="OPCIONES">OPCIONES</option>'.
                        '<option value="STORAGE">STORAGE</option>'.
                        '<option value="SOFTWARE/LICENCIAS">SOFTWARE/LICENCIAS</option>'.
                        '<option value="ISS ATTACH PROGRAM">ISS ATTACH PROGRAM</option>'.
                        '<option value="HPN ATTACH PROGRAM">HPN ATTACH PROGRAM</option>'.
                        '<option value="HPSD ATTACH PROGRAM">HPSD ATTACH PROGRAM</option>'.
                        '<option value="SERVICIOS">SERVICIOS</option>'.
                        '<option value="BACKUP EN CINTA">BACKUP EN CINTA</option>'.
                        '<option value="OPCIONES">OPCIONES</option>'.
                        '<option value="STORAGE SAN">STORAGE SAN</option>'.
                        '<option value="DISCOS">DISCOS</option>'.
                        '<option value="SWITCH SERIES">SWITCH SERIES</option>'.
                        '<option value="OFFICE CONNECT - SWITCH SERIES">OFFICE CONNECT - SWITCH SERIES</option>'.
                        '<option value="ACCESS POINTS">ACCESS POINTS</option>'.
                        '<option value="BRIDGE SERIES">BRIDGE SERIES</option>'.
                        '<option value="ACCESS ROUTER">ACCESS ROUTER</option>';
            $data['opcion'] = $opciones;
        }else {
            $id_sub_cate = $this->M_solicitud->getIdSubCategoria($this->session->userdata('id_cates'));
            if(count($id_sub_cate) == 0){
                return;
            }
            $datos = $this->M_solicitud->getDatosProducts($id_sub_cate[0]->Id); 
            $data['opcion'] = $opciones;
        }
        foreach ($datos as $key) {
            if($this->session->userdata('id_cates') == 7){
                $html .= '<tr>
                            <td>'.$key->product_id.'</td>
                            <td>'.$key->product_desc.'</td>
                        </tr>';
            }else {
                $html .= '<tr>
                            <td>'.$key->product_id.'</td>
                            <td>'.$key->product_desc.'</td>
                        </tr>';
            }
        }
        $data['promociones'] = $html;
        $this->load->view('v_categorias', $data);
	}
    function getCategorias(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html      = null;
            $categoria = $this->input->post('categoria');
            $id_cate   = $this->M_solicitud->getIdCategoria($categoria);
            $datos     = $this->M_solicitud->getDatosProducts(intval($id_cate));
            if($this->session->userdata('id_cates') == 7){
                if(count($datos) == 0){
                    $html = '<tr>
                                <td></td>
                                <td></td>
                            </tr>';
                }else {
                    foreach ($datos as $key) {
                    $html .= '<tr>
                                <td>'.$key->product_id.'</td>
                                <td>'.$key->product_desc.'</td>
                            </tr>';
                    }
                }
            }else {
                if(count($datos) == 0){
                    $html = '<tr>
                                <td></td>
                                <td></td>
                            </tr>';
                }else {
                    foreach ($datos as $key) {
                    $html .= '<tr>
                                <td>'.$key->product_id.'</td>
                                <td>'.$key->product_desc.'</td>
                            </tr>';
                    }
                }   
            }         
            $data['promociones'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function buscarPromo(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html  = null;
            $texto = $this->input->post('texto');
            $cate  = $this->input->post('sub_cate');
            if($texto == null || $texto == ''){
                $datos = $this->M_solicitud->getDatosProductsByName($cate);
            }else {             
                $datos = $this->M_solicitud->getDatosBuscadorProducts($cate, $texto);
            }
            if($this->session->userdata('id_cates') == 7){
                if(count($datos) == 0){
                    $html = '<tr>
                                <td></td>
                                <td></td>
                            </tr>';
                }else {
                    foreach ($datos as $key) {
                        $html .= '<tr>
                                    <td>'.$key->product_id.'</td>
                                    <td>'.$key->product_desc.'</td>
                                </tr>';
                    }
                } 
            }else {
                if(count($datos) == 0){
                    $html = '<tr>
                                <td></td>
                                <td></td>
                            </tr>';
                }else {
                    foreach ($datos as $key) {
                        $html .= '<tr>
                                    <td>'.$key->product_id.'</td>
                                    <td>'.$key->product_desc.'</td>
                                </tr>';
                    }
                }
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