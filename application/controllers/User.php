<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->helper('file');
        $this->load->library('email');
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

    public function putToEvents($data) {
        $this->admin_model->singleinsert("event", $data);
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

    public function myPets_exec() {
        $pet_id = $this->uri->segment(3);
        $this->session->set_userdata("petid_edit", $pet_id);
        redirect(base_url() . "user/myPetsEdit");
    }

    public function myPetsEdit() {
        $pet_id = $this->session->userdata("petid_edit");
        $selectedPets = $this->user_model->fetch('pet', array('pet_id' => $pet_id, "pet_access" => 1));
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
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Edited his pet named " . $data["pet_name"],
                        "event_classification" => "audit",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
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
        $petAdopters = $this->user_model->fetchJoinThreeProgressDesc("transaction", "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id");

        $this->load->library('pagination');

        $pages = 7;

        $config['base_url'] = base_url() . "user/petAdoption/";
        $config['total_rows'] = count($allPets);
        $config['per_page'] = $pages;
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close'] = ' </ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url'] = '';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active green darken-4"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        
        $data = array(
            'title' => 'User | Pet Adoption',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $this->user_model->fetchAllLimit("pet", $pages, $this->uri->segment(3)),
            'links' => $this->pagination->create_links(),
            'adopters' => $petAdopters
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/petAdoption");
        $this->load->view("user/includes/footer");
    }

    public function petAdoptionOnlineForm_exec() {
        $this->session->set_userdata("petadopterid", $this->uri->segment(3));
        redirect(base_url() . "user/petAdoptionOnlineForm");
    }

    public function petAdoptionOnlineForm() {
        $selectedPetId = $this->session->userdata("petadopterid");
        $pet = $this->user_model->fetch('pet', array('pet_id' => $selectedPetId))[0];
        $data = array(
            'title' => 'User | Online Adoption Application Form',
            'wholeUrl' => base_url(uri_string()),
            'pet' => $pet
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/petAdoptionOnlineForm");
        $this->load->view("user/includes/footer");
    }

    public function sendAdoptionForm($user) {
        $this->email->from("codebusters.solutions@gmail.com", 'Pet Adoption Form');
        $this->email->to("codebusters.solutions@gmail.com");
        $this->email->subject('Pet Adoption Form');
        $data = array('date' => $user['date'], 'name' => $user['name'], 'userage' => $user['userage'], 'email' => $user['email']
            , 'address' => $user['address'], 'numhome' => $user['numhome'], 'numwork' => $user['numwork'], 'nummobile' => $user['nummobile']
            , 'adoptee_name' => $user['adoptee_name'], 'adoptee_age' => $user['adoptee_age'], 'adoptee_specie' => $user['adoptee_specie'], 'adoptee_sex' => $user['adoptee_sex']
            , 'adoptee_sterilized' => $user['adoptee_sterilized'], 'adoptee_admission' => $user['adoptee_admission'], 'nameref' => $user['nameref'], 'relref' => $user['relref'], 'numref' => $user['numref']
            , 'prompt' => $user['prompt'], 'interested' => $user['interested'], 'size' => $user['size'], 'breed' => $user['breed']
            , 'petage' => $user['petage'], 'description' => $user['description'], 'num1' => $user['num1'], 'num2' => $user['num2']
            , 'num2ifyes' => $user['num2ifyes'], 'num2ifYesSpecie' => $user['num2ifYesSpecie'], 'num3' => $user['num3'], 'num3Other' => $user['num3Other']
            , 'num4' => $user['num4'], 'num5' => $user['num5'], 'yearslived' => $user['yearslived'], 'num5specify' => $user['num5specify']
            , 'num6' => $user['num6'], 'num6explain' => $user['num6explain'], 'num7' => $user['num7'], 'num7specify' => $user['num7specify']
            , 'num8' => $user['num8'], 'num9' => $user['num9'], 'num9explain' => $user['num9explain'], 'num10' => $user['num10']
            , 'num10age' => $user['num10age'], 'num11' => $user['num11'], 'num11explain' => $user['num11explain'], 'num12' => $user['num12']
            , 'num12age' => $user['num12age'], 'num13' => $user['num13'], 'num14' => $user['num14'], 'num15' => $user['num15']
            , 'num16' => $user['num16'], 'num17' => $user['num17'], 'num17name' => $user['num17name'], 'num18' => $user['num18']
            , 'num18animal' => $user['num18animal'], 'num19' => $user['num19'], 'num20' => $user['num20'], 'num21' => $user['num21']
            , 'num21fence' => $user['num21fence'], 'num22' => $user['num22'], 'num22how' => $user['num22how'], 'num23' => $user['num23']
            , 'num23specify' => $user['num23specify'], 'num24' => $user['num24'], 'num25' => $user['num25']);

        $this->email->message($this->load->view('user/adoptMessage', $data, true));
        $this->email->attach($user['num4file'], 'attachment', 'report.pdf');
        if (!$this->email->send()) {
            $this->email->print_debugger();
        } else {
            echo "<script>alert('Pet Adoption Application Form has been sent');"
            . "window.location='" . base_url() . "user/petAdoption'</script>";
        }
    }

    public function petAdoptionOnlineForm_send() {
        $dataEmail = array(
            'date' => $this->input->post('date'),
            'name' => $this->input->post('name'),
            'userage' => $this->input->post('userage'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'numhome' => $this->input->post('numhome'),
            'numwork' => $this->input->post('numwork'),
            'nummobile' => $this->input->post('nummobile'),
            'adoptee_name' => $this->input->post('adoptee_name'),
            'adoptee_age' => $this->input->post('adoptee_age'),
            'adoptee_specie' => $this->input->post('adoptee_specie'),
            'adoptee_sex' => $this->input->post('adoptee_sex'),
            'adoptee_sterilized' => $this->input->post('adoptee_sterilized'),
            'adoptee_admission' => $this->input->post('adoptee_admission'),
            'nameref' => $this->input->post('nameref'),
            'ageref' => $this->input->post('ageref'),
            'relref' => $this->input->post('relref'),
            'numref' => $this->input->post('numref'),
            'prompt' => $this->input->post('prompt'),
            'interested' => $this->input->post('interested'),
            'size' => $this->input->post('size'),
            'breed' => $this->input->post('breed'),
            'petage' => $this->input->post('petage'),
            'description' => $this->input->post('description'),
            'num1' => $this->input->post('num1'),
            'num2' => $this->input->post('num2'),
            'num2ifyes' => $this->input->post('num2ifyes'),
            'num2ifYesSpecie' => $this->input->post('num2ifYesSpecie'),
            'num3' => $this->input->post('num3'),
            'num3Other' => $this->input->post('num3Other'),
            'num4' => $this->input->post('num4'),
            'num4file' => $this->input->post('num4file'),
            'num5' => $this->input->post('num5'),
            'yearslived' => $this->input->post('yearslived'),
            'num5specify' => $this->input->post('num5specify'),
            'num6' => $this->input->post('num6'),
            'num6explain' => $this->input->post('num6explain'),
            'num7' => $this->input->post('num7'),
            'num7specify' => $this->input->post('num7specify'),
            'num8' => $this->input->post('num8'),
            'num9' => $this->input->post('num9'),
            'num9explain' => $this->input->post('num9explain'),
            'num10' => $this->input->post('num10'),
            'num10age' => $this->input->post('num10age'),
            'num11' => $this->input->post('num11'),
            'num11explain' => $this->input->post('num11explain'),
            'num12' => $this->input->post('num12'),
            'num12age' => $this->input->post('num12age'),
            'num13' => $this->input->post('num13'),
            'num14' => $this->input->post('num14'),
            'num15' => $this->input->post('num15'),
            'num16' => $this->input->post('num16'),
            'num17' => $this->input->post('num17'),
            'num17name' => $this->input->post('num17name'),
            'num18' => $this->input->post('num18'),
            'num18animal' => $this->input->post('num18animal'),
            'num19' => $this->input->post('num19'),
            'num20' => $this->input->post('num20'),
            'num21' => $this->input->post('num21'),
            'num21fence' => $this->input->post('num21fence'),
            'num21file' => $this->input->post('num21file'),
            'num22' => $this->input->post('num22'),
            'num22how' => $this->input->post('num22how'),
            'num23' => $this->input->post('num23'),
            'num23specify' => $this->input->post('num23specify'),
            'num24' => $this->input->post('num24'),
            'num25' => $this->input->post('num25')
        );
        $selectedPetId = $this->session->userdata("petadopterid");
        $userId = $this->session->userdata("userid");
        $data = array(
            'pet_id' => $selectedPetId,
            'user_id' => $userId,
            'transaction_started_at' => time()
        );
        if ($this->user_model->insert("transaction", $data)) {
            $selectedUser = $this->user_model->fetch("user", array("user_id" => $userId));
            $log = array(
                "user_id" => $this->session->userdata("userid"),
                "event_description" => $selectedUser->user_username . " sent an adoption form",
                "event_classification" => "audit",
                "event_added_at" => time()
            );
            $this->putToEvents($log);
            $this->sendAdoptionForm($dataEmail);
        } else {
            
        }
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
        $currentUser = $this->session->userdata("userid");
        $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
        $data = array(
            'title' => 'User | Settings',
            'wholeUrl' => base_url(uri_string()),
            'currentUser' => $user
        );
        $this->load->view("user/includes/header", $data);
        $this->load->view("user/navbar");
        $this->load->view("user/sidenav");
        $this->load->view("user/settings");
        $this->load->view("user/includes/footer");
    }

    public function settingsUpdate() {

        $currentUser = $this->user_model->fetch("user", array("user_id" => $this->session->userdata("userid")))[0];
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
                        "event_description" => $currentUser->user_firstname . " " . $currentUser->user_lastname . " (" . $currentUser->user_username . ")" . " changed his profile picture.",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                } else {
                    //OOPS. ERROR in updating
                }
                redirect(base_url() . "user/settings");
            }
        } else if ($column_name == "change_name") {
            $this->form_validation->set_rules('user_lastname', "Lastname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
            $this->form_validation->set_rules('user_firstname', "Firstname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
            if ($this->form_validation->run() == FALSE) {
                $currentUser = $this->session->userdata("userid");
                $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
                $data = array(
                    'title' => 'User | Settings',
                    'wholeUrl' => base_url(uri_string()),
                    'currentUser' => $user
                );
                $this->load->view("user/includes/header", $data);
                $this->load->view("user/navbar");
                $this->load->view("user/sidenav");
                $this->load->view("user/settings");
                $this->load->view("user/includes/footer");
            } else {
                $data = array(
                    "user_firstname" => $this->input->post("user_firstname"),
                    "user_lastname" => $this->input->post("user_lastname"),
                    "user_updated_at" => time()
                );
                if ($this->user_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change name from " . $currentUser->user_firstname . " " . $currentUser->user_lastname . " to " . $data["user_firstname"] . " " . $data["user_lastname"] . ".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "user/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_username") {
            $this->form_validation->set_rules('user_username', "Username ", "required|min_length[5]|is_unique[user.user_username]|strip_tags");
            if ($this->form_validation->run() == FALSE) {
                $currentUser = $this->session->userdata("userid");
                $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
                $data = array(
                    'title' => 'User | Settings',
                    'wholeUrl' => base_url(uri_string()),
                    'currentUser' => $user
                );
                $this->load->view("user/includes/header", $data);
                $this->load->view("user/navbar");
                $this->load->view("user/sidenav");
                $this->load->view("user/settings");
                $this->load->view("user/includes/footer");
            } else {
                $data = array(
                    "user_username" => $this->input->post("user_username"),
                    "user_updated_at" => time()
                );
                if ($this->user_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change username from " . $currentUser->user_username . " to " . $data["user_username"] . ".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "user/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_password") {
            $this->form_validation->set_rules('user_password', "Password ", "required|matches[user_conpassword]|min_length[8]|strip_tags");
            $this->form_validation->set_rules('user_conpassword', "Confirm Password ", "required|matches[user_password]|min_length[8]|strip_tags");
            if ($this->form_validation->run() == FALSE) {
                $currentUser = $this->session->userdata("userid");
                $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
                $data = array(
                    'title' => 'User | Settings',
                    'wholeUrl' => base_url(uri_string()),
                    'currentUser' => $user
                );
                $this->load->view("user/includes/header", $data);
                $this->load->view("user/navbar");
                $this->load->view("user/sidenav");
                $this->load->view("user/settings");
                $this->load->view("user/includes/footer");
            } else {
                $data = array(
                    "user_password" => sha1($this->input->post("user_password")),
                    "user_updated_at" => time()
                );
                if ($this->user_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    redirect(base_url() . "user/settings");
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_email") {
            $this->form_validation->set_rules('user_email', "Email Address ", "required|valid_email|strip_tags");
            if ($this->form_validation->run() == FALSE) {
                $currentUser = $this->session->userdata("userid");
                $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
                $data = array(
                    'title' => 'User | Settings',
                    'wholeUrl' => base_url(uri_string()),
                    'currentUser' => $user
                );
                $this->load->view("user/includes/header", $data);
                $this->load->view("user/navbar");
                $this->load->view("user/sidenav");
                $this->load->view("user/settings");
                $this->load->view("user/includes/footer");
            } else {
                $data = array(
                    "user_email" => $this->input->post("user_email"),
                    "user_verification_code" => $this->generate(),
                    "user_isverified" => 0,
                    "user_updated_at" => time()
                );
                if ($this->user_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $this->sendemail($data);
                } else {
                    //Oops error in updating
                }
            }
        } else if ($column_name == "change_contactno") {
            $this->form_validation->set_rules('user_contact_no', "Phone Number ", "required|regex_match[^(09|\+639)\d{9}$^]|strip_tags");
            if ($this->form_validation->run() == FALSE) {
                $currentUser = $this->session->userdata("userid");
                $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
                $data = array(
                    'title' => 'User | Settings',
                    'wholeUrl' => base_url(uri_string()),
                    'currentUser' => $user
                );
                $this->load->view("user/includes/header", $data);
                $this->load->view("user/navbar");
                $this->load->view("user/sidenav");
                $this->load->view("user/settings");
                $this->load->view("user/includes/footer");
            } else {
                $data = array(
                    "user_contact_no" => $this->input->post("user_contact_no"),
                    "user_updated_at" => time()
                );
                if ($this->user_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change Contact No. from " . $currentUser->user_contact_no . " to " . $data["user_contact_no"] . ".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "user/settings");
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
                $user = $this->user_model->fetch("user", array("user_id" => $currentUser))[0];
                $data = array(
                    'title' => 'User | Settings',
                    'wholeUrl' => base_url(uri_string()),
                    'currentUser' => $user
                );
                $this->load->view("user/includes/header", $data);
                $this->load->view("user/navbar");
                $this->load->view("user/sidenav");
                $this->load->view("user/settings");
                $this->load->view("user/includes/footer");
            } else {
                $data = array(
                    "user_address" => $this->input->post("user_address"),
                    "user_province" => $this->input->post("user_province"),
                    "user_city" => $this->input->post("user_city"),
                    "user_updated_at" => time()
                );
                if ($this->user_model->update("user", $data, array("user_id" => $this->session->userdata("userid")))) {
                    $log = array(
                        "user_id" => $this->session->userdata("userid"),
                        "event_description" => "Change Address from " . $currentUser->user_address . ", " . $currentUser->user_city . ", " . $currentUser->user_province . " to " . $data["user_address"] . ", " . $data["user_city"] . ", " . $data["user_province"] . ".",
                        "event_classification" => "log",
                        "event_added_at" => time()
                    );
                    $this->putToEvents($log);
                    redirect(base_url() . "user/settings");
                } else {
                    //Oops error in updating
                }
            }
        }
        //echo $this->db->last_query();        
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
        $log = array(
            "user_id" => $this->session->userdata("userid"),
            "event_description" => "Logged Out",
            "event_classification" => "log",
            "event_added_at" => time()
        );
        $this->putToEvents($log);
        $this->session->sess_destroy();
        redirect(base_url() . 'login/');
    }

}

?>