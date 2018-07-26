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
        $data['sales']  = $this->session->userdata('id_cates');
        $nombre         = explode(" ", ucwords($this->session->userdata('nombre')));
        $data['texto']  = '';
        $combo1         = '';
        $combo2         = '';
        $data['nombre'] = $nombre[0];
        $promos         = $this->M_solicitud->getDatosCategorias($this->session->userdata('Id_user'));
        $idioma         = ( $this->session->userdata('idioma') != '' ) ? $this->session->userdata('idioma') : 'en';
        $pais1   = $this->session->userdata('id_pais');
        $arrPais = explode(',', $pais1);
        $pais2   = (count($arrPais) == 1) ? array($pais1) : $arrPais ;
        if($this->session->userdata('id_cates') == 10){
            $datos = $this->M_solicitud->getDatosInstaSales();
            if(count($datos) == 0){
                $data['texto'] = 'hola';
            }else {
                $data['texto'] = '';
            }
        }else {
            $datos = $this->M_solicitud->getCategoriasxPais($this->session->userdata('id_cates'), $pais2);
        }
        $deal  = $this->M_solicitud->getDealNumber($this->session->userdata('Id_user'), $this->session->userdata('id_cates'));
        $cate  = '';
        $html  = '';
        $cont  = 0;
        $cont1 = 0;
        $dis   = '';
        if(count($datos) != 0){
                foreach ($datos as $key) {
                    $html .= '<tr>
                                  <td>'.$key->sku.'</td>
                                  <td>'.$key->product_desc.'</td>
                              </tr>';
                }
            $data['start_date']  = $datos[0]->fecha_inicio;
            $data['deal_number'] = count($datos) != 0 ? $datos[0]->deal_number : '-';
            $data['end_date']    = $datos[0]->fecha_fin;
            $data['condiciones'] = ($datos[0]->condiciones_es != '') ? '<ul>'.$datos[0]->condiciones_es.'</ul>' : '-' ;
            $data['objetivo']    = ($datos[0]->objetivo_es != '' ) ? $datos[0]->objetivo_es : '-';
            $data['novedades']   = ($datos[0]->novedades_es != '' ) ? $datos[0]->novedades_es : '-';
            $data['qty']         = '';
        }else {
            $cate  = '';
            $html  = '<tr>
                        <td></td>
                        <td></td>
                      </tr>';
            $data['start_date']  = '';
            $data['end_date']    = '';
            $data['condiciones'] = '';
            $data['objetivo']    = '';
            $data['novedades']    = '';
            $data['deal_number'] = '';
            $data['qty']         = '';
        }
        foreach ($promos as $val) {
            // if($val->Id == 10 || $val->Id == 13 || $val->Id == 1 || $val->Id == 3 || $val->Id == 11){
            //     $combo2 .= '<a id="p'.$val->Id.'" class="mdl-menu__item" onclick="goToCategorias(this.id)" data-id="'.$val->Nombre.'">'.$val->Nombre.'</a>';
            // }else {
            //     $combo1 .= '<a id="p'.$val->Id.'" class="mdl-menu__item" onclick="goToCategorias(this.id)" data-id="'.$val->Nombre.'">'.$val->Nombre.'</a>';
            // }
            if($val->Id == 6 || $val->Id == 5 || $val->Id == 15){
                $combo2 .= '<a class="mdl-menu__item" onclick="triggerCategoria(&quot;p'.$val->Id.'&quot;)">'.$val->Nombre.'</a>';
            }else if($val->Id == 13 || $val->Id == 1 || $val->Id == 2 || $val->Id == 11 || $val->Id == 10){
                $combo1 .= '<a class="mdl-menu__item" onclick="triggerCategoria(&quot;p'.$val->Id.'&quot;)">'.$val->Nombre.'</a>';
            }
        }
        $data['combo1']      = $combo1;
        $data['combo2']      = $combo2;
        $data['promociones'] = $html;
        $this->load->view($idioma.'/v_categorias', $data);
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
            $cate  = '';
            $html  = '';
            $cont  = 0;
            $cont1 = 0;
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
                    $cate = $datos[0]->name;
                    foreach ($datos as $key) {
                        $html .= '<tr>
                                      <td>'.$key->product_id.'</td>
                                      <td>'.$key->product_desc.'</td>
                                  </tr>';
                    }
                }
            }
            $data['texto']       = $texto;
            $data['promociones'] = $html;
            $data['error']       = EXIT_SUCCESS;
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
    function abrirModal(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html    = '';
            $html2   = '';
            $id_pais = $this->session->userdata('id_pais');
            $idpais  = (count(explode(',', $id_pais)) == 1 ) ? array($id_pais) : explode(',', $id_pais) ;
            $datos   = $this->M_solicitud->getPartners($idpais);
            $options = $this->M_solicitud->getPaises($this->session->userdata('idioma'));
            $pais    = '';
            foreach ($options as $key) {
                foreach ($idpais as $value) {
                    if($value == $key->Id){
                        $pais .= $key->Nombre.'/';
                    }
                }
            }
            $pais = trim($pais, '/');
            foreach ($datos as $key) {
                if (count(explode(',',$id_pais)) == 1) {
                    $html .= '<div class="mdl-card__iquote">
                                    <div class="js-mayorista">
                                        <img src="'.RUTA_IMG.'logo/'.$key->img.'">
                                    </div>
                                    <a href="'.$key->url.'" target="_blank">iQuote Tool</a>
                              </div>';
                } else {
                    if(explode('/', $pais)[0] == $key->Nombre) {
                        $html .= '<div class="mdl-card__iquote">
                                        <div class="js-mayorista">
                                            <img src="'.RUTA_IMG.'logo/'.$key->img.'">
                                        </div>
                                        <a href="'.$key->url.'" target="_blank">iQuote Tool</a>
                                  </div>';
                    } else {
                        $html2 .= '<div class="mdl-card__iquote">
                                        <div class="js-mayorista">
                                            <img src="'.RUTA_IMG.'logo/'.$key->img.'">
                                        </div>
                                        <a href="'.$key->url.'" target="_blank">iQuote Tool</a>
                                   </div>';
                    }
                }
            }
            $data['iquote']  = $html;
            $data['iquote2'] = $html2;
            $data['pais']    = $pais;
            $data['error']   = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}