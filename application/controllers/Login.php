<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(

            'title' => 'Login Page',

        );

        $this->template->load('default', 'login', $data);
    }
}