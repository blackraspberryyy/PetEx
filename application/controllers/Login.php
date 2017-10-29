<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('address_model');
    }

    public function index() {
        $provinces = $this->address_model->fetchProvAsc('refprovince');
        $cities1 = $this->address_model->fetchCityAsc('refcitymun', array("provCode" => '0128'));
        $data = array(
            'title' => 'Pet Ex | Login',
            'provinces' => $provinces,
            'cities1' => $cities1
        );
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/login.php");
        $this->load->view("login/includes/footer");
    }

    function ajaxReceiver() {
        $input = $this->input->post('provValue');
        $input = strtolower($input);
        $text = explode(" ", substr($input, 0));
        echo json_encode(array("resultString" => $text));
        $this->index($text);
    }

    public function city() {
        $provinces = $this->address_model->fetchProvAsc('refprovince');
        $cities1 = $this->address_model->fetchCityAsc('refcitymun', array("provCode" => '0128'));
        $data = array(
            'title' => 'Pet Ex | Login',
            'provinces' => $provinces,
            'cities1' => $cities1
        );
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/city.php");
        $this->load->view("login/includes/footer");
    }

}

?>