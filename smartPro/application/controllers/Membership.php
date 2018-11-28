<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Membership extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'SmartPRO Membership',

        );

        $this->template->load('default', 'membership', $data);


    }
}
