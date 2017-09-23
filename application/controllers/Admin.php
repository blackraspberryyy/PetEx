<?php

class Admin extends CI_Controller{
//    function __construct() {
//        parent::__construct();
//        $this->load->model('--model_name--');
//    }
    
    public function index(){
        $data = array(
            'title' => 'Admin | '
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/adminDashboard");
        $this->load->view("admin/includes/footer");
    }
}