<?php

class Login extends CI_Controller
{

	public function index()
	{
		
		$this->load->view('login');
		
		$this->form_validation->set_rules('role','Role','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run()== TRUE) {
			
			$role = $_POST['role'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			if($role=="admin")
			{
				//check data in database
				$this->db->select('*');
				$this->db->from('user');
				$this->db->where(array('email' => $username, 'password' => $password, 'role' => 'Admin'));
				$query = $this->db->get();
				$user = $query->result();
				
				if(!empty($user))
				{				
					foreach($user as $row)
					{
						$id=$row->id;
						$uname= $row->name;
					}
				
					//temparny msg
					$this->session->set_flashdata("success","Your Login successful");
					//set session variables 
					$_SESSION['user_logged'] = TRUE;
					$_SESSION['username'] = $uname;
					$_SESSION['id'] = $id;			
					//redirect to dashboard page
					redirect("Welcome/index","refresh");				
				}
				else
				{
					$this->session->set_flashdata("error","Email Id or Password is incorrect!");
					redirect("login/index","refresh");
				}
				
			}
			else if($role=="employee")
			{
				//check data in database
				$this->db->select('*');
				$this->db->from('user');
				$this->db->where(array('email' => $username, 'password' => $password, 'role' => 'Employee'));
				$query = $this->db->get();
				$user = $query->result();
				
				if(!empty($user))
				{				
					foreach($user as $row)
					{
						$id=$row->id;
						$uname= $row->name;
					}
				
					//temparny msg
					$this->session->set_flashdata("success","Your Login successful");
					//set session variables 
					$_SESSION['user_logged'] = TRUE;
					$_SESSION['username'] = $uname;
					$_SESSION['id'] = $id;		
					//redirect to dashboard page
					redirect("Employee/index","refresh");				
				}
				else
				{
					$this->session->set_flashdata("error","Email Id or Password is incorrect!");
					redirect("Login/index","refresh");
				}
				
			}
			else if($role=="client")
			{
				//check data in database
				$this->db->select('*');
				$this->db->from('clients');
				$this->db->where(array('email' => $username, 'password' => $password));
				$query = $this->db->get();
				$user = $query->result();
				
				if(!empty($user))
				{				
					foreach($user as $row)
					{
						$id=$row->id;
						$uname= $row->client_name;
					}
				
					//temparny msg
					$this->session->set_flashdata("success","Your Login successful");
					//set session variables 
					$_SESSION['user_logged'] = TRUE;
					$_SESSION['username'] = $uname;
					$_SESSION['id'] = $id;		
					//redirect to dashboard page
					redirect("Client/index","refresh");				
				}
				else
				{
					$this->session->set_flashdata("error","Email Id or Password is incorrect!");
					redirect("Login/index","refresh");
				}
				
			}
		}			
	}


	public function logout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('user_logged');
		session_destroy();
		redirect("Login/index","refresh");
	}
}

?>