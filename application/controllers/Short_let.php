<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Short_let extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data = array(

            'title' => 'Short Let Page',

        );

        $this->template->load('default', 'short_let', $data);
    }
}