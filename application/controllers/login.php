<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }

    public function index($msg = ''){
        // Load our view to be displayed
        // to the user
        $this->session->sess_destroy();
        //$this->session->unset_userdata('validated');
//        print_r($this->session->all_userdata());die;
        $msg = array('msg'=>$msg);
        $this->load->view('login_view', $msg);
    }
    public function process(){
        // Load the model
        $username = $this->input->post('username1');
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate($username);
        //print_r($result);die;
        if(!$result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            redirect($username);
//            $this->home->check_isvalidated($username);
                
        }        
    }
}
?> 