<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotell extends CI_Controller {

	/**
	 * Controller for "Hotell".
	 *
	 * This controller contains all functions needed to make a hotel booking.
	 *
	 * 
	 *
	 * Created by GATECOM´s Robert Bornholm
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
		 if (!$this->session->userdata('language'))
           $this->session->set_userdata('language','english');
			
		$this->load->view('head');
        $this->load->view('top');
        $this->load->view('menu');
		
        $this->load->view('flight_search');
		$this->load->view('seebooking');
        $this->load->view('content');
        $this->load->view('footer');
		
	}
}

/* End of file hotell.php */
/* Location: ./application/controllers/hotell.php */