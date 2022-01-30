<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		redirect("Welcome/client_Gallary","refresh");	
	}
	
	public function add_emp()
	{
		//$this->load->view("add_client");
		$data['emp']=$this->Welcome_model->employeeData();
		$this->load->view("admin/emp_list",$data);
	}
	public function add_empdata()
	{
		if(isset($_POST['add_emp']))
				{					
					$employee= $_POST['emp_name'];
					$address= $_POST['address'];
					$email= $_POST['email'];
					$pass= $_POST['pass'];
					$contact= $_POST['contact'];
					$desig= $_POST['desig'];
					$role= "Employee";
					
					$this->load->model('Welcome_model');
					$result= $this->Welcome_model->addEmployee($employee,$address,$email,$pass,$contact,$desig,$role);
					
					redirect("Welcome/add_emp","refresh");
					
				 }
				else
				{
					echo'fail';
				} 
		
		$this->load->view("admin/add_emp");
	}
	
	public function EditEmpList()
	{
		$id = $this->uri->segment('3');
		$data['records'] = $this->Welcome_model->getEmployee($id);
		//print_r($data);
		$this->load->view("admin/edit_emp",$data);
		
	}
	public function update_empdata()						//currently using
	{
		if(isset($_POST['update_emp']))
		{			
					$id= $_POST['id'];
					$employee= $_POST['emp_name'];
					$address= $_POST['address'];
					$email= $_POST['email'];
					$pass= $_POST['pass'];
					$contact= $_POST['contact'];
					$desig= $_POST['desig'];
					
				$data = array(
					'id'=> $id,
					'name'=> $employee,
					'address'=> $address,
					'email'=> $email,
					'password'=> $pass,
					'phone'=> $contact,
					'designation'=> $desig					
				);
				
			$this->load->model('Welcome_model');
			$this->Welcome_model->updateEmp($id, $data);
			
			redirect("Welcome/add_emp","refresh");
		}
		else
		{
			echo'fail';
		}
				
	}
	public function DeleteEmpList()
	{
		$id= $this->uri->segment('3');
		$this->load->model('Welcome_model');
		$data['records'] = $this->Welcome_model->delete_employee($id);		
		redirect("Welcome/add_emp","refresh");
	}
	public function add_client()
	{
		//$this->load->view("add_client");
		$data['clients']=$this->Welcome_model->clientData();
		$this->load->view("admin/client_list",$data);
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
				  		$dest= "./assets/images/logo/".$file_name;
						$img="assets/images/logo/".$file_name;
						$img_url=base_url().$img;
						move_uploaded_file($file_tmp, $dest);
			    	}
						
					if($_FILES['c_img']['tmp_name']!="")
					{
				
						$file_name1 = $_FILES['c_img']['name'];			 
						$file_tmp1 =$_FILES['c_img']['tmp_name'];
				  		$dest1= "./assets/images/".$file_name1;
						$img1="assets/images/".$file_name1;
						$img_url1=base_url().$img1;
						move_uploaded_file($file_tmp1, $dest1);
			    	}
					
					$this->load->model('Welcome_model');
					$result= $this->Welcome_model->addClient($company,$client_name,$address,$email,$pass,$img_url,$img_url1,$contact,$b_cat,$website);
					
					redirect("Welcome/add_client","refresh");
					
				 }
				else
				{
					echo'fail';
				} 
		
		$this->load->view("admin/add_client");
	}
	
	public function EditClientList()
	{
		$id = $this->uri->segment('3');
		$data['records'] = $this->Welcome_model->getClient($id);
		//print_r($data);
		$this->load->view("admin/edit_client",$data);
		
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
				  		$dest= "./assets/images/logo/".$file_name;
						$img="assets/images/logo/".$file_name;
						$img_url=base_url().$img;
						move_uploaded_file($file_tmp, $dest);
			    	}					
					else
					{
						$img_url=$_POST['ins_image'];
					}
			
					if($_FILES['c_img']['tmp_name']!="")
					{
				
						$file_name1 = $_FILES['c_img']['name'];			 
						$file_tmp1 =$_FILES['c_img']['tmp_name'];
				  		$dest1= "./assets/images/".$file_name1;
						$img1="assets/images/".$file_name1;
						$img_url1=base_url().$img1;
						move_uploaded_file($file_tmp1, $dest1);
			    	}
					else
					{
						$img_url1=$_POST['c_image'];
					}
					
				$data = array(
					'company_name'=>  $company,
					'client_name'=>  $client_name,
					'address' => $address,
					'email'=>  $email,
					'contact'=>  $contact,
					'business_category'=>  $b_cat,
					'logo' => $img_url, 
					'photo' => $img_url1, 
					'website_url'=>  $website
					
				);
				
			$this->load->model('Welcome_model');
			$result= $this->Welcome_model->updateClient($id, $data);
			
			redirect("Welcome/add_client","refresh");
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
		redirect("Welcome/add_client","refresh");
	}
	public function client_Gallary()
	{
		$this->load->model('Welcome_model');
		$data['result']=$this->Welcome_model->ClientData();
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		$this->load->view('admin/gallary', $data);
	}	
	public function imgGallary()
	{		
		if(isset($_POST['add_image'])){
				
			if($_FILES['add_photo']['tmp_name']!=""){
				
			  $file_name = $_FILES['add_photo']['name'];			 
			  $file_tmp =$_FILES['add_photo']['tmp_name'];
			  
			  $dest= "./assets/images/".$file_name;
			  $img="assets/images/".$file_name;
			  $img_url=base_url().$img;
			  move_uploaded_file($file_tmp, $dest);
			    
			}
			$company= $_POST['c_name'];			
			//die();
			$this->load->model("Welcome_model");
			$result = $this->Welcome_model->addImage($img_url,$company);
			redirect("welcome/client_Gallary","refresh");
			
		}
		//$this->load->view('gallary');
		$this->load->model('Welcome_model');
		$data['result']=$this->Welcome_model->ImagesData();
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
		$this->load->view('admin/gallary', $data);
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
		$this->load->view('admin/canvas',$data);
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
