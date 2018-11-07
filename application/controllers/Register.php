<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(

            'title' => 'Register Page',

        );

        $this->template->load('default', 'register', $data);
    }
}