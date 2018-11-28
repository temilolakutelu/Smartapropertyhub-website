<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifications extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'SmartPRO Notifications',

        );

        $this->template->load('default', 'notifications', $data);


    }
}
