<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Upload extends CI_Controller {

	 public function __construct()
   {
        parent::__construct();
   }
  
  //if index is loaded
	public function index() {
		//load the helper library
		$this->load->helper('form');
    $this->load->helper('url');
		//Set the message for the first time
		$data = array('msg' => "Upload File");
    
    $data['upload_data'] = '';
    
		//load the view/upload.php with $data
		$this->load->view('upload', $data);
    
		
	}

	function upload_it() {
          //load the helper
          $this->load->helper('form');

          //Configure
          //set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
          $config['upload_path'] = 'C:\xampp\htdocs\revista\tmp';
          
    // set the filter image types
          $config['allowed_types'] = 'gif|jpg|png';
          
          //load the upload library
          $this->load->library('upload', $config);
    
    $this->upload->initialize($config);
    
    $this->upload->set_allowed_types('*');

          $data['upload_data'] = '';
    
          //if not successful, set the error message
          if (!$this->upload->do_upload('userfile')) {
               $data = array('msg' => $this->upload->display_errors());

          } else { //else, set the success message
               $data = array('msg' => "Upload success!");
      
      		$data['upload_data'] = $this->upload->data();

          }
          
          //load the view/upload.php
          $this->load->view('upload', $data);
          
     }
}