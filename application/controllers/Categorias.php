<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

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
        $data['nombre'] = ucwords($this->session->userdata('nombre'));
        $this->load->view('v_categorias', $data);
	}

    function getCategorias(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html      = null;
            $cont      = 1;
            $categoria = $this->input->post('categoria');
            $id_cate   = $this->M_solicitud->getDatosProducts($categoria);
            $datos     = $this->M_solicitud->getDatosProducts($id_cate);
            foreach ($datos as $key) {
                $html .= '<tr>
                            <td>'.$key->program_name.'</td>
                            <td>'.$key->product_id.'</td>
                            <td>'.$key->part_number.'</td>
                            <td>'.$key->product_desc.'</td>
                            <td>'.$key->cp_description.'</td>
                            <td>'.$key->product_line.'</td>
                            <td>'.$key->modelo_hw.'</td>
                            <td>'.$key->est_qty.'</td>
                            <td>'.$key->net_price.'</td>
                            <td>'.$key->addl_disc.'</td>
                            <td>'.$key->offerty_type.'</td>
                            <td>'.$key->quoted_currency.'</td>
                            <td>'.$key->effective_date.'</td>
                            <td>'.$key->end_date.'</td>
                        </tr>';
                $cont++;
            }
            $data['promociones'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}