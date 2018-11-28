<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'SmartPRO Plans',

        );

        $this->template->load('default', 'plan', $data);


    }
}
