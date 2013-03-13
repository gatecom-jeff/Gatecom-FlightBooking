<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller{
    function __construct(){
       parent::__construct();
    }

    public function index(){
        $this->english();
    }

    public function english(){
		$this->lang->load('general', 'english');
		$data = array('language' => 'english');
		$this->session->set_userdata($data);
	 	header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function swedish(){
		$this->lang->load('general', 'swedish');
		$data = array('language' => 'swedish');
		$this->session->set_userdata($data);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}



?>