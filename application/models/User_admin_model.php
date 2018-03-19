<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_model extends CI_Model {

	function get_user_lists(){
        $this->db->order_by('user_id', 'DESC');     
        $query = $this->db->get('users');
        return $query->result();
    }

    function user_add($data){
        $result = $this->db->insert('users',$data);
        return $result;
    }

    function user_update($id, $data){
        $this->db->where('user_id', $id);
        $result = $this->db->update('users',$data);
        return $result;
    }

    function get_user_image_by_id($id){
        $this->db->select('user_image ');
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        $result = $query->result();
        return $result[0]->user_image;
    }

    function user_del($id){
        $this->db->where('user_id', $id);
        $result = $this->db->delete('users');
        return $result;
    }
    
}