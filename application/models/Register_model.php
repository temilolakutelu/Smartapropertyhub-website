<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{
    public $table = 'tbl_users';
    public $id = 'user_id';
    
    public $table2 = 'tbl_agents';
    public $id2 = 'agent_ID';
    public $order = 'DESC';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

     //insert into user table
    function insertUser($data)
    {
     $this->db->insert($this->table, $data);
        return  $this->db->insert_id();
    }
    function insertAgent($data)
    {
    $this->db->insert($this->table2, $data);
    return $this->db->insert_id();

    }

}
?>