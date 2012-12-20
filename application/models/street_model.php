<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Street_model extends CI_Model {
    
    function get_street($id) {
        $this->db->select('city, county, quarter');
        $this->db->from('street');
        $this->db->where('id', $id);
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
    
    function get_all_streets() {
        $this->db->select('city, county, quarter');
        $this->db->from('street');
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
        
    function insert_street($data) {
        
        $data = array(
            'id' => $data['id'],
            'city' => $data['city'],
            'county' => $data['county'],
            'quarter' => $data['quarter'],
        );
        
        $this->db->insert('street', $data); 
    }
    
    function remove_street ($data) {
        foreach ($data as $street_id) {
            $this->db->delete('street', array('id' => $street_id)); 
        }
    }
}
?>