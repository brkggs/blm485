<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function get_user( $id ) {
        $this->db->select('ID, Name, Surname');
        $this->db->from('user');
        $this->db->where('ID', $id);
        $ret = $this->db->get();
        return $ret->result();
    }
    
    public function get_users() {
        $this->db->select('ID, Name, Surname');
        $this->db->from('user');
        $ret = $this->db->get();
        return $ret->result();
    }
    
    function check_user($username, $password) {
        // TODO: SQL Injection Check
        $this->db->select('Username, Password');
        $this->db->from('user');
        
        $logindata = md5($username.$password);
        $this->db->where('Logindata', $logindata);
        
        $ret = $this->db->get();
        
        if ($ret->num_rows()) return true;
        else return false;
        
    }
    
    function insert_user($data) {
        
        $data = array(
            'Username' => $data['username'],
            'Name' => $data['name'],
            'Surname' => $data['surname'],
            'Password' => $data['password'],
            'Logindata' => md5($data['username'].$data['password'])
        );
        
        $this->db->insert('user', $data); 
    }
    
    function remove_users ($data) {
        foreach ($data as $userid) {
            $this->db->delete('user', array('ID' => $userid)); 
        }
    }
    
    function check_session() {
        $this->load->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('admin/login','refresh');
            return;
        }
    }
}
?>