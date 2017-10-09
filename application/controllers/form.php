<?php
class Form extends CI_Controller {
    private $sign_up = null;
    private $sign_in = null;
    public function __construct(){
        parent::__construct();
    }
    public function index() {
        //print_r($this->load->input());
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mail', 'Email', 'required');
        //$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->sign_up = $this->input->post('sign_up');
        $this->sign_in = $this->input->post('sign_in');
        if ($this->sign_up != null)
        {
            $this->form_validation->set_rules('frist_name', 'first_name', 'required');
            $this->form_validation->set_rules('last_name', 'last_name', 'required');
            $this->form_validation->set_rules('mail', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|matches|c_password');
            $this->form_validation->set_rules('c_password', 'c_password', 'required');
            if($this->form_validation->run() === False)
            {
                $this->load->view('signup');
            }
            else
            {
                $this->sign_up();
            }
        }
        if($this->sign_in != null)
        {
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('myform');
            }
            else
            {
                $this->sign_up = $this->input->post('');
                $this->email = $this->input->post('mail');
                $this->password = $this->input->post('password');
    //            print_r($this->email, $this->password);
                $this->log_in();
    //            $this->load->view('formsuccess');
            }
        }
        
    } 
        
    private function log_in() {
        $this->load->database();
//        $query = $this->db->query("SELECT 'First Name', 'Last Name' FROM log_in_details"); //WHERE Email=".$this->email." AND Password=".$this->password);
//        $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
//        $query = $this->db->get('log_in_details');
        $query = $this->db->select('first_name, last_name, email');
        $query = $this->db->from('log_in_details');
        $query = $this->db->where('email', $this->email);
        $query = $this->db->where('Password', $this->password)->get();
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $this->f_name = $row->first_name;
                $this->l_name = $row->last_name;
                echo "Name: " . $this->f_name . " " . $this->l_name . "<br>";
//                echo "Name: " . $row['First Name'] . $row['Last Name'] . "<br>";
//                echo "Email: " . $row->Email . "<br>";
                echo "Email: " . $row->email . "<br>";
            }
        }
        else 
        {
//            echo $this->email . "<br>" . $this->password . "<br>";
            echo "User does not exist or incorrect password.";
        }
        $this->db->close();
    }
    private function sign_up() {
        $this->load->database();
        $this->f_name = $this->input->post('first_name');
        $this->l_name = $this->input->post('last_name');
        $this->password = $this->input->post('password');
        $this->db->set('first_name', $this->f_name);
        $this->db->set('last_name', $this->l_name);
        $this->db->set('Password', $this->password);
        $this->db->insert('log_in_details');
    }
    
//    public function display_details() {
//        echo "First Name: " . $this->f_name . "<br>";
//        echo "Last Name: " . $this->l_name . "<br>";
//        echo "Email: " . $this->email . "<br>";
//        echo "Password: " . $this->password . "<br>";
//    }
//    public function load_home_page() {
//        $this->->load->view('Home_page');
//    }
//    public function load_Sign_up_page() {
//        $this->load->view('Sign_up');
//    }  
    
}

//$user = new User();
//$user->get_details();
//$user->log_in();
//$user->display_details();

?>