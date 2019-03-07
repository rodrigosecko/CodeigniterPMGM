<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento)
	{	
		
		$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento
			);
		$this->db->insert('persona', $array);
	}

	public function existeci($ci)
	{
		$this->db->where('ci',$ci);
		$reg = $this->db->get('persona');
      if($reg->num_rows()>0) {

          return false;
      }else{
				return true;
			}
	}

	public function consulta($ci)
	{
		$this->db->where('ci',$ci);
		$reg = $this->db->get('persona')->row();
		return $reg;
	}

	public function buscaci( $ci ){
	    $con = $this->db->get_where('persona',
	    array('ci'=>$ci));
	    if ($con->num_rows() > 0)
	        return $con->row();
	    else
	    	return null;
	  }
}