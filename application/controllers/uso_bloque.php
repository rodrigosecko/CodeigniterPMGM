<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uso_bloque extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("uso_bloque_model");
	}

	public function uso_bloque(){
		
		$lista['uso_bloque'] = $this->uso_bloque_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/uso_bloque', $lista);
		$this->load->view('admin/footer');
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."uso_bloque/uso_bloque");
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
			$coeficiente = $datos['coeficiente'];
			$this->uso_bloque_model->insertar_uso_bloque($descripcion, $alias, $coeficiente, $usu_creacion);
			redirect('uso_bloque');

		}

	 }

	  public function update()     
	{        
		//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_modificacion = $resi->persona_id;
        $fec_modificacion = date("Y-m-d H:i:s");

	    $uso_bloque_id = $this->input->post('uso_bloque_id');
	    $descripcion = $this->input->post('descripcion');
	    $alias = $this->input->post('alias');
	    $coeficiente = $this->input->post('coeficiente');

	    $actualizar = $this->uso_bloque_model->actualizar($uso_bloque_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
	   redirect('Uso_bloque');
	}

	 public function eliminar()
	 {
	 	//OBTENER EL ID DEL USUARIO LOGUEADO
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_eliminacion = $resi->persona_id;
        $fec_eliminacion = date("Y-m-d H:i:s"); 
        
	    $u = $this->uri->segment(3);
	    $this->uso_bloque_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
	    redirect('uso_bloque');
	   }

   	 
}

