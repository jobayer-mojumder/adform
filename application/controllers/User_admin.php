<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User_admin_model');
		$this->load->helper('security');
		$this->load->helper('string');
		$this->load->library('encrypt'); 
		$this->load->library('form_validation');
		$this->load->library('email');
		//error_reporting(0);
	}

	function user(){
		if ($this->session->userdata('admin_id')) {
			$data['results'] = $this->User_admin_model->get_user_lists();
			$this->load->view('admin/user_view', $data);
		}else {
			redirect('admin/login');
		}
	}

	function user_status_change($id = 0, $status = 2){
		if ($this->session->userdata('admin_id')) {
			$id = $this->security->xss_clean($id);
			$status = $this->security->xss_clean($status);
			if ($id == 0 || $id == "" || $status < 0 || $status > 1 || $status == "") {
				$this->session->set_flashdata('msg', 'Incorrect Parameter');
				redirect('user_admin/user');
			}else {
				$postdata['user_status'] = $status;
				$result = $this->User_admin_model->user_update($id, $postdata);
				if ($result) {
					$this->session->set_flashdata('msg', 'Successfully status changed!');
					redirect('user_admin/user');
				}else {
					$this->session->set_flashdata('msg', 'Failed to change status');
					redirect('user_admin/user');
				}
			}
		}else {
			redirect('admin/login');
		}
	}

	function user_del($id = 0){
        if ($this->session->userdata('admin_id')) {
            $id = $this->security->xss_clean($id);
            if ($id == 0 || $id == "") {
                redirect('user_admin/user');
            }else {
                $image = $this->User_admin_model->get_user_image_by_id($id);

                $result = $this->User_admin_model->user_del($id);
                if ($result) {
                	$path = './assets/profile/';
                    unlink($path. $image);
                    unlink($path.'thumb_' . $image);
                    $this->session->set_flashdata('msg', 'Deleted Successfully');
                    redirect('user_admin/user');
                }else {
                    $this->session->set_flashdata('msg', 'Failed to Delete');
                    redirect('user_admin/user');
                }
            }
        }else {
            redirect('admin/login');
        }
    }

}