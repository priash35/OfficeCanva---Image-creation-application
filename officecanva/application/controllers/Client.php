<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		//parent::Controller();
		parent::__construct();
		if (!isset($_SESSION['user_logged'])) {
				
			$this->session->set_flashdata("error", "plese login first view of page");
			redirect("login/index","refresh");
		}
		$this->load->library('form_validation');
		$this->load->model('Client_model');		
	}
	
	public function index()
	{		
		/* $data['clients']=$this->Client_model->clientData();
		$this->load->view('client/canvas', $data); */
		redirect("client/client_Gallary","refresh");
	}
	
	public function client_Gallary()
	{
		$this->load->model('Client_model');
		$id = $_SESSION['id'];	
		$data['result']=$this->Client_model->getClient($id);
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		$this->load->view('Client/gallary', $data);
	}	
	public function imgGallary()
	{		
		if(isset($_POST['add_image'])){
				
			if($_FILES['add_photo']['tmp_name']!=""){
				
			  $file_name = $_FILES['add_photo']['name'];			 
			  $file_tmp =$_FILES['add_photo']['tmp_name'];
			  $file_name = str_replace(' ', '_', $file_name);
			  $dest= "./assets/images/".$file_name;
			  $img="assets/images/".$file_name;
			  $img_url=base_url().$img;
			  move_uploaded_file($file_tmp, $dest);
			    
			}
			$company= $_POST['c_name'];			
			//die();
			$this->load->model("Client_model");
			$result = $this->Client_model->addImage($img_url,$company);
			redirect("client/client_Gallary","refresh");
			
		}
		//$this->load->view('gallary');
		$this->load->model('Client_model');
		$data['result']=$this->Client_model->ImagesData();
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		$this->load->view('client/gallary', $data);
	}
	
	public function client_image_data()
	{
		//$logo = $_REQUEST['logo'];      //javascript
		//$company = $_REQUEST['company'];
		$logo = $this->input->post('logo');    //ajax
		$company = $this->input->post('comp');
		//$logo= 'http://localhost/web-comp/assets/images/logo.png';
		//echo $logo;
		/* echo $id_image;
		die(); */		
		//$data['id_image']= $id_image;
		$data=$this->Client_model->ClientImageData($logo,$company);
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
		//$this->load->view('client_gallary',$data);
	}
	public function image_data()
	{
		//$id_image = $this->input->post('id_image');
		$id_image = $_REQUEST['id'];
		/* echo $id_image;
		die(); */		
		$data['id_image']= $id_image;
		$data['clients']=$this->Client_model->clientData();
		$this->load->view('client/canvas',$data);
	}

	public function get_client_data()
	{
		$id = $this->input->post('id', TRUE); 
			//echo $id;
			//die();
		$this->load->model('Client_model');
		$data = $this->Client_model->getClient($id);
		/* print_r($data);
		die(); */
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
		//$this->load->view('canvas',$data);
	}
		
}
