<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Filter_model extends CI_Model
{
    public $property = 'tbl_properties';
    public $id = 'state_id';
    public $states_ = 'tbl_states';
    public $subtype = 'tbl_property_subtype';
    public $facility = 'tbl_';
    public $id3 = 'subtype_id';
    public $cat = 1;

    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    public function count_just_state($state, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_properties.state', $state)
        ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_state($limit, $start, $state, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_subtype($subtype, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }
    public function filter_subtype($limit, $start, $subtype, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }
    public function count_just_bedroom($bedroom, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->count_all_results('tbl_properties');

    }

    public function filter_bedroom($limit, $start, $bedroom, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

        //return $query;

    }

    public function count_just_price($price, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->or_where('tbl_properties.price', $price)
            ->count_all_results('tbl_properties');

    }

    public function filter_price($limit, $start, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.price <', $price);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        //$this->db->or_where('tbl_properties.price',$price);
        $this->db->where('tbl_properties.price >', 0);
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_state_subtype($state, $subtype, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.subtype', $state)
            ->count_all_results('tbl_properties');

    }
    public function filter_state_subtype($limit, $start, $state, $subtype, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->where('tbl_properties.state', $state);
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_state_bedroom($state, $bedroom, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->where('tbl_properties.state', $state)
            ->count_all_results('tbl_properties');

    }

    public function filter_state_bedroom($limit, $start, $state, $bedroom, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_state_price($state, $price, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_properties.state', $state)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.price >', 0)
            ->count_all_results('tbl_properties');

    }

    public function filter_state_price($limit, $start, $state, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.price <', $price);
        $this->db->where('tbl_properties.price >', 0);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->where('tbl_properties.state', $state);
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_subtype_bedroom($subtype, $bedroom, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_subtype_bedroom($limit, $start, $subtype, $bedroom, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_subtype_price($subtype, $price, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.price >', 0)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_subtype_price($limit, $start, $subtype, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.price <', $price);
        $this->db->where('tbl_properties.price >', 0);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_bedroom_price($bedroom, $price, $forsale)
    {
        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.price >', 0)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_bedroom_price($limit, $start, $bedroom, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.price <', $price);
        $this->db->where('tbl_properties.price >', 0);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_state_subtype_bedroom($state, $subtype, $bedroom, $forsale)
    {

        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.state', $state)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_state_subtype_bedroom($limit, $start, $state, $subtype, $bedroom, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_state_subtype_price($state, $subtype, $price, $forsale)
    {

        return $this->db->where('tbl_properties.category_ID', $forsale)
        //->join('tbl_prt_facilities','tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.price >', 0)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.state', $state)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_state_subtype_price($limit, $start, $state, $subtype, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_properties.price', $price);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_subtype_bedroom_price($subtype, $bedroom, $price, $forsale)
    {

        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.state', $state)
            ->where('tbl_properties.delete', 0)
            ->where('tbl_properties.status_Details', 'published')
            ->count_all_results('tbl_properties');

    }

    public function filter_subtype_bedroom_price($limit, $start, $subtype, $bedroom, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.price <', $price);
        $this->db->where('tbl_properties.price >', 0);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_bedroom_price_state($bedroom, $price, $state, $forsale)
    {

        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.state', $state)
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.price >', 0)
            ->count_all_results('tbl_properties');

    }

    public function filter_bedroom_price_state($limit, $start, $bedroom, $price, $state, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.price <', $price);
        $this->db->where('tbl_properties.price >', 0);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_just_state_subtype_bedroom_price($state, $subtype, $bedroom, $price, $forsale)
    {

        return $this->db->where('tbl_properties.category_ID', $forsale)
            ->join('tbl_prt_facilities', 'tbl_properties.property_ID=tbl_prt_facilities.property_ID')
            ->where('tbl_prt_facilities.bedroom', $bedroom)
            ->where('tbl_properties.state', $state)
            ->where('tbl_properties.price <', $price)
            ->where('tbl_properties.subtype', $subtype)
            ->where('tbl_properties.price >', 0)
            ->count_all_results('tbl_properties');

    }

    public function filter_state_subtype_bedroom_price($limit, $start, $state, $subtype, $bedroom, $price, $forsale)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', $forsale);
        $this->db->where('tbl_prt_facilities.bedroom', $bedroom);
        $this->db->where('tbl_properties.state', $state);
        $this->db->where('tbl_properties.subtype', $subtype);
        $this->db->where('tbl_properties.price', $price);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $query = $this->db->get()->result();
        return $query;

    }

}
