<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin_user extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model', '', TRUE);
        
        $this->user_model->check_session();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http://example.com/home
     * - or -  
     * http://example.com/home/index
     */
    public function index() {
        
        $this->load->view('admin/template/header');
        $this->catalog();
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/footer');
    }
    
    public function add() {
        
        if (!$this->input->post()) {
            
            $data['action'] = 'admin/user/add';
            
            $this->load->view('admin/template/header');
            $this->catalog($data['action']);
            $this->load->view('admin/user_add_form', $data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/footer');
            return;
        }
        
        // TODO: Check Form Data
        
        $data = $this->input->post();
        
        if ($data['password'] == $data['passwordr']) 
            $this->user_model->insert_user($data);
        else {
            $data['error'] = "Passwords didn't match!";
            $data['action'] = 'admin/user/add';
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/user_add_form', $data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/footer');
            return;
        }
        
        redirect('admin/user/add','refresh');
    }
    
    public function catalog( $action = 'admin/user/catalog', $submit = false) {
        
        $data['action'] = isset($action) ? $action : 'admin/user/catalog';
        $data['submit'] = isset($submit) ? $submit : false;

        $data['users'] = $this->user_model->get_users();

        $this->load->view('admin/user_catalog_form', $data);
        return;
    }
    
    public function remove() {
        
        if(!$this->input->post()) {
            
            $this->load->view('admin/template/header');
            $this->catalog('admin/user/remove', true);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/footer');
            return;
        }
        
        $this->user_model->remove_users($this->input->post());
        
        redirect('admin/user/remove','refresh');
    }
    
    public function update() {
        
    }
    
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */