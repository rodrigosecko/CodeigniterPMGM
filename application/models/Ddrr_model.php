<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ddrr_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertarDDRR($codcatas, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos)
	{
		$array = array(
			'codcatas' => $codcatas,
			'nro_matricula_folio' => $nro_matricula_folio,
			'nro_folio' => $nro_folio,
			'fecha_folio' => $fecha_folio,
			'superficie_legal' => $superficie_legal,
			'nom_notario' => $nom_notario,
			'nro_testimonio' => $nro_testimonio,
			'fecha_testimonio' => $fecha_testimonio,
			'partida' => $partida,
			'partida_computarizada' => $partida_computarizada,
			'foja' => $foja,
			'libro' => $libro,
			'fecha_reg_libro' => $fecha_reg_libro
			);
		$this->db->insert('catastro.predio_ddrr', $array);
		$ddrr_id = $this->db->query("select ddrr_id from catastro.predio_ddrr order by ddrr_id desc limit 1")->row();
		foreach ($this->cart->contents() as $items)
		{
			$array = array(
				'ddrr_id' => (int)$ddrr_id->ddrr_id,
				'porcen_parti' => $items['qty'],
				'persona_id' => $items['id']
			);
			$this->db->insert('catastro.predio_titular', $array);
		}
	}
}