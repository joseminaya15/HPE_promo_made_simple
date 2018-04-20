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
        $data['nombre'] = ucwords($this->session->userdata('nombre'));
        $html      = null;
        $cont      = 1;
        $datos     = $this->M_solicitud->getDatosProducts(1);
        foreach ($datos as $key) {
            $html .= '<tr>
                        <td>'.$key->product_id.'</td>
                        <td>'.$key->part_number.'</td>
                        <td>'.$key->product_desc.'</td>
                        <td>'.$key->product_line.'</td>
                        <td>'.$key->net_price.'</td>
                        <td>'.$key->effect_date.'</td>
                        <td>'.$key->fecha_fin.'</td>
                    </tr>';
            $cont++;
        }
        $data['promociones'] = $html;
        $this->load->view('v_categorias', $data);
	}

    function getCategorias(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html      = null;
            $cont      = 1;
            $categoria = $this->input->post('categoria');
            $id_cate   = $this->M_solicitud->getIdCategoria($categoria);
            $datos     = $this->M_solicitud->getDatosProducts(intval($id_cate));
            if(count($datos) == 0){
                $html = '<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>';
            }else {
                foreach ($datos as $key) {
                $html .= '<tr>
                            <td>'.$key->product_id.'</td>
                            <td>'.$key->part_number.'</td>
                            <td>'.$key->product_desc.'</td>
                            <td>'.$key->product_line.'</td>
                            <td>'.$key->net_price.'</td>
                            <td>'.$key->effect_date.'</td>
                            <td>'.$key->fecha_fin.'</td>
                        </tr>';
                $cont++;
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
            $html      = null;
            $cont      = 1;
            $texto = $this->input->post('texto');
            $cate  = $this->input->post('sub_cate');
            $sub_cate = $this->M_solicitud->getIdCategoria($cate);
            if($texto == null || $texto == ''){
                $datos = $this->M_solicitud->getDatosProducts(intval($sub_cate));
            }else {                
                $datos = $this->M_solicitud->getDatosBuscadorProducts($sub_cate, $texto);
            }
            if(count($datos) == 0){
                $html = '<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>';
            }else {
                foreach ($datos as $key) {
                    $html .= '<tr>
                                <td>'.$key->product_id.'</td>
                                <td>'.$key->part_number.'</td>
                                <td>'.$key->product_desc.'</td>
                                <td>'.$key->product_line.'</td>
                                <td>'.$key->net_price.'</td>
                                <td>'.$key->effect_date.'</td>
                                <td>'.$key->fecha_fin.'</td>
                            </tr>';
                    $cont++;
                }
            }            
            $data['promociones'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}