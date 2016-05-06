<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Appiride extends REST_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_appiride');
    }
	
	
	
	
	
	//user
	function users_get()
    {	
		if( $this->get('id') ){
			$id = $this->get('id');
			$user = $this->model_appiride->getuser($id);
		}
		else{
			$user = $this->model_appiride->getalluser();
		}
		
        
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any User!'), 404);
        }
    }

	function delete_char_post()
    {
		$table = 'characters';
		$id = $this->input->post('id');
        $characters = $this->model_antboy->delete($table, $id);
        if($characters)
        {
            $this->response($characters, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any Character!'), 404);
        }
    }
	
	function edit_char_image_post()
    {

			$config['upload_path'] = 'uploads/characters';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']	= '9000';
			$config['max_width']  = '4500';
			$config['max_height']  = '4500';
			
			$this->load->library('upload', $config);
			$file_info='';
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				echo implode($error);
			}
			else
			{
				$file_info = $this->upload->data();
				$file_path = $file_info['full_path'];
				//echo $file_name;
			}
			
			$tablename = 'characters';
			$data = array();
			$id=$_POST['id'];

			$data['image'] = $file_info['file_name'];
			//echo implode($data);
			$insert = $this->model_antboy->edit_image($tablename, $data, $id);
			if($insert == "SUCCESS")
			{
				echo $file_info['file_name'];    
			}
			else if($insert == "NOTSUCCESS")
			{
				echo "Not success";        
			}
    }
	
	
	function login_post()
    {
        $email = $this->get('email');
		$password = $this->get('password');
        $result = $this->model_appiride->login($email, $password);
		
		if($result)
		{
		 /*$sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'id' => $row->id,
			 'username' => $row->fname
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }*/
		 echo "true";
	   }
	   else{
		echo "false";
	   }
    }
	
	function check_signup_mail_post()
    {
		$email = $this->post('email');
		$result = $this->model_appiride->signup_email_check($email);
		if($result == 1)
		{
		 echo 1;
		}
	   else{
		echo 0;
		}
	}

	function add_user_post()
    {
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 20; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			$confirmcode = implode($pass); //turn the array into a string
		
			$tablename = 'ar_user';
			$data = array();
			foreach ($_POST as $key => $val)
			{
				if($key != "submit"){
				$data[$key] = $val;
				}
			}
			$data['verify'] = $confirmcode;
			
			//email for verify
			$vurl = base_url()."home/signup_confirm?code=".$confirmcode;
			$this->email->from('appiride@gmail.com');
			$this->email->to('blsubramanian15@gmail.com'); 
						
			$this->email->subject('appiride verification mail');
			$this->email->message('Click this url to confirmation your mail.'.$vurl);	
			
			if($this->email->send()){
				//echo "<script> alert('mail sent'); </script>";
				$data['status']='1';
			}
			else{
				//echo "<script> alert('mail Not sent'); </script>";
				$data['status']='0';
			}
			//email for verify
			
			$insert = $this->model_appiride->insert($tablename, $data);
			if($insert == "SUCCESS")
			{
				echo "SUCCESS";    
			}
			else if($insert == "NOTSUCCESS")
			{
				echo "NOTSUCCESS";        
			}
    }
	function add_giver_ride_post()
    {
			$tablename = 'ar_journer';
			$data = array();
			foreach ($_POST as $key => $val)
			{
				if($key != "submit"){
				$data[$key] = $val;
				}
			}

			$data['status']='1';
			
			$insert = $this->model_appiride->insert($tablename, $data);
			if($insert == "SUCCESS")
			{
				echo "SUCCESS";    
			}
			else if($insert == "NOTSUCCESS")
			{
				echo "NOTSUCCESS";        
			}
    }
	
	function add_getter_ride_post()
    {
			$tablename = 'ar_joiner';
			$data = array();
			foreach ($_POST as $key => $val)
			{
				if($key != "submit"){
				$data[$key] = $val;
				}
			}

			$data['status']='1';
			
			$insert = $this->model_appiride->insert($tablename, $data);
			if($insert == "SUCCESS")
			{
				echo "SUCCESS";    
			}
			else if($insert == "NOTSUCCESS")
			{
				echo "NOTSUCCESS";        
			}
    }
	
	function edit_char_post()
    {
			$tablename = 'characters';
			$data = array();
			$id='';
			foreach ($_POST as $key => $val)
			{
				if($key != "submit" && $key != "id"){
				$data[$key] = $val;
				}
				if($key == "id"){
				$id = $val;
				}
			}
			//echo implode($data);
			$insert = $this->model_antboy->update($tablename, $data, $id);
			if($insert == "SUCCESS")
			{
				echo "SUCCESS";    
			}
			else if($insert == "NOTSUCCESS")
			{
				echo "NOTSUCCESS";        
			}
    }
	//user
	
	//journer
	function journer_get()
    {	
		if( $this->get('id') ){
			$id = $this->get('id');
			$journer = $this->model_appiride->getjourner($id);
		}
		else{
			$journer = $this->model_appiride->getalljourner();
		}
		
        
        if($journer)
        {
            $this->response($journer, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any journer!'), 404);
        }
    }
	
	function disable_journer_post()
    {	
			$id = $this->post('id');
			$data['deleted'] = '1';
			$table = "ar_journer";
			$journer = $this->model_appiride->update($table, $data, $id);
			
			 if($journer)
			{
				$this->response($journer, 200); // 200 being the HTTP response code
			}

			else
			{
				$this->response(array('error' => 'Couldn\'t find any journer!'), 404);
			}
	}
	//journer
	
	//joiner
	function joiner_get()
    {	
		if( $this->get('id') ){
			$id = $this->get('id');
			$joiner = $this->model_appiride->getjoiner($id);
		}
		else{
			$joiner = $this->model_appiride->getalljoiner();
		}
		
        
        if($joiner)
        {
            $this->response($joiner, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any joiner!'), 404);
        }
    }
	//joiner
	
	//instance
	function add_instance_ride_post()
    {
			$tablename = 'ar_instance';
			$data = array();
			foreach ($_POST as $key => $val)
			{
				if($key != "submit"){
				$data[$key] = $val;
				}
			}

			$data['status']='1';
			
			$insert = $this->model_appiride->insert_inst($tablename, $data);
			if($insert == "NOTSUCCESS")
			{
				echo "NOTSUCCESS";    
			}
			else if($insert)
			{
				echo $insert;        
			}
    }
	
	function instance_get()
    {	
		if( $this->get('id') ){
			$id = $this->get('id');
			$instance = $this->model_appiride->getinstance($id);
		}
		else{
			$instance = $this->model_appiride->getallinstance();
		}
		
        
        if($instance)
        {
            $this->response($instance, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any instance!'), 404);
        }
    }
	//instance
	
		
	//dash_journer
	function journey_list_get()
    {	
			$userid = $this->session->userdata('logged_in')['userid'];
			$journer = $this->model_appiride->getalljourney($userid);
		
        
        if($journer)
        {
            $this->response($journer, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any journer!'), 404);
        }
    }
	//dash_journer
	
		
	//dash_joiner
	function join_list_get()
    {	
			$userid = $this->session->userdata('logged_in')['userid'];
			$joiner = $this->model_appiride->getalljoin($userid);
		
        
        if($joiner)
        {
            $this->response($joiner, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any joiner!'), 404);
        }
    }
	//dash_joiner
	
	//dash req_journer
	function req_journer_post()
    {	
		$tablename = "req_journer";
		$data = array();
		$data['jour_id'] = $this->post('id');	
		$data['join_user_id'] = $this->session->userdata('logged_in')['userid'];
		$data['req_status'] = "not_accept";
		$joiner = $this->model_appiride->insert($tablename, $data);
		
        if($joiner == "SUCCESS")
        {
            $this->response($joiner, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any Journer!'), 404);
        }
    }
	
	function get_req_journer_get()
    {	
		$tablename = "req_journer";
		$jourid = $this->get('jouid');	
		$get_req = $this->model_appiride->getallreq_jour($jourid, $tablename);
		
        if($get_req)
        {
            $this->response($get_req); // 200 being the HTTP response code
        }

        else
        {
            $this->response(0);
        }
    }
	//dash req_journer
	
	//dash req_joiner
	function req_joiner_post()
    {	
		$tablename = "req_joiner";
		$data = array();
		$data['join_id'] = $this->post('id');	
		$data['jour_user_id'] = $this->session->userdata('logged_in')['userid'];
		$data['req_status'] = "not_accept";
		$joiner = $this->model_appiride->insert($tablename, $data);
		
        if($joiner == "SUCCESS")
        {
            $this->response($joiner, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any Journer!'), 404);
        }
    }
	
	function get_req_joiner_get()
    {	
		$tablename = "req_joiner";
		$joinid = $this->get('joiid');	
		$get_req = $this->model_appiride->getallreq_join($joinid, $tablename);
		
        if($get_req)
        {
            $this->response($get_req); // 200 being the HTTP response code
        }

        else
        {
            $this->response(0);
        }
    }
	//dash req_joiner
	
	//dash req_check
	function req_journer_check_get()
    {	
		$tablename = "req_journer";
		$jourid = $this->get('jouid');	
		$userid = $this->get('userid');
		$jou_check = $this->model_appiride->req_journer_check($jourid, $userid);
		if($jou_check)
        {
            $this->response($jou_check); // 200 being the HTTP response code
        }

        else
        {
            $this->response($jou_check);
        }
    }
	
	function req_joiner_check_get()
    {	
		$tablename = "req_joiner";
		$joinid = $this->get('joiid');	
		$userid = $this->get('userid');
		$joi_check = $this->model_appiride->req_joiner_check($joinid, $userid);
		if($joi_check)
        {
            $this->response($joi_check); // 200 being the HTTP response code
        }

        else
        {
            $this->response($joi_check);
        }
    }
	//dash req_check
	
}