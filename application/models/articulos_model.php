<?php 
Class Articulos_model extends CI_Model {
    
    protected $rubro_actual=false;
    protected $busqueda="";

    function obtener_por_id($id=null){
        $this->db->where("articulo_id",$id);
        $this->db->limit(1);
        return $this->db->get("articulos")->row_array();
    }


    function listar(){


        if($this->busqueda!=""){
            $this->db->like("titulo",$this->busqueda); //busqueda en campos
            $this->db->or_like("keywords",$this->busqueda);
        }else{
            if($this->rubro_actual){
                $this->db->where("rubros.rubro_id",$this->rubro_actual);
            }
    }

        $this->db->order_by("titulo");

        $this->db->join("articulos_x_rubros","articulos.articulo_id=articulos_x_rubros.articulo_id","inner");

        $this->db->join("rubros","articulos_x_rubros.rubro_id=rubros.rubro_id","inner");
        return $this->db->get("articulos")->result_array();
    }

    
//obtener precio
    

    function set_rubro_actual($valor=false){

        $this->rubro_actual=$valor;
    }
    function set_busqueda($valor=false){

        $this->busqueda=$valor;
    }
        

      
    

}

?>