<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate($username){
        // grab user input
//        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // Prep the query
        $query = $this->db->select('id,username,first_name,last_name,email');
        $query = $this->db->from('user_details');
        $query = $this->db->where('username', $username);
        $query = $this->db->where('password', $password)->get();
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            //print_r($row);die;
//            print_r($query); die;
            $data = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'fname' => $row->first_name,
                    'lname' => $row->last_name,
                    'email' => $row->email,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
//            print_r($data); die;
            return true;
        }
        // If the previous process did not validate
        // then return false.
        else
        {
            return false;
        }
    }
}
?>