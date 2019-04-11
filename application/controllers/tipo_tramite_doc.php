<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipo_tramite_doc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tipo_tramite_model_doc");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");

    }
    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() . "Tipo_tramite_doc/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {

        if ($this->session->userdata("login")) {
            
            $data['data_tcorr'] = $this->tipo_tramite_model_doc->get_data();
			$data['verifica'] = $this->rol_model->verifica();
            $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/tipo_tramite_doc', $data);
			$this->load->view('admin/footer');            
        } else {
            redirect(base_url());
        }
    }  
    public function create(){       
        $data = array(

            'correspondencia' => $this->input->post('correspondencia'), //input        
            'activo' => '1',           
        );
        $this->db->insert('tramite.tipo_tramite', $data);
        redirect(base_url() . 'Tipo_tramite_doc/nuevo/');
    }
    public function update($id = null)
    {
        if ($this->session->userdata("login")) {
            $data = array(

                'correspondencia' => $this->input->post('correspondencia_e'), //input                                 
            );
            $id_tipo_corr=$this->input->post('tipo_correspondencia_e');            
            $this->db->where('tipo_correspondencia_id', $id_tipo_corr);
            $this->db->update('tramite.tipo_tramite', $data); 
            redirect(base_url() . 'Tipo_tramite_doc/nuevo/');           
           
        } else {
            redirect(base_url());
        }
    }
    public function delete($id = null)
    {
        if ($this->session->userdata("login")) {
            $activo = $this->db->query("SELECT activo from tramite.tipo_tramite WHERE tipo_correspondencia_id=$id");            
            foreach ($activo ->result() as $row)
            {
                $valor=$row->activo;                    
            }  
            $valor=1-$valor;
            $data = array(
                'activo' => $valor, //input                                 
            );
            $this->db->where('tipo_correspondencia_id', $id);
            $this->db->update('tramite.tipo_tramite', $data); 
            

            redirect(base_url() . 'Tipo_tramite_doc/nuevo/');
        } else {
            redirect(base_url());
        }
    }

    
}