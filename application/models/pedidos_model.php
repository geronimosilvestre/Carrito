<?php 
Class Pedidos_model extends CI_Model {

    

    function obtener_por_id($pedido_id=null, $completo=false){
        $this->db->where("pedido_id",$pedido_id);
        $res = $this->db->get("pedidos")->row_array();
        if($res and $completo){
            $res["items"]=$this->obtener_items_pedido($res["pedido_id"]);
        }
        return $res;
    }

    public function nuevo ($usuario_id=false){
        $this->db->set("usuario_id",$usuario_id);
        $this->db->insert("pedidos");
        return $this->db->insert_id();
    }

    public function eliminar_pedido ($pedido_id){
        $this->db->where("pedido_id",$pedido_id);
        $this->db->limit(1);
        $this->db->delete("pedidos");
        return $this->db->affected_rows();
    }

    public function eliminar_articulo_de_pedido ($articulo_id){
        $this->db->where("articulo_id",$articulo_id);
        $this->db->limit(1);
        $this->db->delete("pedidos_items");
        return $this->db->affected_rows();
    }

    public function quitar_item_pedido($pedido_id,$item_id){
        $this->db->where("pedido_id",$pedido_id);
        $this->db->where("pedidos_item_id",$item_id);
        $this->db->delete("pedidos_items");
        return $this->db->affected_rows();
    }

    public function pedido_activo($usuario_id=FALSE){
        $this->db->select("pedido_id");
        $this->db->where("usuario_id", $usuario_id);
        $this->db->where("estado", PEDIDOS_ACTIVO);
        $this->db->limit(1);
        $res=$this->db->get("pedidos")->row_array();
        if($res){
            return $res["pedido_id"];
        }else{
            return FALSE;
        }
    }

    function listar (){
        $this->db->order_by("usuario_id");
        return $this->db->get("pedidos")->result_array();
    }
    function obtener_items_pedido($pedido_id){
        $this->db->where("pedido_id",$pedido_id);
        return $this->db->get("pedidos_items")->result_array();
    }
    function agregar_item_a_pedido($pedido_id,$articulo_id,$descripcion,$cant,$importe){
        $this->db->set("pedido_id",$pedido_id);
        $this->db->set("articulo_id",$articulo_id);
        $this->db->set("descripcion",$descripcion);
        $this->db->set("cant",$cant);
        $this->db->set("importe",$importe);
        $this->db->insert("pedidos_items");
        return $this->db->insert_id();

    }
    function cambiar_estado_pedido($pedido_id,$estado){
        $this->db->where("pedido_id",$pedido_id);
        $this->db->set("estado",$estado);
        $this->db->update("pedidos");
        return $this->db->affected_rows();

   }
}

?>