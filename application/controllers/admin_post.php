<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin_post extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('post_model', '', TRUE);
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
        $this->load->view('admin/content');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/footer');
    }
    
    public function add() {
        
        if (!$this->input->post()) {
            
            $authors = $this->user_model->get_users();
            
            $tinymce_data['action'] = 'admin/post/add';
            $tinymce_data['form'] = 'admin/post_add_form';
            $tinymce_data['form_data']['authors'] = $authors;
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/tinymce', $tinymce_data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/footer');
            return;
        }
        // TODO: Check Form Data
        
        $data = $this->input->post();
        $data['date'] = date( 'Y-m-d H:i:s' );
        $data['id'] = md5( $data['title'] . $data['date'] );
        
        if ($data['isnews']) $this->post_model->insert_news($data);
        else $this->post_model->insert_post($data);
        
        //var_dump($data);
        redirect('admin/post/add','refresh');
    }
    
    public function catalog( $limit = 30, $start = 0, $action = 'admin/post/catalog', $submit = false, $list_news = false) {
        
        $data['action'] = isset($action) ? $action : 'admin/post/catalog';
        $data['submit'] = isset($submit) ? $submit : false;
        $data['list_news'] = isset($list_news) ? $list_news : false;

        $data['writings'] = $this->post_model->get_writings($limit, $start);
        $data['news'] = $this->post_model->get_news($limit, $start);

        $this->load->view('admin/post_catalog_form', $data);
        return;
    }
    
    public function remove() {
        $this->catalog($list_news = true);
    }
    
    public function update() {
        
    }
    
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */