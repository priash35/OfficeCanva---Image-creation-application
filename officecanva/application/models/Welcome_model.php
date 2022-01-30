<?php

class Welcome_model extends CI_Model
{
	
	
	public function __construct()
	{
		parent ::__construct();
	}
	public function addEmployee($employee,$address,$email,$pass,$contact,$desig,$role)
	{
		$data = array(
					'role'=> $role,
					'name'=> $employee,
					'address'=> $address,
					'email'=> $email,
					'password'=> $pass,
					'phone'=> $contact,
					'designation'=> $desig
					); 
		
				$result= $this->db->insert('user',$data);		
		
				return $result;  
	}
	public function getEmployee($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id);
		$query = $this->db->get();	    
	    return $query->result();
	}
	function updateEmp($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('user');	
	}
	function delete_employee($id)
	{
		$this->db->delete('user');
		$this->db->where('id', $id);
	}
	public function addClient($company,$client_name,$address,$email,$pass,$img_url,$img_url1,$contact,$b_cat,$website)  //currenlty using
	{
		//to add course
			$data = array(
					'company_name'=> $company,
					'client_name'=> $client_name,
					'address'=> $address,
					'email'=> $email,
					'password'=> $pass,
					'logo'=> $img_url,
					'photo'=> $img_url1,
					'contact'=> $contact,
					'business_category'=> $b_cat,
					'website_url'=> $website,
					); 
		
				$result= $this->db->insert('clients',$data);
		
				return $result;  
			}
			
	public function addImage($img_url,$company)	//currently working
		{
			
			$data = array('image' => $img_url,
						'company_name' => $company
					); 					 
					
					$result=$this->db->insert('images',$data);
				
					return $result;				
	}
	function ImagesData()
	{
		$this->db->select('*');
		$this->db->from('images');
		//$this->db->where('company_name', $company);
		$query = $this->db->get();	    
	    return $query->result();		
	}
	function clientData()
	{
		$query= $this->db->get('clients'); 
		return $query->result();
	}
	function employeeData()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role', 'Employee');
		$query = $this->db->get();	    
	    return $query->result();		
	}
	function ClientImageData($logo,$company)
	{
		$this->db->select('i.id, i.company_name, i.image');
		$this->db->from('images i');
		$this->db->join('clients c', 'i.company_name=c.company_name');		
		$this->db->where('c.company_name', $company);
		$this->db->where('c.logo', $logo);
		$query = $this->db->get();	    
	    return $query->result();
	}
	function get_image($id_image)
	{
		$this->db->select('*');
		$this->db->from('images');
		$this->db->where('id', $id_image);
		$query = $this->db->get();	    
	    return $query->result();
	}	
	function getClient($id)
	{
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->where('id', $id);
		$query = $this->db->get();	    
	    return $query->result();
		
	}
	function updateClient($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('clients');		
	}
	
	function delete_course($id)
	{
		$this->db->select('logo');
			$query = $this->db->get_where('clients', array('id' => $id));
					
				if($query->num_rows()>0)
				{                   
					$result=$query->result_array();  
					$image_name=$result[0]['logo'];
					if($image_name!="")
					{
						if(file_exists("$image_name"))
						{
							unlink("$image_name");
							
						}						
					}
				}
		$this->db->delete('clients', array('id' => $id));
	}
}

?>