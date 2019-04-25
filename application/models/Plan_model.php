<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plan_model extends CI_Model {

    
    
    function __construct() {
        parent::__construct();
    }
  
 
    function get_plan_details($id)
    {
        return $this->db->where('plan_id',$id)
        ->get('tbl_plan')->row();

    }
    public function get_timeframe_amount($plan_id,$option){
       return $this->db->where('plan_id',$plan_id)
        ->where('time_frame',$option)
        ->get('tbl_plan_timeframe')->row();
    }
    function log_payment($data){
        $this->db->insert('tbl_payment_log', $data);
    }
}