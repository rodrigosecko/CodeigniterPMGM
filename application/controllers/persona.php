<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("persona_model");
		$this->load->helper('form');
		$this->load->library('cart');
	}

	/*
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view('login');	
		}
		
	}

	public function prueba()
	{
		//var_dump('hola');
		$ejemplo = $this->db->query("select * from credencial")->result();
		foreach ($ejemplo as $eje) {
			print_r($eje->rol_id."<br>");
			print_r($eje->usuario."<br>");
			print_r($eje->contrasenia."<br>");
			print_r($eje->token."<br>");
		}
	}*/

	public function insertar()
	{
		$datos = $this->input->post();
		if($this->persona_model->existeci($datos['ci']))
		{
			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);
		}

		$consulta = $this->persona_model->consulta($datos['ci']);

		$data = array(
			'id'      => $consulta->persona_id,
			'name'    => $consulta->nombres.' '.$consulta->paterno.' '.$consulta->materno,
			'qty'     => $datos['porcen_parti'],
			'price'   => $consulta->ci
	//                'options' => array('Size' => 'L',
	//                                   'Color' => 'Red')
		);
		$this->cart->insert($data);
		//redirect('predios/nuevo');
		/*$datos = $this->input->post();

		if(isset($datos))
		{
			$nombres = $datos['nombres'];
			$paterno = $datos['paterno'];
			$materno = $datos['materno'];
			$ci = $datos['ci'];
			$fec_nacimiento = $datos['fec_nacimiento'];
			$this->persona_model->insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);
			redirect('predios/nuevo');
		}*/
	}


	public function guardar()
	{
		$datos = $this->input->post();
		
		if(isset($datos))
		{
			$codcatas = 123456789;
			$nro_matricula_folio = $datos['nro_matricula_folio'];
			$nro_folio = $datos['nro_folio'];
			$fecha_folio = $datos['fecha_folio'];
			$superficie_legal = $datos['superficie_legal'];
			$nom_notario = $datos['nom_notario'];
			$nro_testimonio = $datos['nro_testimonio'];
			$fecha_testimonio = $datos['fecha_testimonio'];
			$partida = $datos['partida'];
			$partida_computarizada = $datos['partida_computarizada'];
			$foja = $datos['foja'];
			$libro = $datos['libro'];
			$fecha_reg_libro = $datos['fecha_reg_libro'];
			$porcen_parti = $datos['porcen_parti'];
			$ci = $datos['ci'];
			$datos= $this->cart->contents();
			$this->persona_model->insertarDDRR($codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos);
			$this->cart->destroy();
			redirect('predios/index');
		}
	}

	public function verificar(){

       $this->form_validation->set_rules('ci','Cedula de Identidad','required|trim',array('required' => 'Ingrese una %','numeric' => 'El campo % solo puede contener numeros'));

       if($this->form_validation->run() != FALSE){

            $default = array('ci' => '');
            $reg = $this->persona_model->buscaci($this->input->post('ci'));
            echo count($reg) > 0 ? json_encode($reg) : json_encode($default);

       } else {
           echo validation_errors();
       }
   }

   	public function remove($rowid)
   	{
		if ($rowid==="all")
		{
			$this->cart->destroy();
		}else{
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
			$this->cart->update($data);
		}
			redirect('predios/nuevo');
	}

}

