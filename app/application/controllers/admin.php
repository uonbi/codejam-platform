<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $data;

	function __construct(){
		parent::__construct();
		$this->load->model("admin_model");
		$this->is_logged_in();
	
	private function is_logged_in(){
		if(!$this->session->userdata('logged_in') ||
			!$this->session->userdata('is_admin')){
			$this->session->sess_destroy();
			redirect('home/alogin');
		}
	}
}