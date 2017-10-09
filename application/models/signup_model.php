<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate()
    {
        // grab user input
        $this->load->library('form_validation');
        $username = $this->input->post('username');
        $query = $this->db->select('username');
        $query = $this->db->from('user_details');
        $query = $this->db->where('username',$username)->get();
        if($query->num_rows()== 0)
        {
            $first_name = $this->input->post('f_name');
            $last_name = $this->input->post('l_name');
            $email = $this->input->post('email1');
            $confirm_password = $this->input->post('c_password');
            $password = $this->input->post('password1');
            $this->form_validation->set_rules('f_name', 'f_name', 'required');
            $this->form_validation->set_rules('l_name', 'l_name', 'required');
//            $this->form_validation->set_rules('email', 'email', 'required');
//            $this->form_validation->set_rules('password', 'password', 'required|matches|c_password');
            $this->form_validation->set_rules('c_password', 'c_password', 'required');
            if($this->form_validation->run() === FALSE)
            {
                echo (validation_errors());
                return FALSE;
            }
            else
            {
                $this->db->set('username', $username);
                $this->db->set('first_name', $first_name);
                $this->db->set('last_name', $last_name);
                $this->db->set('password', $password);
                $this->db->set('email', $email);
                $this->db->insert('user_details');
                return TRUE;
            }
        }
        else
        {
            echo 'User already exists';
            return FALSE;
        }
    }
}
?>