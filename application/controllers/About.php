<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_model']);
        $this->load->library('session');
        $this->load->helper(array('url'));
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $login = $this->session->userdata('logged_in');
            $user_id = $login['user_id'];
            $row = $this->Login_model->get_by_id($user_id);
            $username = $row->username;
            $data = array(
                'title' => 'About',
                'username' => $username,
                'id' => $user_id,
            );

        } else {
            $data = array(

                'title' => 'About',

            );

        }
        $this->template->load('default', 'about', $data);
    }
}
