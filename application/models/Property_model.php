<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Property_model extends CI_Model
{

    public $table = 'tbl_properties';
    public $id = 'property_ID';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_properties($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID', 'left');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID', 'right');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID', 'right');
        $this->db->where('tbl_properties.user_ID', $id);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');
        $this->db->where('tbl_property_images.imageStatus', 'active');

        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID', 'left');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID', 'right');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID', 'right');
        $this->db->where('tbl_properties.property_ID', $id);
        $this->db->where('tbl_property_images.imageStatus', 'active');

        $query = $this->db->get();
        return $query->row();
    }
    public function get_agent_by_id($id)
    {
        $this->db->where('agent_ID', $id);
        return $this->db->get('tbl_agents')->row();
    }
    public function get_similar_properties($id, $category, $subtype)
    {
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID', 'left');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID', 'right');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID', 'right');
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published')
            ->where('tbl_property_images.imageStatus', 'active')
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.category_ID', $category)
            ->where('tbl_properties.property_ID', !$id)
            ->limit(6);
        $query = $this->db->get();
        return $query->result();

    }
    public function get_image_count($id)
    {
        return $this->db->where('tbl_property_images.property_ID', $id)
            ->count_all_results('tbl_property_images');
    }
    public function get_images($id)
    {
        $this->db->where('tbl_property_images.property_ID', $id);
        return $this->db->get('tbl_property_images')->result();
    }

    public function log_view($id)
    {
        $this->db->set('views', 'views+1', false);
        $this->db->where('tbl_properties.property_ID', $id);
        return $this->db->update('tbl_properties');

    }

    public function submit_inspection($data)
    {
        $this->db->insert('tbl_inspection', $data);
        return $this->db->insert_id();
    }
    public function check_favourite($user, $prop)
    {
        $this->db->where('user_ID', $user)
            ->where('property_ID', $prop);
        $query = $this->db->get('tbl_saved_favourites');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function make_favourite($data)
    {
        $this->db->insert('tbl_saved_favourites', $data);
        return $this->db->insert_id();
    }
    public function get_favourites($id, $limit, $offset)
    {
        $this->db->join('tbl_saved_favourites', 'tbl_properties.property_ID=tbl_saved_favourites.property_ID', 'left')
            ->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID', 'left')
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID', 'right')
            ->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID', 'right')
            ->where('tbl_property_images.imageStatus', 'active')
            ->where('tbl_saved_favourites.user_ID', $id)
            ->distinct()
            ->limit($limit, $offset)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
        ;
        return $this->db->get('tbl_properties')->result();
    }
    public function fav_num_rows($id)
    {
        $this->db->join('tbl_saved_favourites', 'tbl_properties.property_ID=tbl_saved_favourites.property_ID', 'left')
            ->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID', 'left')
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID', 'right')
            ->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID', 'right')
            ->where('tbl_property_images.imageStatus', 'active')
            ->where('tbl_saved_favourites.user_ID', $id)
            ->distinct()
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published');
        return $this->db->get('tbl_properties')->num_rows();
    }
}
