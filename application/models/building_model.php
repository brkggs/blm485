<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Building_model extends CI_Model {
     
    function get_building($id) {
        $this->db->select('street_id, info, address');
        $this->db->from('building');
        $this->db->where('id', $id);
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
    
    function get_all_buildings() {
        $this->db->select('street_id, info, address');
        $this->db->from('building');
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
    
    function get_buildings_at_street ($street_id) {
        $this->db->select('id, street_id, info, address');
        $this->db->from('building');
        $this->db->where('street_id', $street_id);
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
        
    function insert_building($data) {
        
        $data = array(
            'id' => $data['id'],
            'street_id' => $data['street_id'],
            'info' => $data['info'],
            'address' => $data['address'],
        );
        
        $this->db->insert('building', $data); 
    }
    
    function remove_building ($data) {
        foreach ($data as $building_id) {
            $this->db->delete('building', array('id' => $building_id)); 
        }
    }
}
?>