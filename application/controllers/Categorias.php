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
        $html           = '';
        $data['sales']  = $this->session->userdata('id_cates');
        $nombre = explode(" ", ucwords($this->session->userdata('nombre')));
        $data['nombre'] = $nombre[0];
        if($this->session->userdata('id_cates') == 10){
            $datos = $this->M_solicitud->getDatosInstaSales();
        }else {
            $datos = $this->M_solicitud->getDatosProducts($this->session->userdata('id_cates')); 
        }
        foreach ($datos as $key) {
            if($this->session->userdata('id_cates') == 10){
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
            if($this->session->userdata('id_cates') == 10){
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
            if($texto == null || $texto == ''){
                $datos = $this->M_solicitud->getDatosProductsByName($this->session->userdata('id_cates'));
            }else {             
                $datos = $this->M_solicitud->getDatosBuscadorProducts($this->session->userdata('id_cates'), $texto);
            }
            if($this->session->userdata('id_cates') == 10){
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
}