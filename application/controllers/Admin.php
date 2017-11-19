<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->model('admin_model');
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            redirect(base_url() . 'login/');
        } else {
            $currentUserId = $this->session->userdata('userid');
            $currentUser = $this->admin_model->fetch("user", array("user_id" => $currentUserId))[0];

            if ($currentUser->user_access == "user") {
                redirect(base_url() . 'user/');
            } else {
                //nothing
            }
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
        $currentUserId = $this->session->userdata('userid');
        $currentUser = $this->admin_model->fetch("user", array("user_id"=>$currentUserId, "user_status" => 1))[0];
        $data = array(
            'title' => 'Admin | '.$currentUser->user_firstname." ".$currentUser->user_lastname,
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

    public function petDatabaseAdopters_exec() {
        $this->session->set_userdata("petadopterid", $this->uri->segment(3));
        redirect(base_url()."admin/petDatabaseAdopters");
    }
    
    public function petDatabaseAdopters(){
        $selectedPetId = $this->session->userdata("petadopterid");
        $selectedPet = $this->admin_model->fetch("pet", array("pet_access" => 1, "pet_id" => $selectedPetId))[0];
        $transactions = $this->admin_model->fetchjointhree("transaction", "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id", array("transaction.pet_id" => $selectedPetId, "transaction_isFinished" => 0, "user_access" => "user"));
        $data = array(
            'title' => 'Pet Database | '.$selectedPet->pet_name,
            'wholeUrl' => base_url(uri_string()),
            'transactions' => $transactions,
            'selectedPet' => $selectedPet
        );
        
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseAdopters");
        $this->load->view("admin/includes/footer");
    }
    
    public function manageProgress_exec() {
        $selectedTransactionId = $this->uri->segment(3);
        $this->session->set_userdata("transactionid", $selectedTransactionId);
        redirect(base_url()."admin/manageProgress");
    }
    
    public function manageProgress() {
        $selectedTransactionId = $this->session->userdata("transactionid");
        $transaction = $this->admin_model->fetchjointhree("transaction", "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id", array("transaction_id" => $selectedTransactionId, "transaction_isFinished" => 0))[0];
        $data = array(
            'title' => 'Manage Progress | '.$transaction->user_firstname." ".$transaction->user_lastname,
            'wholeUrl' => base_url(uri_string()),
            'selectedtransaction' => $transaction
        );
        
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/manageProgress");
        $this->load->view("admin/includes/footer");
    }
    
    public function updateProgress_exec(){
        $nextStep = $this->uri->segment(3);
        $selectedTransactionId = $this->session->userdata("transactionid");
        $selectedTransaction = $this->admin_model->fetch("transaction", array("transaction_id" => $selectedTransactionId))[0];
        if($nextStep == 100){
            $newAdoptionRecord = array(
                "pet_id" => $selectedTransaction->pet_id,
                "user_id" => $selectedTransaction->user_id,
                "adoption_isMissing" => 0,
                "adoption_adopted_at" => time()
            );
            if ($this->admin_model->update("transaction", array("transaction_progress" => $nextStep, "transaction_isFinished" => 1), array("transaction_id" => $selectedTransactionId)) != 0
                    && $this->admin_model->update("pet", array("pet_status" => "adopted"), array("pet_id" => $selectedTransaction->pet_id)) != 0
                    && $this->admin_model->singleinsert("adoption", $newAdoptionRecord) != 0) {
                //SUCCESS
            } else {
                //Error in updating transaction
                //Error in updating pet
                //Error in inserting adoption
            }
            redirect(base_url()."admin/petDatabase/");
        }
        else{
            if ($this->admin_model->update("transaction", array("transaction_progress" => $nextStep), array("transaction_id" => $this->session->userdata("transactionid"))) != 0) {
                //SUCCESS
            } else {
                //Error in updating
            }
            redirect(base_url()."admin/manageProgress");
        }
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

    public function petDatabaseMedicalRecords() {
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('pet.pet_id' => $this->uri->segment(3)));
        $data = array(
            'title' => 'Medical Records | Admin',
            'wholeUrl' => base_url(uri_string()),
            'records' => $selectedPet
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseMedicalRecords");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseAddMedical() {
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('pet.pet_id' => $this->uri->segment(3)));
        $data = array(
            'title' => 'Add Medical Record | Admin',
            'wholeUrl' => base_url(uri_string()),
            'records' => $selectedPet
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseAddMedical");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseAddMedical_exec() {
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('pet.pet_id' => $this->uri->segment(3)));
        $pet_id = $this->uri->segment(3);
        $this->form_validation->set_rules('weight', "Weight", "required|is_numeric");
        $this->form_validation->set_rules('diagnosis', "Diagnosis", "required");
        $this->form_validation->set_rules('treatment', "Treatment", "required");
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Add Medical Record | Admin',
                'wholeUrl' => base_url(uri_string()),
                'records' => $selectedPet
            );
            $this->load->view("admin/includes/header", $data);
            $this->load->view("admin/navbar");
            $this->load->view("admin/sidenav");
            $this->load->view("admin/petDatabaseAddMedical");
            $this->load->view("admin/includes/footer");
        } else {
            $data = array(
                'pet_id' => $pet_id,
                'medicalRecord_date' => time(),
                'medicalRecord_weight' => $this->input->post('weight'),
                'medicalRecord_diagnosis' => $this->input->post('diagnosis'),
                'medicalRecord_treatment' => $this->input->post('treatment')
            );

            if ($this->admin_model->singleinsert("medical_record", $data)) {
                redirect($this->config->base_url() . "admin/petDatabaseMedicalRecords/" . $pet_id);
            } else {
                echo "An Error Ocurred";
                echo "<pre>";
                print_r($data);
                echo "</pre>";
                //Redirect to oops
            }
        }
    }

    public function petDatabaseEditMedical() {
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('medical_record.medicalRecord_id' => $this->uri->segment(3)));
        $data = array(
            'title' => 'Add Medical Record | Admin',
            'wholeUrl' => base_url(uri_string()),
            'records' => $selectedPet
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseEditMedical");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseEditMedical_exec() {
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('medical_record.medicalRecord_id' => $this->uri->segment(3)));
        $pet_id = $this->uri->segment(4);
        $medicalRecord_id = $this->uri->segment(3);
        $this->form_validation->set_rules('weight', "Weight", "required|is_numeric");
        $this->form_validation->set_rules('diagnosis', "Diagnosis", "required");
        $this->form_validation->set_rules('treatment', "Treatment", "required");
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Add Medical Record | Admin',
                'wholeUrl' => base_url(uri_string()),
                'records' => $selectedPet
            );
            $this->load->view("admin/includes/header", $data);
            $this->load->view("admin/navbar");
            $this->load->view("admin/sidenav");
            $this->load->view("admin/petDatabaseEditMedical");
            $this->load->view("admin/includes/footer");
        } else {
            $data = array(
                'pet_id' => $pet_id,
                'medicalRecord_date' => time(),
                'medicalRecord_weight' => $this->input->post('weight'),
                'medicalRecord_diagnosis' => $this->input->post('diagnosis'),
                'medicalRecord_treatment' => $this->input->post('treatment')
            );

            if ($this->admin_model->update("medical_record", $data, array("medicalRecord_id" => $medicalRecord_id))) {
                redirect($this->config->base_url() . "admin/petDatabaseMedicalRecords/" . $pet_id);
            } else {
                echo "An Error Ocurred<br>";
                echo $pet_id;
                echo "<pre>";
                print_r($data);
                echo "</pre>";
                //Redirect to oops
            }
        }
    }

    public function petDatabaseDeleteMedical() {
        $medicalRecord_id = $this->uri->segment(3);
        $pet_id = $this->uri->segment(4);

        if ($this->admin_model->delete("medical_record", array("medicalRecord_id" => $medicalRecord_id))) {
            redirect($this->config->base_url() . "admin/petDatabaseMedicalRecords/" . $pet_id);
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
    
    public function schedules_add() {
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
        $currentUser = $this->session->userdata("userid");
        $user = $this->admin_model->fetch("user", array("user_id" => $currentUser))[0];
        $data = array(
            'title' => 'Settings | Admin',
            'wholeUrl' => base_url(uri_string()),
            'currentUser' => $user
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/settings");
        $this->load->view("admin/includes/footer");
    }
    
    public function settingsUpdate(){
        $currentUser = $this->admin_model->fetch("user", array("user_id" => $this->session->userdata("userid")))[0];
        $column_name = $this->uri->segment(3);
        if($column_name == "user_picture"){
            $config['upload_path'] = "./images/profile/";
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_ext_tolower'] = true;
            $config['max_size'] = 2000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $new_name = $currentUser->user_id."-".$currentUser->user_username.$_FILES["user_picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('user_picture')){
                //OOPS! ERROR IN UPLOADING
                //print_r($this->upload->display_errors());
                //die();
            }else{
                //$image = !empty($this->input->post("user_picture")) ? $this->upload->data($currentUser->user_id."-".$currentUser->user_username) : $image = $currentUser->user_picture;
                $image = "./images/profile/".$this->upload->data("file_name"); 
                if($this->admin_model->update("user", array("user_picture" => $image), array("user_id" => $this->session->userdata("userid")))){
                    //Success updating
                }else{
                    //OOPS. ERROR in updating
                }
                redirect(base_url()."admin/settings");
            }
        }else if($column_name == "change_name"){
            $firstname = $this->input->post("user_firstname");
            $lastname = $this->input->post("user_lastname");
            if($this->admin_model->update("user", array("user_firstname"=>$firstname, "user_lastname" => $lastname), array("user_id" => $this->session->userdata("userid")))){
                //SUCCESS
            }else{
                //Oops error in updating
            }
        }else if($column_name == "change_username"){
            $username = $this->input->post("user_username");
            //ICHE-CHANGE ANG USERNAME
        }else if($column_name == "change_password"){
            $password = $this->input->post("user_password");
            //ICHE-CHANGE ANG PASSWORD
        }else if($column_name == "change_email"){
            $email = $this->input->post("user_email");
            //ICHE-CHANGE ANG EMAIL
        }else if($column_name == "change_contactno"){
            $contact_no = $this->input->post("user_contact_no");
            //ICHE-CHANGE ANG CONTACT_NO
        }else if($column_name == "change_address"){
            $complete_address = $this->input->post("user_address");
            $city = $this->input->post("user_city");
            $address = $this->input->post("user_province");
            //ICHE-CHANGE ANG ADDRESS
        }
        //echo $this->db->last_query();        
        redirect(base_url()."admin/settings");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . 'login/');
    }

}
