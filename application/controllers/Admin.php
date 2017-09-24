<?php

class Admin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index(){
        $data = array(
            'title' => 'Admin | ',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/adminDashboard");
        $this->load->view("admin/includes/footer");
    }
    
    public function petDatabase(){
        $allPets = $this->admin_model->fetch("pet");
        $data = array(
            'title' => 'Admin | Pet Database',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabase");
        $this->load->view("admin/includes/footer");
    }
    
    public function petDatabaseLog(){
        $allPets = $this->admin_model->fetch("pet");
        $data = array(
            'title' => 'Admin | Pet Database',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseLog");
        $this->load->view("admin/includes/footer");
    }
    
    public function petDatabaseUpdate(){
        $allPets = $this->admin_model->fetch("pet");
        $data = array(
            'title' => 'Admin | Pet Database',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabase");
        $this->load->view("admin/includes/footer");
    }
    
    public function petDatabaseAdopters(){
        $allPets = $this->admin_model->fetch("pet");
        $data = array(
            'title' => 'Admin | Pet Database',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabase");
        $this->load->view("admin/includes/footer");
    }
    
    
    public function adoptables(){
        $data = array(
            'title' => 'Admin | Adoptables',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/adoptables");
        $this->load->view("admin/includes/footer");
    }
    
    public function reports(){
        $data = array(
            'title' => 'Admin | Reports',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/reports");
        $this->load->view("admin/includes/footer");
    }
    
    public function auditTrail(){
        $data = array(
            'title' => 'Admin | Audit Trail',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/auditTrail");
        $this->load->view("admin/includes/footer");
    }
    
    public function settings(){
        $data = array(
            'title' => 'Settings | ',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/settings");
        $this->load->view("admin/includes/footer");
    }
}