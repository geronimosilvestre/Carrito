<?php 
Class Rubros_model extends CI_Model {
    
    
    function listar (){
        $this->db->order_by("orden");
        $this->db->order_by("nombre");
        $this->db->where("estado",1);
        return $this->db->get("rubros")->result_array();
    }

    function obtener_por_id($id=null){
        $this->db->where("rubro_id",$id);
        $this->db->limit(1);
        return $this->db->get("rubros")->row_array();
    }

   
}

?>