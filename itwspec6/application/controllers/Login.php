<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
    }

    public function index() {
        $data = array('title' => "Login");
        $this->load->view('login/includes/header', $data);
        $this->load->view('login/login_form');
        $this->load->view('login/includes/footer');
    }

    public function register() {
        $data = array('title' => "Register");
        $this->load->view('login/includes/header', $data);
        $this->load->view('login/register');
        $this->load->view('login/includes/footer');
    }

    public function registerSubmit() {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'status' => '1',
            'account_access' => $this->input->post('account'),
            'registered_at' => time()
        );
        if (sha1($this->input->post('password')) == sha1($this->input->post('conpassword'))) {
            if ($this->item_model->insert("accounts", $data)) {

                redirect('login/');
            } else {
                echo "Register Error";
            }
        }else{
            echo "<script> alert('Password did not match')</script>";
            redirect('login/register');
        }
    }

    public function login_submit() {

        $data = array(
            'username' => $this->input->post('username'),
        );

        $userInfo = $this->item_model->fetch('accounts', $data);

        if (!$userInfo) {
            echo "No accounts exist";
        } else {
            $userInfo = $userInfo[0];

            if ($userInfo->password == sha1($this->input->post('password'))) {
                if ($userInfo->status) {
                    if ($userInfo->account_access == 1) {
                        //admin
                        echo "THIS IS ADMIN <br/>";
                        echo "<pre>";
                        print_r($userInfo);
                        echo "</pre>";
                    } else if ($userInfo->account_access == 2) {
                        //user
                        echo "THIS IS USER <br/>";
                        echo "<pre>";
                        print_r($userInfo);
                        echo "</pre>";
                    }
                } else {
                    echo "This account is blocked!";
                }
            } else {
                echo "Password is incorrect";
            }
        }
    }

}
