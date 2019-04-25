<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_model', 'Property_model', 'Forsale_model', 'Home_model']);
        $this->load->helper(array('form', 'url', 'app'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('home');
        }
        if (!$this->session->flashdata('message')) {

            $data['message'] = $this->session->flashdata('message');
        } elseif (!$this->session->flashdata('error')) {

            $data['error'] = $this->session->flashdata('error');
        }
        $email = $this->session->flashdata('email');
        $data = array(

            'title' => 'Login Page',
            'action' => site_url('login/login_action'),
            'message' => $this->session->flashdata('message'),
            'error' => $this->session->flashdata('error'),
            'email' => $email,
        );
        $this->template->load('default', 'login', $data);
    }
    public function make_favourite($id)
    {
        if ($this->session->userdata('logged_in')) {
            $login = $this->session->userdata('logged_in');
            $user_id = $login['user_id'];
            $data = array(
                'user_ID' => $user_id,
                'property_ID' => $id,
            );
            $check = $this->Property_model->check_favourite($user_id, $id);
            if ($check == false) {
                $result = $this->Property_model->make_favourite($data);
                $this->session->set_flashdata('message', 'Favourite Property saved');
                redirect('home');
            } else {
                $this->session->set_flashdata('error', 'Property Saved Already');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', 'Log in required for the operation');
            $this->session->set_userdata('favourite_id', $id);
            redirect('login');
        }
    }
    public function profile()
    {
        $login = $this->session->userdata('logged_in');
        $user_id = $login['user_id'];

        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('user/profile'),
            'per_page' => 6,
            'total_rows' => $this->Property_model->fav_num_rows($user_id),
        ];

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config); // model function

        $row = $this->Login_model->get_by_id($user_id);
        $username = $row->username;
        $fav = $this->Property_model->get_favourites($user_id, $config['per_page'], $this->uri->segment(3));
        $data = array(
            'title' => 'Smart Property Hub|Home',
            'username' => $username,
            'id' => $user_id,
            'user_data' => $row,
            'message' => $this->session->flashdata('message'),
            'error' => $this->session->flashdata('error'),
            'fav_data' => $fav,

        );

        $this->template->load('default', 'profile', $data);
    }
    public function edit($id)
    {
        $data = $this->input->post();
        $result = $this->Login_model->update_profile($id, $data);
        if ($result) {
            $this->session->set_flashdata('message', 'Profile Updated Successfully!!!');

        } else {
            $this->session->set_flashdata('error', 'Error Updating Profile, Try again');
        }
        redirect('user/profile');

    }

#################################################################################
    ############################### LOGOUT FOR USERS #################################

    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('home');
    }

    public function submit_request()
    {
        $data['title'] = 'Submit A Request';
        $data['states'] = $this->Forsale_model->get_state();
        $data['type_data'] = $this->Home_model->get_sub_type();
        $data['message'] = $this->session->userdata('message');

        $this->template->load('default', 'submit_request', $data);
    }

    public function submit_request_action()
    {
        $data = $this->input->post();
        $this->Home_model->insert_request($data);

        $this->session->set_flashdata('message', 'A request is successfully submit');
        redirect('user/submit_request');

    }
    public function property_alert()
    {
        $data['title'] = 'Submit A Request';
        $data['states'] = $this->Forsale_model->get_state();
        $data['type_data'] = $this->Home_model->get_sub_type();
        $data['message'] = $this->session->userdata('message');

        $this->template->load('default', 'property_alert', $data);
    }
    public function property_alert_action()
    {
        $data = $this->input->post();
        $this->Home_model->insert_property_alert($data);

        $this->session->set_flashdata('message', 'Your Property Alert request has been submitted successfully');
        redirect('user/property_alert');

    }

}
