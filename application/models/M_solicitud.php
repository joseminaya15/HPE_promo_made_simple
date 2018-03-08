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
                  FROM persons
                 WHERE usuario LIKE '%".$user."%'";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function getPromociones(){
        $sql = "SELECT *,
                       DATE_FORMAT(c.Fecha, '%d/%m/%Y') AS fecha_vencimiento 
                  FROM cards c";
        $result = $this->db->query($sql);
        return $result->result();
    }
}