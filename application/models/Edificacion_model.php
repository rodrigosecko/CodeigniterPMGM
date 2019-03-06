<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function getAllData() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_predio');
        return $query->result_array();
    }
    function get_Destino_bloque() {//obtiene los datos de la tabla destino_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.destino_bloque');
        return $query->result();
    }

    function get_Uso_bloque() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.uso_bloque');
        return $query->result();
    }
    function get_tipo_planta() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_planta');
        return $query->result();
    }

    function get_grupos_subgrupos() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT x.grupo_mat_id,x.descripcion as desc_grupo,y.mat_item_id,y.descripcion as desc_item FROM (SELECT grupo_mat_id,descripcion from catastro.bloque_grupo_mat) as x INNER JOIN (SELECT grupo_mat_id,mat_item_id,descripcion FROM catastro.bloque_mat_item) as y on x.grupo_mat_id=y.grupo_mat_id');
        return $query->result_array();
    }

    function get_Bloque() {//obtiene los datos de la tabla destino_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.bloque');
        return $query->result();
    }

    function createData() {
        //error_reporting([4]);
        // I don't know if you need to wrap the 1 inside of double quotes.
        //ini_set("display_startup_errors",1);
        //ini_set("display_errors",1);
        //vdebug($this->input-post());
       

       


        foreach ($this->input->post('grupos') as $key => $s) {
			$data_grupos = array(
				'servicio_id'=>$s,
				'codcatas'=>$this->input->post('codigo_catastral'),
				'activo'=>1
			);

			$this->db->insert('catastro.bloque_elemento_cons', $data_grupos);
		}
		// fin guardamos los servicios

        $bloque_cons = array (    
            'bloque_id' =>$this->input->post('bloque_id'),//cargar de la BD
            'nro_bloque' =>$this->input->post('nro_bloque'),           
            'grupo_mat_id' => $this->input->post('grupo_mat_id'),  
            'mat_item_id'=> $this->input->post('mat_item_id'),      
            'cantidad' =>$this->input->post('cantidad'),                  
            'usu_creacion' =>1 //aun no captura el usuario      
        );
        //vdebug($datos['data']['codigo_catastral']);
        
        
        
        
            
        
        

        
       
    }

}
