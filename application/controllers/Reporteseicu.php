<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporteseicu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper'); 
        $this->load->helper('url');   
        $this->load->model("Reportes_model");
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
            
            
            $data['predio_id'] = 5;
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('reports/dashboard', $data);
            $this->load->view('bloque/validar');       
            $this->load->view('bloque/jtables');
      
        } else {
            redirect(base_url());
        }
    }

    public function menbrete()
    {
        if ($this->session->userdata("login")) {
                  
            $this->load->view('reports/header');
            $this->load->view('admin/menu');
            $this->load->view('reports/menbrete');           
            $this->load->view('reports/footer');            
        } else {
            redirect(base_url());
        }
    }

    public function do_upload(){

        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;

             

                $config['upload_path']          = './public/assets/images/reportes';
                $config['file_name']        = 'menbrete_reporte';
                $config['allowed_types']        = 'png';
                $config['overwrite']        = TRUE;
                $config['max_size']             = 100000000;
                $config['max_width']            = 100024;
                $config['max_height']           = 700068;
                
   



        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto_org'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
               
        }
        redirect(base_url() . 'Reporteseicu/menbrete/');
        }else {
            redirect(base_url());
        }   
    }

    public function reporte_vista()
    {
        if ($this->session->userdata("login")) {
            
            

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('reports/panel');
            $this->load->view('bloque/validar');       
            $this->load->view('bloque/jtables');
      
        } else {
            redirect(base_url());
        }
    }



    public function ficha_tecnica()    
    {
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');


        $data['data_bloques'] = $this->db->query("SELECT * FROM catastro.bloque_mat_item where activo=1 ORDER BY grupo_mat_id")->result_array(); 
        $data['data_grupos'] = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat where activo=1 ORDER BY grupo_mat_id asc")->result_array(); 
        $data['num_grupos'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_grupo_mat where activo=1 ")->row();
         $data['num_bloques'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_mat_item where activo=1  ")->row();

        // Define key-value array
        $days_dias = array(
            'Monday'=>'Lunes',
            'Tuesday'=>'Martes',
            'Wednesday'=>'Miércoles',
            'Thursday'=>'Jueves',
            'Friday'=>'Viernes',
            'Saturday'=>'Sábado',
            'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];
        $this->load->view('reports/ficha_tecnica',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('legal', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 


    public function certificacion($id=null)    
    {
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');

        $days_dias = array(
            'Monday'=>'Lunes',
            'Tuesday'=>'Martes',
            'Wednesday'=>'Miércoles',
            'Thursday'=>'Jueves',
            'Friday'=>'Viernes',
            'Saturday'=>'Sábado',
            'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];



        $data['datos_predio'] = $this->Reportes_model->get_data($id);
         $data['propietarios'] = $this->Reportes_model->get_propietarios($id);

          $valida_foto=$this->db->query("SELECT * FROM catastro.predio_foto WHERE predio_id=$id")->row();

        if($valida_foto==NULL){
            //var_dump('datos_nulos');
        //exit;
            $data['foto_fachada'] ='public/assets/images/reportes/nodisponible.jpeg';
            //$data['foto_plano_ubi'] = 'public/assets/images/reportes/nodisponible.jpeg';
            $data['foto_plano_ubi'] = 'public/assets/files/predios/predio.jpg';
        }else{

            $data['foto_fachada'] = 'public/assets/files/predios/'.$valida_foto->foto_fachada;
            //$data['foto_plano_ubi'] = 'public/assets/files/predios/'.$valida_foto->foto_plano_ubi;
            $data['foto_plano_ubi'] = 'public/assets/files/predios/predio.jpg';

        }




        $this->load->view('reports/certificacion',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 



    public function certificacion_bloques($id=null)    
    {
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');


        $data['data_bloques'] = $this->db->query("SELECT b.*,d.descripcion,e.descripcion as estado_fisico_des,u.descripcion as uso FROM catastro.bloque b
LEFT JOIN
catastro.destino_bloque d
on b.destino_bloque_id=d.destino_bloque_id
LEFT JOIN
catastro.uso_bloque u
on b.uso_bloque_id=u.uso_bloque_id
LEFT JOIN
catastro.estado e
on b.estado_id=e.estado_id
WHERE predio_id=$id ORDER BY b.nro_bloque")->result(); 
    

        // Define key-value array
        $days_dias = array(
            'Monday'=>'Lunes',
            'Tuesday'=>'Martes',
            'Wednesday'=>'Miércoles',
            'Thursday'=>'Jueves',
            'Friday'=>'Viernes',
            'Saturday'=>'Sábado',
            'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];

        /*<?php echo base_url(); ?>public/assets/images/reportes/nodisponible.jpeg*/

        ///public/assets/files/predios/

        $valida_foto=$this->db->query("SELECT * FROM catastro.predio_foto WHERE predio_id=$id")->row();

        if($valida_foto==NULL){
            //var_dump('datos_nulos');
        //exit;
            $data['foto_fachada'] ='public/assets/images/reportes/nodisponible.jpeg';
            //$data['foto_plano_ubi'] = 'public/assets/images/reportes/nodisponible.jpeg';
            $data['foto_plano_ubi'] = 'public/assets/files/predios/predio.jpg';
        }else{

            $data['foto_fachada'] = 'public/assets/files/predios/'.$valida_foto->foto_fachada;
//            $data['foto_plano_ubi'] = 'public/assets/files/predios/'.$valida_foto->foto_plano_ubi;
            $data['foto_plano_ubi'] = 'public/assets/files/predios/predio.jpg';

        }

        //$data['foto'] = ;
        

        $data['datos_predio'] = $this->Reportes_model->get_data($id);
        $data['propietarios'] = $this->Reportes_model->get_propietarios($id);

        $this->load->view('reports/cert_bloques',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 


           public function pago()    
    {
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');


        $data['data_bloques'] = $this->db->query("SELECT b.*,d.descripcion,u.descripcion as uso FROM catastro.bloque b
LEFT JOIN
catastro.destino_bloque d
on b.destino_bloque_id=d.destino_bloque_id
LEFT JOIN
catastro.uso_bloque u
on b.uso_bloque_id=u.uso_bloque_id


WHERE predio_id=50 ORDER BY b.nro_bloque")->result(); 
        $data['data_grupos'] = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat where activo=1")->result_array(); 
        $data['num_grupos'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_grupo_mat where activo=1 ")->row();
        $data['num_bloques'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_mat_item where activo=1  ")->row();

        // Define key-value array
        $days_dias = array(
            'Monday'=>'Lunes',
            'Tuesday'=>'Martes',
            'Wednesday'=>'Miércoles',
            'Thursday'=>'Jueves',
            'Friday'=>'Viernes',
            'Saturday'=>'Sábado',
            'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];
        $this->load->view('reports/cert_pagos',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 



    public function html()
    {
        $data['data_grupos'] = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat where activo=1 order by grupo_mat_id asc")->result_array(); 
      $data['data_bloques'] = $this->db->query("SELECT * FROM catastro.bloque_mat_item where activo=1 order by grupo_mat_id asc")->result_array(); 

      $data['num_grupos'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_grupo_mat where activo=1 ")->row();
       $data['num_bloques'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_mat_item where activo=1 ")->row();
        $this->load->view('reports/ficha_tecnica',$data);    
    }  
 



}
