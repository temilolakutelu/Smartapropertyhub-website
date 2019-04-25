<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_model']);
        $this->load->library('session');
         $this->load->helper(array('url'));
    }

    public function index($id)
    {
       echo $id;

       
      
    }

    public function checkuser(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
    }
    public function payment_action($id){
        echo $id;

    }
}