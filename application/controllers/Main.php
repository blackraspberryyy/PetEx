<?php

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('email');
    }

    public function sendContact($user) {
        $allPets = $this->admin_model->fetch("pet");
        $data1 = array(
            'title' => 'Pet Ex | Homepage',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets
        );
        $this->email->from("codebusters.solutions@gmail.com", 'Contact Us Form');
        $this->email->to("codebusters.solutions@gmail.com");
        $this->email->subject($user['subject']);
        $data = array('name' => $user['name'], 'body' => $user['message']);
        $this->email->message($this->load->view('main/contactUsMessage', $data, true));

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        } else {
            $this->load->view("main/includes/header", $data1);
            $this->load->view("main/index.php");
            $this->load->view("main/includes/footer");
        }
    }

    public function index() {
        $allPets = $this->admin_model->fetch("pet");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $dataContact = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message')
        );
        $this->form_validation->set_rules('name', "Name ", "required|min_length[5]");
        $this->form_validation->set_rules('email', "Email ", "required|valid_email");
        $this->form_validation->set_rules('subject', "Subject ", "required|min_length[5]");
        $this->form_validation->set_rules('message', "Message ", "required|min_length[5]");
        $data = array(
            'title' => 'Pet Ex | Homepage',
            'wholeUrl' => base_url(uri_string()),
            'pets' => $allPets
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("main/includes/header", $data);
            $this->load->view("main/index.php");
            $this->load->view("main/includes/footer");
        } else {
            $this->sendContact($dataContact);
        }
    }

    public function login() {
        $data = array(
            'title' => 'Pet Ex | Login',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("main/includes/header", $data);
        $this->load->view("main/login.php");
        $this->load->view("main/includes/footer");
    }

}
