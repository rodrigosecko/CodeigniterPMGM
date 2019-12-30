<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Restserver extends CI_Controller{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    public function test_get(){
        $this->load->model("Edificacion_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);

        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->Edificacion_model->get_Bloque( $this->get('id') );
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }

    public function asinglist_get(){
        $id = $this->get('id');
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->get_asign_list($id));
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

      public function tramites_get(){
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->getGrupos());
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }
    
      public function subgrupos_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $this->load->model("ApiRest_model");




        $user = array('respuesta' => $this->ApiRest_model->getSubgrupos($id));
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

    public function listramite_get(){
        $this->load->model("ApiRest_model");

        $token = $this->get('token');       
        $message = array('respuesta'=>'','mensaje' => 'Acceso denegado','bool'=>'FALSE');
        if($this->ApiRest_model->verify_token_get($token)){
            $user = array('respuesta' => $this->ApiRest_model->getlistadotramite());        
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
        }


         else{
            $this->response($message, 404);
        } 






        

        
    }

    public function listarequisitos_get(){
        $id = $this->get('id');
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->getRequisitos($id));
         //$user = $this->ApiRest_model->getdata( 7);
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }


    public function users_post()
    {
        $message = [            
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => $this->post('message')
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function derivacion_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $this->load->model("ApiRest_model");


 
        $message = array('mensaje' => 'Acceso denegado');
        $datos_nulos = array('estado' => 'asd','mensaje'=>'No se encontraron datos');



        if($this->ApiRest_model->verify_token($token)){
            $user = array('estado' => $this->ApiRest_model->derivacion($id),'mensaje'=>'Datos encontrados ','bool'=>'TRUE');

            if(!$this->ApiRest_model->derivacion($id)){
                $user = array('estado' => '','mensaje'=>'No se encontraron datos','bool'=>'FALSE');
            }
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

        }
        else{
            $this->response($message, 404);
        }                      
    }

    public function derivacionst_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $this->load->model("ApiRest_model"); 
        $message = array('mensaje' => 'Acceso denegado','bool'=>'FALSE');

        if($this->ApiRest_model->verify_token_get($token)){
            $datos_nulos = array('estado' => 'asd','mensaje'=>'No se encontraron datos');
       
            $user = array('estado' => $this->ApiRest_model->derivacion($id),'mensaje'=>'Datos encontrados ','datos_solicitante'=> $this->ApiRest_model->get_datos_tramite(230),'bool'=>'TRUE');
            if(!$this->ApiRest_model->derivacion($id)){
                $user = array('estado' => $this->ApiRest_model->derivacion($id),'mensaje'=>'No se encontraron datos','datos_solicitante'=> $this->ApiRest_model->get_datos_tramite(230),'bool'=>'FALSE');
            }
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

        }
        else{
            $this->response($message, 404);
        }          
    }


    public function logueo_get()
    {
        $username = $this->get('username');
        $password = $this->get('password');  
        $token = $this->get('token'); 
        $message = array('mensaje' => 'Acceso denegado','bool'=>'FALSE');      
       
        $this->load->model("ApiRest_model");

         if($this->ApiRest_model->verify_token_get($token)){

            $user = array('respuesta' => $this->ApiRest_model->data_login($username,md5($password)),'mensaje'=>'Datos encontrados ','bool'=>'TRUE','usuario'=>$username,'password'=>$password);
        if(!$this->ApiRest_model->data_login($username,md5($password))){
                $user = array('respuesta' =>  $this->ApiRest_model->data_login($username,md5($password)),'mensaje'=>'No se encontraron datos','bool'=>'FALSE','password'=>$password,'usuario'=>$username);
            }
         
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }


        }
         else{
            $this->response($message, 404);
        }


        
    }
    //datos certificado
      public function certificado_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $validez='CERTIFICADO NO VALIDO';
        $this->load->model("ApiRest_model"); 
        $message = array('mensaje' => 'Acceso denegado','bool'=>'FALSE');

        

        if($this->ApiRest_model->verify_token_get($token)){
            $valido=$this->ApiRest_model->valido_cert($id);
           

            

            if($valido=1){
                $validez='CERTIFICADO VALIDO';
            }

            
             
            $user = array('mensaje'=>'Datos encontrados ','datos_propietario'=> $this->ApiRest_model->data_prop_cert($id),'datos_cert'=> $this->ApiRest_model->data_cert($id),'bool'=>'TRUE','Valido'=>$validez);
            if(!$this->ApiRest_model->data_prop_cert($id)){
                $user = array('mensaje'=>'No se encontraron datos','datos_propietario'=> $this->ApiRest_model->data_prop_cert($id),'datos_cert'=> $this->ApiRest_model->data_cert($id),'bool'=>'FALSE','Valido'=>$validez);
            }
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

        }
        else{
            $this->response($message, 404);
        }          
    }

     public function insertar_get(){
        $token = $this->get('token');//CFM token
        $tokenapp = $this->get('tokenapp');//token del servidor        
        $this->load->model("ApiRest_model"); 
        $message = array('mensaje' => 'Acceso denegado','bool'=>'FALSE');        

        if($this->ApiRest_model->verify_token_get($tokenapp)){            
            $this->ApiRest_model->insertar_tokens($token);//inserta el token             
            $user = array('mensaje'=>'Datos insertados correctamente','bool'=>'TRUE');           
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

        }
        else{
            $this->response($message, 404);
        }          
    }

     public function subirfoto_get(){
        $this->load->helper(array('form', 'url'));
        $id = $this->get('file');
        $name = $this->get('file');
        var_dump('hola'.$name);
        exit;
             
        $user = TRUE;
         //$user = $this->ApiRest_model->getdata( 7);
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

    public function upload_post()
{
    $this->load->helper(array('form', 'url'));

    $config = array(
        'upload_path' => "./uploads/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "2048000",
        'max_height' => "768",
        'max_width' => "1024"
    );

    $this->load->library('upload',$config);

    if($this->upload->do_upload('file'))
    {
        $data = array('upload_data' => $this->upload->data());
        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
    else
    {
        $error = array('error' => $this->upload->display_errors());
        $this->response($error, REST_Controller::HTTP_BAD_REQUEST);
    }

}

  public function prueba_get(){
        $this->load->model("ApiRest_model");             
        $titulo = $this->get('id');
        
        $user = array('respuesta' => $this->ApiRest_model->prueba());        
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

     public function insertainspeccion_get(){      
        
        $propietario = $this->get('propietario');        
        $frente = $this->get('frente');
        $fondo = $this->get('fondo');
        $fotoUrl = $this->get('fotoUrl');
        $luz = $this->get('luz');
        $agua = $this->get('agua');
        $pluvial = $this->get('pluvial');
        $sanitario = $this->get('sanitario');
        $alumbrado = $this->get('alumbrado');
        $gas = $this->get('gas');
        $basura = $this->get('basura');
        $telefono = $this->get('telefono');
        $transporte = $this->get('transporte');
        $estado = $this->get('estado');
        $forma = $this->get('forma');
        $calle = $this->get('calle');
        $zona = $this->get('zona');
        $numero = $this->get('numero');
        
        $this->load->model("ApiRest_model"); 
            $this->ApiRest_model->insertar_predio($propietario,$frente,$fondo,$fotoUrl,$luz,$agua,$pluvial,$sanitario,$alumbrado,$gas,$basura,$telefono,$transporte,$estado,$forma,$calle,$zona,$numero );//inserta el token             
            $user = array('mensaje'=>'Datos insertados correctamente','bool'=>'TRUE');           
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

               
    }

    public function deleteinspeccion_get(){
        
        $id = $this->get('id');
        
        
        $this->load->model("ApiRest_model"); 
            $this->ApiRest_model->borrar_predio($id);//inserta el token             
            $user = array('mensaje'=>'Datos borrados correctamente','bool'=>'TRUE');           
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

               
    }

    public function updateinspeccion_get(){
        $id = $this->get('id');
         $propietario = $this->get('propietario');        
        $frente = $this->get('frente');
        $fondo = $this->get('fondo');
        $fotoUrl = $this->get('fotoUrl');
        $luz = $this->get('luz');
        $agua = $this->get('agua');
        $pluvial = $this->get('pluvial');
        $sanitario = $this->get('sanitario');
        $alumbrado = $this->get('alumbrado');
        $gas = $this->get('gas');
        $basura = $this->get('basura');
        $telefono = $this->get('telefono');
        $transporte = $this->get('transporte');
        $estado = $this->get('estado');
        $forma = $this->get('forma');
        $calle = $this->get('calle');
        $zona = $this->get('zona');
        $numero = $this->get('numero');
        
        $this->load->model("ApiRest_model"); 
            $this->ApiRest_model->actualiza_predio($id,$propietario,$frente,$fondo,$fotoUrl,$luz,$agua,$pluvial,$sanitario,$alumbrado,$gas,$basura,$telefono,$transporte,$estado,$forma,$calle,$zona,$numero );//inserta el token             
            $user = array('mensaje'=>'Datos modificados correctamente','bool'=>'TRUE');           
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

               
    }

}
     
