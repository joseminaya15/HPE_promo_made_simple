<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado extends CI_Controller {

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
    if($this->session->userdata('tipo_user') != 0){
        header("location: Login");
    }
    $datosCodigo   = $this->M_solicitud->getAnioAndQ();
    $promociones   = $this->M_solicitud->getPromociones($datosCodigo[0]->Q, $datosCodigo[0]->anio);
    $html          = '';
    $tipo_producto = '';
    $cont          = 1;
    $btnFecha      = '';
    $timestamp     = date('Y-m-d');
    $resta         = '';
    $deal_lead     = '';
    foreach ($promociones as $key) {
        if($key->Tipo == 'Volumen'){
            $tipo_producto = 'volumen';
        }
        else if($key->Tipo == 'Valor'){
            $tipo_producto = 'valor';
        }
        $resta = substr($key->fecha_vencimiento, 0, 2) - substr($timestamp, 8, 2);
        if($resta <= 15){
          $btnFecha = '<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Actualizar F. Vencimiento" id="editarFec'.$cont.'"><i class="fa fa-edit"></i></button>';
        }else {
          $btnFecha = '';
        }
        $deal_lead = $key->deal_lead == null ? '-' : $key->deal_lead;
        $html .= '<tr>
                    <td class="titulo_promo">'.$key->Titulo.'</td>
                    <td>'.$key->fecha_inicio.'</td>
                    <td>'.$key->fecha_vencimiento.'</td>
                    <td>'.$deal_lead.'</td>
                    <td><div class="bg-tipo '.$tipo_producto.'"></div>'.$key->Tipo.'</td>
                    <td>'.$key->Pais.'</td>
                    <td class="text-center">
                        '.$btnFecha.'
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
          $id_promo         = $this->input->post('Id_promo');
          $datos            = $this->M_solicitud->getPromocionesById($id_promo);
          $data['pais']     = $datos[0]->Pais;
          $data['tp_user']  = $datos[0]->Tipo_distribuidor;
          $data['deal_lead']= $datos[0]->deal_lead;
          $data['tipo']     = $datos[0]->Tipo;
          $data['limit']    = $datos[0]->Last_units;
          $data['titulo']   = $datos[0]->Titulo;
          $data['fec_ini']  = $datos[0]->fecha_ini;
          $data['fecha']    = $datos[0]->fecha_vencimiento;
          $data['objetivo'] = $datos[0]->Objetivo_comercial;
          $data['new']      = $datos[0]->Noticia;
          $data['condi']    = $datos[0]->Condiciones;
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
        $datosCodigo   = $this->M_solicitud->getAnioAndQ();
        $promociones   = $this->M_solicitud->getPromociones($datosCodigo[0]->Q, $datosCodigo[0]->anio);
        $html          = '';
        $tipo_producto = '';
        $cont          = 1;
        $btnFecha      = '';
        $timestamp     = date('Y-m-d');
        $resta         = '';
        foreach ($promociones as $key) {
            if($key->Tipo == 'Volumen'){
                $tipo_producto = 'volumen';
            }
            else if($key->Tipo == 'Valor'){
                $tipo_producto = 'valor';
            }
            $resta = substr($key->fecha_vencimiento, 0, 2) - substr($timestamp, 8, 2);
            if($resta <= 15){
              $btnFecha = '<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Actualizar F. Vencimiento" id="editarFec'.$cont.'"><i class="fa fa-edit"></i></button>';
            }else {
              $btnFecha = '';
            }
            $html .= '<tr>
                        <td class="titulo_promo">'.$key->Titulo.'</td>
                        <td>'.$key->fecha_inicio.'</td>
                        <td>'.$key->fecha_vencimiento.'</td>
                        <td>'.$key->Tipo_distribuidor.'</td>
                        <td><div class="bg-tipo '.$tipo_producto.'"></div>'.$key->Tipo.'</td>
                        <td>'.$key->Pais.'</td>
                        <td class="text-center">
                            '.$btnFecha.'
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
        $fecha_ini          = $this->input->post('fecha_ini');
        $fecha              = $this->input->post('fecha');
        $objetivo_comercial = $this->input->post('objetivo_comercial');
        $deal_lead          = $this->input->post('deal_lead');
        $noticia            = $this->input->post('noticia');
        $condiciones        = $this->input->post('condiciones');
        $last_units         = $this->input->post('last_units');
        $deal_number        = $this->input->post('deal_number');
        $date_ini           = str_replace('/', '-', $fecha_ini );
        $date               = str_replace('/', '-', $fecha );
        $arrayInsert = array('Tipo'               => $oferta,
                             'Codigo'             => 'Q3 FY18',
                             'Titulo'             => $titulo,
                             'fecha_ini'          => date('Y-m-d', strtotime($date_ini)),
                             'fecha'              => date('Y-m-d', strtotime($date)),
                             'objetivo_comercial' => $objetivo_comercial,
                             'deal_lead'          => $deal_lead,
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
                             'fecha_ini'          => $fecha_ini,
                             'fecha'              => $fecha,
                             'objetivo_comercial' => $objetivo_comercial,
                             'deal_lead'          => $deal_lead,
                             'Noticia'            => $noticia,
                             'Condiciones'        => $condiciones,
                             'Last_units'         => $last_units,
                             'Deal_number'        => $deal_number,
                             'Pais'               => $pais,
                             'Tipo_distribuidor'  => $usuario,
                             'id_promo'           => $datoInsert['Id']);
      $this->session->set_userdata($session);
      $datosCodigo   = $this->M_solicitud->getAnioAndQ();
      $promociones   = $this->M_solicitud->getPromociones($datosCodigo[0]->Q, $datosCodigo[0]->anio);
      $html          = '';
      $tipo_producto = '';
      $cont          = 1;
      $btnFecha      = '';
      $timestamp     = date('Y-m-d');
      $resta         = '';
      foreach ($promociones as $key) {
          if($key->Tipo == 'Volumen'){
              $tipo_producto = 'volumen';
          }
          else if($key->Tipo == 'Valor'){
              $tipo_producto = 'valor';
          }
          $resta = substr($key->fecha_vencimiento, 0, 2) - substr($timestamp, 8, 2);
          if($resta <= 15){
            $btnFecha = '<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Actualizar F. Vencimiento" id="editarFec'.$cont.'"><i class="fa fa-edit"></i></button>';
          }else {
            $btnFecha = '';
          }
          $html .= '<tr>
                      <td class="titulo_promo">'.$key->Titulo.'</td>
                      <td>'.$key->fecha_inicio.'</td>
                      <td>'.$key->fecha_vencimiento.'</td>
                      <td>'.$key->Tipo_distribuidor.'</td>
                      <td><div class="bg-tipo '.$tipo_producto.'"></div>'.$key->Tipo.'</td>
                      <td>'.$key->Pais.'</td>
                      <td class="text-center">
                          '.$btnFecha.'
                          <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$cont.'" onclick="editarPromocion('.$key->Id.')"><i class="mdi mdi-edit"></i></button>
                          <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$cont.'" onclick="modalEliminar(this, '.$key->Id.')"><i class="mdi mdi-delete"></i></button>
                      </td>
                  </tr>';
          $cont++;
      }
      $data['promociones'] = $html;
      $data['msj']   = $datoInsert['msj'];
      $data['error'] = $datoInsert['error'];
    } catch (Exception $e) {
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function actualizarPromocion(){
    $data['error']  = EXIT_ERROR;
    $data['msj']    = null;
    try {
        $pais               = $this->input->post('pais');
        $usuario            = $this->input->post('usuario');
        $oferta             = $this->input->post('oferta');
        $titulo             = $this->input->post('titulo');
        $fecha_ini          = $this->input->post('fecha_ini');
        $fecha              = $this->input->post('fecha');
        $objetivo_comercial = $this->input->post('objetivo_comercial');
        $deal_lead          = $this->input->post('deal_lead');
        $noticia            = $this->input->post('noticia');
        $condiciones        = $this->input->post('condiciones');
        $last_units         = $this->input->post('last_units');
        $deal_number        = $this->input->post('deal_number');
        $date_ini           = str_replace('/', '-', $fecha_ini );
        $date               = str_replace('/', '-', $fecha );
        $arrayUpdt = array('Tipo'               => $oferta,
                           'Codigo'             => 'Q3 FY18',
                           'Titulo'             => $titulo,
                           'fecha_ini'          => date('Y-m-d', strtotime($date_ini)),
                           'fecha'              => date('Y-m-d', strtotime($date)),
                           'objetivo_comercial' => $objetivo_comercial,
                           'deal_lead'          => $deal_lead,
                           'Noticia'            => $noticia,
                           'Condiciones'        => $condiciones,
                           'Last_units'         => $last_units,
                           'Deal_number'        => $deal_number,
                           'Pais'               => $pais,
                           'Tipo_distribuidor'  => $usuario);
      $datoUpdt      = $this->M_solicitud->updateDatos($arrayUpdt, $this->session->userdata('id_promo'), 'cards');
      $datosCodigo   = $this->M_solicitud->getAnioAndQ();
      $promociones   = $this->M_solicitud->getPromociones($datosCodigo[0]->Q, $datosCodigo[0]->anio);
      $html          = '';
      $tipo_producto = '';
      $cont          = 1;
      $btnFecha      = '';
      $timestamp     = date('Y-m-d');
      $resta         = '';
      foreach ($promociones as $key) {
        if($key->Tipo == 'Volumen'){
            $tipo_producto = 'volumen';
        }
        else if($key->Tipo == 'Valor'){
            $tipo_producto = 'valor';
        }
        $resta = substr($key->fecha_vencimiento, 0, 2) - substr($timestamp, 8, 2);
        if($resta <= 15){
          $btnFecha = '<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Actualizar F. Vencimiento" id="editarFec'.$cont.'"><i class="fa fa-edit"></i></button>';
        }else {
          $btnFecha = '';
        }
        $html .= '<tr>
                    <td class="titulo_promo">'.$key->Titulo.'</td>
                    <td>'.$key->fecha_inicio.'</td>
                    <td>'.$key->fecha_vencimiento.'</td>
                    <td>'.$key->Tipo_distribuidor.'</td>
                    <td><div class="bg-tipo '.$tipo_producto.'"></div>'.$key->Tipo.'</td>
                    <td>'.$key->Pais.'</td>
                    <td class="text-center">
                        '.$btnFecha.'
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$cont.'" onclick="editarPromocion('.$key->Id.')"><i class="mdi mdi-edit"></i></button>
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$cont.'" onclick="modalEliminar(this, '.$key->Id.')"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>';
        $cont++;
      }
      $data['promociones'] = $html;
      $data['msj']         = $datoUpdt['msj'];
      $data['error']       = $datoUpdt['error'];
    } catch (Exception $e) {
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function getTablaHistorico(){
    $data['error']  = EXIT_ERROR;
    $data['msj']    = null;
    try {
      $datosQ        = $this->input->post('valueQ');
      $datosCodigo   = $this->M_solicitud->getAnioAndQ();
      $promociones   = $this->M_solicitud->getDatosHistorico($datosCodigo[0]->Q, $datosCodigo[0]->anio);
      $html          = '';
      $tipo_producto = '';
      $cont          = 1;
      $btnFecha      = '';
      $timestamp     = date('Y-m-d');
      $resta         = '';
      foreach ($promociones as $key) {
          if($key->Tipo == 'Volumen'){
              $tipo_producto = 'volumen';
          }
          else if($key->Tipo == 'Valor'){
              $tipo_producto = 'valor';
          }
          $resta = substr($key->fecha_vencimiento, 0, 2) - substr($timestamp, 8, 2);
          if($resta <= 15){
            $btnFecha = '<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Actualizar F. Vencimiento" id="editarFec'.$cont.'"><i class="fa fa-edit"></i></button>';
          }else {
            $btnFecha = '';
          }
          $html .= '<tr>
                      <td class="titulo_promo">'.$key->Titulo.'</td>
                      <td>'.$key->fecha_inicio.'</td>
                      <td>'.$key->fecha_vencimiento.'</td>
                      <td>'.$key->Codigo.'</td>
                      <td>'.$key->deal_lead.'</td>
                      <td><div class="bg-tipo '.$tipo_producto.'"></div>'.$key->Tipo.'</td>
                      <td>'.$key->Pais.'</td>
                  </tr>';
          $cont++;
      }
      $data['historico'] = $html;
      $data['error'] = EXIT_SUCCESS;
    }catch (Exception $e) {
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
}