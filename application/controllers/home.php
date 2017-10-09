<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Home extends CI_Controller{
    private $log_out = FALSE;
    function __construct(){
        parent::__construct();
//        $this->check_isvalidated($username);
    }
    
    public function index(){
        // If the user is validated, then this function will run
//        echo 'You are logged in ' . $username . '<br>';
//        $this->check_isvalidated();
    }
    public function sign_in()
    {
        $username = $this->uri->segment(1);
        $result = $this->check_isvalidated($username);
        if ($result)
        {
            echo'you are logged in! '. $username;
        }
//        echo "sign_in"; die;
//        $validate = $this->check_isvalidated($username);
        
        //print_r($this->session->all_userdata());die;
    }
    
    public function check_isvalidated($username){
//        echo "checking validation";
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
        else
//            $username = $this->session->userdata('username');
//            $this->sign_in($username);
            return TRUE;
    }
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
 }
 ?>