<?php
class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function login($data){
        $this->db->select('*');
        $query = $this->db->get_where('admin',array('email'=>$data['email'], 'status'=>'1'));
        if($query->num_rows()==0) return false;
        else{
            $this->load->library('encrypt');
            $result = $query->result();
            $pass = $this->encrypt->decode($result[0]->password);
            if(strcmp($pass, $data['password']) == 0){
                return $result[0];
            }else{
                return false;
            }
        }
    }
    function get_admin_info($admin_data)
    {
        $this->db->select('*');
        $query = $this->db->get_where('admin',array('ad_id'=>$admin_data));
        $result = $query->result();
        return $result[0];
    }

    function get_password($email){
        $this->db->select('*');
        $query = $this->db->get_where('admin',array('email'=>$email));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->result();
            return $result[0]->password;
        }
    }

    function update_pass($email, $data){
        $this->db->where('email', $email);
        $result = $this->db->update('admin',$data);
        return $result;
    }

    function get_profile_info($id){
        $this->db->select('*');
        $query = $this->db->get_where('admin',array('ad_id'=>$id));
        $result = $query->result();
        return $result[0];
    }

    function profile_update($id, $data){
        $this->db->where('ad_id', $id);
        $result = $this->db->update('admin',$data);
        return $result;
    }


    /************************adminlist models function***************************/
    function get_adminlist_lists(){
        $this->db->order_by('ad_id', 'ASC');     
        $query = $this->db->get('admin');
        return $query->result();
    }

    function adminlist_add($data){
        $result = $this->db->insert('admin',$data);
        return $result;
    }

    function adminlist_update($id, $data){
        $this->db->where('ad_id', $id);
        $result = $this->db->update('admin',$data);
        return $result;
    }

    function get_adminlist_by_id($id){
        $query = $this->db->get_where('admin',array('ad_id' => $id));
        $result = $query->result();
        return $result[0];
    }

    function get_adminlist_image_by_id($id){
        $this->db->select('image ');
        $this->db->where('ad_id', $id);
        $query = $this->db->get('admin');
        $result = $query->result();
        return $result[0]->image;
    }

    function adminlist_del($id){
        $this->db->where('ad_id', $id);
        $result = $this->db->delete('admin');
        return $result;
    }

}