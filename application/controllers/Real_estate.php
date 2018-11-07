<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Real_estate extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(

            'title' => 'Real Estate management',

        );

        $this->template->load('default', 'real_estate', $data);
    }
}