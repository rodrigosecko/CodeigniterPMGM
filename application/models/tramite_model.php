<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramite_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.zona_urbana WHERE activo = '1' ORDER BY zonaurb_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_tramite($organigrama_persona_id, $tipo_documento_id, $tipo_correspondencia_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion)
	{	
		
		$array = array(
			'organigrama_persona_id' =>$organigrama_persona_id,
			'tipo_documento_id' =>$tipo_documento_id,
			'tipo_correspondencia_id' =>$tipo_correspondencia_id,
			'cite' =>$cite,
			'fecha' =>$fecha,
			'fojas' =>$fojas,
			'anexos' =>$anexos,
			'remitente' =>$remitente,
			'procedencia' =>$procedencia,
			'referencia' =>$referencia,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('tramite.tramite', $array);
	}


	public function login($usuario, $contrasenia)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}

	}


	public function eliminar($id, $usu_eliminacion, $fec_eliminacion)
	{
		$data = array(
            'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        );
        $this->db->where('zonaurb_id', $id);
        return $this->db->update('catastro.zona_urbana', $data);
    }

    public function actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('zonaurb_id', $zonaurb_id);
        return $this->db->update('catastro.zona_urbana', $data);
    }
}
