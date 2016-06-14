<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller
{


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database('revista');
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }

     public function index()
     {
          if ($this->session->userdata('get_user')){
          redirect('login/home');
          }else{
          $error['error']='';
           $data['titulo']='.::FUS - Revista de Investigación::.';
          $nombre = $data['usuario']=$this->session->userdata('usuario');
          //$data['count_data'] = $this->login_model->count_results('usuarios');
          $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
          $this->load->view('plantilla/header',$data);    
          $this->load->view('form_login1',$error);
          $this->load->view('plantilla/footer');
          }    

     }

          public function login()
     {
          $this->form_validation->set_rules('txt_username', 'usuario', 'trim|required|alpha_numeric|callback_check_user_login');
          $this->form_validation->set_rules('txt_password', 'clave', 'trim|required|md5');

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
          $error['error']='';
          $data['titulo']='.::FUS - Revista de Investigación::.';
          $this->load->view('plantilla/header',$data);    
          $this->load->view('form_login1',$error);
          $this->load->view('plantilla/footer');
          //return false;
          //echo "Pruebasss FALSE";          
     }
          else
          {
               
         //return true;
               $user_session=array(
                    'usuario' => $this->input->post('txt_username'), 
                    'clave' => $this->input->post('txt_password'),  
                    'get_user' => 1
                    );
               $this->session->set_userdata($user_session);
               $nombre_login=$this->input->post('txt_username');
               //$this->session->set_nombre($nombre_login);
               
               redirect('login/home');
               //return true;
               //echo "Pruebasss TRUE";
          }

     }     

     public function check_user_login()
     {
          $username =  $this->input->post('txt_username');
          $password =  $this->input->post('txt_password');
          $this->load->model('login_model');
          if($this->login_model->get_where($username,$password)){
          //if($this->login_model->get_user($username,$password)){    
          return true;
          //echo "ok"; // log in
          }else{
             $mensaje=$this->form_validation->set_message('check_user_login','Usuario y/o contraseña errados!');
          return false;
          //echo $mensaje;
          }
     }

    
     public function home()
     {
          $data['titulo']='.::FUS - Revista de Investigación::.';
          $nombre = $data['usuario']=$this->session->userdata('usuario');
          //$data['count_data'] = $this->login_model->count_results('usuarios');
          $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
          if ($this->session->userdata('get_user')){                 
          //   echo $this->login_model->count_results('usuarios');
          $this->load->view('plantilla/header',$data);
          $this->load->view('fus/index');
          $this->load->view('plantilla/footer');
          }else{
          $error['error']='Usted no ha iniciado sesión, por favor ingrese!';
          $data['titulo']='.::FUS - Revista de Investigación::.';
          $user['usuario']='';
          $this->load->view('plantilla/header',$data,$user);
          $this->load->view('form_login1',$error);
          $this->load->view('plantilla/footer');
          
          }       
     }

     public function prueba()
     {
           $this->load->view('prueba');
     }
        
     public function logout()
     {
          $username =  $this->input->post('txt_username');
          $this->session->sess_destroy($username);
          redirect('login/index');
     }
}

?>