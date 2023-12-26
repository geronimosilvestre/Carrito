<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('usuario','Usuario','required|trim|strtolower');
            $this->form_validation->set_rules('password','Contraseña','required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('login');
            }else{
                $usuario= set_value('usuario');
                $password=set_value('password');
                $this->load->model('usuarios_model');
                if($uid=$this->usuarios_model->check_login($usuario,$password)){
                    $usuario=$this->usuarios_model->obtener_por_id($uid);
                    if($usuario["estado"]==0){
                        $this->session->set_flashdata("OP","INACTIVO");
                        redirect("auth/index");
                    }else{
                        $this->session->set_userdata("usuario_id",$uid);
                        $this->session->set_userdata("rol",$usuario["rol_id"]);
                        $this->session->set_userdata("usuario",$usuario["usuario"]);
                        redirect("catalogo");
                    }

                }else{
                    $this->session->set_flashdata('OP','ERROR');
                    redirect("auth/index");
                }
            }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("catalogo");
    }
    
}

?>