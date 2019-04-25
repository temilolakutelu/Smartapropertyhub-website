<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper(array('form', 'url', 'app'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }
    public function index()
    {
       
        if($this->session->userdata('logged_in')){
            redirect('home');
        }
        $email= $this->session->flashdata('email');
        $data = array(

            'title' => 'Login Page',
            'action' => site_url('login/login_action'),
            'message'=> $this->session->flashdata('message'),
            'error'=>$this->session->flashdata('error'),
            'email'=>$email
        );
        $this->template->load('default', 'login', $data);
    }

    public function login_action()
    { 
        
        
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if ($status['success']) {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());

            redirect('login');
        } else {



            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $row = $this->Login_model->login_user($email, $password);
         
            if ($row) {
                $sess_array = array(
                    'username' =>$row->username,
                    'user_id' => $row->user_id,
                );
                if($this->session->userdata('sub_id')){
                    redirect('subscription/payment');
                }
                $this->session->set_userdata('logged_in', $sess_array);
                if($this->session->userdata('favourite_id')){
                         $id= $this->session->userdata('favourite_id');
                        redirect('user/make_favourite/'.$id);
              }
                   
                   redirect('home');
            }
            else {
                $error='Wrong Login Details';
                $this->session->set_flashdata('error', $error);
                redirect('login');
            }
        }
    }
    else{
        $this->session->set_flashdata('error', 'Sorry Google Recaptcha Unsuccessful!!');
        redirect('login'); 
    }

    
    }

    
#################################################################################
############################### LOGOUT FOR USERS #################################

public function logout() {
    $user_data = $this->session->all_userdata();
    foreach ($user_data as $key => $value) {
        if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
            $this->session->unset_userdata($key);
        }
    }
    $this->session->sess_destroy();
    redirect('login');
}
}