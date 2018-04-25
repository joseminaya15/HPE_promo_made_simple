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
    function updateDatos($arrayData, $id, $tabla){
      $this->db->where('Id'  , $id);
      $this->db->update($tabla, $arrayData);
      if ($this->db->trans_status() == false){
          throw new Exception('No se pudo actualizar los datos');
      }
      return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }
    function deleteDatos($id_dato){
      $sql = "DELETE FROM cards WHERE Id = ?";
      $result = $this->db->query($sql, array($id_dato));
      return $result;
    }
    function verificarUsuario($user){
      $sql = "SELECT *
                FROM users
               WHERE Email LIKE '%".$user."%'";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getPromociones($Q, $anio){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%d/%m/%Y') AS fecha_vencimiento,
                     DATE_FORMAT(c.fecha_ini, '%d/%m/%Y') AS fecha_inicio
                FROM cards c
                WHERE SUBSTRING(c.Codigo, 2, 1) = ?
                  AND SUBSTRING(c.Codigo, 6, 2) = ?
            ORDER BY c.Fecha, c.Tipo_distribuidor, c.Last_units, c.Tipo ASC";
      $result = $this->db->query($sql, array($Q, $anio));
      return $result->result();
    }
    function getPromocionesSellers(){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
                FROM cards c
               WHERE c.Tipo_distribuidor = 'Resellers'
            ORDER BY c.Last_units, c.Tipo DESC";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getPromocionesDistis(){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
                FROM cards c
               WHERE c.Tipo_distribuidor = 'Distis'
            ORDER BY c.Last_units, c.Tipo DESC";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getPromocionesById($id){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%d/%m/%Y') AS fecha_vencimiento,
                     DATE_FORMAT(c.fecha_ini, '%d/%m/%Y') AS fecha_ini 
                FROM cards c
               WHERE c.Id = ?
              ORDER BY c.Last_units, c.Tipo DESC";
      $result = $this->db->query($sql, array($id));
      return $result->result();
    }
    function buscarPromocionResellers($texto){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
                FROM cards c 
               WHERE ((c.Titulo LIKE '%".$texto."%') OR
                       (c.Tipo LIKE '%".$texto."%') OR
                       (c.Objetivo_comercial LIKE '%".$texto."%') OR
                       (c.Noticia LIKE '%".$texto."%') OR
                       (c.Deal_number LIKE '%".$texto."%') OR
                       (CASE WHEN '' = '".$texto."' THEN 1 = 1 ELSE FALSE END))
                 AND c.Tipo_distribuidor = 'Resellers'
            ORDER BY c.Last_units, c.Tipo DESC";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function buscarPromocionDistis($texto){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
                FROM cards c 
               WHERE ((c.Titulo LIKE '%".$texto."%') OR
                       (c.Tipo LIKE '%".$texto."%') OR
                       (c.Objetivo_comercial LIKE '%".$texto."%') OR
                       (c.Noticia LIKE '%".$texto."%') OR
                       (c.Deal_number LIKE '%".$texto."%') OR
                       (CASE WHEN '' = '".$texto."' THEN 1 = 1 ELSE FALSE END))
                 AND c.Tipo_distribuidor = 'Distis'
            ORDER BY c.Last_units, c.Tipo DESC";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getDatosFiltro($filtro, $tipo){
      if($tipo == 'Distis'){
        $sql = "SELECT c.*,
                   DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
              FROM cards c 
             WHERE CASE
                    WHEN 'Instasale - Firesale' = '".$filtro."' THEN c.Titulo IN ('Tape Backup Media')
                    WHEN 'Valor - Switches TOR' = '".$filtro."' THEN c.Titulo IN ('Virtual Licenses')
                    WHEN 'Valor - Blades' = '".$filtro."' THEN c.Titulo IN ('Server & Storage Base Promo')
                    WHEN 'Valor - Avalanche' = '".$filtro."' THEN c.Titulo IN ('HPE Pointnext')
                    WHEN 'Volumen - Flex Servers' = '".$filtro."' THEN c.Titulo IN ('Gen10 Accelerate')
                    WHEN 'Volumen - Storage' = '".$filtro."' THEN c.Titulo IN ('Storage Accelerate')
                    WHEN 'Networking - Aruba Mobility Flex' = '".$filtro."' THEN c.Titulo IN ('Simplivity (Value)')
                    WHEN 'Networking - Aruba Central'  = '".$filtro."' THEN c.Titulo IN ('DCN TOR (Value)')
                    WHEN 'Networking - Switching Flex' = '".$filtro."' THEN c.Titulo IN ('Synergy (Value)')
                    WHEN 'Carepacks - Tablero de control'  = '".$filtro."' THEN c.Titulo IN ('Server & Storage Flex Attach')
                    WHEN '' != '".$filtro."' THEN TRUE
                    ELSE TRUE
                   END
             AND c.Tipo_distribuidor = 'Distis'
             ORDER BY c.Last_units, c.Tipo DESC;";
      }else {
        $sql = "SELECT c.*,
                   DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
              FROM cards c 
             WHERE CASE
                    WHEN 'Instasale - Firesale' = '".$filtro."' THEN c.Titulo IN ('Tape Backup media')
                    WHEN 'Valor - Switches TOR' = '".$filtro."' THEN c.Titulo IN ('Flex Attach Promo')
                    WHEN 'Valor - Blades' = '".$filtro."' THEN c.Titulo IN ('Flex Attach Promo')
                    WHEN 'Valor - Avalanche' = '".$filtro."' THEN c.Titulo IN ('Storage - Crazy promo')
                    WHEN 'Volumen - Flex Servers' = '".$filtro."' THEN c.Titulo IN ('3PAR Avalanche')
                    WHEN 'Volumen - Storage' = '".$filtro."' THEN c.Titulo IN ('Storage - Crazy promo')
                    WHEN 'Networking - Aruba Mobility Flex' = '".$filtro."' THEN c.Titulo IN ('DCN ToR')
                    WHEN 'Networking - Aruba Central'  = '".$filtro."' THEN c.Titulo IN ('Tape Backup media')
                    WHEN 'Networking - Switching Flex' = '".$filtro."' THEN c.Titulo IN ('Storage - Crazy promo')
                    WHEN 'Carepacks - Tablero de control'  = '".$filtro."' THEN c.Titulo IN ('Flex Attach Promo')
                    WHEN '' != '".$filtro."' THEN TRUE
                    ELSE TRUE
                   END
             AND c.Tipo_distribuidor = '".$tipo."'
             ORDER BY c.Last_units, c.Tipo DESC;";
      }
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getUsuarios(){
      $sql = "SELECT Tipo_distribuidor AS Tipo
                FROM cards 
              GROUP BY Tipo";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getDatosHistorico($Q, $año){
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%d/%m/%Y') AS fecha_vencimiento,
                     DATE_FORMAT(c.fecha_ini, '%d/%m/%Y') AS fecha_inicio
                FROM cards c
               WHERE ((SUBSTRING(c.Codigo, 2, 1) < ?
                      AND SUBSTRING(c.Codigo, 6, 2) <= ?) OR 
                      (SUBSTRING(c.Codigo, 2, 1) > ?
                      AND SUBSTRING(c.Codigo, 6, 2) < ?))
            ORDER BY c.Fecha, c.Titulo, c.Tipo_distribuidor, c.Last_units, c.Tipo ASC";
      $result = $this->db->query($sql, array($Q, $año, $Q, $año));
      return $result->result();
    }
    function getAnioAndQ(){
      $sql = "SELECT SUBSTRING(MAX(C.Codigo), 6, 2) AS anio,
                     SUBSTRING(MAX(C.Codigo), 2, 1) AS Q
                FROM cards c
               WHERE SUBSTRING(c.Codigo, 6, 2) = (SELECT substr(CURDATE(),3, 2))";
      $result = $this->db->query($sql);
      return $result->result();
    }
    function getDatosProducts($id_cate){
      $sql = "SELECT p.*,
                    s.name,
                    c.Nombre,
                    c.deal_lead,
                    DATE_FORMAT(p.effective_date, '%d/%m/%Y') AS effect_date,
                    DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
               FROM productos p,
                    categorias c,
                    sub_categorias s
              WHERE p.id_sub_cate = s.Id
                AND s.id_cate = c.Id
                AND s.Id = ?
                /*AND p.effective_date BETWEEN '2018-02-01' AND '2018-04-30'
                AND p.end_date BETWEEN '2018-02-01' AND '2018-04-30';*/";
      $result = $this->db->query($sql, array($id_cate));
      //print_r($this->db->last_query());
      return $result->result();
    }
    function getIdCategoria($cate){
      $sql = "SELECT c.Id
                FROM sub_categorias c
               WHERE (c.name LIKE '".$cate."')";
      $result = $this->db->query($sql);
      return $result->row()->Id;
    }
    function getDatosBuscadorProducts($id_cate, $texto){
      $sql = "SELECT p.*,
                    s.name,
                    c.Nombre,
                    c.deal_lead,
                    DATE_FORMAT(p.effective_date, '%d/%m/%Y') AS effect_date,
                    DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
               FROM productos p,
                    categorias c,
                    sub_categorias s
              WHERE p.id_sub_cate = s.Id
                AND s.id_cate = c.Id
                AND s.name LIKE ?
                AND (p.product_id LIKE '%".$texto."%' OR p.product_desc LIKE '%".$texto."%');";
      $result = $this->db->query($sql, array($id_cate));
      return $result->result();
    }
    function getIdSubCategoria($id_cates){
      $sql = "SELECT c.Id
                FROM sub_categorias c
               WHERE c.id_cate = ?";
      $result = $this->db->query($sql, array($id_cates));
      return $result->result();
    }
    function getDatosProductsByName($id_cate){
      $sql = "SELECT p.*,
                    s.name,
                    c.Nombre,
                    c.deal_lead,
                    DATE_FORMAT(p.effective_date, '%d/%m/%Y') AS effect_date,
                    DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
               FROM productos p,
                    categorias c,
                    sub_categorias s
              WHERE p.id_sub_cate = s.Id
                AND s.id_cate = c.Id
                AND s.name LIKE ?";
      $result = $this->db->query($sql, array($id_cate));
      return $result->result();
    }
    function getDatosCron(){
      $sql = "SELECT p.*,
                     s.name,
                     c.Nombre,
                     c.deal_number,
                     DATE_FORMAT(p.effective_date, '%d/%m/%Y') AS effect_date,
                    DATE_FORMAT(p.end_date, '%d/%m/%Y') AS fecha_fin
                FROM productos p,
                     sub_categorias s,
                     categorias c
               WHERE p.id_sub_cate = s.Id
                 AND c.Id = s.id_cate
                 AND IF(CONVERT(SUBSTRING(p.end_date, 9, 2), SIGNED INTEGER) - CONVERT(SUBSTRING(CURDATE(), 9, 2), SIGNED INTEGER) <= 15, TRUE, FALSE)
                 AND SUBSTRING(CURDATE(), 3, 2) = SUBSTRING(p.end_date, 3, 2)
                 AND SUBSTRING(CURDATE(), 6, 2) = SUBSTRING(p.end_date, 6, 2)
                 LIMIT 50";
      $result = $this->db->query($sql);
      return $result->result();
    }
}