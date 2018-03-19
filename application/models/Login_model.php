<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function signup($data){
        $result = $this->db->insert('users',$data);
        return $result;
    }

    function signin($email, $password){
        $this->db->select('*');
        $query = $this->db->get_where('users',array('user_email'=>$email, 'user_status'=>'1'));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->result();
            $this->load->library('encrypt');
            $pass = $this->encrypt->decode($result[0]->user_password);
            if(strcmp($pass, $password) == 0){
                return $result[0];
            }else{
                return false;
            }
        }
    }

    function check_activation_code_valid($code){
        $this->db->select('*');
        $query = $this->db->get_where('users',array('user_activation_key'=>$code));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->result();
            return $result[0];
        }
    }

    function active_account($email){
        $this->db->where('user_email', $email);
        $result = $this->db->update('users',array('user_status' => '1'));
        return $result;
    }

    function check_email_valid($email){
        $query = $this->db->get_where('users',array('user_email'=>$email));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->result();
            return $result[0];
        }
    }

    function forgot_password_code_insert($email, $code){
        $this->db->where('user_email', $email);
        $result = $this->db->update('users',array('user_forgot_password_code' => $code));
        return $result;
    }

    function forgot_password_code_valid($code){
        $this->db->select('*');
        $query = $this->db->get_where('users',array('user_forgot_password_code'=>$code));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->result();
            return $result[0];
        }
    }

    function update_password($email, $data){
        $this->db->where('user_email', $email);
        $result = $this->db->update('users',$data);
        return $result;
    }

    function delete_account($email){
        $this->db->where('user_email', $email);
        $result = $this->db->delete('users');
        return $result;
    }

}