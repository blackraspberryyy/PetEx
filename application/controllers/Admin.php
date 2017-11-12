<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->model('admin_model');
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            redirect(base_url().'login/');
        }
    }

    //----------OTHER FUNCTIONS------------
    function get_age($birth_date) {
        return floor((time() - strtotime($birth_date)) / 31556926);
    }

    function get_months($birth_date) {
        return floor((time() - strtotime($birth_date)) / 2678400);
    }

    function _alpha_dash_space($str = '') {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The {field} may only contain alphabet characters, spaces, underscores, and dashes.');
            return FALSE;
        } else {
            return TRUE;
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

    //-------------------------------------

    public function index() {
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

    public function petDatabase() {
        $allPets = $this->admin_model->fetch("pet", array("pet_access" => 1));
        $data = array(
            'title' => 'Pet Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabase");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseAdd() {
        $data = array(
            'title' => 'Pet Registration | Admin',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseAdd");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseAdd_exec() {
        $this->form_validation->set_rules('pet_name', "Pet\'s Name", "required|callback__alpha_dash_space|max_length[10]");
        $this->form_validation->set_rules('pet_bday', "Pet\'s Birthday", "required");
        $this->form_validation->set_rules('pet_breed', "Pet\'s Breed", "required|callback__alpha_dash_space|max_length[40]");
        $this->form_validation->set_rules('pet_description', "Pet\'s Description", "required");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $data = array(
                'title' => 'Pet Registration | Admin',
                'wholeUrl' => base_url(uri_string()),
            );
            $this->load->view("admin/includes/header", $data);
            $this->load->view("admin/navbar");
            $this->load->view("admin/sidenav");
            $this->load->view("admin/petDatabaseAdd");
            $this->load->view("admin/includes/footer");
        } else {
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
                if ($this->input->post('pet_specie') == "canine") {
                    $imagePath = "images/tools/dog_temp_pic.png";
                } else {
                    $imagePath = "images/tools/cat_temp_pic.png";
                }
            }
            $data = array(
                'pet_name' => $this->input->post('pet_name'),
                'pet_bday' => strtotime($this->input->post('pet_bday')),
                'pet_specie' => $this->input->post('pet_specie'),
                'pet_sex' => $this->input->post('pet_sex'),
                'pet_breed' => $this->input->post('pet_breed'),
                'pet_status' => $this->input->post('pet_status'),
                'pet_neutered_spayed' => $this->input->post('pet_neutered_spayed'),
                'pet_admission' => $this->input->post('pet_admission'),
                'pet_description' => $this->input->post('pet_description'),
                'pet_history' => $this->input->post('pet_history'),
                'pet_picture' => $imagePath,
                'pet_added_at' => time(),
                'pet_updated_at' => time()
            );

            if ($this->admin_model->singleinsert("pet", $data)) {
                redirect($this->config->base_url() . "admin/petDatabase");
            } else {
                echo "An Error Ocurred";
                echo "<pre>";
                print_r($data);
                echo "</pre>";
                //Redirect to oops
            }
        }
    }

    public function petDatabaseRemovedPet() {
        $allPets = $this->admin_model->fetch("pet", array('pet_access' => 0));
        $data = array(
            'title' => 'Removed Pet | Admin',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseRemovedPet");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseUpdate() {
        $selectedPets = $this->admin_model->fetch('pet', array('pet_id' => $this->uri->segment(3), "pet_access" => 1));
        $data = array(
            'title' => 'Pet Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'pet' => $selectedPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseUpdate");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseUpdate_exec() {
        $this->form_validation->set_rules('pet_name', "Pet\'s Name", "required|callback__alpha_dash_space|max_length[10]");
        $this->form_validation->set_rules('pet_bday', "Pet\'s Birthday", "required");
        $this->form_validation->set_rules('pet_breed', "Pet\'s Breed", "required|callback__alpha_dash_space|max_length[40]");
        $this->form_validation->set_rules('pet_description', "Pet\'s Description", "required");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $selectedPets = $this->admin_model->fetch('pet', array('pet_id' => $this->uri->segment(3), "pet_access" => 1));
            $data = array(
                'title' => 'Pet Database | Admin',
                'wholeUrl' => base_url(uri_string()),
                'pet' => $selectedPets,
            );
            $this->load->view("admin/includes/header", $data);
            $this->load->view("admin/navbar");
            $this->load->view("admin/sidenav");
            $this->load->view("admin/petDatabaseUpdate");
            $this->load->view("admin/includes/footer");
        } else {
            $pet_id = $this->uri->segment(3);
            $pets = $this->admin_model->fetch("pet", array("pet_id" => $pet_id, "pet_access" => 1));
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
                    'pet_specie' => $this->input->post('pet_specie'),
                    'pet_sex' => $this->input->post('pet_sex'),
                    'pet_breed' => $this->input->post('pet_breed'),
                    'pet_status' => $this->input->post('pet_status'),
                    'pet_neutered_spayed' => $this->input->post('pet_neutered_spayed'),
                    'pet_admission' => $this->input->post('pet_admission'),
                    'pet_description' => $this->input->post('pet_description'),
                    'pet_history' => $this->input->post('pet_history'),
                    'pet_picture' => $imagePath,
                    'pet_added_at' => time(),
                    'pet_updated_at' => time()
                );
                if ($this->admin_model->update("pet", $data, array("pet_id" => $pet_id))) {
                    redirect($this->config->base_url() . "admin/petDatabase");
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

    public function petDatabaseAdopters() {
        $allPets = $this->admin_model->fetch("pet", array("pet_access" => 1));
        $data = array(
            'title' => 'Pet Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        //$this->load->view("admin/petDatabase");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseRemove() {
        $pet_id = $this->uri->segment(3);

        if ($this->admin_model->update("pet", array("pet_access" => 0), array("pet_id" => $pet_id)) != 0) {
            redirect($this->config->base_url() . "admin/petDatabase");
        } else {
            //Error in updating
        }
    }

    public function petDatabaseRestore() {
        $pet_id = $this->uri->segment(3);
        if ($this->admin_model->update("pet", array("pet_access" => 1), array("pet_id" => $pet_id)) != 0) {
            redirect($this->config->base_url() . "admin/petDatabaseRemovedPet");
        } else {
            //Error in updating
        }
    }

    public function userDatabase() {
        $allUsers = $this->admin_model->fetch("user");
        $data = array(
            'title' => 'User Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'users' => $allUsers,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/userDatabase");
        $this->load->view("admin/includes/footer");
    }

    public function activateUser() {
        $user_id = $this->uri->segment(3);
        if ($this->admin_model->update("user", array("user_status" => 1), array("user_id" => $user_id)) != 0) {
            redirect($this->config->base_url() . "admin/userDatabase");
        } else {
            //Error in updating
        }
    }

    public function deactivateUser() {
        $user_id = $this->uri->segment(3);
        if ($this->admin_model->update("user", array("user_status" => 0), array("user_id" => $user_id)) != 0) {
            redirect($this->config->base_url() . "admin/userDatabase");
        } else {
            //Error in updating
        }
    }

    public function userDatabaseAdd() {
        $data = array(
            'title' => 'User Database | Admin',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        //$this->load->view("admin/auditTrail");
        $this->load->view("admin/includes/footer");
    }

    public function schedules() {
        $data = array(
            'title' => 'Schedules | Admin',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/schedules");
        $this->load->view("admin/includes/footer");
    }

    public function reports() {
        $animalsCount = $this->admin_model->fetchCount("pet");
        $adoptablesCount = $this->admin_model->fetchCount("pet", array("pet_status" => 'adoptable'));
        $usersCount = $this->admin_model->fetchCount("user");
        $adoptionCount = $this->admin_model->fetchCount("adoption");
        $missingPetCount = $this->admin_model->fetchCount("adoption", array("adoption_isMissing" => 1));
        $interestedAdoptersCount = $this->admin_model->fetchCount("transaction", array("transaction_isFinished" => 0));

        $data = array(
            'title' => 'Reports | Admin',
            'wholeUrl' => base_url(uri_string()),
            'animalsCount' => $animalsCount,
            'adoptablesCount' => $adoptablesCount,
            'usersCount' => $usersCount,
            'adoptionCount' => $adoptionCount,
            'missingPetCount' => $missingPetCount,
            'interestedAdoptersCount' => $interestedAdoptersCount,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/reports");
        $this->load->view("admin/includes/footer");
    }

    public function userLogs() {
        $data = array(
            'title' => 'User Logs | Admin',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/userLogs");
        $this->load->view("admin/includes/footer");
    }

    public function auditTrail() {
        $data = array(
            'title' => 'Audit Trail | Admin',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/auditTrail");
        $this->load->view("admin/includes/footer");
    }

    public function settings() {
        $data = array(
            'title' => 'Settings | Admin',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/settings");
        $this->load->view("admin/includes/footer");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url().'login/');
    }

}
