<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'SmartPRO Password',

        );

        $this->template->load('default', 'password', $data);


    }
}
