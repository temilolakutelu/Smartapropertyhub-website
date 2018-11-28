<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'Profile',

        );

        $this->template->load('default', 'profile', $data);


    }
}
