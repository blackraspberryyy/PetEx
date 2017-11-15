<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->library('email');
        $this->load->library('recaptcha');
        if ($this->session->has_userdata('isloggedin') == TRUE) {
            $currentUserId = $this->session->userdata('userid');
            $currentUser = $this->user_model->fetch("user", array("user_id" => $currentUserId))[0];   
            if($currentUser->user_access == "admin"){
                redirect(base_url().'admin/');
            }else{
                redirect(base_url() . 'user/');
            }   
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

    public function _username_check($username) {
        $result = $this->user_model->usernameAvailability($username);
        if (!$result) {
            $this->form_validation->set_message('_username_check', 'The %s is not existing');
            return FALSE;
        } else {
            return TRUE;
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
        $data = array(
            'title' => 'Pet Ex | Login',
            'wholeUrl' => base_url(uri_string()),
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
        );
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/login.php");
        $this->load->view("login/includes/footer");
    }

    public function login_submit() {

        $data = array(
            'user_username' => $this->input->post('username'),
            'user_password' => $this->input->post('password'),
        );
        $accountDetails = $this->admin_model->getinfo("user", $data);

        if (!$accountDetails) {
            //OOPS no accounts like that!
            echo "<script>alert('No results found');"
            . "window.location='" . base_url() . "login'</script>";
        } else {
            $accountDetails = $accountDetails[0];
            if ($accountDetails->user_access == "admin") {
                if ($accountDetails->user_status == 0) {
                    //OOPS user is blocked by the admin. Please contact the admin.
                    echo "<script>alert('Account is Blocked!');"
                    . "window.location='" . base_url() . "login/'</script>";
                } else {
                    if ($accountDetails->user_isverified == 0) {
                        //OOPS user is not verified yet.
                        echo "<script>alert('Account is not yet verified');"
                        . "window.location='" . base_url() . "login/'</script>";
                    } else {
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_userdata('userid', $accountDetails->user_id);
                        redirect(base_url() . 'admin/');
                    }
                }
            } else {
                if ($accountDetails->user_status == 0) {
                    //OOPS user is blocked by the admin. Please contact the admin.
                    echo "<script>alert('Account is Blocked!');"
                    . "window.location='" . base_url() . "login/'</script>";
                } else {
                    if ($accountDetails->user_isverified == 0) {
                        //OOPS user is not verified yet.
                        echo "<script>alert('Account is not yet verified');"
                        . "window.location='" . base_url() . "login/'</script>";
                    } else {
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_userdata('userid', $accountDetails->user_id);
                        redirect(base_url() . 'user/');
                    }
                }
            }
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
        $data = array('name' => $user['user_firstname'], 'code' => $user['user_verification_code']);
        $this->email->message($this->load->view('login/verifyMessage', $data, true));

        if (!$this->email->send()) {
            $this->email->print_debugger();
        } else {
            
        }
    }

    public function sendEmailReset($user) {

        $this->email->from("codebusters.solutions@gmail.com", 'Reset Password');
        $this->email->to($user['email']);
        $this->email->subject('Reset Password');
        $data = array('name' => $user['username'], 'user' => $user['username']);
        $this->email->message($this->load->view('login/reset_message', $data, true));

        if (!$this->email->send()) {
            $this->email->print_debugger();
        } else {
            
        }
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
                'title' => 'Pet Ex | Login'
            );
            $this->load->view("login/includes/header", $data);
            $this->load->view("login/login");
            $this->load->view("login/includes/footer");
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
                'user_access' => "user",
                'user_lastname' => $this->input->post('lastname'),
                'user_firstname' => $this->input->post('firstname'),
                'user_bday' => strtotime($this->input->post('birthday')),
                'user_sex' => $this->input->post('gender'),
                'user_picture' => $imagePath,
                'user_address' => $this->input->post('address'),
                'user_verification_code' => $this->generate(),
                'user_added_at' => time(),
                'user_updated_at' => time()
            );
            if ($this->user_model->insert("user", $data)) {
                echo 'Verify Your Account';
                $this->sendemail($data);
            } else {
                echo "Register Error";
            }
        }
    }

    public function resetPass() {
        $data = array(
            'title' => 'Pet Ex | Reset Password'
        );
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/resetPass");
        $this->load->view("login/includes/footer");
    }

    public function resetPass_exec() {
        $this->form_validation->set_rules('username', "Username ", "required|min_length[5]|strip_tags|callback__username_check");
        $this->form_validation->set_rules('email', "Email Address ", "required|valid_email|strip_tags|callback__email_check");
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Pet Ex | Reset Password'
            );
            $this->load->view("login/includes/header", $data);
            $this->load->view("login/resetPass");
            $this->load->view("login/includes/footer");
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $userUsername = $this->user_model->fetch("user", array("user_username" => $username, "user_email" => $email));
            if (!$userUsername) {
                echo "<script>alert('Username and Email Address mismatch');"
                . "window.location='" . base_url() . "login/resetPass'</script>";
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email')
                );
                $this->sendEmailReset($data);
                echo "<script>alert('Please verify your account to your email address');"
                . "window.location='" . base_url() . "login/'</script>";
            }
        }
    }

    public function verifyCode() {
        $code = $this->uri->segment(3);
        $this->user_model->update('user', array('user_isverified' => '1'), array('user_verification_code' => $code));
        echo "Your Account is now verified. <br>";
        echo "<a href = '" . $this->config->base_url() . "login/'>Login To Your Account</a>";
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

    public function enterNewPass() {
        $segment = $this->uri->segment(3);
        $data = array(
            'title' => "Reset Password",
            'wholeUrl' => base_url(uri_string()),
            'segment' => $segment
        );
        $this->load->view('login/includes/header', $data);
        $this->load->view('login/enterNewPass', $segment);
        $this->load->view('login/includes/footer');
    }

    public function enterNewPass_exec() {
        $user = $this->uri->segment(3);
        $segment = $this->uri->segment(3);
        $this->form_validation->set_rules('password', "Password ", "required|matches[conpassword]|alpha_numeric|min_length[8]|strip_tags");
        $this->form_validation->set_rules('conpassword', "Confirm Password ", "required|matches[password]|alpha_numeric|min_length[8]|strip_tags");
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Pet Ex | Enter New Password',
                'segment' => $segment
            );
            $this->load->view("login/includes/header", $data);
            $this->load->view("login/enterNewPass", $segment);
            $this->load->view("login/includes/footer");
        } else {
            $data = array(
                'user_password' => $this->input->post('password')
            );
            $this->user_model->update('user', $data, array('user_username' => $user));
            echo "<script>alert('Password has been reset');"
            . "window.location='" . base_url() . "login/'</script>";
        }
    }

}

?>