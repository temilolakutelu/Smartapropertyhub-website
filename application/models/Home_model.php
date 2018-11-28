<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{
    public $table = 'properties';
    public $id = 'property_ID';
    public $table2 = 'prt_property_images';
    public $id2 = 'property_ID';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }

   
    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->join('prt_category', 'properties.category_ID = prt_category.category_ID');
        $this->db->join('prt_property_images', 'properties.property_ID = prt_property_images.property_ID');
        $query = $this->db->limit(3)->get();
        return $query->result();
    }
// get all2
    function get_all2()
    {
        $this->db->select('*');
        $this->db->from('properties');
        $this->db->join('prt_category', 'properties.category_ID = prt_category.category_ID');
        $this->db->join('prt_property_images', 'properties.property_ID = prt_property_images.property_ID');
        $query = $this->db->limit(5)->get();
        return $query->result();

    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}
?>