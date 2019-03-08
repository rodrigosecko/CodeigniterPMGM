<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("edificio_model");
	}

	public function edificio(){
		
		$lista['edificio'] = $this->edificio_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/edificio', $lista);
		$this->load->view('admin/footer');
	}
	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Edificio/edificio");
		}
		else{
			$this->load->view('login');	
		}
		
	}

	public function insertar()
	{
		$datos = $this->input->post();
		
		if(isset($datos))
		{	
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;

			$descripcion = $datos['descripcion'];
			$alias = $datos['alias'];
			$this->edificio_model->insertar_edificio($descripcion, $alias, $usu_creacion);
			redirect('edificio');

		}

	 }

	 public function update()     
	{         

		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s"); 

	    $edificio_id = $this->input->post('edificio_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');

	    $actualizar = $this->edificio_model->actualizar($edificio_id, $descripcion,$alias, $usu_modificacion, $fec_modificacion);
	   redirect('Edificio');
	}

	 public function eliminar(){
	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s"); 

	    $u = $this->uri->segment(3);
	    $this->edificio_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('edificio');
	   }

}

