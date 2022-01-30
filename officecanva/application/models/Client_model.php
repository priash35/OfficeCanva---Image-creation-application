<?php

class Client_model extends CI_Model
{	
	public function __construct()
	{
		parent ::__construct();
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
	
}

?>