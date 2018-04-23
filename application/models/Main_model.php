<?php
Class Main_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function register_user($data) {
        if (!$this->db->insert('users', $data)) {
            return $this->db->error();
        }
    }
    
    public function fetch_user($data) {
        $query = $this->db->get_where('users', $data);
        return $query->result_array();
    }
    
    public function update_user($username, $update_data) {
        $this->db->set($update_data);
        $this->db->where('username', $username);
        
        if (!$this->db->update('users')) {
            return $this->db->error();
        }
    }
    
    public function fetch_user_settings($username) {
        $sql = "SELECT users.name, users.username, users.email, users.picUrl, usertypes.typeName, " .
            "households.householdName FROM users INNER JOIN usertypes ON " .
            "users.accountType=usertypes.typeId INNER JOIN households ON " .
            "users.householdId=households.householdId WHERE users.username='" . $username . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function create_household($data) {
        if ($this->db->insert('households', array( 'householdName' => $data["householdName"] ))) {
            $insertId = $this->db->insert_id();
            
            $this->db->set(array(
                'householdId' => $insertId,
                'accountType' => 2
            ));
            $this->db->where('username', $data["username"]);
            
            if ($this->db->update('users')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
