<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

	protected $datos=array();

	public function __construct(){
		parent::__construct();
		$this->load->model('pedidos_model');
		$this->datos["titulo"]=TITULO;
		$this->datos["usuario"]= $this->session->userdata("usuario");
		$this->datos["usuario_id"]= $this->session->userdata("usuario_id");;
	}

	public function index(){
		$this->datos["pedido_id"]=$this->pedidos_model->pedido_activo($this->datos["usuario_id"]);
		$this->datos["pedido"]=$this->pedidos_model->obtener_por_id($this->datos["pedido_id"], true); //este true es por el segundo paramatro del dataservice
		$this->mostrar("carrito");
	}

	function comprar($articulo_id=false){
		$this->load->model('articulos_model');
		$articulo=$this->articulos_model->obtener_por_id($articulo_id);

		if($articulo){
			$pedido_id=$this->pedidos_model->pedido_activo($this->datos["usuario_id"]);
			if(!$pedido_id){
				$pedido_id=$this->pedidos_model->nuevo($this->datos["usuario_id"]);
			}
			$this->pedidos_model->agregar_item_a_pedido($pedido_id, $articulo["articulo_id"],$articulo["titulo"],1,$articulo["precio"]);
			redirect("carrito");
		}
		redirect("catalogo");
	}

	private function mostrar($vista="carrito", $param=array()){

		$tmp["usuario"]=$this->datos["usuario"];
		$tmp["usuario_id"]=$this->datos["usuario_id"];

		$this->datos["cabecera"] =$this->load->view("cabecera", $tmp, TRUE);
		$this->load->view($vista,$this->datos);
	}

	private function eliminar_articulo_de_pedido($articulo_id=false){
		$this->pedidos_model->eliminar_articulo_de_pedido($articulo_id);
		redirect("carrito");
	}

	public function quitar ($item_id=false){
		$id=$this->pedidos_model->pedido_activo($this->datos["usuario_id"]);
		if($id){
			$this->pedidos_model->quitar_item_pedido($id,$item_id);
		}
		redirect("carrito");
	}
	public function cerrar_pedido(){//evitar que se puedan cerrar aquellos pedidos que no tengan items
		$id=$this->pedidos_model->pedido_activo($this->datos["usuario_id"]);
		if($id){
			$this->pedidos_model->cambiar_estado_pedido($id,PEDIDOS_FINALIZADO);
		}
		redirect("carrito");
	}
}

?>