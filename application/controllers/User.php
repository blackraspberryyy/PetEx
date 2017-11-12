<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('download');
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            redirect('login/');
        }
    }

    public function index() {

        $allPets = $this->user_model->fetchPetDesc("pet");
      
        $data = array(
            'title' => 'User | ',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/userDashboard");
        $this->load->view("user/includes/footer");
    }

    public function myPets() {
        $data = array(
            'title' => 'User | My Pets',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/myPets");
        $this->load->view("user/includes/footer");
    }

    public function myPetsEdit() {
        $data = array(
            'title' => 'User | My Pets',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/myPetsEdit");
        $this->load->view("user/includes/footer");
    }

    public function petAdoption() {
        $allPets = $this->user_model->fetchPetDesc("pet");
        $data = array(
            'title' => 'User | Pet Adoption',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/petAdoption");
        $this->load->view("user/includes/footer");
    }

    public function myProgress() {
        $data = array(
            'title' => 'User | My Progress',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/myProgress");
        $this->load->view("user/includes/footer");
    }

    public function settings() {
        $data = array(
            'title' => 'User | Settings',
            'wholeUrl' => base_url(uri_string())
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/settings");
        $this->load->view("user/includes/footer");
    }

    public function download($fileName = NULL) {
        if ($fileName) {
            $file = realpath("download") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data);
            } else {
                // Redirect to base url
                redirect(base_url());
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login/');
    }

}

?>