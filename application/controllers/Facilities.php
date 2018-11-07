<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facilities extends CI_Controller
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

        $this->template->load('default', 'facilities', $data);

    }
}