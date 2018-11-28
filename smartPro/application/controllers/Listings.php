<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'SmartPRO Listings',

        );

        $this->template->load('default', 'list', $data);


    }
}
