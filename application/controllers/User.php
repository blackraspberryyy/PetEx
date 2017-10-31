<?php

class User extends CI_Controller {
    /*
      function __construct() {
      parent::__construct();
      } */

    public function index() {
        $data = array(
            'title' => 'User | ',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/userDashboard", $data);
        $this->load->view("user/includes/footer", $data);
    }

    public function myPets() {
        $data = array(
            'title' => 'User | My Pets',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/myPets", $data);
        $this->load->view("user/includes/footer", $data);
    }

    public function petAdoption() {
        $data = array(
            'title' => 'User | Pet Adoption',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/petAdoption", $data);
        $this->load->view("user/includes/footer", $data);
    }

    public function myTransaction() {
        $data = array(
            'title' => 'User | My Transactions',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/myTransaction", $data);
        $this->load->view("user/includes/footer", $data);
    }

    public function settings() {
        $data = array(
            'title' => 'User | Settings',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/settings", $data);
        $this->load->view("user/includes/footer", $data);
    }

}

?>