<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
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
		$this->data['main'] = "home/index";
		$this->_load_view();
	}

	public function about(){
		$this->data['main'] = "home/about";
		$this->_load_view();
	}

	public function register($mode="form"){
		if($mode=="form"){
			$this->data['main'] = "home/register";
			$this->_load_view();
		}
		elseif($mode=="submit"){
			#process submitted form
			$this->load->library("form_validation");

			$rules = array(
					array(
						'field'=>'first_name',
						'label'=>'First Name',
						'rules'=>'required'
					),
					array(
						'field'=>'last_name',
						'label'=>'Last Name',
						'rules'=>'required'
					),
					array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'required|valid_email|is_unique[member.email]'
					),
					array(
						'field'=>'phone',
						'label'=>'Phone Number',
						'rules'=>'is_unique[member.phone]'
					),
					array(
						'field'=>'institution',
						'label'=>'Institution/Organization',
						'rules'=>'none'
					),
					array(
						'field'=>'github',
						'label'=>'GitHub Username',
						'rules'=>'none'
					),
					array(
						'field'=>'age',
						'label'=>'Age',
						'rules'=>'greater_than[7]'
					),
					array(
						'field'=>'password',
						'label'=>'Password',
						'rules'=>'required'
					),
					array(
						'field'=>'password_confirm',
						'label'=>'Confirm Password',
						'rules'=>'required|matches[password]'
					)
					);
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run()){
				if($this->member_model->register_member()){
					#email user, later will add verification code
					// $this->load->model("email_model");

					// $name = $this->input->post("first_name");
					// $to_email = $this->input->post("email");

					// $_msg = $this->email_model->get_msg("welcome");
					// $msg = $_msg['html'];
					// $msg = str_replace("{name}", $name, $msg);
					// $subject = $_msg['subject'];

					// $this->email_model->send($to_email,$subject,$msg);

					#auto-login user
					$user = $this->member_model->get_member($this->input->post("email"),TRUE);
					$this->session->set_userdata($user);
					$this->session->set_userdata("is_logged_in",TRUE);

					redirect("jam");
				}else{
					#almost impossible to get here?
				}
			}else{
				$this->register();
			}	
		}
		else{
			#404
			redirect("home/register");
		}
	}

	public function user($mode="login",$mode2="form"){
		if($mode == "login"){
			if($mode2=="form"){
				$this->data['main'] = "home/login";
				$this->_load_view();
			}
			if($mode2=="submit"){
				$this->load->library("form_validation");
				$rules = array(
					array(
						"field" => "email",
						"label" => "Email",
						"rules"=>"valid_email|required"
						),
					array(
						"field" => "password",
						"label" => "Password",
						"rules"=>"required"
						)
					);
				$this->form_validation->set_rules($rules);
				if($this->form_validation->run()){
					$email = $this->input->post("email");
					$password = $this->input->post("password");
					$user = $this->member_model->member_login($email,$password);
					if(is_array($user)){
						$this->session->set_userdata($user);
						$this->session->set_userdata("is_logged_in",TRUE);

						redirect("jam");
					}else{
						$this->session->set_flashdata("msg","Wrong Password/Email");
						redirect("home/user/login");
					}
				}else{
					$this->user("login");
				}
			}
		}

		if($mode=="logout"){
			$this->session->sess_destroy();
			redirect("home/user/login");
		}
	}
}