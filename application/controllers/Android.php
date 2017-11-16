<?php

class Android extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('android_model');
    }

    public function index(){
        //nothing to see here.
    }
    
    public function getJson_pet(){
        $query = $this->android_model->fetch("pet", array("pet_access" => 1));
         $data = array(
            'result' => $query
        );
         $this->load->view("android/getJson_pet", $data);
    }
    public function getJson_user(){
        $query = $this->android_model->fetch("user", array("user_status" => 1));
         $data = array(
            'result' => $query
        );
         $this->load->view("android/getJson_user", $data);
    }
    public function getJson_adoption(){
        //$user_id = $this->input->post("user_id");
        $user_id = 201700002;
        $query = $this->android_model->fetchTwo("adoption", "adoption_id, adoption.pet_id, adoption.user_id, adoption_isMissing, adoption_adopted_at, user_firstname, user_lastname, user_username, user_password,user_bday,
                        user_sex, user_status, user_access, user_email, user_verification_code,
                        user_isverified, user_contact_no, user_picture, user_address, user_city,
                        user_province, user_added_at, user_updated_at, pet_name, pet_bday,
                        pet_specie, pet_sex, pet_breed, pet_size, pet_status,
                        pet_access, pet_neutered_spayed, pet_admission, pet_description, pet_history,
                        pet_picture, pet_video, pet_added_at,pet_updated_at",
                "user",
                "adoption.user_id = user.user_id",
                "pet",
                "adoption.pet_id = pet.pet_id",
                array("adoption.user_id"=>$user_id));
		//echo $this->db->last_query();
		$data = array(
            'result' => $query
        );
        $this->load->view("android/getJson_adoption", $data);
    }
	
	public function getJson_adoption_isMissing(){
        $query = $this->android_model->fetchTwo("adoption", "adoption_id, adoption.pet_id, adoption.user_id, adoption_isMissing, adoption_adopted_at, user_firstname, user_lastname, user_username, user_password,user_bday,
                        user_sex, user_status, user_access, user_email, user_verification_code,
                        user_isverified, user_contact_no, user_picture, user_address, user_city,
                        user_province, user_added_at, user_updated_at, pet_name, pet_bday,
                        pet_specie, pet_sex, pet_breed, pet_size, pet_status,
                        pet_access, pet_neutered_spayed, pet_admission, pet_description, pet_history,
                        pet_picture, pet_video, pet_added_at,pet_updated_at",
                "user",
                "adoption.user_id = user.user_id",
                "pet",
                "adoption.pet_id = pet.pet_id",
                array("adoption_isMissing"=>1));
		//echo $this->db->last_query();
		$data = array(
            'result' => $query
        );
        $this->load->view("android/getJson_adoption", $data);
    }
	
}
