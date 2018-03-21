<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }

    function updateDatos($arrayData, $id, $tabla){
        $this->db->where('Id'  , $id);
        $this->db->update($tabla, $arrayData);
        if ($this->db->trans_status() == false) {
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

    function getPromociones(){
        $sql = "SELECT c.*,
                       DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
                  FROM cards c
              ORDER BY c.Tipo_distribuidor, c.Last_units, c.Tipo, c.Fecha DESC";
        $result = $this->db->query($sql);
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
                       DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
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
      $sql = "SELECT c.*,
                     DATE_FORMAT(c.Fecha, '%Y-%m-%d') AS fecha_vencimiento 
                FROM cards c 
               WHERE CASE
                      WHEN 'Instasale - Firesale' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Valor - Switches TOR' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Valor - Blades' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Valor - Avalanche' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Volumen - Flex Servers' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Volumen - Storage' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Networking - Aruba Mobility Flex' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Networking - Aruba Central'  = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Networking - Switching Flex' = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN 'Carepacks - Tablero de control'  = '".$filtro."' THEN c.Titulo IN ('Promo Base (Includes Virtual Licenses)', 'Flex Attach Promo')
                      WHEN '' != '".$filtro."' THEN TRUE
                      ELSE TRUE
                     END
               AND c.Tipo_distribuidor = '".$tipo."'
               ORDER BY c.Last_units, c.Tipo DESC;";
        $result = $this->db->query($sql);
        return $result->result();
    }
}