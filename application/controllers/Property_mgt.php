<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Property_mgt extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(

            'title' => 'Property Management',

        );

        $this->template->load('default', 'property_mgt', $data);
    }

}