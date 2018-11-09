<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Property extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Property_model', 'Propertycat_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $property_data = $this->Property_model->get_all();
        $Propertycat_data = $this->Propertycat_model->get_all();
        $data = array(
            'title' => 'Property',
            'property_data' => $property_data,
            'Propertycat_data' => $Propertycat_data,
        );
        $this->template->load('admin', 'property/list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Blood_group_model->json();
    }



    public function create()
    {
        $Propertycat_data = $this->Propertycat_model->get_all();
        $data = array(
            'button' => 'Create',
            'title' => 'Add new Web Property',
            'action' => site_url('Property/create_action'),
            'Propertycat_data' => $Propertycat_data,
        );
        $this->template->load('admin', 'property/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $cont = $this->input->post('content');
            $data = array(
                'propertyMetaData' => $this->input->post('meta_data', true),
                'propertyTitle' => $this->input->post('name', true),
                'propertyName' => $this->input->post('name', true),
                'categoryID' => $this->input->post('Propertycat_id', true),
                'shortURL' => $this->input->post('reference', true),
                'propertyContent' => htmlentities($cont),
            );
            $this->Property_model->insert($data);
            // $task='Added '. $this->input->post('name',TRUE).' to Blood Group';
            $task = 'Added ' . $this->input->post('name') . ' to webproperty table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'New webproperty created successfully');
            redirect(site_url('property'));
        }
    }

    public function update($id)
    {
        $row = $this->Property_model->get_by_id($id);
        $Propertycat_data = $this->Propertycat_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Property',
                'action' => site_url('Property/update_action'),
                'id' => set_value('id', $row->propertyID),
                'name' => set_value('name', $row->propertyTitle),
                'reference' => set_value('web_reference', $row->shortURL),
                'content' => set_value('content', html_entity_decode($row->propertyContent)),
                'meta_data' => set_value('meta_data', $row->propertyMetaData),
                'Propertycat_data' => $Propertycat_data,
                'property_id' => $row->categoryID,
            );
            $this->template->load('admin', 'property/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('property'));
        }
    }

    public function update_action()
    {
        $cont = $this->input->post('content');
        $data = array(
            'propertyMetaData' => $this->input->post('meta_data', true),
            'propertyTitle' => $this->input->post('name', true),
            'propertyName' => $this->input->post('name', true),
            'categoryID' => $this->input->post('Propertycat_id', true),
            'shortURL' => $this->input->post('reference', true),
            'propertyContent' => htmlentities($cont),
        );
        $this->Property_model->update($this->input->post('id', true), $data);
            // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
           // $this->audit($task);
        $task = 'Updated ' . $this->input->post('name') . ' property on webproperty table';
        $this->audit($task);
        $this->session->set_flashdata('message', 'Web property updated successfully');
        redirect(site_url('property'));

    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Property_model->get_by_id($id);

        if ($row) {
            $this->Property_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
            $task = 'Deleted a property from webproperty table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'Property deleted Successfully');
            redirect(site_url('property'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('property'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'name',
            'name',
            'trim|required|is_unique[tb_property_content.propertyName]',
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
