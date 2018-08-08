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
        $html3          = '';
        $cates = $this->session->userdata('id_cates');
        $data['nombre'] = $nombre[0];
        $promos         = $this->M_solicitud->getDatosCategorias($this->session->userdata('Id_user'));
        $idioma         = ( $this->session->userdata('idioma') != '' ) ? $this->session->userdata('idioma') : 'en';
        $pais1   = $this->session->userdata('id_pais');
        $arrPais = explode(',', $pais1);
        $pais2   = (count($arrPais) == 1) ? array($pais1) : $arrPais ;

        $datos2 = $this->M_solicitud->getCategoriasxPais($this->session->userdata('id_cates'), $pais2, 1);
        if($cates == 12 || $cates == 14){
            $datos2 = $this->M_solicitud->getCategoriasValue($this->session->userdata('id_cates'), $pais2, 1);
        }
        if(count($datos2) != 0){
            foreach ($datos2 as $val) {
                if($cates == 12 || $cates == 14){
                    $html3 .='<tr>
                            <td>'.$val->sku.'</td>
                            <td>'.$val->product_desc.'</td>
                            <td style="display: none">'.$val->sub_cate.'</td>
                        </tr>';
                }else {
                    $html3 .='<tr>
                            <td>'.$val->sku.'</td>
                            <td>'.$val->product_desc.'</td>
                        </tr>';
                }
            }
        }

        if($this->session->userdata('id_cates') == 10){
            $datos = $this->M_solicitud->getDatosInstaSales();
            if(count($datos) == 0){
                $data['texto'] = 'hola';
            }else {
                $data['texto'] = '';
            }
        }else {
            $datos = $this->M_solicitud->getCategoriasxPais($this->session->userdata('id_cates'), $pais2, 1);
            if($datos[0]->id_categoria == 14 || $datos[0]->id_categoria == 12){
                $datos = $this->M_solicitud->getCategoriasValue($this->session->userdata('id_cates'), $pais2, 1);
            }
        }
        $deal  = $this->M_solicitud->getDealNumber($this->session->userdata('Id_user'), $this->session->userdata('id_cates'));
        $cate  = '';
        $html  = '';
        $cont  = 0;
        $cont1 = 0;
        $dis   = '';
        $deal2 = null;
        if(count($datos) != 0){
                foreach ($datos as $key) {
                    if($key->deal_number != $datos[0]->deal_number){
                        $deal2 = $key->deal_number;
                    }else {
                        $deal2 = null;
                        if($datos[0]->id_categoria == 14 || $datos[0]->id_categoria == 12) {
                            if($cate != $key->sub_cate) {
                                $cate = $key->sub_cate;
                                $cont = 0;
                            }else {
                                if($cont == 0){
                                    $html .= '<thead>
                                                <tr>
                                                    <th colspan="2" style="border: none !important; background-color: #FFFFFF; color: #000000; font-size: 16px;padding: 10px 5px;font-family: MetricBold">'.$cate.'</th>
                                                </tr>
                                              </thead>';
                                    $cont = 1;
                                }
                            }
                            $html .='<tbody>
                                    <tr>
                                        <td>'.$key->sku.'</td>
                                        <td>'.$key->product_desc.'</td>
                                    </tr>
                                </tbody>';
                        }else {
                            $html .='<tr>
                                        <td>'.$key->sku.'</td>
                                        <td>'.$key->product_desc.'</td>
                                    </tr>';
                        }
                    }
                }
            $data['start_date']  = $datos[0]->fecha_inicio;
            $data['deal_number'] = count($datos) != 0 ? $datos[0]->deal_number : '-';
            $data['deal_number1'] = $deal2 != null ? '<p><span style="margin-left: 120px;">'.$deal2.'</span></p>' : '';
            $data['end_date']    = $datos[0]->fecha_fin;
            if ($pais1 == "6, 7" && $cates == 2) {
                $data['condiciones'] = ($datos[0]->condiciones_es != '') ? '<ul>'.$datos[0]->condiciones_es.'<li>Esta promoción solo aplica para Ecuador.</li></ul>' : '-' ;
            } else if ($pais1 == 12 || $pais1 == 14 || $pais1 == 18 || $pais1 == 21 || $pais1 == 24 || $pais1 == 25) {
                $data['condiciones'] = ($datos[0]->condiciones_en != '') ? '<ul>'.$datos[0]->condiciones_en.'</ul>' : '-' ;
            } else {
                $data['condiciones'] = ($datos[0]->condiciones_es != '') ? '<ul>'.$datos[0]->condiciones_es.'</ul>' : '-' ;    
            }
            if (($pais1 == 2 || $pais1 == 3 || $pais1 == 4) && $cates == 13 ) {
                $data['objetivo']    = '¡Aprovecha los precios agresivos en las licencias más vendidas, cuando están en el furor del mercado!';
                $data['novedades']   = '-';
            } else {
                $data['objetivo']    = ($datos[0]->objetivo_es != '' ) ? $datos[0]->objetivo_es : '-';
                $data['novedades']   = ($datos[0]->novedades_es != '' ) ? $datos[0]->novedades_es : '-';
            }
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
                $combo2 .= '<a class="mdl-menu__item" onclick="triggerCategoria(&quot;p'.$val->Id.'&quot;)" data-id="'.$val->Nombre.'">'.$val->Nombre.'</a>';
            }else if($val->Id == 13 || $val->Id == 1 || $val->Id == 2 || $val->Id == 11 || $val->Id == 10){
                $combo1 .= '<a class="mdl-menu__item" onclick="triggerCategoria(&quot;p'.$val->Id.'&quot;)" data-id="'.$val->Nombre.'">'.$val->Nombre.'</a>';
            }
        }
        $data['promociones2'] = $html3;
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
                $datos = $this->M_solicitud->getDatosBuscadorProducts($this->session->userdata('id_cates'), $texto, 1);
            }
            // print_r($datos);
            // exit;
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
                                    <td>'.$key->sku.'</td>
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
                    //$cate = $datos[0]->name;
                    foreach ($datos as $key) {
                        $html .= '<tr>
                                      <td>'.$key->sku.'</td>
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
                    if($id_pais == 12 || $id_pais == 13 || $id_pais == 14 || $id_pais == 18 || $id_pais == 21 || $id_pais == 22) {
                        $pais = 'CENTRO AMÉRICA';
                    } else if($value == $key->Id){
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
                                    </div>';
                    if($id_pais == 12 || $id_pais == 13 || $id_pais == 14 || $id_pais == 18 || $id_pais == 21 || $id_pais == 22) {
                        if ($id_cate == 1 || $id_cate == 2) {
                            $html .= '<a href="'.$key->url.'" target="_blank">iQuote Tool</a>
                                          </div>';
                        } else {
                            $html .= '<a href="mailto:'.$key->correo.'">'.$key->correo.'</a>
                                          </div>';
                        }
                    } else {
                        $html .= '<a href="'.$key->url.'" target="_blank">iQuote Tool</a>
                              </div>';
                    }
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