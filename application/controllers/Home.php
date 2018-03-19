<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->helper('security');
		$this->load->helper('string');
		$this->load->library('encrypt'); 
		$this->load->library('form_validation');
		$this->load->library('email');
		//error_reporting(0);
	}

	function index(){
		if($this->session->userdata('user_id') == FALSE || $this->session->userdata('user_id')==""){
			redirect('login/signin');
		}else{
			$this->load->view('home/welcome');
		}
	}

	function change_pass(){
		if ($this->session->userdata('user_id') == FALSE || $this->session->userdata('user_id')=="") {
			redirect('login/signin');			
		} else {
			if (isset($_POST['submit']) ){
				$this->form_validation->set_rules('password', 'Current Password', 'trim|required|min_length[6]|max_length[50]');
				$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|max_length[50]|matches[re_password]');
				$this->form_validation->set_rules('re_password', 'Confirm Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('home/change_pass');
				}else {
					$password = $this->input->post('password');
					$new_password = $this->input->post('new_password');
					$email = $this->session->userdata('email');

					$curr_password = $this->Home_model->get_password($email);
					$curr_password = $this->encrypt->decode($curr_password);
					if (strcmp($password, $curr_password)==0) {
						$postdata['user_password'] = $this->encrypt->encode($new_password);
						$result = $this->Home_model->update_pass($email, $postdata);
						if ($result) {
							$this->session->set_flashdata('msg', 'Password Change Successful.');
							$this->load->view('home/change_pass');
						} else {
							$this->session->set_flashdata('msg', 'Something went wrong.');
							$this->load->view('home/change_pass');
						}
						
					} else {
						$this->session->set_flashdata('msg', 'Current password not match');
						$this->load->view('home/change_pass');
					}
					

				}

			} else {
				$this->load->view('home/change_pass');
			}
		}
		
	}

	public function profile(){
		if ($this->session->userdata('user_id') == FALSE || $this->session->userdata('user_id')=="") {
			redirect('login/signin');			
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['result'] = $this->Home_model->get_profile_info($user_id);
			$this->load->view('home/profile_view', $data);
		}
	}

	public function update_profile(){
		if ($this->session->userdata('user_id') == FALSE || $this->session->userdata('user_id')=="") {
			redirect('login/signin');			
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['result'] = $this->Home_model->get_profile_info($user_id);
			if (isset($_POST['submit']) ){

				$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[80]');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('home/profile_edit', $data);
				}else {

					$postdata['full_name'] = $this->input->post('fullname');

					$config['upload_path'] = './assets/profile/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '20048';
					$config['encrypt_name'] = FALSE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('image')) {
						$temp = $this->upload->data();
						$postdata['user_image'] = $temp['file_name'];

						$config['new_image'] = "thumb_" . $postdata['user_image'];
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/profile/' . $postdata['user_image'];

						$config['maintain_ratio'] = FALSE;
						$config['width'] = 150;
						$config['height'] = 150;
						$this->load->library('image_lib', $config);
						if ($this->image_lib->resize()) {
							$postdata['user_image_thumb'] = "thumb_" . $postdata['user_image'];
						}else {
							$postdata['user_image_thumb'] = "";
						}

						$path = './assets/profile/' . $this->input->post('old_image');
						unlink($path);
						$path = './assets/profile/'.'thumb_' . $this->input->post('old_image');
						unlink($path);
						$this->session->set_userdata('image', $postdata['user_image']);
						$this->session->set_userdata('image_thumb', $postdata['user_image_thumb']);
					}
					else if ($this->input->post('image_del')) {
						$path = './assets/profile/' . $this->input->post('old_image');
						unlink($path);
						$postdata['user_image'] = "";
						$path = './assets/profile/'.'thumb_' . $this->input->post('old_image');
						unlink($path);
						$postdata['user_image_thumb'] = "";
						$this->session->set_userdata('image', $postdata['user_image']);
						$this->session->set_userdata('image_thumb', $postdata['user_image_thumb']);
					}

					$result = $this->Home_model->profile_update($user_id, $postdata);
					if ($result) {
						$this->session->set_userdata('full_name', $postdata['full_name']);
						redirect('home/profile');
					} else {
						$this->session->set_flashdata('msg', 'Profile Updated fail. Something went wrong!');
						redirect('home/profile');
					}
					
				}
			}else{
				$this->load->view('home/profile_edit', $data);
			}
		}

	}


	public function billofsale(){
		$this->load->view('home/billofsale');
	}


}