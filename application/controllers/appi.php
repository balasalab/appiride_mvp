<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function login()
	{
		if($this->session->userdata('logged_in'))
		{
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['firstname'];
		 redirect('appi/dashboard', 'refresh');
		}
		else
		{
			$this->load->view('login');
		}
		
	}
	public function signup()
	{
		$this->load->view('signup');
	}
	public function logout()
	{
		session_start();
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('appi', 'refresh');
	}
	public function dashboard()
	{
		if($this->session->userdata('logged_in'))
		{
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['firstname'];
		 $this->load->view('header');
		 $this->load->view('dashboard', $data);
		 $this->load->view('footer');
		}
		else
		{
			redirect('appi/login', 'refresh');
		}
	}
	
	public function journer()
	{
		
		$this->load->view('header');
		$this->load->view('journer');
		$this->load->view('footer');

	}
	public function joiner()
	{
		$this->load->view('header');
		$this->load->view('joiner');
		$this->load->view('footer');
	}
	public function journer_register()
	{
		if($this->session->userdata('logged_in'))
		{
		$this->load->view('header');
		$this->load->view('journer_register');
		$this->load->view('footer');
		}
		else{
			redirect('appi/login', 'refresh');
		}
	}
	public function joiner_register()
	{
		if($this->session->userdata('logged_in'))
		{
		$this->load->view('header');
		$this->load->view('joiner_register');
		$this->load->view('footer');
		}
		else{
			redirect('appi/login', 'refresh');
		}
	}
	
	public function giver()
	{
		 $this->load->view('giver');
	}
	
	public function getter()
	{
		 $this->load->view('getter');
	}
	public function instance()
	{
		$this->load->view('header');
		$this->load->view('instance');
		$this->load->view('footer');
	}
	public function about()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */