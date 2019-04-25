<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home_model extends CI_Model
{
    public $table = 'tbl_properties';
    public $id = 'property_ID';
    public $table2 = 'tbl_property_images';
    public $id2 = 'property_ID';
    public $table3 = 'tbl_states';
    public $id3 = 'state_id';
    public $table4 = 'tbl_property_type';
    public $id4 = 'type_id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function get_all_featured()
    {

        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_property_type', 'tbl_properties.purpose_ID = tbl_property_type.type_id', 'left');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID');
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');
        $this->db->where('tbl_properties.featured', 1);
        $this->db->where('tbl_property_images.imageStatus', 'active');
        $this->db->order_by('rand()');
        $this->db->distinct();
        $query = $this->db->limit(6)->get();
        return $query->result();
    }
// get all2
    public function get_all_recent()
    {
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');
        $this->db->where('tbl_property_images.imageStatus', 'active');
        $this->db->order_by('tbl_properties.property_ID', $this->order);
        $this->db->distinct();
        $query = $this->db->limit(12)->get();
        return $query->result();

    }
    // get data by id
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_property_type', 'tbl_properties.purpose_ID = tbl_property_type.type_id', 'left');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID');
        $this->db->order_by('tbl_properties.property_ID', $this->order);
        $this->db->distinct();
        $this->db->where($this->id, $id);
        $this->db->where('tbl_properties.delete', 0);

        return $this->db->get($this->table)->row();
    }
    public function get_by_state($state)
    {
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.delete', 0);

        return $this->db->count_all_results();
    }
    public function get_state()
    {
        $this->db->order_by($this->id3);
        return $this->db->get($this->table3)->result();
    }
    public function get_type()
    {
        $this->db->order_by($this->id4, $this->order);
        return $this->db->get($this->table4)->result();
    }
    public function get_sub_type()
    {
        $this->db->select('subtype_name');
        $this->db->order_by('subtype_id', $this->order);
        return $this->db->get('tbl_property_subtype')->result();
    }
    public function subscription($data)
    {
        return $this->db->insert('tbl_newsletter', $data);
    }
    public function agent_record_count()
    {

        return $this->db->count_all_results('tbl_agents');
    }

    public function insert_request($data){
        
        return $this->db->insert('tbl_property_request',$data);
    }
     public function insert_property_alert($data){
        
        return $this->db->insert('tbl_property_alert',$data);
    }
}
