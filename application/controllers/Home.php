<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Home_model', 'Login_model', 'Property_model', 'Forsale_model', 'Tolet_model', 'Shortlet_model']);
        $this->load->library('session');
        $this->load->helper(array('url', 'string'));
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $login = $this->session->userdata('logged_in');

            $user_id = $login['user_id'];
            $row = $this->Login_model->get_by_id($user_id);
            $username = $row->username;
            $feature_data = $this->Home_model->get_all_featured();
            $recent_data = $this->Home_model->get_all_recent();
            $states = $this->Home_model->get_state();
            $type = $this->Home_model->get_sub_type();
            $forsale_count = $this->Forsale_model->record_count();
            $rent_count = $this->Tolet_model->record_count();
            $shortlet_count = $this->Shortlet_model->record_count();
            $agents_count = $this->Home_model->agent_record_count();
            $lagos_count = $this->Home_model->get_by_state('Lagos');
            $benin_count = $this->Home_model->get_by_state('Edo');
            $abuja_count = $this->Home_model->get_by_state('Abuja');
            $ph_count = $this->Home_model->get_by_state('Rivers');
            $data = array(
                'title' => 'Smart Property Hub|Home',
                'username' => $username,
                'id' => $user_id,
                'message' => $this->session->flashdata('message'),
                'error' => $this->session->flashdata('error'),
                'feature_data' => $feature_data,
                'recent_data' => $recent_data,
                'state_data' => $states,
                'type_data' => $type,
                'forsale_count' => $forsale_count,
                'rent_count' => $rent_count,
                'shortlet_count' => $shortlet_count,
                'agent_count' => $agents_count,
                'lagos_count' => $lagos_count,
                'abuja_count' => $abuja_count,
                'benin_count' => $benin_count,
                'ph_count' => $ph_count,
            );

        } else {

            $feature_data = $this->Home_model->get_all_featured();
            $recent_data = $this->Home_model->get_all_recent();
            $states = $this->Home_model->get_state();
            $type = $this->Home_model->get_sub_type();
            $forsale_count = $this->Forsale_model->record_count();
            $rent_count = $this->Tolet_model->record_count();
            $shortlet_count = $this->Shortlet_model->record_count();
            $agents_count = $this->Home_model->agent_record_count();
            $lagos_count = $this->Home_model->get_by_state('Lagos');
            $benin_count = $this->Home_model->get_by_state('Edo');
            $abuja_count = $this->Home_model->get_by_state('Abuja');
            $ph_count = $this->Home_model->get_by_state('Rivers');
            $data = array(
                'title' => 'Smart Property Hub|Home',
                'message' => $this->session->flashdata('message'),
                'feature_data' => $feature_data,
                'recent_data' => $recent_data,
                'state_data' => $states,
                'type_data' => $type,
                'forsale_count' => $forsale_count,
                'rent_count' => $rent_count,
                'shortlet_count' => $shortlet_count,
                'agent_count' => $agents_count,
                'lagos_count' => $lagos_count,
                'abuja_count' => $abuja_count,
                'benin_count' => $benin_count,
                'ph_count' => $ph_count,
            );

        }

        $this->template->load('default', 'homepage', $data);
    }
    public function property_view($id)
    {
        $login = $this->session->userdata('logged_in');
        $user_id = $login['user_id'];
        $row = $this->Login_model->get_by_id($user_id);
        $username = $row->username;
        /* log view count on database */
        if (!$this->session->userdata('viewed')) {
            $view = $this->Property_model->log_view($id);
            $this->session->set_userdata('viewed', $view);
        }

        $row2 = $this->Property_model->get_by_id($id);
        $similar_props = $this->Property_model->get_similar_properties($row2->property_ID, $row2->category_ID, $row2->subtype);
        $property_agent = $this->Property_model->get_agent_by_id($row2->user_ID);
        $images = $this->Property_model->get_images($id);
        $image_count = $this->Property_model->get_image_count($id);

        $data = array(
            'title' => 'Smart Property Hub|PropertyView',
            'username' => $username,
            'id' => $user_id,
            'property_data' => $row2,
            'images' => $images,
            'image_count' => $image_count,
            'agent_data' => $property_agent,
            'similar_data' => $similar_props,
        );

        $this->template->load('default', 'property_view', $data);
    }

    public function subscribe()
    {
        $email = $this->input->post('email');
        $data = array(
            'email' => $email,
        );
        $result = $this->Home_model->subscription($data);
        if ($result) {
            redirect('home');
        } else {
            echo 'error in newsletter subscrition';
        }
    }

}
