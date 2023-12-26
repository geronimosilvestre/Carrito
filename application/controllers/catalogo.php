<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('rubros_model');
		$this->load->model('articulos_model');
		$this->datos["rubro_actual"]=DEFAULT_RUBRO;
		$this->datos["titulo"]=TITULO;
		$this->datos["usuario"]= $this->session->userdata("usuario");
		$this->datos["usuario_id"]= $this->session->userdata("usuario_id");
	}

	protected $datos=array();

	public function index($rubro_id=false)
	{
		$busqueda=$this->input->post("busqueda");
		if($busqueda){
			$this->datos["busqueda"]=$busqueda;
			$this->articulos_model->set_busqueda(trim(strtolower($busqueda)));

		}
			if($rubro_id){
				$this->datos["rubro_actual"]=$rubro_id;
			}
		
			$this->articulos_model->set_rubro_actual($this->datos["rubro_actual"]);
			$this->datos["articulos"]=$this->articulos_model->listar();
			$this->datos["rubro"]=$this->rubros_model->obtener_por_id($this->datos["rubro_actual"]);
			$this->mostrar("principal");
	}

	private function mostrar($vista="principal", $param=array()){
		if(isset($this->datos["busqueda"])){$tmp["busqueda"]=$this->datos["busqueda"];}
		$tmp["usuario"]=$this->datos["usuario"];
		$tmp["usuario_id"]=$this->datos["usuario_id"];
		$tmp["rubros"]=$this->rubros_model->listar();
		$tmp["rubro_actual"]=$this->datos["rubro_actual"];
		$this->datos["menu"] =$this->load->view("menu", $tmp, TRUE);
		$this->datos["cabecera"] =$this->load->view("cabecera", $tmp, TRUE);
		$this->load->view($vista,$this->datos);
	}
}

?>