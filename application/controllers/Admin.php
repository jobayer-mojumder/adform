<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller

{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_model');
		$this->load->helper('security');
		$this->load->helper('string');
		$this->load->library('encrypt'); 
		$this->load->library('form_validation');
		$this->load->library('email');
		ini_set('max_execution_time', 0);
		ini_set('upload_max_filesize', '20M');
		ini_set('max_input_time', 0);
		//error_reporting(0);
	}

	function index(){
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id') == "") {
			redirect('admin/login');
		}
		else {
			$this->load->view('admin/welcome');
		}
	}
	// --------------------ip authenticate-----------------
	function login(){
		if ($this->session->userdata('admin_id') && $this->session->userdata('admin_id') != "") {
			redirect('admin');
		}else{
			if (!isset($_POST['login'])) {
				$this->load->view('admin/login');
			}
			else {
				$access = 1;
				if (1 <= $access) {
					$this->form_validation->set_rules('email', 'email', 'required|min_length[5]|max_length[50]');
					$this->form_validation->set_rules('password', 'Password', 'required');
					if ($this->form_validation->run() == FALSE) {
						$data['msg'] = 'Access Denied!';
						$this->load->view('admin/login', $data);
					}
					else {
						$postdata['email'] = $this->input->post('email');
						$postdata['password'] = $this->input->post('password');
						$results = $this->Admin_model->login($postdata);
						if ($results == FALSE) {
							$data['msg'] = 'Access Denied!';
							$this->load->view('admin/login', $data);
						}
						else {
							$this->session->set_userdata(array(
								'admin_id' => $results->ad_id,
								'fullname' => $results->fullname,
								'group' => $results->group,
								'email' => $results->email,
								'image' => $results->image,
								'thumb' => $results->thumb
							));
							redirect('admin');
						}
					}
				}
				else {
					$data['msg'] = 'Sorry ! Your are not authenticated to this section';
					$this->load->view('admin/login', $data);
				}
			}
		}
	}

	function logout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('image');
		$this->session->unset_userdata('thumb');
		redirect('admin/login');
	}

	function status($id = 0, $status = 2){
		if ($this->session->userdata('admin_id')) {
			$id = $this->input->xss_clean($id);
			$status = $this->input->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('admin/member_list');
			}
			else {
				if ($status) {
					$status = 0;
				}
				else {
					$status = 1;
				}
				$result = $this->Admin_model->member_change_status($id, array(
					'status' => $status
				));
				if ($result) {
					redirect('admin/member_list');
				}
				else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('admin/member_list');
				}
			}
		}
		else {
			redirect('admin/login');
		}
	}

	function change_pass(){
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id')=="") {
			redirect('admin/login');			
		} else {
			if (isset($_POST['submit']) ){
				$this->form_validation->set_rules('password', 'Current Password', 'trim|required|min_length[6]|max_length[50]');
				$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|max_length[50]|matches[re_password]');
				$this->form_validation->set_rules('re_password', 'Confirm Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/change_pass');
				}else {
					$password = $this->input->post('password');
					$new_password = $this->input->post('new_password');
					$email = $this->session->userdata('email');
					$curr_password = $this->Admin_model->get_password($email);
					$curr_password = $this->encrypt->decode($curr_password);
					
					if (strcmp($password, $curr_password)==0) {
						$postdata['password'] = $this->encrypt->encode($new_password);
						$result = $this->Admin_model->update_pass($email, $postdata);
						if ($result) {
							$this->session->set_flashdata('msg', 'Password Change Successful.');
							$this->load->view('admin/change_pass');
						} else {
							$this->session->set_flashdata('msg', 'Something went wrong.');
							$this->load->view('admin/change_pass');
						}
						
					} else {
						$this->session->set_flashdata('msg', 'Current password not match');
						$this->load->view('admin/change_pass');
					}
				}

			} else {
				$this->load->view('admin/change_pass');
			}
		}
		
	}



	public function profile(){
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id')=="") {
			redirect('admin/login');			
		} else {
			$admin_id = $this->session->userdata('admin_id');
			$data['result'] = $this->Admin_model->get_profile_info($admin_id);
			$this->load->view('admin/profile_view', $data);
		}
	}

	public function update_profile(){
		if ($this->session->userdata('admin_id') == FALSE || $this->session->userdata('admin_id')=="") {
			redirect('admin/login');			
		} else {
			$admin_id = $this->session->userdata('admin_id');
			$data['result'] = $this->Admin_model->get_profile_info($admin_id);
			if (isset($_POST['submit']) ){

				$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[80]');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/profile_edit', $data);
				}else {

					$postdata['fullname'] = $this->input->post('fullname');

					$config['upload_path'] = './assets/admin/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '20048';
					$config['encrypt_name'] = FALSE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('image')) {
						$temp = $this->upload->data();
						$postdata['image'] = $temp['file_name'];

						$config['new_image'] = "thumb_" . $postdata['image'];
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/admin/' . $postdata['image'];

						$config['maintain_ratio'] = FALSE;
						$config['width'] = 150;
						$config['height'] = 150;
						$this->load->library('image_lib', $config);
						if ($this->image_lib->resize()) {
							$postdata['thumb'] = "thumb_" . $postdata['image'];
						}else {
							$postdata['thumb'] = "";
						}

						$path = './assets/admin/' . $this->input->post('old_image');
						unlink($path);
						$path = './assets/admin/'.'thumb_' . $this->input->post('old_image');
						unlink($path);
						$this->session->set_userdata('image', $postdata['image']);
						$this->session->set_userdata('thumb', $postdata['thumb']);
					}
					else if ($this->input->post('image_del')) {
						$path = './assets/admin/' . $this->input->post('old_image');
						unlink($path);
						$postdata['image'] = "";
						$path = './assets/admin/'.'thumb_' . $this->input->post('old_image');
						unlink($path);
						$postdata['thumb'] = "";
						$this->session->set_userdata('image', $postdata['image']);
						$this->session->set_userdata('thumb', $postdata['thumb']);
					}

					$result = $this->Admin_model->profile_update($admin_id, $postdata);
					if ($result) {
						$this->session->set_userdata('fullname', $postdata['fullname']);
						redirect('admin/profile');
					} else {
						$this->session->set_flashdata('msg', 'Profile Updated fail. Something went wrong!');
						redirect('admin/profile');
					}
					
				}
			}else{
				$this->load->view('admin/profile_edit', $data);
			}
		}

	}


	/***********************adminlist function**************************/

    function adminlist(){
        if ($this->session->userdata('admin_id') && $this->session->userdata('group')=='super_admin') {
            $data['results'] = $this->Admin_model->get_adminlist_lists();
            $this->load->view('admin/adminlist_view', $data);
        }else {
            redirect('admin/login');
        }
    }

    function adminlist_add(){
        if ($this->session->userdata('admin_id') && $this->session->userdata('group')=='super_admin') {
            if (isset($_POST['submit'])) {
                
                $this->form_validation->set_rules('name', 'Full Name', 'trim|required|max_length[80]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[re_password]');
				$this->form_validation->set_rules('re_password', 'Re-enter Password', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|max_length[80]|valid_email|is_unique[users.user_email]');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/adminlist_add');
                
                }else {
                    $postdata['fullname'] = $this->input->post('name');
                    $postdata['email'] = $this->input->post('email');
                    $postdata['password'] = $this->encrypt->encode($this->input->post('password'));
                    $postdata['group'] = $this->input->post('group');
                    $postdata['status'] = $this->input->post('status');

                    $result = $this->Admin_model->adminlist_add($postdata);
                    
                    if ($result) {
                        $this->session->set_flashdata('msg', 'Added Successfully');
                        redirect('admin/adminlist');
                    
                    }else {
                        $data['msg'] = "Failed to add image";
                        $this->load->view('admin/adminlist_add');
                    }
                }
            
            }else{
                $this->load->view('admin/adminlist_add');
            }
        
        }else {
            redirect('admin/login');
        }
    }

    function adminlist_edit($id = 0){
        if ($this->session->userdata('admin_id') && $this->session->userdata('group')=='super_admin' ) {
            $id = $this->security->xss_clean($id);
            if ($id == 0 || $id == "") {
                redirect('admin/adminlist');
            }
            else if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('name', 'Full Name', 'trim|required|max_length[80]');
				$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|max_length[80]|valid_email|is_unique[users.user_email]');

				if ($this->input->post('password') !='') {
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[re_password]');
					$this->form_validation->set_rules('re_password', 'Re-enter Password', 'trim|required');
				}
                if ($this->form_validation->run() == FALSE) {
                    $data['results'] = $this->Admin_model->get_adminlist_by_id($id);
                    $this->load->view('admin/adminlist_edit', $data);
                }else {
                    $postdata['fullname'] = $this->input->post('name');
                    $postdata['email'] = $this->input->post('email');
                    if ($this->input->post('password')) {
                    	$postdata['password'] = $this->encrypt->encode($this->input->post('password'));
                    }
                    $postdata['group'] = $this->input->post('group');
                    $postdata['status'] = $this->input->post('status');

                    $result = $this->Admin_model->adminlist_update($id, $postdata);
                    if ($result) {
                        $this->session->set_flashdata('msg', 'Updated Successfully');
                        redirect('admin/adminlist');
                    }else {
                        $data['results'] = $this->Admin_model->get_adminlist_by_id($id);
                        $data['msg'] = "Failed to update image";
                        $this->load->view('admin/adminlist_edit', $data);
                    }
                }
            }else {
                $data['results'] = $this->Admin_model->get_adminlist_by_id($id);
                if (empty($data['results'])) {
                    redirect('admin/adminlist');
                }
                else {
                    $this->load->view('admin/adminlist_edit', $data);
                }
            }
        }else {
            redirect('admin/login');
        }
    }

    function adminlist_del($id = 0){
        if ($this->session->userdata('admin_id') && $this->session->userdata('group')=='super_admin' ) {
            $id = $this->security->xss_clean($id);
            if ($id == 0 || $id == "" || $id == $this->session->userdata('admin_id')) {
                redirect('admin/adminlist');
            }else {
                $image = $this->Admin_model->get_adminlist_image_by_id($id);

                $result = $this->Admin_model->adminlist_del($id);
                if ($result) {
                	$path = './assets/admin/';
                    unlink($path. $image);
                    unlink($path.'thumb_' . $image);
                    $this->session->set_flashdata('msg', 'Deleted Successfully');
                    redirect('admin/adminlist');
                }else {
                    $this->session->set_flashdata('msg', 'Failed to Delete');
                    redirect('admin/adminlist');
                }
            }
        }else {
            redirect('admin/login');
        }
    }

    function adminlist_status_change($id = 0, $status = 2){
        if ($this->session->userdata('admin_id') && $this->session->userdata('group')=='super_admin' ) {
            $id = $this->security->xss_clean($id);
            $status = $this->security->xss_clean($status);
            if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "" || $id == $this->session->userdata('admin_id')) {
                $this->session->set_flashdata('msg', 'Incorrect Parameter');
                redirect('admin/adminlist');
            }else {
                $postdata['status'] = $status;
                $result = $this->Admin_model->adminlist_update($id, $postdata);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Successfully status changed!');
                    redirect('admin/adminlist');
                }else {
                    $this->session->set_flashdata('msg', 'Failed to change status');
                    redirect('admin/adminlist');
                }
            }
        }else {
            redirect('admin/login');
        }
    }


}