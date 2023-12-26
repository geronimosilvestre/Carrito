<?php 
Class Usuarios_model extends CI_Model {
    
    
    function listar (){
        $this->db->order_by("usuario");
        return $this->db->get("usuarios")->result_array();
    }

    function obtener_por_id($id=null){
        $this->db->where("usuario_id",$id);
        $this->db->limit(1);
        return $this->db->get("usuarios")->row_array();
    }
    
    function check_login($user,$password){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$user);
        $this->db->where("password",$password);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
            $user=$res->row_array();
            return $user["usuario_id"];
        }else{
            return false;
        }
    }

    function check_usuario($usuario=""){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$usuario);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

        public function crear_usuario ($usuario="",$password=""){
            $this->db->set("usuario",$usuario);
            $this->db->set("password",$password);
            $this->db->insert("usuarios");
        }

        public function eliminar_usuario ($id=""){
            $this->db->where("usuario_id",$id);
            $this->db->limit(1);
            $this->db->delete("usuarios");
            return $this->db->affected_rows(); //cuantas filas fueron afectadas por la consulta que acabo de efectuar
        }

        public function listar_usuario (){
            $this->db->order_by("usuario_id", "DESC");
            $res=$this->db->get("usuarios");
            return $res->result_array();
        }
        
        public function check_rol($usuario_id=""){
            $this->db->select("rol_id");
            $this->db->where("usuario_id",$usuario_id);
            $this->db->limit(1);
            $res=$this->db->get("usuarios")->row_array();;
            if($res["usuario_id"]=="1"){
                return true;
            }else{
                return false;
            }
        }

        public function actualiza_login ($id=""){
            $this->db->set("ult_login","now()",false);
            $this->db->where("usuario_id",$id);
            $this->db->limit(1);
            $this->db->update("usuarios");
            return $this->db->affected_rows();
    
        }

        public function change_password($usuario="",$passwordnew=""){
            $this->db->set("password",$passwordnew);
            $this->db->where("usuario",$usuario);
            $this->db->limit(1);
            $this->db->update("usuarios");
            return $this->db->affected_rows();    
        }

    public function actualiza_pass ($usuario_id="",$nueva_pass=""){
        $this->db->where("usuario_id", $usuario_id );
        $this->db->limit(1);
        $this->db->set("password", $nueva_pass);
        $this->db->update("usuarios");
        return $this->db->affected_rows();

    }
   
}

?>