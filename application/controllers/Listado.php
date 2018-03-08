<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado extends CI_Controller {

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
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        }
        $promociones = $this->M_solicitud->getPromociones();
        $html = '';
        $cont = 1;
        foreach ($promociones as $key) {
            $html .= '<tr>
                        <td>'.$key->Titulo.'</td>
                        <td>'.$key->fecha_vencimiento.'</td>
                        <td>'.$key->Tipo_distribuidor.'</td>
                        <td>'.$key->Tipo.'</td>
                        <th>'.$key->Pais.'</th>
                        <td class="text-center">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$cont.'"><i class="mdi mdi-edit"></i></button>
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$cont.'"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr>';
            $cont++;
        }
        $data['promociones'] = $html;
		$this->load->view('v_listado', $data);
	}
}