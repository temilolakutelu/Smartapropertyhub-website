<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model
{

    public $table = 'tbl_users';
    public $id = 'user_id';

    public $table2 = 'tbl_agents';
    public $id2 = 'agent_ID';
    public $order = 'DESC';
    public $limit = 1;
    public function __construct()
    {
        parent::__construct();
    }

    // login function
    public function login_user($email, $password)
    {
        $this->db->select('*')
            ->from($this->table)
            ->where('email', $email);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user)) {
            if (verifyHashedPassword($password, $user->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    // get data by id
    public function get_by_id($id)
    {
        $this->db->select('*')
            ->from($this->table)
            ->where('user_id', $id);
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }
    public function check_user($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_agent($email)
    {
        return $this->db->where('email', $email)->get('tbl_agents')->row();
    }
    public function update_profile($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('tbl_users', $data);
        if ($this->db->affected_rows()) {
            return true;
        }
    }

}
