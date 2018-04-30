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

    public function add_room($roomname,$data){
        $sql="INSERT INTO rooms (roomName,householdId) VALUES ('$roomname',$data)";
        $query = $this->db->query($sql);
        
    }

    public function add_item($householdId,$itemname,$username,$placename,$roomName){
        $sql="INSERT INTO items(itemName, storagePlaceId, accessType, lastUpdated,lastupdatedby) VALUES ('".$itemname."',(SELECT storagePlaceId FROM storageplaces,rooms WHERE storagePlaceName='".$placename."' And rooms.roomId =storageplaces.roomId AND rooms.roomId=(SELECT rooms.roomId FROM rooms,households WHERE roomName='".$roomName."' and rooms.householdId = '".$householdId."' and rooms.householdId = households.householdId)),(SELECT accountType FROM users WHERE username='".$username."'),now(),'".$username."')";
        $query = $this->db->query($sql);
        
    }
        public function add_place($householdId,$placename,$roomName){
        $sql="INSERT INTO `storageplaces`( `storagePlaceName`, `roomId`) VALUES ('".$placename."', (SELECT DISTINCT(rooms.roomId) FROM rooms,households where households.householdId = rooms.householdId and rooms.roomName = '".$roomName."' and households.householdId = ".$householdId."))";
        $query = $this->db->query($sql);
        
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
    
    public function fetch_member_data($householdId) {
        $sql = "SELECT users.name, users.username, usertypes.typeName FROM users INNER JOIN usertypes ON " .
        "users.accountType=usertypes.typeId WHERE users.householdId='" . $householdId . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function remove_members($usernames) {
        $usernamesStr = "";
        
        for ($i=0; $i<count($usernames); $i++) {
            if ($i > 0) {
                $usernamesStr = $usernamesStr . ", '" . $usernames[$i] . "'";
            } else {
                $usernamesStr = "'" . $usernames[$i] . "'";
            }
        }
        
        $sql = "UPDATE users SET accountType = 5, householdId = 0 WHERE username IN(" . $usernamesStr . ")";
        
        if (!$this->db->query($sql)) {
            return $this->db->error();
        }
    }


    public function fetch_rooms_storage($householdid){

        $sql = "SELECT storageplaces.storagePlaceId, rooms.roomName, storageplaces.storageplaceName FROM rooms,storageplaces,households where households.householdId = rooms.householdId and rooms.roomId = storageplaces.roomId and households.householdId = '".$householdid."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetch_rooms($householdid){
        $sql = "SELECT rooms.roomId, rooms.roomName FROM rooms,households where households.householdId = rooms.householdId and households.householdId = '".$householdid."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetch_items($householdid)
    {
        $sql = "SELECT items.itemId, items.itemName,items.lastUpdated,users.name,rooms.roomName,storageplaces.storagePlaceName FROM `items`,`storageplaces`,`rooms`,`households`,`users` where households.householdId = rooms.householdId and rooms.roomId = storageplaces.roomId and items.lastUpdatedBy = users.username and storageplaces.storagePlaceId = items.storagePlaceId and households.householdId = '".$householdid."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function delete_rooms($rooms) {
        $roomsStr = implode(",", $rooms);
        
        $sql = "UPDATE storageplaces SET roomId = 0 WHERE roomId IN(" . $roomsStr . ")";
        $sql2 = "DELETE FROM rooms WHERE roomId IN(" . $roomsStr . ")";
        
        if (!$this->db->query($sql) || !$this->db->query($sql2)) {
            return $this->db->error();
        }
    }
    
    public function delete_storage_places($storagePlaces) {
        $storagePlacesStr = implode(",", $storagePlaces);
        
        $sql = "UPDATE items SET storagePlaceId = 0 WHERE storagePlaceId IN(" . $storagePlacesStr . ")";
        $sql2 = "DELETE FROM storageplaces WHERE storagePlaceId IN(" . $storagePlacesStr . ")";
        
        if (!$this->db->query($sql) || !$this->db->query($sql2)) {
            return $this->db->error();
        }
    }
    
    public function delete_items($items) {
        $itemsStr = implode(",", $items);
        
        $sql = "DELETE FROM items WHERE itemId IN(" . $itemsStr . ")";
        
        if (!$this->db->query($sql)) {
            return $this->db->error();
        }
    }


}
