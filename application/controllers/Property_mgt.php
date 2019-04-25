<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Property_mgt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_model', 'Property_model']);
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->helper(array('url'));
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $login = $this->session->userdata('logged_in');
            $user_id = $login['user_id'];
            $row = $this->Login_model->get_by_id($user_id);
            $username = $row->username;
            $data = array(
                'title' => 'Property Mgt',
                'username' => $username,
                'id' => $user_id,
            );
        } else {
            $data = array(

                'title' => 'Property Mgt',

            );
        }
        $this->template->load('default', 'property_mgt', $data);
    }

    public function inspection($id)
    {
        if ($this->session->userdata('logged_in')) {

            $login = $this->session->userdata('logged_in');
            $username = $login['username'];
            $user_id = $login['user_id'];
            $row = $this->Login_model->get_by_id($user_id);
            $row2 = $this->Property_model->get_by_id($id);
            $data = array(
                'title' => 'Inspection Request Form',
                'action' => site_url('property_mgt/inspection_action/' . $id),
                'username' => $username,
                'id' => $user_id,
                'message' => $this->session->flashdata('message'),
                'error' => $this->session->flashdata('error'),
                'property_data' => $row2,
            );
        } else {
            $row2 = $this->Property_model->get_by_id($id);
            $data = array(

                'title' => 'Inspection Request Form',
                'action' => site_url('property_mgt/inspection_action/' . $id),
                'message' => $this->session->flashdata('message'),
                'error' => $this->session->flashdata('error'),
                'property_data' => $row2,
            );
        }
        $this->template->load('default', 'inspection', $data);
    }

    public function inspection_action($id)
    {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('msg', 'Message', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());

            redirect('property_mgt/inspection/' . $id);
        } else {

            $data = array(
                'property_ID' => $this->input->post('property'),
                'agent_ID' => $this->input->post('agent'),
                'sender' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('msg'),

            );

            $result = $this->Property_model->submit_inspection($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Your inspection request has been submitted successfully.');

                redirect('property_mgt/inspection/' . $id);
            } else {

                $this->session->set_flashdata('error', 'Inspection Request Submission Unsuccessfyl, Please Try Agin.');

                redirect('property_mgt/inspection/' . $id);
            }
        }
    }
}
