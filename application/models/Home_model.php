<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	function get_password($email){
		$this->db->select('*');
        $query = $this->db->get_where('users',array('user_email'=>$email));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->result();
            return $result[0]->user_password;
        }
	}

	function update_pass($email, $data){
		$this->db->where('user_email', $email);
    	$result = $this->db->update('users',$data);
        return $result;
	}

    function get_profile_info($id){
        $this->db->select('*');
        $query = $this->db->get_where('users',array('user_id'=>$id));
        $result = $query->result();
        return $result[0];
    }

    function profile_update($id, $data){
        $this->db->where('user_id', $id);
        $result = $this->db->update('users',$data);
        return $result;
    }

}