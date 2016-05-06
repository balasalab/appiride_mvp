<?php 

Class Model_appiride extends CI_model
{
	
	public function __construct()
	{
		parent::__construct();
	}	

	public function getalluser()
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get('ar_user');
		return $query->result();

	}
	
	public function getuser($id)
	{	$this->db->order_by("id", "desc");
		$this->db->where('id', $id);
		$query = $this->db->get('ar_user');
		return $query->result();

	}
	
	public function getalljourner()
	{
		$this->db->order_by("id", "desc");
		$this->db->where('deleted', '0');
		$query = $this->db->get('ar_journer');
		return $query->result();

	}
	
	public function getjourner($id)
	{
		$this->db->order_by("id", "desc");
		$this->db->where('id', $id);
		$query = $this->db->get('ar_journer');
		return $query->result();

	}
	public function getalljoiner()
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get('ar_joiner');
		return $query->result();

	}
	
	public function getjoiner($id)
	{
		$this->db->order_by("id", "desc");
		$this->db->where('id', $id);
		$query = $this->db->get('ar_joiner');
		return $query->result();

	}
	
	public function getallinstance()
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get('ar_instance');
		return $query->result();

	}
	
	public function getinstance($id)
	{
		$this->db->order_by("id", "desc");
		$this->db->where('id', $id);
		$query = $this->db->get('ar_instance');
		return $query->result();

	}
	
	//dashboard
		
	public function getalljourney( $userid )
	{
		$this->db->order_by("id", "desc");
		$this->db->where('user_id', $userid);
		$query = $this->db->get('ar_journer');
		return $query->result();

	}
		
	public function getalljoin( $userid )
	{
		$this->db->order_by("id", "desc");
		$this->db->where('user_id', $userid);
		$query = $this->db->get('ar_joiner');
		return $query->result();

	}
	public function req_journer_check($jourid, $userid ){
		$this->db->where('jour_id', $jourid);
        $this->db->where('join_user_id', $userid);
		$query = $this->db->get('req_journer');
		if($query->num_rows == 1)
        {
			//return $query->result();
			return 1;
		}
		else{
			return 0;
		}
	}
	public function req_joiner_check($jourid, $userid ){
		$this->db->where('join_id', $jourid);
        $this->db->where('jour_user_id', $userid);
		$query = $this->db->get('req_joiner');
		if($query->num_rows == 1)
        {
			//return $query->result();
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function getallreq_jour($id, $table)
	{
		$this->db->order_by("id", "desc");
		$this->db->where('jour_id', $id);
		$query = $this->db->get($table);
		return $query->result();

	}
	
	public function getallreq_join($id, $table)
	{
		$this->db->order_by("id", "desc");
		$this->db->where('join_id', $id);
		$query = $this->db->get($table);
		return $query->result();

	}
	//dashboard
	

	 public function login($username, $password)
	 {
		$email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $this->db->where('email', $email);
        $this->db->where('password', $password);
		//$this->db->where('confirm_code', '1');
		
		// Run the query
        $query = $this->db->get('ar_user');
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $sess_array = array(
                    'userid' => $row->id,
					'firstname' => $row->fname,
					'lastname' => $row->lname,
					'email' => $row->email,
					'mobile' => $row->mobile,
                    'login' => true
                    );
            $this->session->set_userdata('logged_in', $sess_array);
            return true;
        }else
		{
			return false;
		}
	 }
	
	public function signup_email_check($email){
		$this->db->where('email', $email);
		$query = $this->db->get('ar_user');
		if($query->num_rows == 1)
        {
			return 1;
		}
		else{
			return 0;
		}
	}


	
	
	 public function insert($tablename, $data){ 
                 
        if( $this->db->insert($tablename, $data))
         {
             return "SUCCESS";
         }
         else{
            return "NOTSUCCESS";
         }
         
     }
	 public function insert_inst($tablename, $data){ 
                 
        if( $this->db->insert($tablename, $data))
         {
             return $this->db->insert_id();
         }
         else{
            return "NOTSUCCESS";
         }
         
     }
	 
	 
	 public function edit_image($table, $data, $id){
	 
		$this->db->where('id', $id);
		$query = $this->db->get($table);
		$fn = '';
		foreach($query->result() as $row)
		{
			$fn = $row->image;
		}
		
		$path_to_file = './uploads/'.$table.'/'.$fn;
		if(unlink($path_to_file)) {
		
		$this->db->where('id',$id);
		 $data = preg_replace("/\r\n|\r|\n/",'<br/>',$data);
        if($this->db->update($table, $data)){
            return "SUCCESS";   
        }
        else{
            return "NOTSUCCESS";
        }
		
		}
		else {
			 echo 'errors occured';
		}
		
	 }
	 
	 public function update($tablename ,$data, $id){
         $this->db->where('id',$id);
		 $data = preg_replace("/\r\n|\r|\n/",'<br/>',$data);
        if($this->db->update($tablename, $data)){
            return "SUCCESS";   
        }
        else{
            return "NOTSUCCESS";
        }
     }
	 
	 public function delete($table, $id){
		$this->db->where('id', $id);
		 if($this->db->delete($table))
		 {
			 return "SUCCESS";
		 }
		 else{
			 return "NOTSUCCESS";
		 }
	 }

}


?>