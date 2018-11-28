<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Success extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'Success Page',

        );

        $this->template->load('default', 'success', $data);


    }
}
