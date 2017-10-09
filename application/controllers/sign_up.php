<?php

class Sign_up extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }

    public function index($msg = '')
    {
        $this->session->sess_destroy();
        $msg = array('msg'=>$msg);
        $this->load->view('login_view', $msg);
    }
    public function process()
    {
        $this->load->model('signup_model');
        $result = $this->signup_model->validate();
        // Now we verify the result
        if(!$result)
        {
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Did not sign up.</font><br />';
            $this->index($msg);
        }
        else
        {
            $msg = '<font color=red>Signed up successfully.</font><br />';
            $this->index($msg);
            // If user did validate, 
            // Send them to members area
//            redirect('login');
        }        
    }
}
?>