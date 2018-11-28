<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Home_model']);
    }

    public function index()
    {
        $feature_data = $this->Home_model->get_all();
        $recent_data = $this->Home_model->get_all2();
        $data = array(

            'title' => 'Home',
            'feature_data' => $feature_data,
            'recent_data' => $recent_data,
        );

        $this->template->load('default', 'homepage', $data);


    }

}