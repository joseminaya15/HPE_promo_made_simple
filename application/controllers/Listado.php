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
        $tipo_producto = '';
        $cont = 1;
        foreach ($promociones as $key) {
            if($key->Tipo == 'Volumen'){
                $tipo_producto = 'volumen';
            }
            else if($key->Tipo == 'Valor'){
                $tipo_producto = 'valor';
            }
            $html .= '<tr>
                        <td class="titulo_promo">'.$key->Titulo.'</td>
                        <td>'.date_format(date_create($key->fecha_vencimiento),"d/m/Y").'</td>
                        <td>'.$key->Tipo_distribuidor.'</td>
                        <td><div class="bg-tipo '.$tipo_producto.'"></div>'.$key->Tipo.'</td>
                        <td>'.$key->Pais.'</td>
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
                            <td>'.$key->Pais.'</td>
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

    function guardarDatos(){
        $data['error']  = EXIT_ERROR;
        $data['msj']    = null;
        try {
            $pais               = $this->input->post('pais');
            $usuario            = $this->input->post('usuario');
            $oferta             = $this->input->post('oferta');
            $titulo             = $this->input->post('titulo');
            $fecha              = $this->input->post('fecha');
            $objetivo_comercial = $this->input->post('objetivo_comercial');
            $noticia            = $this->input->post('noticia');
            $condiciones        = $this->input->post('condiciones');
            $last_units         = $this->input->post('last_units');
            $deal_number        = $this->input->post('deal_number');
            $arrayInsert = array('Tipo'               => $oferta,
                                 'Codigo'             => 'Q3 FY18',
                                 'Titulo'             => $titulo,
                                 'fecha'              => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Last_units'         => $last_units,
                                 'Deal_number'        => $deal_number,
                                 'Pais'               => $pais,
                                 'Tipo_distribuidor'  => $usuario);
            $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'cards');
            $session    = array('Tipo'               => $oferta,
                                 'Codigo'             => 'Q3 FY18',
                                 'Titulo'             => $titulo,
                                 'fecha'              => $fecha,
                                 'objetivo_comercial' => $objetivo_comercial,
                                 'Noticia'            => $noticia,
                                 'Condiciones'        => $condiciones,
                                 'Last_units'         => $last_units,
                                 'Deal_number'        => $deal_number,
                                 'Pais'               => $pais,
                                 'Tipo_distribuidor'  => $usuario,
                                 'id_promo'           => $datoInsert['Id']);
          $this->session->set_userdata($session);
          $data['msj']   = $datoInsert['msj'];
          $data['error'] = $datoInsert['error'];
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}