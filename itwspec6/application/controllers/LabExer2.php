<?php

class LabExer2 extends CI_Controller {
    
    //Exercise 2.1
    public function exercise1() {
        $this->load->view("generator/includes/header");
        $this->load->view("generator/exercise1");
        $this->load->view("generator/includes/footer");
    }
     public function exercise1Submit() {
        $data = array('title' => "Form",
            "num" => $this->input->post('num'));
        $this->load->view("generator/includes/header",$data);
        $this->load->view("generator/exercise1Container");
        $this->load->view("generator/includes/footer");
    }
    
    //Exercise 2.2
    public function exercise2() {
        $this->load->view("generator/includes/header");
        $this->load->view("generator/exercise2");
        $this->load->view("generator/includes/footer");
    }
     public function exercise2Submit() {
        $data = array('title' => "Form",
            "num" => $this->input->post('num'));
        $this->load->view("generator/includes/header",$data);
        $this->load->view("generator/exercise2Container");
        $this->load->view("generator/includes/footer");
    }
    //Exercise 2.3
    public function exercise3() {
        $this->load->view("generator/includes/header");
        $this->load->view("generator/exercise3");
        $this->load->view("generator/includes/footer");
    }
     public function exercise3Submit() {
        $data = array('title' => "Form",
            "length" => $this->input->post('length'),
            "partner" => $this->input->post('partner'));
        $this->load->view("generator/includes/header",$data);
        $this->load->view("generator/exercise3Container");
        $this->load->view("generator/includes/footer");
    }

}
