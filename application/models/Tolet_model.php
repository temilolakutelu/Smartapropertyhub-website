<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tolet_model extends CI_Model
{
    public $table = 'tbl_states';
    public $id = 'state_id';
    public $table2 = 'tbl_property_type';
    public $id2 = 'type_id';
    public $table3 = 'tbl_property_subtype';
    public $id3 = 'subtype_id'; 
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }

    function get_state()
    {
        $this->db->order_by($this->id);
        return $this->db->get($this->table)->result();
    }
function get_tolet_state(){
    $this->db->select('state');
     $this->db->from('tbl_properties');
     $this->db->distinct();
     $this->db->where('tbl_properties.category_ID =',2)
            ->where('tbl_properties.delete', 0)
            ->where('status_Details', 'published');

     $query = $this->db->get();
     return $query->result();;
}
function get_type()
{
    $this->db->order_by($this->id2, $this->order);
    return $this->db->get($this->table2)->result();
}
public function get_subtype($id){
    return $this->db->where($this->id2,$id)
    ->get($this->table3)->result();
}
    function get_recent()
    {
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =',2);
    $this->db->where('tbl_properties.delete', 0);
$this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');

        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID');
        $this->db->distinct();
           $this->db->order_by('tbl_properties.property_ID', $this->order);
        $query = $this->db->limit(4)->get();
        return $query->result();

    }
    
   public function record_count() 
   {
    return $this->db->where('tbl_properties.category_ID',2)
            ->where('status_Details', 'published')
    ->count_all_results('tbl_properties');
   }


   public function fetch_data($limit, $start) {
       
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->where('tbl_properties.category_ID =', 2);
        $this->db->where('tbl_properties.delete', 0);
$this->db->where('tbl_properties.status_Details', 'published');

        $this->db->where('tbl_property_images.imageStatus', 'active');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID = tbl_property_images.property_ID');
 
        // $this->db->limit($limit, $start);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
             $data[] = $row;
            }
            return $data;
        }

     return false;

    }
    public function filter($data,$limit , $start)
    {

        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('tbl_properties');
        $this->db->join('tbl_prt_category', 'tbl_properties.category_ID = tbl_prt_category.category_ID');
        $this->db->join('tbl_prt_facilities', 'tbl_properties.property_ID = tbl_prt_facilities.property_ID','left  outer');
        $this->db->join('tbl_property_images', 'tbl_properties.property_ID =tbl_property_images.property_ID');
        $this->db->where('tbl_properties.category_ID =', 1)

            ->where('tbl_properties.state',$data[ 'state'])
            ->or_where('tbl_properties.subtype', $data['subtype']);
        $this->db->where('tbl_properties.delete', 0);
        $this->db->where('tbl_properties.status_Details', 'published');

        // ->or_where('tbl_properties.price =<', $data['price'])
        // ->or_where('tbl_prt_facilities.bedroom',$data['bedroom']);

        $query = $this->db->get();



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

}