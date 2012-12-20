<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->library('session');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http://example.com/home
     * - or -  
     * http://example.com/home/index
     */
    public function index()
    {
        $this->user_model->check_session();
        
        $this->load->view("admin/template/header");
        $this->load->view("admin/content");
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/template/footer");
    }
    
    public function login() {
        
        // Session Check
        if($this->session->userdata('logged_in')) {
            redirect('admin','refresh');
            return;
        }
        
        // Post Check
        if (!$this->input->post()) {
            $this->load->view('admin/login_form');
            return;
        }
        
        // Post OK - User Check
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if ($this->user_model->check_user($username, $password)) {
            
            // TODO: Set session variables
            $sess_array = array (
                'username' => $username,
                'password' => $password
            );
            
            $this->session->set_userdata('logged_in', $sess_array);

            redirect('admin','refresh');
        }
        else {
            $data['error'] = "Username or password wrong!";
            $this->load->view('admin/login_form', $data);
        }
    }
    
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('admin/login', 'refresh');
    }
    
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */