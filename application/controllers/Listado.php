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
        if($this->session->userdata('tipo_user') != 0){
            header("location: Login");
        }
        $promociones = $this->M_solicitud->getPromociones();
        $html = '';
        $cont = 1;
        foreach ($promociones as $key) {
            $html .= '<tr>
                        <td class="titulo_promo">'.$key->Titulo.'</td>
                        <td>'.date_format(date_create($key->fecha_vencimiento),"d/m/Y").'</td>
                        <td>'.$key->Tipo_distribuidor.'</td>
                        <td>'.$key->Tipo.'</td>
                        <th>'.$key->Pais.'</th>
                        <td class="text-center">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$cont.'" onclick="editarPromocion('.$key->Id.')"><i class="mdi mdi-edit"></i></button>
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$cont.'" onclick="modalEliminar(this, '.$key->Id.')"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr>';
            $cont++;
        }
        $data['promociones'] = $html;
        $this->session->unset_userdata('id_promo');
		$this->load->view('v_listado', $data);
	}

    function editarPromocion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id_promo = $this->input->post('Id_promo');
            $this->session->set_userdata(array('id_promo' => $id_promo));
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function eliminarPromo(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id_promo = $this->input->post('Id_promo');
            $this->M_solicitud->deleteDatos($id_promo);
            $promociones = $this->M_solicitud->getPromociones();
            $html = '';
            $cont = 1;
            foreach ($promociones as $key) {
                $html .= '<tr>
                            <td class="titulo_promo">'.$key->Titulo.'</td>
                            <td>'.$key->fecha_vencimiento.'</td>
                            <td>'.$key->Tipo_distribuidor.'</td>
                            <td>'.$key->Tipo.'</td>
                            <th>'.$key->Pais.'</th>
                            <td class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$cont.'" onclick="editarPromocion('.$key->Id.')"><i class="mdi mdi-edit"></i></button>
                                <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$cont.'" onclick="modalEliminar(this, '.$key->Id.')"><i class="mdi mdi-delete"></i></button>
                            </td>
                        </tr>';
                $cont++;
            }
            $data['promociones'] = $html;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}