<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apartment_model extends CI_Model {
    
    function get_apartment($id) {
        $this->db->select('company_name, phone, fax, apartment_number, ' 
                . 'email, building_id, explanation');
        $this->db->from('apartment');
        $this->db->where('apartment_is', $id);
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
    
    function get_all_apartment() {
        $this->db->select('company_name, phone, fax, apartment_number, ' 
                . 'email, building_id, explanation');
        $this->db->from('apartment');
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
    
    function get_all_apartment_in_building($building_id) {
        $this->db->select('apartment_is, company_name, phone, fax, ' 
                . 'apartment_number, email, explanation');
        $this->db->from('apartment');
        $this->db->where('building_id', $building_id);
        $ret = $this->db->get();
        if ($ret->num_rows() > 0) {
            return $ret->result();
        }
        return false;
    }
        
    function insert_apartment($data) {
        
        $data = array(
            'apartment_is' => $data['apartment_is'],
            'company_name' => $data['company_name'],
            'phone' => $data['phone'],
            'fax' => $data['fax'],
            'apartment_number' => $data['apartment_number'],
            'email' => $data['email'],
            'building_id' => $data['building_id'],
            'explanation' => $data['explanation'],
        );
        
        $this->db->insert('apartment', $data); 
    }
    
    function remove_apartment ($data) {
        foreach ($data as $apartment_id) {
            $this->db->delete('apartment', array('id' => $apartment_id)); 
        }
    }
}
?>