<?php

class Main extends CI_Controller{
//    function __construct() {
//        parent::__construct();
//        $this->load->model('--model_name--');
//    }
    
    public function index(){
        $data = array(
            'title' => 'Pet Ex | Homepage',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("main/includes/header", $data);
        $this->load->view("main/index.php");
        $this->load->view("main/includes/footer");
    }
}