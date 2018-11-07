<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consultant extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(

            'title' => 'our Consultants',

        );

        $this->template->load('default', 'our_consultant', $data);
    }
}