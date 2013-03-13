<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function __construct()
    {
        //$this->lang->load('my', $this->session->userdata('language'));
		parent::__construct();
		if(!$this->session->userdata('language'))
		{
			$this->lang->load('general', 'english');
			$data = array('language' => 'english');
			$this->session->set_userdata($data);		
		} 
		else
		{
			$this->lang->load('general', $this->session->userdata('language'));
			$data = array('language' => $this->session->userdata('language'));
			$this->session->set_userdata($data);
		}
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */