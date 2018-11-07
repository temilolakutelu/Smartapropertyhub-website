<?php
defined('BASEPATH') or exit('No direct script access allowed');

class For_sale extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(

            'title' => 'For Sale',

        );
        $this->template->load('default', 'for_sale', $data);
    }
}