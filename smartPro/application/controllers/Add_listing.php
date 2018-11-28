<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_listing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'SmartPRO Add Property',

        );

        $this->template->load('default', 'add', $data);


    }
}
