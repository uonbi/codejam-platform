<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jam extends CI_Controller {
	private $data;

	function __construct(){
		parent::__construct();
		$this->load->model("member_model");

	}

	private function is_logged_in(){
		return $this->session->userdata("is_logged_in");
	}

	private function _load_view(){
		$this->load->view("inc/temp",$this->data);
	}

	public function index()
	{
		$this->data['main'] = "jam/index";
		$this->_load_view();
	}
}