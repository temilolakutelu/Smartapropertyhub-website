<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url',
            'app',
        ));
        $this->load->library(array(
            'session',
            'form_validation',
            'email',
        ));
        $this->load->database();
        $this->load->model(['register_model', 'Login_model']);
        $this->load->helper('form');
    }
    public function index()
    {
        if ($this->session->userdata('form_value')) {
            $form_data = $this->session->userdata('form_value');
            $fname = $form_data['fname'];
            $lname = $form_data['lname'];
            $username = $form_data['username'];
            $email = $form_data['email'];
            $phone = $form_data['phone'];
        }

        if (!$this->session->flashdata('message')) {

            $data['message'] = $this->session->flashdata('message');
        } elseif (!$this->session->flashdata('error')) {

            $data['error'] = $this->session->flashdata('error');
        }
        $data = array(

            'title' => 'Register Page',
            'message' => $this->session->flashdata('message'),
            'error' => $this->session->flashdata('error'),
            'fname' => set_value('fname', $fname),
            'lname' => set_value('lname', $lname),
            'username' => set_value('username', $username),
            'email' => set_value('email', $email),
            'phone' => set_value('phone', $phone),
        );

        $this->template->load('default', 'register', $data);
    }

    public function register_action()
    {
        $data_1 = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'username' => $this->input->post('username'),

        );
        $this->session->set_userdata('form_value', $data_1);

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $userIp = $this->input->ip_address();

        $secret = $this->config->item('google_secret');

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($output, true);

        if ($status['success']) {
            //set validation rules
            $this->_rules();

            //validate form input
            if ($this->form_validation->run() == false) {
                // fails
                $this->session->set_flashdata('error', validation_errors());

                redirect('register');
            } else {
                if (!$this->input->post('accept_terms')) {
                    echo "Please read and accept our terms and conditions.";
                    redirect('register', 'refresh');
                }
                //insert the user registration details into database
                $type = $this->input->post('type');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $username = $this->input->post('username');
                $phone = $this->input->post('phone');
                $pass = getHashedPassword($password);

                if ($type !== 'User') {
                    $this->form_validation->set_rules('email', 'Email ID', 'trim|valid_email|is_unique[tbl_agents.email]');
                    $this->form_validation->set_rules('plan', 'Subscription Plan', 'trim|required');
                    if ($this->form_validation->run() == false) {
                        $this->session->set_flashdata('error', validation_errors());
                        redirect('register');
                    } else {
                        $email = $this->input->post('email');
                        $this->session->set_userdata('email', $email);
                        $user_data = array(
                            'firstname' => $fname,
                            'lastname' => $lname,
                            'username' => $username,
                            'email' => $email,
                            'phone' => $phone,
                            'password' => $pass,
                        );
                        $agent_data = array(
                            'firstname' => $fname,
                            'lastname' => $lname,
                            'email' => $email,
                            'mobile' => $phone,
                            'password' => $pass,
                            'plan_id' => $this->input->post('plan'),
                        );
                        $check_user = $this->Login_model->check_user($email);
                        if ($check_user == false) {
                            $user_id = $this->register_model->insertUser($user_data);
                        }
                        $agent_id = $this->register_model->insertAgent($agent_data);

                        $config = array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'mail.propertyhub.com.ng',
                            'smtp_port' => '587',
                            'smtp_user' => 'info@propertyhub.com.ng',
                            'smtp_pass' => 'P5we85v@',
                            'mailtype' => 'html',
                            'charset' => 'utf-8',
                            'smtp_crypto' => 'tls',
                            'newline' => "\r\n",
                        );
                        $this->email->initialize($config);

                        $data3 = array(
                            'firstname' => $this->input->post('fname'),
                            'lastname' => $this->input->post('lname'),
                            'email' => $email,
                            'agent_type' => $this->input->post('type'),
                        );

                        $this->load->view('templates/mail', $data3, true);

                        $this->email->from('customercare@xownsolutions.com.ng', 'SPH Customer Care');
                        $this->email->to($email);
                        $this->email->subject('Welcome To Smart Property Hub');
                        $this->email->message($this->load->view('templates/mail', $data3, true));
                        $this->email->set_alt_message('View the mail using an html email client');

                        if ($this->email->send()) {
                            $this->session->set_flashdata('message', 'Registration Successful, Check email for Login details');
                        }

                        $sess_array = array(
                            'email' => $this->input->post('email'),
                            'user_id' => $user_id,
                            'agent_id' => $agent_id,
                        );
                        $this->session->set_userdata('logged_in', $sess_array);
                        $this->session->set_flashdata('message', 'Welcome, Check your email for login details to our SMARTPRO Web platform');
                        redirect('subscription/payment/' . $agent_data['plan_id']);

                    }
                } else {
                    $user_data = array(
                        'firstname' => $fname,
                        'lastname' => $lname,
                        'username' => $username,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $pass,
                    );
                    $user_id = $this->register_model->insertUser($user_data);
                    //send mail
                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.propertyhub.com.ng',
                        'smtp_port' => '587',
                        'smtp_user' => 'info@propertyhub.com.ng',
                        'smtp_pass' => 'P5we85v@',
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'smtp_crypto' => 'tls',
                        'newline' => "\r\n",
                    );
                    $this->email->initialize($config);

                    $data = array(
                        'firstname' => $fname,
                        'lastname' => $lname,
                        'email' => $email,
                        'agent_type' => $this->input->post('type'),
                    );

                    $this->load->view('templates/mail', $data, true);

                    $this->email->from('info@propertyhub.com.ng', 'SPH Customer Care');
                    $this->email->to($email);
                    $this->email->subject('Welcome To Smart Property Hub');
                    $this->email->message($this->load->view('templates/mail', $data, true));
                    $this->email->set_alt_message('View the mail using an html email client');

                    if ($this->email->send()) {
                        $this->session->set_flashdata('message', 'Registration Successful');
                    }

                    redirect('login');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Sorry Google Recaptcha Unsuccessful!!');
            redirect('register', 'refresh');
        }

    }
    public function verify($hash = null)
    {
        if ($this->register_model->verifyEmailID($hash)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('register/register');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('register/register');
        }
    }
    public function accept_terms()
    {
        if (isset($_POST['accept_terms'])) {
            return true;
        }

        $this->form_validation->set_message('accept_terms', 'Please read and accept our terms and conditions.');
        return false;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('username', 'UserName', 'trim|min_length[3]|max_length[30]');

        $this->form_validation->set_rules('phone', 'Mobile Number', 'required|regex_match[/^[0-9]{11}$/]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]|max_length[20]');
        $this->form_validation->set_rules('accept_terms', '...', 'callback_accept_terms');
    }
}
