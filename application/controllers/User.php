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
        $allAdopted = $this->user_model->fetchJoinThreeAdoptedDesc("adoption", "pet", "adoption.pet_id = pet.pet_id", "user", "adoption.user_id = user.user_id");
        $data = array(
            'title' => 'User | ',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
            'adoptedPets' => $allAdopted
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
        $selectedPets = $this->user_model->fetch('pet', array('pet_id' => $this->uri->segment(3), "pet_access" => 1));
        $data = array(
            'title' => 'User | Pet Edit',
            'wholeUrl' => base_url(uri_string()),
            'pet' => $selectedPets
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
            'title' => 'User | Online Adoption Application Form',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/petAdoption");
        $this->load->view("user/includes/footer");
    }
    
    public function petAdoptionOnlineForm() {
        $allPets = $this->user_model->fetchPetDesc("pet");
        $data = array(
            'title' => 'User | Pet Adoption',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/petAdoptionOnlineForm");
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
        redirect(base_url() . 'login/');
    }

}

?>