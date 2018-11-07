<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(

            'title' => 'Faq',

        );

        $this->template->load('default', 'faq', $data);
    }
}