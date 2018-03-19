<?php

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->helper('security');
		$this->load->helper('string');
		$this->load->library('encrypt'); 
		$this->load->library('form_validation');
		$this->load->library('session');
		//error_reporting(0);
	}

	function index(){
		if($this->session->userdata('user_id') == FALSE || $this->session->userdata('user_id')==""){
			$this->load->view('home/login');
		}else{
			redirect('home');
		}
	}
	
	public function forgot_pass(){

		if (!isset($_POST['change'])) {
			$this->load->view('home/forgot_pass');
		}else{
			$this->form_validation->set_rules('email', 'Email Address ', 'valid_email');

			if($this->form_validation->run() == FALSE){
				$data['msg'] = "Invalid Email Format";
				$this->load->view('home/forgot_pass',$data);

			}else{
				$email = $this->input->post('email');
				$valid_email = $this->Login_model->check_email_valid($email);

				if ($valid_email->user_email) {
					$code = time() . random_string('unique');
					$result = $this->Login_model->forgot_password_code_insert($email, $code);
					
					if ($result) {
						$config = array(
							'protocol'  => 'smtp',
							'smtp_host' => 'smtp.gmail.com',
							'smtp_port' => '587',
							'smtp_user' => 'datacraftbd@gmail.com',
							'smtp_pass' => 'datacraft2017',
							'mailtype'  => 'html', 
							'charset'   => 'iso-8859-1'
						);
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
						$this->email->to($email);
						$this->email->from('datacraftbd@gmail.com', 'DataCraft BD');
						$this->email->subject('Password Recovery.');
						$this->email->message("Dear " . $valid_email->full_name . ",<br/><br/>We receive a password change request. If you send this request please click the link below, otherwise ignore this mail." . "<br/><br/><a href='" . base_url() . "login/change_password/" . $code . "'>Change password</a>" . "<br/><br/>Auto Generated Email. Do Not Reply.");
						$this->email->send();
						$this->session->set_flashdata('msg', 'Password recovery link send to your email address.');
						redirect('login');
					} else {
						# code...
					}
					
				} else {
					$data['msg'] = "No account attached with this email.";
					$this->load->view('home/forgot_pass',$data);
				}
				
			}
		}
	}
	
	public function pass_success(){
		$this->load->view('home/pass_success');
	}
	
	/* function make_pass()
	{
		echo '<b>123456:</b> '.$this->encrypt->encode('123456');
		echo '<br/><b>admin</b> '.$this->encrypt->encode('admin');
	} */

	public function signup(){
		if (!isset($_POST['signup'])) {
			$this->load->view('home/registration');
		
		}else{
			$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[re_password]');
			$this->form_validation->set_rules('re_password', 'Re-enter Password', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|max_length[80]|valid_email|is_unique[users.user_email]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('home/registration');
			
			}else {
				$postdata['full_name'] = $this->input->post('fullname');
				$postdata['user_email'] = $this->input->post('email');
				$postdata['user_password'] = $this->encrypt->encode($this->input->post('password'));
				$postdata['user_activation_key'] = time() . random_string('unique');
				$postdata['user_activation_key_time'] = date('Y-m-d H:i:s');
				$postdata['user_status'] = '0';
				$result = $this->Login_model->signup($postdata);
				
				if ($result) {
					$config = array(
						'protocol'  => 'smtp',
						'smtp_host' => 'smtp.gmail.com',
						'smtp_port' => '587',
						'smtp_user' => 'datacraftbd@gmail.com',
						'smtp_pass' => 'datacraft2017',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->to($postdata['user_email']);
					$this->email->from('datacraftbd@gmail.com', 'DataCraft BD');
					$this->email->subject('New Account Create.');
					
					$this->email->message("Dear " . $postdata['full_name'] . ",<br/><br/>Welcome to Company Name. Your sign up request has been received. However you cannot login unless you activate your account." . " Please click on the below link to activate your account now." . "<br/><br/><a href='" . base_url() . "login/activate/" . $postdata['user_activation_key'] . "'>Activate my account</a>" . "<br/><br/>Auto Generated Email. Do Not Reply.");
					
					/*if ($this->email->send()) {*/
						$this->session->set_flashdata('msg', 'Signup Request Successful! Please check your email inbox/spam folder for activation instructions.');
						redirect('login');
					
					/*} else {
						$result = $this->Login_model->delete_account($postdata['user_email']);
						echo $this->email->print_debugger();
						exit();
					}*/
				
				} else {
					$this->session->set_flashdata('msg', 'Something went wrong! Please try again.');
					redirect('login');
				}
			}
		}
	}


	function signin(){
		if (!isset($_POST['signin'])) {
			$this->load->view('home/login');
		
		}else {
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['msg'] = 'Access Denied!';
				$this->load->view('home/login', $data);
			
			}else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$results = $this->Login_model->signin($email, $password);
				
				if (!$results) {
					$data['msg'] = 'Access Denied!';
					$this->load->view('home/login', $data);
				
				}else {
					$this->session->set_userdata(array(
						'user_id' => $results->user_id,
						'full_name' => $results->full_name,
						'email' => $results->user_email,
						'image' => $results->user_image,
						'image_thumb' => $results->user_image_thumb,
					));
					redirect('home');
				}
			}
		}
	}

	function signout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('full_name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('image');
		$this->session->unset_userdata('image_thumb');
		redirect('login');
	}

	public function activate($code){
		$is_valid = $this->Login_model->check_activation_code_valid($code);
		
		if ($is_valid) {
			
			if ($is_valid->user_status) {
				$this->session->set_flashdata('msg', 'Your account is already activate.');
				redirect('login');
			
			} else {
				$result = $this->Login_model->active_account($is_valid->email);
				
				if ($result) {
					$this->session->set_flashdata('msg', 'Your account activate successfully. Please Login.');
					redirect('login');	
				
				} else {
					$this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
					redirect('login');
				}
			}
			
		} else {
			$this->session->set_flashdata('msg', 'This key is not valid.');
			redirect('login');
		}
		
	}

	public function change_password($code=''){
		if ($code !='') {
			$result = $this->Login_model->forgot_password_code_valid();
			
			if ($result->user_email) {
				$data['email'] = $result->user_email;
				$data['id'] = $result->user_id;
				$data['code'] = $result->user_forgot_password_code;
				
				if (!isset($_POST['submit'])) {
					$this->load->view('forgot_pass_submit', $data);
				
				} else {
					$this->form_validation->set_rules('email', 'email', 'required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[re_password]');
					$this->form_validation->set_rules('re_password', 'Re-enter Password', 'trim|required');
					
					if ($this->form_validation->run() == FALSE) {
						$this->load->view('forgot_pass_submit', $data);
					
					}else {
						$postdata['user_password'] = $this->encrypt->encode($this->input->post('password'));
						$postdata['user_forgot_password_code'] = time() . random_string('unique');
						$email = $this->input->post('email');
						$result = $this->Login_model->update_password($email, $postdata);
						
						if ($result) {
							$this->session->set_flashdata('msg', 'Password Change successfully. Please Log in');
							redirect('login');
						
						} else {
							$this->session->set_flashdata('msg', 'Something went wrong.');
							redirect('login');		
						}
						
					}				
				}

			} else {
				$this->session->set_flashdata('msg', 'This key is not valid.');
				redirect('login');
			}

		
		}else {
			$this->session->set_flashdata('msg', 'This key is not valid.');
			redirect('login');
		}
	}

}