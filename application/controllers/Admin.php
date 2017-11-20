<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->library('email');
        $this->load->model('admin_model');
        $this->load->library('recaptcha');
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

    public function generate() {
        $this->load->helper('string');
        return random_string('alnum', rand(5, 15));
    }

    public function sendemail($user) {
        $this->email->from("codebusters.solutions@gmail.com", 'Email Verification');
        $this->email->to($user['user_email']);
        $this->email->subject('Email Verification');
        $data = array('email' => $user['user_email'], 'code' => $user['user_verification_code']);
        $this->email->message($this->load->view('admin/verifyMessage', $data, true));

        if (!$this->email->send()) {
            $this->email->print_debugger();
        } else {
            echo "<script>alert('Verify your email');"
            . "window.location='" . base_url() . "admin/logout'</script>";
        }
    }

    public function _email_check($email) {
        $result = $this->user_model->emailAvailability($email);

        if (!$result) {
            $this->form_validation->set_message('_email_check', 'The %s is not existing');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function check_recaptcha($response) {
        if (!empty($response)) {
            //this function gets the response from the google's api
            $response = $this->recaptcha->verifyResponse($response);
            if ($response['success'] === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function _username_check($username) {
        $result = $this->user_model->usernameAvailability($username);
        if (!$result) {
            $this->form_validation->set_message('_username_check', 'The %s is not existing');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function putToEvents($data){
        $this->admin_model->singleinsert("event", $data);
    }
    //-------------------------------------

    public function index() {
        redirect(base_url()."admin/petDatabase");
//        $currentUserId = $this->session->userdata('userid');
//        $currentUser = $this->admin_model->fetch("user", array("user_id" => $currentUserId, "user_status" => 1))[0];
//        $data = array(
//            'title' => 'Admin | ' . $currentUser->user_firstname . " " . $currentUser->user_lastname,
//            'wholeUrl' => base_url(uri_string()),
//        );
//        $this->load->view("admin/includes/header", $data);
//        $this->load->view("admin/navbar");
//        $this->load->view("admin/sidenav");
//        $this->load->view("admin/adminDashboard");
//        $this->load->view("admin/includes/footer");
    }

    public function petDatabase() {
        $allPets = $this->admin_model->fetch("pet", array("pet_access" => 1));
        
        $this->load->library('pagination');
        
        $pages = 5;
        
        $config['base_url'] = base_url()."admin/petDatabase/";
        $config['total_rows'] = count($allPets);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close']= ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        
        $this->pagination->initialize($config);
        
        $data = array(
            'title' => 'Pet Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $this->admin_model->fetchAllLimit("pet", $pages, $this->uri->segment(3), array("pet_access" => 1)),
            'links' => $this->pagination->create_links()
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
            $config['upload_path'] = "./images/animals/";
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_ext_tolower'] = true;
            $config['max_size'] = 2000;
            $new_name = $this->input->post("pet_name")."-".$_FILES["pet_picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!empty($_FILES["pet_picture"]["name"])) {
                if ($this->upload->do_upload('pet_picture')){
                    $imagePath = "./images/animals/" . $this->upload->data("file_name");
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
                $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Added ".$data['pet_name']." to the database.",
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
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
        $pet_id = $this->uri->segment(3);
        $this->session->set_userdata("petid_update", $pet_id);
        redirect(base_url()."admin/petDatabaseUpdatePet");
    }

    public function petDatabaseUpdatePet(){
        $pet_id = $this->session->userdata("petid_update");
        $selectedPets = $this->admin_model->fetch('pet', array('pet_id' => $pet_id, "pet_access" => 1));
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
        $pet_id = $this->uri->segment(3);
        $this->session->set_userdata("petid_update", $pet_id);
        $this->form_validation->set_rules('pet_name', "Pet\'s Name", "required|callback__alpha_dash_space|max_length[10]");
        $this->form_validation->set_rules('pet_bday', "Pet\'s Birthday", "required");
        $this->form_validation->set_rules('pet_breed', "Pet\'s Breed", "required|callback__alpha_dash_space|max_length[40]");
        $this->form_validation->set_rules('pet_description', "Pet\'s Description", "required");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $selectedPets = $this->admin_model->fetch('pet', array('pet_id' => $pet_id, "pet_access" => 1));
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
            $pets = $this->admin_model->fetch("pet", array("pet_id" => $pet_id, "pet_access" => 1))[0];
            if ($pets) {
                $config['upload_path'] = "./images/animals/";
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['file_ext_tolower'] = true;
                $config['max_size'] = 2000;
                $new_name = $pets->pet_id . "-" . $pets->pet_name. $_FILES["pet_picture"]['name'];
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                
                if(!empty($_FILES["pet_picture"]["name"])){
                    if ($this->upload->do_upload('pet_picture')){
                        $imagePath = "./images/animals/" . $this->upload->data("file_name");
                    } else {
                        echo "Unable to find the folder location";
                        //redirect to oops
                    }
                }
                else {
                    //DO METHOD WITHOUT PICTURE PROVIDED
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
                    'pet_updated_at' => time()
                );
                if ($this->admin_model->update("pet", $data, array("pet_id" => $pet_id))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Updated ".$data['pet_name']." to the database.",
                        "event_classification" => "audit",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
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
        redirect(base_url()."admin/petDatabase");
    }

    public function petDatabaseAdopters_exec() {
        $this->session->set_userdata("petadopterid", $this->uri->segment(3));
        redirect(base_url() . "admin/petDatabaseAdopters");
    }

    public function petDatabaseAdopters() {
        $selectedPetId = $this->session->userdata("petadopterid");
        $selectedPet = $this->admin_model->fetch("pet", array("pet_access" => 1, "pet_id" => $selectedPetId))[0];
        $transactions = $this->admin_model->fetchjointhree("transaction", "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id", array("transaction.pet_id" => $selectedPetId, "transaction_isFinished" => 0, "user_access" => "user"));
        
        $this->load->library('pagination');
        
        $pages = 5;
        
        $config['base_url'] = base_url()."admin/petDatabaseAdopters/";
        $config['total_rows'] = count($transactions);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close']= ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        
        $this->pagination->initialize($config);
        
        
        $data = array(
            'title' => 'Pet Database | ' . $selectedPet->pet_name,
            'wholeUrl' => base_url(uri_string()),
            'transactions' => $this->admin_model->fetchAllLimitJoinThree("transaction", $pages, $this->uri->segment(3), "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id", array("transaction.pet_id" => $selectedPetId, "transaction_isFinished" => 0, "user_access" => "user")),
            'selectedPet' => $selectedPet,
            'links' => $this->pagination->create_links()
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
        redirect(base_url() . "admin/manageProgress");
    }

    public function manageProgress() {
        $selectedTransactionId = $this->session->userdata("transactionid");
        $transaction = $this->admin_model->fetchjointhree("transaction", "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id", array("transaction_id" => $selectedTransactionId, "transaction_isFinished" => 0))[0];
        $data = array(
            'title' => 'Manage Progress | ' . $transaction->user_firstname . " " . $transaction->user_lastname,
            'wholeUrl' => base_url(uri_string()),
            'selectedtransaction' => $transaction
        );

        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/manageProgress");
        $this->load->view("admin/includes/footer");
    }

    public function updateProgress_exec() {
        $nextStep = $this->uri->segment(3);
        $selectedTransactionId = $this->session->userdata("transactionid");
        $selectedTransaction = $this->admin_model->fetch("transaction", array("transaction_id" => $selectedTransactionId))[0];
        if ($nextStep == 100) {
            $newAdoptionRecord = array(
                "pet_id" => $selectedTransaction->pet_id,
                "user_id" => $selectedTransaction->user_id,
                "adoption_isMissing" => 0,
                "adoption_adopted_at" => time()
            );
            if ($this->admin_model->update("transaction", array("transaction_progress" => $nextStep, "transaction_isFinished" => 1), array("transaction_id" => $selectedTransactionId)) != 0 && $this->admin_model->update("pet", array("pet_status" => "adopted"), array("pet_id" => $selectedTransaction->pet_id)) != 0 && $this->admin_model->singleinsert("adoption", $newAdoptionRecord) != 0) {
                $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Finished the transaction of ".$selectedTransaction->user_firstname." ".$selectedTransaction->user_lastname." for pet ".$selectedTransaction->pet_name,
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
            } else {
                //Error in updating transaction
                //Error in updating pet
                //Error in inserting adoption
            }
            redirect(base_url() . "admin/petDatabase/");
        } else {
            if ($this->admin_model->update("transaction", array("transaction_progress" => $nextStep), array("transaction_id" => $this->session->userdata("transactionid"))) != 0) {
                $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Transaction of ".$selectedTransaction->user_firstname." ".$selectedTransaction->user_lastname." for pet ".$selectedTransaction->pet_name." from ".$selectedTransaction->transaction_progress . "% to ".$nextStep."%",
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
            } else {
                //Error in updating
            }
            redirect(base_url() . "admin/manageProgress");
        }
    }

    public function petDatabaseRemove() {
        $pet_id = $this->uri->segment(3);
        $pet = $this->admin_model->fetch("pet", array("pet_id", $pet_id))[0];
        if ($this->admin_model->update("pet", array("pet_access" => 0, "pet_updated_at" => time()), array("pet_id" => $pet_id)) != 0) {
            $log = array(
                "user_id" => $this->session->userdata("userid"),
                "event_description" => $pet->pet_name." is removed from the database", 
                "event_classification" => "audit",
                "event_added_at" => time()
            );
            $this->putToEvents($log);
            redirect($this->config->base_url() . "admin/petDatabase");
        } else {
            //Error in updating
        }
    }

    public function petDatabaseRestore() {
        $pet_id = $this->uri->segment(3);
        $pet = $this->admin_model->fetch("pet", array("pet_id", $pet_id))[0];
        if ($this->admin_model->update("pet", array("pet_access" => 1, "pet_updated_at" => time()), array("pet_id" => $pet_id)) != 0) {
            $log = array(
                "user_id" => $this->session->userdata("userid"),
                "event_description" => $pet->pet_name." is restored to the database", 
                "event_classification" => "audit",
                "event_added_at" => time()
            );
            $this->putToEvents($log);
            redirect($this->config->base_url() . "admin/petDatabaseRemovedPet");
        } else {
            //Error in updating
        }
    }

    public function petDatabaseMedicalRecords() {
        $pet_id = $this->uri->segment(3);
        $this->session->set_userdata("petid_medical", $pet_id);
        redirect(base_url()."admin/getMedicalRecords");
    }
    public function getMedicalRecords(){
        $pet_id = $this->session->userdata("petid_medical");
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('pet.pet_id' => $pet_id));
        
        $this->load->library('pagination');
        
        $pages = 5;
        
        $config['base_url'] = base_url()."admin/petDatabaseAdopters/";
        $config['total_rows'] = count($selectedPet);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close']= ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        
        $this->pagination->initialize($config);
        
        $data = array(
            'title' => 'Medical Records | Admin',
            'wholeUrl' => base_url(uri_string()),
            'records' => $this->admin_model->fetchAllLimitJoin("medical_record", $pages, $this->uri->segment(3), "pet", "medical_record.pet_id = pet.pet_id", array('pet.pet_id' => $pet_id)),
            'links' => $this->pagination->create_links()
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseMedicalRecords");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseAddMedical(){
        $pet_id = $this->uri->segment(3);
        $this->session->set_userdata("petid_medical", $pet_id);
        redirect(base_url()."admin/petDatabaseAddMedicalRecord");
    }
    public function petDatabaseAddMedicalRecord(){
        $pet_id = $this->session->userdata("petid_medical");
        $data = array(
            'title' => 'Add Medical Record | Admin',
            'wholeUrl' => base_url(uri_string()),
            'records' => $pet_id
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseAddMedical");
        $this->load->view("admin/includes/footer");
    }

    public function petDatabaseAddMedical_exec() {
        $pet_id = $this->uri->segment(3);
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('pet.pet_id' => $pet_id));
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
                $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Added a medical record for ".$selectedPet->pet_name.".", 
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
                redirect($this->config->base_url() . "admin/petDatabaseMedicalRecords/" . $pet_id);
            } else {
                echo "An Error Ocurred";
                echo "<pre>";
                print_r($data);
                echo "</pre>";
                //Redirect to oops
            }
        }
        redirect(base_url()."admin/petDatabaseMedicalRecords" . $pet_id);
    }

    public function petDatabaseEditMedical() {
        $medrec = $this->uri->segment(3);
        $this->session->set_userdata("medrecid", $medrec);
        redirect(base_url()."admin/petDatabaseEditMedicalRecord");
    }
    
    public function petDatabaseEditMedicalRecord(){
        $medrec_id = $this->session->userdata("medrecid");
        $selectedPet = $this->admin_model->fetchjoin("medical_record", "pet", "medical_record.pet_id = pet.pet_id", array('medical_record.medicalRecord_id' => $medrec_id));
        $data = array(
            'title' => 'Edit Medical Record | Admin',
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
                $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Edited a medical record for ".$selectedPet->pet_name.".", 
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
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
        $selectedPet = $this->admin_model->fetch("pet", array("pet_id" => $pet_id));
        if ($this->admin_model->delete("medical_record", array("medicalRecord_id" => $medicalRecord_id))) {
            $log = array(
                "user_id" => $this->session->userdata("userid"),
                "event_description" => "Deleted a medical record for ".$selectedPet->pet_name.".", 
                "event_classification" => "audit",
                "event_added_at" => time()
            );
            $this->putToEvents($log);
            redirect($this->config->base_url() . "admin/petDatabaseMedicalRecords/" . $pet_id);
        } else {
            //Error in updating
        }
    }

    public function userDatabase() {
        $allUsers = $this->admin_model->fetch("user");
        
        $this->load->library('pagination');
        
        $pages = 10;
        
        $config['base_url'] = base_url()."admin/userDatabase/";
        $config['total_rows'] = count($allUsers);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close']= ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        
        $this->pagination->initialize($config);
        
        $data = array(
            'title' => 'User Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'users' => $this->admin_model->fetchAllLimit("user", $pages, $this->uri->segment(3)),
            'links' => $this->pagination->create_links()
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/userDatabase");
        $this->load->view("admin/includes/footer");
    }
    
    public function activateUser() {
        $user_id = $this->uri->segment(3);
        $selectedUser = $this->admin_model->fetch("user", array("user_id" => $user_id))[0];
        if ($this->admin_model->update("user", array("user_status" => 1, "user_updated_at" => time()), array("user_id" => $user_id)) != 0) {
            $log = array(
                "user_id" => $this->session->userdata("userid"),
                "event_description" => $selectedUser->user_firstname." ".$selectedUser->user_lastname." (".$selectedUser->user_username. ") has been activated.", 
                "event_classification" => "audit",
                "event_added_at" => time()
            );
            $this->putToEvents($log);
            redirect($this->config->base_url() . "admin/userDatabase");
        } else {
            //Error in updating
        }
    }

    public function deactivateUser() {
        $user_id = $this->uri->segment(3);
        $selectedUser = $this->admin_model->fetch("user", array("user_id" => $user_id))[0];
        if ($this->admin_model->update("user", array("user_status" => 0, "user_updated_at" => time()), array("user_id" => $user_id)) != 0) {
            $log = array(
                "user_id" => $this->session->userdata("userid"),
                "event_description" => $selectedUser->user_firstname." ".$selectedUser->user_lastname." (".$selectedUser->user_username.") has been deactivated.", 
                "event_classification" => "audit",
                "event_added_at" => time()
            );
            $this->putToEvents($log);
            redirect($this->config->base_url() . "admin/userDatabase");
        } else {
            //Error in updating
        }
    }

    public function userDatabaseAdd() {
        $data = array(
            'title' => 'User Database | Admin',
            'wholeUrl' => base_url(uri_string()),
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/userDatabaseAdd");
        $this->load->view("admin/includes/footer");
    }

    public function signup_exec() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', "Username ", "required|min_length[5]|is_unique[user.user_username]|strip_tags");
        $this->form_validation->set_rules('password', "Password ", "required|matches[conpass]|alpha_numeric|min_length[8]|strip_tags");
        $this->form_validation->set_rules('conpass', "Confirm Password ", "required|matches[password]|alpha_numeric|min_length[8]|strip_tags");
        $this->form_validation->set_rules('phonenumber', "Phone Number ", "required|regex_match[^(09|\+639)\d{9}$^]|strip_tags");
        $this->form_validation->set_rules('email', "Email Address ", "required|valid_email|strip_tags");
        $this->form_validation->set_rules('lastname', "Lastname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
        $this->form_validation->set_rules('firstname', "Firstname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
        $this->form_validation->set_rules('birthday', "Birthday ", "required|strip_tags");
        $this->form_validation->set_rules('address', "Address ", "required|regex_match[^[#.0-9a-zA-Z\s,-]+$^]|strip_tags");
        $this->form_validation->set_rules('g-recaptcha-response', "CAPTCHA", "required|callback_check_recaptcha");
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'User Database | Admin',
                'wholeUrl' => base_url(uri_string()),
                'script' => $this->recaptcha->getScriptTag(),
                'widget' => $this->recaptcha->getWidget(),
            );
            $this->load->view("admin/includes/header", $data);
            $this->load->view("admin/navbar");
            $this->load->view("admin/sidenav");
            $this->load->view("admin/userDatabaseAdd");
            $this->load->view("admin/includes/footer");
        } else {
            $conpass = $this->input->post('conpass');

            if ($this->input->post('gender') == "Male") {
                $imagePath = "images/profile/male.png";
            } else {
                $imagePath = "images/profile/female.png";
            }

            $data = array(
                'user_username' => $this->input->post('username'),
                'user_password' => sha1($this->input->post('password')),
                'user_contact_no' => $this->input->post('phonenumber'),
                'user_email' => $this->input->post('email'),
                'user_access' => "admin",
                'user_lastname' => $this->input->post('lastname'),
                'user_firstname' => $this->input->post('firstname'),
                'user_bday' => strtotime($this->input->post('birthday')),
                'user_sex' => $this->input->post('gender'),
                'user_picture' => $imagePath,
                'user_address' => $this->input->post('address'),
                'user_city' => $this->input->post('city'),
                'user_province' => $this->input->post('province'),
                'user_verification_code' => $this->generate(),
                'user_isverified' => 1,
                'user_added_at' => time(),
                'user_updated_at' => time()
            );
            if ($this->admin_model->singleinsert("user", $data)) {
                redirect(base_url()."admin/userDatabase");
            } else {
                //OOPS error in registration
            }
        }
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
        $logs = $this->admin_model->fetchjoin("event", "user", "event.user_id = user.user_id", array("event_classification" => "log"));
        
        $this->load->library('pagination');
        
        $pages = 10;
        
        $config['base_url'] = base_url()."admin/userLogs/";
        $config['total_rows'] = count($logs);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close']= ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        
        $this->pagination->initialize($config);

        $data = array(
            'title' => 'User Logs | Admin',
            'wholeUrl' => base_url(uri_string()),
            'logs' => $this->admin_model->fetchAllLimitJoin("event", $pages, $this->uri->segment(3), "user", "event.user_id = user.user_id", array("event_classification" => "log")),
            'links' => $this->pagination->create_links()
        );
        
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/userLogs");
        $this->load->view("admin/includes/footer");
    }

    public function auditTrail() {
        $trails = $this->admin_model->fetchjoin("event", "user", "event.user_id = user.user_id", array("event_classification" => "audit"));
        
        $this->load->library('pagination');
        
        $pages = 10;
        
        $config['base_url'] = base_url()."admin/auditTrail/";
        $config['total_rows'] = count($trails);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close']= ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        
        $this->pagination->initialize($config);
        
        $data = array(
            'title' => 'Audit Trail | Admin',
            'wholeUrl' => base_url(uri_string()),
            'trails' => $this->admin_model->fetchAllLimitJoin("event", $pages, $this->uri->segment(3), "user", "event.user_id = user.user_id", array("event_classification" => "audit")),
            'links' => $this->pagination->create_links()
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

    public function settingsUpdate() {
        $currentUser = $this->admin_model->fetch("user", array("user_id" => $this->session->userdata("userid")))[0];
        $column_name = $this->uri->segment(3);
        if ($column_name == "user_picture") {
            $config['upload_path'] = "./images/profile/";
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_ext_tolower'] = true;
            $config['max_size'] = 2000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $new_name = $currentUser->user_id . "-" . $currentUser->user_username . $_FILES["user_picture"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('user_picture')) {
                //OOPS! ERROR IN UPLOADING
                //print_r($this->upload->display_errors());
                //die();
            } else {
                //$image = !empty($this->input->post("user_picture")) ? $this->upload->data($currentUser->user_id."-".$currentUser->user_username) : $image = $currentUser->user_picture;
                $image = "./images/profile/" . $this->upload->data("file_name");
                $data = array(
                    "user_picture" => $image,
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => $currentUser->user_firstname." ".$currentUser->user_lastname." (".$currentUser->user_username.")"." changed his profile picture.",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                } else {
                    //OOPS. ERROR in updating
                }
                redirect(base_url() . "admin/settings");
            }
        } else if ($column_name == "change_name") {
            $this->form_validation->set_rules('user_lastname', "Lastname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
            $this->form_validation->set_rules('user_firstname', "Firstname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
            if ($this->form_validation->run() == FALSE) {
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
            } else {
                $data = array(
                    "user_firstname" => $this->input->post("user_firstname"),
                    "user_lastname" => $this->input->post("user_lastname"),
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change name from ".$currentUser->user_firstname." ".$currentUser->user_lastname." to ".$data["user_firstname"]." ".$data["user_lastname"].".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "admin/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_username") {
            $this->form_validation->set_rules('user_username', "Username ", "required|min_length[5]|is_unique[user.user_username]|strip_tags");
            if ($this->form_validation->run() == FALSE) {
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
            } else {
                $data = array(
                    "user_username" => $this->input->post("user_username"),
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change username from ".$currentUser->user_username." to ".$data["user_username"].".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "admin/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_password") {
            $this->form_validation->set_rules('user_password', "Password ", "required|matches[user_conpassword]|min_length[8]|strip_tags");
            $this->form_validation->set_rules('user_conpassword', "Confirm Password ", "required|matches[user_password]|min_length[8]|strip_tags");
            if ($this->form_validation->run() == FALSE) {
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
            } else {
                $data = array(
                    "user_password" => sha1($this->input->post("user_password")),
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    redirect(base_url() . "admin/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_email") {
            $this->form_validation->set_rules('user_email', "Email Address ", "required|valid_email|strip_tags");
            if ($this->form_validation->run() == FALSE) {
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
            } else {
                $data = array(
                    "user_email" => $this->input->post("user_email"),
                    "user_verification_code" => $this->generate(),
                    "user_isverified" => 0,
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $this->sendemail($data);
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_contactno") {
            $this->form_validation->set_rules('user_contact_no', "Phone Number ", "required|regex_match[^(09|\+639)\d{9}$^]|strip_tags");
            if ($this->form_validation->run() == FALSE) {
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
            } else {
                $data = array(
                    "user_contact_no" => $this->input->post("user_contact_no"),
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change Contact No. from ".$currentUser->user_contact_no." to ".$data["user_contact_no"].".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "admin/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_address") {
            $this->form_validation->set_rules('user_address', "Address ", "required|regex_match[^[#.0-9a-zA-Z\s,-]+$^]|strip_tags");
            $this->form_validation->set_rules('user_province', "Province ", "required|strip_tags");
            $this->form_validation->set_rules('user_city', "City ", "required|strip_tags");
            if ($this->form_validation->run() == FALSE) {
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
            } else {
                $data = array(
                    "user_address" => $this->input->post("user_address"),
                    "user_province" => $this->input->post("user_province"),
                    "user_city" => $this->input->post("user_city"),
                    "user_updated_at" => time()
                );
                if ($this->admin_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change Address from ".$currentUser->user_address.", ".$currentUser->user_city.", ".$currentUser->user_province." to ".$data["user_address"].", ".$data["user_city"].", ".$data["user_province"].".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "admin/settings");
                } else {
                    //Oops error in updating
                }
            }
        }
        //echo $this->db->last_query();        
    }

    public function getscheds() {
        $query = $this->db->query("SELECT * FROM schedule");
        $result = $query->result_array();
        foreach ($result as $key => $arr) {
            $result[$key]['title'] = $arr['schedule_title'];
            $result[$key]['description'] = $arr['schedule_desc'];
            $result[$key]['color'] = $arr['schedule_color'];
            $result[$key]['start'] = date("Y-m-d H:i:s", $arr['schedule_startdate']);
            $result[$key]['end'] = date("Y-m-d H:i:s", $arr['schedule_enddate']);
        }
        echo json_encode($result);
    }

    public function getsched() {
        $query = $this->db->query("SELECT * FROM schedule where schedule_id = " . $this->input->post("id"));
        $result = $query->result_array();
        foreach ($result as $key => $arr) {
            $result[$key]['schedule_id'] = $arr['schedule_id'];
            $result[$key]['schedule_title'] = $arr['schedule_title'];
            $result[$key]['schedule_desc'] = $arr['schedule_desc'];
            $result[$key]['schedule_color'] = $arr['schedule_color'];
            $result[$key]['schedule_startdate'] = date("F d, Y", $arr['schedule_startdate']);
            $result[$key]['schedule_starttime'] = date("h:iA", $arr['schedule_startdate']);
            $result[$key]['schedule_enddate'] = date("F d, Y", $arr['schedule_enddate']);
            $result[$key]['schedule_endtime'] = date("h:iA", $arr['schedule_enddate']);
        }
        echo json_encode($result);
    }

    public function setreserve() {
        $this->form_validation->set_rules('schedule_startdate', "Start Date", "required");
        $this->form_validation->set_rules('schedule_starttime', "Start Time", "required");
        $this->form_validation->set_rules('schedule_enddate', "End Date", "required");
        $this->form_validation->set_rules('schedule_endtime', "End Time", "required");
        $this->form_validation->set_rules('schedule_title', "Title", "required");
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'result' => 'Some of the fields is wrong!'));
        } else {
            $startdate = strtotime($this->input->post('schedule_startdate') . " " . $this->input->post('schedule_starttime'));
            $enddate = strtotime($this->input->post('schedule_enddate') . " " . $this->input->post('schedule_endtime'));
            if ($this->admin_model->fetch("schedule", array("schedule_startdate" => strtotime($this->input->post('schedule_startdate') . " " . $this->input->post('schedule_starttime'))))) {
                echo json_encode(array('success' => false, 'result' => 'There is an existing schedule already!'));
            } else {
                $data = array(
                    "schedule_title" => $this->input->post('schedule_title'),
                    "schedule_desc" => $this->input->post('schedule_desc'),
                    "schedule_color" => $this->input->post('schedule_color'),
                    "schedule_startdate" => $startdate,
                    "schedule_enddate" => $enddate
                );
                $this->admin_model->singleinsert("schedule", $data);
                $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Added a schedule named ".$data["schedule_title"],
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
                echo json_encode(array('success' => true, 'result' => 'Success'));
            }
        }
    }

    public function updatereserve() {
        $this->form_validation->set_rules('schedule_startdate', "Start Date", "required");
        $this->form_validation->set_rules('schedule_starttime', "Start Time", "required");
        $this->form_validation->set_rules('schedule_enddate', "End Date", "required");
        $this->form_validation->set_rules('schedule_endtime', "End Time", "required");
        $this->form_validation->set_rules('schedule_title', "Title", "required");
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'result' => 'Some of the fields is wrong!'));
        } else {
            $startdate = strtotime($this->input->post('schedule_startdate') . " " . $this->input->post('schedule_starttime'));
            $enddate = strtotime($this->input->post('schedule_enddate') . " " . $this->input->post('schedule_endtime'));
            $data = array(
                "schedule_title" => $this->input->post('schedule_title'),
                "schedule_desc" => $this->input->post('schedule_desc'),
                "schedule_color" => $this->input->post('schedule_color'),
                "schedule_startdate" => $startdate,
                "schedule_enddate" => $enddate
            );
            $this->admin_model->update("schedule", $data, array("schedule_id" => $this->input->post("schedule_id")));
            $log = array(
                    "user_id" => $this->session->userdata("userid"),
                    "event_description" => "Edited a schedule named ".$data["schedule_title"],
                    "event_classification" => "audit",
                    "event_added_at" => time()
                );
                $this->putToEvents($log);
            echo json_encode(array('success' => true, 'result' => "Success"));
        }
    }

    public function deletereserve() {
        $this->admin_model->delete("schedule", array("schedule_id" => $this->input->post("schedule_id")));
        $selectedSched = $this->admin_model->fetch("schedule", array("schedule_id" => $this->input->post("schedule_id"))); 
        $log = array(
            "user_id" => $this->session->userdata("userid"),
            "event_description" => "Removed a schedule named ".$selectedSched->schedule_title,
            "event_classification" => "audit",
            "event_added_at" => time()
        );
        $this->putToEvents($log);
        echo json_encode(array('success' => true, 'result' => "Success"));
    }

    public function logout() {
        $this->session->sess_destroy();
        $log = array(
            "user_id" => $this->session->userdata("userid"),
            "event_description" => "Logged Out",
            "event_classification" => "log",
            "event_added_at" => time()
        );
        $this->putToEvents($log);
        redirect(base_url() . 'login/');
    }

}
