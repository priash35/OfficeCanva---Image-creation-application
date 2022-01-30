<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		//parent::Controller();
		parent::__construct();
		if (!isset($_SESSION['user_logged'])) {
			
			$this->session->set_flashdata("error", "please login first view of page");
			redirect("login/index","refresh");
		}
		$this->load->library('form_validation');
		$this->load->model('Welcome_model');		
	}
	
	public function index()
	{		
		/* $data['clients']=$this->Client_model->clientData();
		$this->load->view('client/canvas', $data); */
		redirect("Employee/client_Gallary","refresh");	
	}
		
	public function add_client()
	{
		//$this->load->view("add_client");
		$data['clients']=$this->Welcome_model->clientData();
		$this->load->view("employee/client_list",$data);
	}
	public function add_clientdata()
	{
		if(isset($_POST['add_client']))
				{					
					$company= $_POST['company'];
					$client_name= $_POST['name'];
					$address= $_POST['address'];
					$email= $_POST['email'];
					$pass= $_POST['pass'];
					$contact= $_POST['contact'];
					$b_cat= $_POST['b_cat'];
					$website= $_POST['website'];
					
					if($_FILES['logo']['tmp_name']!="")
					{
				
						$file_name = $_FILES['logo']['name'];			 
						$file_tmp =$_FILES['logo']['tmp_name'];
				  		$dest1= "./assets/images/logo/".$file_name;
						$img="assets/images/logo/".$file_name;
						$img_url=base_url().$img;
						move_uploaded_file($file_tmp, $dest1);
			    	}
						
					$this->load->model('Welcome_model');
					$result= $this->Welcome_model->addClient($company,$client_name,$address,$email,$pass,$img_url,$contact,$b_cat,$website);
					
					redirect("Employee/add_client","refresh");
					
				 }
				else
				{
					echo'fail';
				} 
		
		$this->load->view("employee/add_client");
	}
	
	public function EditClientList()
	{
		$id = $this->uri->segment('3');
		$data['records'] = $this->Welcome_model->getClient($id);
		//print_r($data);
		$this->load->view("employee/edit_client",$data);
		
	}
	public function update_clientdata()						//currently using
	{
		if(isset($_POST['update_client']))
		{			
					$id= $_POST['client_id'];
					$company= $_POST['company'];
					$client_name= $_POST['name'];
					$address= $_POST['address'];
					$email= $_POST['email'];
					$contact= $_POST['contact'];
					$b_cat= $_POST['b_cat'];
					$website= $_POST['website'];
					
					if($_FILES['logo']['tmp_name']!="")
					{
				
						$file_name = $_FILES['logo']['name'];			 
						$file_tmp =$_FILES['logo']['tmp_name'];
				  		$dest1= "./assets/images/logo/".$file_name;
						$img="assets/images/logo/".$file_name;
						$img_url=base_url().$img;
						move_uploaded_file($file_tmp, $dest1);
			    	}
					
					else
					{
						$img_url=$_POST['ins_image'];
					}
			
				$data = array(
					'company_name'=>  $company,
					'client_name'=>  $client_name,
					'address' => $address,
					'email'=>  $email,
					'contact'=>  $contact,
					'business_category'=>  $b_cat,
					'logo' => $img_url, 
					'website_url'=>  $website
					
				);
				
			$this->load->model('Welcome_model');
			$result= $this->Welcome_model->updateClient($id, $data);
			
			redirect("Employee/add_client","refresh");
		}
		else
		{
			echo'fail';
		}
				
	}
	
	public function DeleteClientList()
	{
		$id= $this->uri->segment('3');
		$this->load->model('Welcome_model');
		$data['records'] = $this->Welcome_model->delete_course($id);		
		redirect("Employee/add_client","refresh");
	}
	public function client_Gallary()
	{
		$this->load->model('Welcome_model');
		$data['result']=$this->Welcome_model->ClientData();
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		$this->load->view('employee/gallary', $data);
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
			$this->load->model("Welcome_model");
			$result = $this->Welcome_model->addImage($img_url,$company);
			redirect("Employee/client_Gallary","refresh");
			
		}
		//$this->load->view('gallary');
		$this->load->model('Welcome_model');
		$data['result']=$this->Welcome_model->ImagesData();
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		$this->load->view('employee/gallary', $data);
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
		$data=$this->Welcome_model->ClientImageData($logo,$company);
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
		$data['clients']=$this->Welcome_model->clientData();
		$this->load->view('employee/canvas',$data);
	}

	public function get_client_data()
	{
		$id = $this->input->post('id', TRUE); 
			//echo $id;
			//die();
		$this->load->model('Welcome_model');
		$data = $this->Welcome_model->getClient($id);
		/* print_r($data);
		die(); */
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
		//$this->load->view('canvas',$data);
	}
	
	public function save_jpg()
	{
		$random = rand(100, 1000);

		//$_POST[data][1] has the base64 encrypted binary codes. 
		//convert the binary to image using file_put_contents
		$savefile = @file_put_contents("assets/output/$random.jpg", base64_decode(explode(",", $_POST['data'])[1]));

		//if the file saved properly, print the file name
		if($savefile){
			echo $random;
		}
	}
}
