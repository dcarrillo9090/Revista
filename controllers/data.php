<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class data extends CI_Controller {

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
          $this->load->model('data_model');
     }

     public function articulo()
     {
          //$this->load->helper('form');
      
          $nombre = $data['usuario']=$this->session->userdata('usuario');
         //$data['count_data'] = $this->login_model->count_results('usuarios');
          $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
          $data['consulta_get_mail'] = $this->login_model->consulta_get_mail($nombre);
          $data['titulo']='.::FUS - Revista de Investigación::.';
          $error['error']='';
          $this->form_validation->set_rules('articulo', 'articulo', 'alpha_numeric_spaces|trim|required');
          $this->form_validation->set_rules('autor', 'autor', 'alpha_numeric_spaces|trim|required');
          $this->form_validation->set_rules('keyword', 'claves', 'alpha_numeric_spaces|trim|required');
          $this->form_validation->set_rules('resumen', 'resumen', 'alpha_numeric_spaces|trim|required');
          //$this->form_validation->set_rules('userfile', 'archivo', 'required');
          $this->form_validation->set_rules('token', 'token', 'alpha_numeric_spaces|trim|required');
          $this->form_validation->set_rules('acuerdos', 'terminos y condiciones', 'required');
          
          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
          $error['error']='';
          $data['titulo']='.::FUS - Revista de Investigación::.';
          $this->load->view('plantilla/header',$data);    
          $this->load->view('fus/Agregar',$error);
          $this->load->view('plantilla/footer');
              
          }
          else
          {         
          


          $autor=$this->input->post('articulo');
          $articulo=$this->input->post('autor');
          $claves=$this->input->post('keyword');
          $resumen=$this->input->post('resumen');
          $archivo=$this->input->post('userfile');
          $EToken=$this->input->post('token');
          $aux1=strlen($EToken);
          $aux=substr($EToken,0,$aux1-4);
          $tiempo_aux=substr($EToken,-4,4);
          $clave=substr($EToken,0,6);
          $nom = $data['usuario']=$this->session->userdata('usuario');
          $clave1=md5($nom);
          $rest3=substr($clave1, -6);
          $tiempo_aux1=$tiempo_aux+2;
          echo "<script>alert('Clave post: $clave');</script>";
          echo "<script>alert('Clave: $rest3');</script>";
           if ($rest3==$clave)  {
            
           if ($tiempo_aux > ($tiempo_aux1)){
            echo "<script>alert('Envio: $tiempo_aux');</script>";
            echo "<script>alert('Vencimiento: $tiempo_aux1');</script>";
            echo "<script>alert('Clave: $rest3');</script>";
            echo "<script>alert('Hay falla con su token - Error!');location.href = 'http://localhost/revista/Fus/Agregar';</script>";
          }
          else{
            echo "<script>alert('Vencimiento: $tiempo_aux1');</script>";
            echo "<script>alert('Clave: $rest3');</script>";


          $this->load->helper('form');

          //Configure
          //set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
          $config['upload_path'] = 'C:\xampp\htdocs\revista\tmp';
          // set the filter image types
          $config['allowed_types'] = 'doc|docx|pdf';          
          //load the upload library
          $this->load->library('upload', $config);    
          $this->upload->initialize($config);
          $this->upload->set_allowed_types('doc|docx|pdf');

          $data['upload_data'] = '';
    
          //if not successful, set the error message
          if (!$this->upload->do_upload('userfile')) {
               $data = array('msg' => $this->upload->display_errors());
               $alerta=$data['msg'];
               echo "<script>
               alert('$alerta');</script>";
               redirect('Fus/Agregar','refresh',$data);
          } else { //else, set the success message
               $data = array('msg' => "Upload success!");
      
          $data['upload_data'] = $this->upload->data();

          }
          
          //load the view/upload.php
          $archivo_data=$this->upload->data();
          $fname=$archivo_data['file_name'];
          $ruta_archivo="http://http://localhost/revista/tmp/".$fname;
          echo "<script>
               alert('Articulo agregado correctamente!');</script>";
          $this->data_model->insert_articulo($autor,$articulo,$claves,$resumen,$ruta_archivo);
          redirect('Fus/Listar','refresh');
        }

        }else{ 
            echo "<script>alert('Hay falla con su token - Error!');location.href = 'http://localhost/revista/Fus/Agregar';</script>";

          }
          }
       }
    
     public function mostrar()
     {
          $nombre = $data['usuario']=$this->session->userdata('usuario');
          $error['error']='';
          $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
          $data['lista']=$this->data_model->listar_articulo();
          $data['titulo']='.::FUS - Listado de artículos ::.';
          $this->load->view('plantilla/header',$data);
          $this->load->view('fus/Listar',$data);
          $this->load->view('plantilla/footer');
     }

     public function prueba()
     {
          
          $this->load->view('fus/prueba');
     }

     public  function do_upload()
    {
        $config['upload_path'] = 'C:\xampp\htdocs\revista\tmp';
        $config['allowed_types'] = 'xml|pdf|doc|docx';
        $config['max_size']    = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
     
        // You can give video formats if you want to upload any video file.
     
        $this->load->library('upload', $config);
     
        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
     
            // uploading failed. $error will holds the errors.
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
     
            // uploading successfull, now do your further actions
        }
    }

    public function prueba1()
     {
          
        //Variable de búsqueda
        $consultaBusqueda = $this->input->post('valorBusqueda');
        //Variable vacía (para evitar los E_NOTICE)
      echo "<script>
               alert('$alerta');</script>";

        $mensaje = "";

if (isset($consultaBusqueda)) {

  $this->login_model->get_mail($consultaBusqueda);
 }
     }
}
