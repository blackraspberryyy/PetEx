<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('file');
        $this->load->helper('download');
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            redirect(base_url() . 'login/');
        } else {
            $currentUserId = $this->session->userdata('userid');
            $currentUser = $this->user_model->fetch("user", array("user_id" => $currentUserId))[0];

            if ($currentUser->user_access == "admin") {
                redirect(base_url() . 'admin/');
            } else {
                //nothing
            }
        }
    }

    function GetImageExtension($imagetype) {
        if (empty($imagetype))
            return false;
        switch ($imagetype) {
            case 'image/bmp': return '.bmp';
            case 'image/gif': return '.gif';
            case 'image/jpeg': return '.jpg';
            case 'image/png': return '.png';
            default: return false;
        }
    }

    function _alpha_dash_space($str = '') {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The {field} may only contain alphabet characters, spaces, underscores, and dashes.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function index() {
        $allPets = $this->user_model->fetchPetDesc("pet");
        $currentUserId = $this->session->userdata('userid');
        $allAdopted = $this->user_model->fetchJoinThreeAdoptedDesc("adoption", "pet", "adoption.pet_id = pet.pet_id", "user", "adoption.user_id = user.user_id");
        $currentUser = $this->user_model->fetch("user", array("user_id" => $currentUserId, "user_status" => 1))[0];
        $data = array(
            'title' => 'User | ' . $currentUser->user_firstname . " " . $currentUser->user_lastname,
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

    public function myPetsEdit_exec() {
        $this->form_validation->set_rules('pet_name', "Pet Name", "required|callback__alpha_dash_space|max_length[10]");
        $this->form_validation->set_rules('pet_bday', "Pet Birthday", "required");
        $this->form_validation->set_rules('pet_description', "Pet Description", "required");
        $this->form_validation->set_rules('pet_history', "Pet History", "required");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $selectedPets = $this->user_model->fetch('pet', array('pet_id' => $this->uri->segment(3), "pet_access" => 1));
            $data = array(
                'title' => 'User | Pet Edit',
                'wholeUrl' => base_url(uri_string()),
                'pet' => $selectedPets,
            );
            $this->load->view("user/includes/header", $data);
            $this->load->view("user/navbar");
            $this->load->view("user/sidenav");
            $this->load->view("user/myPetsEdit");
            $this->load->view("user/includes/footer");
        } else {
            $pet_id = $this->uri->segment(3);
            $pets = $this->user_model->fetch("pet", array("pet_id" => $pet_id, "pet_access" => 1));
            if ($pets) {
                if (!empty($_FILES["pet_picture"]["name"])) {
                    $file_name = $_FILES["pet_picture"]["name"];
                    $temp_name = $_FILES["pet_picture"]["tmp_name"];
                    $imgtype = $_FILES["pet_picture"]["type"];
                    $ext = $this->GetImageExtension($imgtype);
                    $imagename = date("d-m-Y") . "-" . time() . $ext;
                    $target_path = "./images/animals/" . $imagename;

                    if (move_uploaded_file($temp_name, $target_path)) {
                        $imagePath = $target_path;
                    } else {
                        echo "Unable to find the folder location";
                        //redirect to oops
                    }
                } else {
                    //DO METHOD WITHOUT PICTURE PROVIDED
                    $pets = $pets[0];
                    if ($pets->pet_picture == "images/tools/dog_temp_pic.png" || $pets->pet_picture == "images/tools/cat_temp_pic.png") {
                        if ($this->input->post('pet_specie') == "canine") {
                            $imagePath = "images/tools/dog_temp_pic.png";
                        } else {
                            $imagePath = "images/tools/cat_temp_pic.png";
                        }
                    } else {
                        $imagePath = $pets->pet_picture;
                    }
                }
                $data = array(
                    'pet_name' => $this->input->post('pet_name'),
                    'pet_bday' => strtotime($this->input->post('pet_bday')),
                    'pet_description' => $this->input->post('pet_description'),
                    'pet_history' => $this->input->post('pet_history'),
                    'pet_picture' => $imagePath,
                    'pet_updated_at' => time()
                );
                if ($this->user_model->update("pet", $data, array("pet_id" => $pet_id))) {
                    redirect($this->config->base_url() . "user/myPets");
                } else {
                    echo "An Error Ocurred<br>";
                    echo $pet_id;
                    echo "<pre>";
                    print_r($data);
                    echo "</pre>";
                    //Redirect to oops
                }
            } else {
                //NO PETS Detected
            }
        }
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

    public function petAdoptionOnlineForm() {
        $allPets = $this->user_model->fetchPetDesc("pet");
        $data = array(
            'title' => 'User | Online Adoption Application Form',
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