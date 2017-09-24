<?php

class NewController extends CI_Controller {

    public function index() {
        $data = array('title' => "Homepage", 'message' => "Hello World!!!!");
        $this->load->view("newcontroller/includes/header", $data);
        $this->load->view("newcontroller/index");
        $this->load->view("newcontroller/includes/footer");
        // echo "This is index!";
    }

    public function function2() {
        $data = array('title' => "Function2");
        $this->load->view("newcontroller/includes/header", $data);
        $this->load->view("newcontroller/function2");
        $this->load->view("newcontroller/includes/footer");
    }

    public function form() {
        $data = array('title' => "Function2");
        $this->load->view("newcontroller/includes/header", $data);
        $this->load->view("newcontroller/form");
        $this->load->view("newcontroller/includes/footer");
    }

    public function formSubmit() {
        $data = array('title' => "Form",
            "val1" => $this->input->post('val1'),
            "val2" => $this->input->post('val2'));
        $this->load->view("newcontroller/includes/header", $data);
        $this->load->view("newcontroller/container");
        $this->load->view("newcontroller/includes/footer");
    }

}
