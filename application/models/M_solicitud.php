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
    function getDatosProducts($id_cate){
        $sql = "SELECT p.*,
                       s.name,
                       c.Nombre,
                       DATE_FORMAT(p.start_date, '%m/%d/%Y') AS effect_date,
                       DATE_FORMAT(p.end_date, '%m/%d/%Y') AS fecha_fin,
                       p.est_qty
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
                      FROM categorias c";
        }else {
            $sql = "SELECT c.*,
                           cp.deal_number
                      FROM categorias c,
                           categoria_x_pais cp,
                           paises p,
                           users u
                     WHERE cp.id_cate = c.Id
                       AND p.Id = cp.id_pais
                       AND u.id_pais = cp.id_pais
                       AND u.Id = ?
                  GROUP BY c.Id";
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
                   AND u.id_pais = cp.id_pais
                   AND u.Id = ?
                   AND c.Id = ?";
        $result = $this->db->query($sql, array($id_user, $cate));
        return $result->result();
    }
    function getPartners($id_pais){
        $sql = "SELECT pp.* 
                  FROM pais_x_partner pp
                 WHERE pp.id_pais = ?";
        $result = $this->db->query($sql, array($id_pais));
        return $result->result();
    }
    function getPaises(){
        $sql = "SELECT * FROM paises ORDER BY Nombre ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getIdPais($name){
        $sql = "SELECT c.Id
                  FROM paises c
                 WHERE (c.Nombre LIKE '%".$name."%')";
        $result = $this->db->query($sql);
        return $result->row()->Id;
    }
}