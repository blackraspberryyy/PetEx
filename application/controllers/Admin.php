<?php

class Admin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('file');
        $this->load->model('admin_model');
    }
    
    //----------OTHER FUNCTIONS------------
    function get_age($birth_date) {
      return floor((time() - strtotime($birth_date)) / 31556926);
    }
    function get_months($birth_date) {
      return floor((time() - strtotime($birth_date)) / 2678400);
    }
    function GetImageExtension($imagetype){
        if(empty($imagetype)) return false;
        switch($imagetype){
            case 'image/bmp': return '.bmp';
            case 'image/gif': return '.gif';
            case 'image/jpeg': return '.jpg';
            case 'image/png': return '.png';
            default: return false;
        }
     }
    //-------------------------------------
    
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
    
    public function petDatabaseAdd(){
        $data = array(
            'title' => 'Admin | Pet Registration',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseAdd");
        $this->load->view("admin/includes/footer");
    }
    
    public function petDatabaseAdd_exec(){
        if (!empty($_FILES["pet_picture"]["name"])) {
		$file_name=$_FILES["pet_picture"]["name"];
		$temp_name=$_FILES["pet_picture"]["tmp_name"];
		$imgtype=$_FILES["pet_picture"]["type"];
		$ext= $this->GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;
		$target_path = "./images/animals/".$imagename;
		
		if(move_uploaded_file($temp_name, $target_path) ) {
                    $imagePath = $target_path;
		}else{
                    echo "Unable to find the folder location";
		   //exit("Error While uploading image on the server");
		}
	}else{
            if($this->input->post('pet_specie') == "canine"){
                $imagePath = ".images/tools/dog_temp_pic.png";
            }else{
                $imagePath = ".images/tools/cat_temp_pic.png";
            }
            //DO METHOD WITHOUT PICTURE PROVIDED
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
        
        if($this->admin_model->singleinsert("pet", $data)){
            redirect("admin/petDatabase");
        }else{
            echo "An Error Ocurred";
        }
        
        
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    
    public function petDatabaseLog(){
        $selectedPets = $this->admin_model->fetch('pet', array('pet_id' => $this->uri->segment(3))) ;
        $data = array(
            'title' => 'Admin | Pet Database',
            'wholeUrl' => base_url(uri_string()),
            'pet' => $selectedPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseLog");
        $this->load->view("admin/includes/footer");
    }
    
    public function petDatabaseUpdate(){
        $selectedPets = $this->admin_model->fetch('pet', array('pet_id' => $this->uri->segment(3))) ;
        $data = array(
            'title' => 'Admin | Pet Database',
            'wholeUrl' => base_url(uri_string()),
            'pet' => $selectedPets,
        );
        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navbar");
        $this->load->view("admin/sidenav");
        $this->load->view("admin/petDatabaseUpdate");
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
        //$this->load->view("admin/petDatabase");
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