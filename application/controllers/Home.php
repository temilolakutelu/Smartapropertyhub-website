<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'Home page',

        );

        $this->template->load('default', 'homepage', $data);


    }

}