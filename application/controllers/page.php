<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page extends CI_Controller {
    
    function __construct() {
        parent::__construct();
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
        $this->load->view("page/template/header");
        $this->load->view("page/index_content");
        $this->load->view("page/template/footer");
    }
    
    public function news() {
        $this->load->view("page/template/header");
        $this->load->view("page/news_content");
        $this->load->view("page/template/footer");
    }
    
    public function aboutus() {
        $data['nosplash'] = true;
        $this->load->view("page/template/header", $data );
        $this->load->view("page/aboutus_content");
        $this->load->view("page/template/footer");
    }
    
    public function products() {
        $this->load->view("page/template/header");
        $this->load->view("page/products_content");
        $this->load->view("page/template/footer");
    }
    
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */