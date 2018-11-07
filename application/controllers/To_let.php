<?php
defined('BASEPATH') or exit('No direct script access allowed');

class To_let extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title' => 'Properties To Let',

        );

        $this->template->load('default', 'to_let', $data);
    }
}