<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fus extends CI_Controller {

	public function __construct()
     {
          parent::__construct();
          //parent::Controller();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url','uri');
          $this->load->helper('html');
          $this->load->database('revista');
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
          $this->load->model('data_model');
          //$this->load->library('Services_JSON');
     }

		public function index()
	{

		$nombre = $data['usuario']=$this->session->userdata('usuario');
         //$data['count_data'] = $this->login_model->count_results('usuarios');
        $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
		$data['titulo']='.::FUS - Revista de Investigación::.';
		$this->load->view('plantilla/header',$data);
		$this->load->view('fus/index');
		$this->load->view('plantilla/footer');
	}

		public function Agregar()
	{
		$error['error']='';
		if ($this->session->userdata('get_user')){
          $data['titulo']='.::FUS - Agregar artículos ::.';
          $nombre = $data['usuario']=$this->session->userdata('usuario');
          //$data['count_data'] = $this->login_model->count_results('usuarios');
          $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
          $data['consulta_get_mail'] = $this->login_model->consulta_get_mail($nombre);
          $data['numero']=$numeros =$this->claves();
          //$this->correo();
          $this->load->view('plantilla/header',$data);
          $this->load->view('fus/agregar',$error);
          $this->load->view('plantilla/footer');
          }else{
               $error['error']='Usted no ha iniciado sesión, por favor ingrese!';
              $data['titulo']='.::FUS - Revista de Investigación::.';
          $this->load->view('plantilla/header',$data);    
          $this->load->view('form_login1',$error);
          $this->load->view('plantilla/footer');
          }  		
	}
	public function Listar()
	{
		  
		  $nombre = $data['usuario']=$this->session->userdata('usuario');
          $error['error']='';
          $data['consulta_get_where'] = $this->login_model->consulta_get_where($nombre);
          $privilegio=$data['privilegio']=$this->login_model->privilegio($nombre);
          $data['count_results'] = $this->login_model->count_results('articulos');
          $data['lista']=$this->data_model->listar_articulo($privilegio);
          $data['titulo']='.::FUS - Listado de artículos ::.';
          $this->load->view('plantilla/header',$data);
          $this->load->view('fus/Listar',$data);
          $this->load->view('plantilla/footer');
          
	}

	public function android()
	{

		$data['lista']=$this->data_model->android();
		$this->load->view('fus/Listar2',$data);
	
	}

	public function publicar_articulo()
	{	
		$codigo=$this->input->post('btn_publica');		
		$this->data_model->publica_articulo($codigo);
		redirect('Fus/listar');
		
	}
	
	public function claves(){
		$num1=rand(1000,2000);
		global $num2;
		$num2=rand(100,250);
		$num3=($num1%$num2);
			
		/*echo "<script>alert('$num1');</script>";
		echo "<script>alert('$num2');</script>";
		echo "<script>alert('$num3');</script>";*/
		$fecha_actual = date('H:i:s');
		$token=0;
		//$rest=substr($fecha_actual,-2);
		$rest1=substr($fecha_actual,-5,2);
		$rest2=substr($fecha_actual,-8,2);		
		$nom = $data['usuario']=$this->session->userdata('usuario');
		$clave=md5($nom);
		$rest3=substr($clave, -6);
		$token= "$rest3"."$num3"."$rest2"."$rest1";
		/*echo "<script>alert('$fecha_actual');</script>";
		echo "<script>alert('$token');</script>";*/
		return $token;
		}

	public function correo()
	{
		
		$nombre = $data['usuario']=$this->session->userdata('usuario');
		$Email=$this->login_model->consulta_get_mail($nombre);

		$num2=0;
//funcion para generar las claves 
		 
	$token=$this->claves();
	$Email=$this->input->post('correo');
	
	$config = array(
 'protocol' => 'smtp',
 'smtp_host' => 'smtp.googlemail.com',
 'smtp_user' => 'dcarrillo90@gmail.com', //Su Correo de Gmail Aqui
 'smtp_pass' => 'Alegio0601*', // Su Password de Gmail aqui
 'smtp_port' => '587',
 'smtp_crypto' => 'tls',
 'mailtype' => 'html',
 'wordwrap' => TRUE,
 'charset' => 'utf-8'
 );
 $this->load->library('email', $config);
 $this->email->set_newline("\r\n");
 $this->email->from('dcarrillo90@gmail.com',' Revista Cientifica - Autenticación de usuario');
 $this->email->subject('📊 Token ');
 $mensaje = '<html> <head><link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"> </head><body>';
$mensaje .= "<table>";
$mensaje .= "<tr style='background: #FFF;'><td align='center'>
<span style='font-size: 30px; font-weight: bold; font-color: #000;'>FUS - Revista de Investigación </span> </td></tr> <hr/>";
$mensaje .= "<tr><td><strong>Token: $token</strong></td></tr>";
$mensaje .= "<tr><td>
<hr/><p style='font-size: 10px';>Aviso Legal: Este mensaje (Incluyendo sus anexos) está destinado únicamente para el uso del individuo o entidad  a la cual está direccionado y puede contener información que no es de caracter público, de uso privilegiado o confidencial.  Si usted no es el destinatario intencional, se le informa que cualquier uso, difusión, distribución o copiado de esta comunicación está terminantemente prohibido.  Si usted ha recibido esta comunicación por error, notifíquenos inmediatamente y elimine este mensaje.
Este mensaje y sus anexos han sido revisados con software antivirus, para evitar que contenga código malicioso que pueda afectar sistemas de cómputo, sin embargo es responsabilidad del destinatario confirmar este hecho en el momento de su recepción. Gracias.</p> </td></tr>";
$mensaje .= "</table>";
$mensaje .= "</body></html>";
 $this->email->message($mensaje);
 $this->email->to($Email);
 $this->email->send(FALSE);
    
    


	}
}
?>