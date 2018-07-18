<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }
    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1){
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }
    function verificarUsuario($user){
        $sql = "SELECT *,
                       CASE WHEN (id_pais <= 25) THEN 'es'
                            WHEN (id_pais >= 26 AND id_pais <= 52) THEN 'en'
                            ELSE 'es'
                        END AS idioma
                  FROM users
                 WHERE Email LIKE '%".$user."%'";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getDatosProducts($id_cate, $idioma){
        $texto = '';
        if($idioma == 'es'){
          $texto = "DATE_FORMAT(c.fec_ini, '%m/%d/%Y') AS effect_date,
                       DATE_FORMAT(c.fec_fin, '%m/%d/%Y') AS fecha_fin,";
        }else {
          $texto = "DATE_FORMAT(p.start_date, '%d/%m/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin,";
        }
        $sql = "SELECT p.*,
                       s.name,
                       c.Nombre,
                       ".$texto."
                       p.est_qty,
                       c.condiciones_es,
                       c.objetivo_es,
                       c.novedades_es
                  FROM products p,
                       categorias c,
                       sub_categorias s
                 WHERE p.id_sub_cate = s.Id
                   AND s.id_cate = c.Id
                   AND c.Id = ?
              ORDER BY s.name";
        $result = $this->db->query($sql, array($id_cate));
        return $result->result();
    }
    function getDatosBuscadorProducts($id_cate, $texto){
        $sql = "SELECT p.*,
                       s.name,
                       c.Nombre,
                       DATE_FORMAT(p.start_date, '%d/%m/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
                  FROM products p,
                       categorias c,
                       sub_categorias s
                 WHERE p.id_sub_cate = s.Id
                   AND s.id_cate = c.Id
                   AND c.Id LIKE ?
                   AND (p.product_id LIKE '%".$texto."%' OR p.product_desc LIKE '%".$texto."%');";
        $result = $this->db->query($sql, array($id_cate));
        return $result->result();
    }
    function getDatosProductsByName($id_cate){
        $sql = "SELECT p.*,
                       s.name,
                       c.Nombre,
                       DATE_FORMAT(p.start_date, '%d/%m/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
                  FROM products p,
                       categorias c,
                       sub_categorias s
                 WHERE p.id_sub_cate = s.Id
                   AND s.id_cate = c.Id
                   AND c.Id LIKE ?";
        $result = $this->db->query($sql, array($id_cate));
        return $result->result();
    }
    function getDatosCron(){
        $sql = "SELECT c.Nombre,
                       DATE_FORMAT(p.start_date, '%d/%m/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
                  FROM products p,
                       sub_categorias s,
                       categorias c
                 WHERE p.id_sub_cate = s.Id
                   AND c.Id = s.id_cate
                   AND IF(CONVERT(SUBSTRING(p.end_date, 9, 2), SIGNED INTEGER) - CONVERT(SUBSTRING(CURDATE(), 9, 2), SIGNED INTEGER) <= 15, TRUE, FALSE)
                   AND SUBSTRING(CURDATE(), 3, 2) = SUBSTRING(p.end_date, 3, 2)
                   AND SUBSTRING(CURDATE(), 6, 2) = SUBSTRING(p.end_date, 6, 2)
              GROUP BY c.Nombre
                 LIMIT 50";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getDatosBuscadorProductsByCate($texto){
        $sql = "SELECT p.*,
                       s.name,
                       c.Nombre,
                       c.Id AS id_cates,
                       DATE_FORMAT(p.start_date, '%d/%m/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
                  FROM products p,
                       categorias c,
                       sub_categorias s
                 WHERE p.id_sub_cate = s.Id
                   AND s.id_cate = c.Id
                   AND (p.product_id LIKE '%".$texto."%' OR p.product_desc LIKE '%".$texto."%');";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getDatosInstaSales(){
        $sql = "SELECT p.*, 
                       s.name,
                       c.Nombre,
                       DATE_FORMAT(p.start_date, '%d/%m/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin,
                       SUBSTRING(p.start_date, 6, 2) as aaa
                  FROM products p,       
                       categorias c,
                       sub_categorias s 
                 WHERE p.id_sub_cate = s.Id 
                   AND s.id_cate = c.Id 
                   AND SUBSTRING(p.start_date, 6, 2) = SUBSTRING(p.end_date, 6, 2) 
                   AND SUBSTRING(p.start_date, 6, 2) = SUBSTRING(CURDATE(), 6, 2)";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getIdByNameCate($cate){
        $sql = "SELECT c.Id
                  FROM categorias c
                 WHERE (c.Nombre LIKE '%".$cate."%')";
        $result = $this->db->query($sql);
        return $result->row()->Id;
    }
    function getDatosCategorias($id_user){
        if(!isset($id_user)){
            $sql = "SELECT c.*
                      FROM categorias c
                  ORDER BY c.orden ASC";
        }else {
            $sql = "SELECT c.*,
                           cp.deal_number
                      FROM categorias c,
                           categoria_x_pais cp,
                           paises p,
                           users u
                     WHERE cp.id_cate = c.Id
                       AND p.Id = cp.id_pais
                       AND cp.id_pais IN (u.id_pais)
                       AND u.Id = ?
                  GROUP BY c.Id
                  ORDER BY c.orden ASC";
        }
        $result = $this->db->query($sql, array($id_user));
        return $result->result();
    }
    function getDealNumber($id_user, $cate){
        $sql = "SELECT c.*,
                       cp.deal_number
                  FROM categorias c,
                       categoria_x_pais cp,
                       paises p,
                       users u
                 WHERE cp.id_cate = c.Id
                   AND p.Id = cp.id_pais
                   AND cp.id_pais IN (u.id_pais)
                   AND u.Id = ?
                   AND c.Id = ?";
        $result = $this->db->query($sql, array($id_user, $cate));
        return $result->result();
    }
    function getPartners($id_pais){
        $sql = "SELECT pp.*,
                       p.Nombre
                  FROM pais_x_partner pp,
                       paises p
                 WHERE pp.id_pais IN ?
                   AND pp.id_pais = p.Id";
        $result = $this->db->query($sql, array($id_pais));
        return $result->result();
    }
    function getPaises($idioma){
        if($idioma == 'es'){
          $paises = 'WHERE Id <= 25';
        }else {
          $paises = 'WHERE Id >= 26 AND Id <= 52';
        }
        $sql = "SELECT * FROM paises ".$paises." ORDER BY Nombre ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getIdPais($name){
        $sql = "SELECT c.Id
                  FROM paises c
                 WHERE (c.Nombre IN ?)";
        $result = $this->db->query($sql, array($name));
        return $result->result();
    }
    function getNombrePais($id) {
        $sql = "SELECT Nombre
                  FROM paises
                 WHERE Id IN ?";
        $result = $this->db->query($sql, array($id));
        return $result->result();
    }
    function getRelacionXCates2($id_pais){
        $sql = "SELECT c.*,
                       r.Nombre AS nom_rel
                  FROM categoria_x_pais cp,
                       cates_x_relacion cr,
                       relacion r,
                       categorias c
                 WHERE cp.id_pais IN ?
                   AND cr.id_cate = cp.id_cate
                   AND r.Id = cr.id_rel 
                   AND c.Id = cr.id_cate
              ORDER BY r.Nombre, c.Id DESC";
        $result = $this->db->query($sql, array($id_pais));
        return $result->result();
    }
    function getRelacionXCates1(){
        $sql = "SELECT r.Nombre as relacion,
                       r.color,
                       r.img
                  FROM cates_x_relacion cr,
                       categorias c,
                       relacion r
                 WHERE r.Id = cr.id_rel
                   AND c.Id = cr.id_cate
                GROUP BY r.Nombre
                ORDER BY r.Id ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }
}