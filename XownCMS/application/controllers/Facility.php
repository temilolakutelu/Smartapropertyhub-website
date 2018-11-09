<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Facility extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Facility_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $facility_data = $this->Facility_model->get_all();
        $data = array(
            'title' => 'Facilities',
            'facility_data' => $facility_data,
        );
        $this->template->load('admin', 'facility/list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Blood_group_model->json();
    }



    public function create()
    {
        $category_data = $this->Category_model->get_all();
        $data = array(
            'button' => 'Create',
            'title' => 'Add new Property facility',
            'action' => site_url('Facility/create_action'),
        );
        $this->template->load('admin', 'facility/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $cont = $this->input->post('content');
            $data = array(
                'facilityMetaData' => $this->input->post('meta_data', true),
                'facilityTitle' => $this->input->post('name', true),
                'facilityName' => $this->input->post('name', true),
                'categoryID' => $this->input->post('category_id', true),
                'shortURL' => $this->input->post('reference', true),
                'facilityContent' => htmlentities($cont),
            );
            $this->Facility_model->insert($data);
            // $task='Added '. $this->input->post('name',TRUE).' to Blood Group';
            $task = 'Added ' . $this->input->post('name') . ' to webfacility table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'New webfacility created successfully');
            redirect(site_url('facility'));
        }
    }

    public function update($id)
    {
        $row = $this->Facility_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update facility',
                'action' => site_url('Facility/update_action'),
                'id' => set_value('id', $row->facilityID),
                'name' => set_value('name', $row->facilityTitle),
                'reference' => set_value('web_reference', $row->shortURL),
                'content' => set_value('content', html_entity_decode($row->facilityContent)),
                'meta_data' => set_value('meta_data', $row->facilityMetaData),
            );
            $this->template->load('admin', 'facility/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('facility'));
        }
    }

    public function update_action()
    {
        $cont = $this->input->post('content');
        $data = array(
            'facilityMetaData' => $this->input->post('meta_data', true),
            'facilityTitle' => $this->input->post('name', true),
            'facilityName' => $this->input->post('name', true),
            'shortURL' => $this->input->post('reference', true),
            'facilityContent' => htmlentities($cont),
        );
        $this->Facility_model->update($this->input->post('id', true), $data);
            // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
           // $this->audit($task);
        $task = 'Updated ' . $this->input->post('name') . ' facility on webfacility table';
        $this->audit($task);
        $this->session->set_flashdata('message', 'Web facility updated successfully');
        redirect(site_url('facility'));

    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Facility_model->get_by_id($id);

        if ($row) {
            $this->Facility_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
            $task = 'Deleted a facility from webfacility table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'facility deleted Successfully');
            redirect(site_url('facility'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('facility'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'name',
            'name',
            'trim|required|is_unique[tb_facility_content.facilityName]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('meta_data', 'meta data', 'trim');
        $this->form_validation->set_rules('content', 'Contents', 'trim|required');
        $this->form_validation->set_rules('reference', 'Web reference', 'trim|required');
        $this->form_validation->set_error_delimiters('<li>', '</li>');
    }

    public function audit($task)
    {
        $login = $this->session->userdata('logged_in');
        $user = $login['firstname'] . ' ' . $login['lastname'];
        $data_audit = array(
            'user' => $user,
            'task' => $task,
            'date_time' => date('Y-m-d H:i:s', time()),
        );

        $this->Audit_model->insert($data_audit);
    }

}

/* End of file Blood_group.php */
/* Location: ./application/controllers/Blood_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */
