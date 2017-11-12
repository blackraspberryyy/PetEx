<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->library('email');
        if ($this->session->has_userdata('isloggedin') == TRUE) {
            redirect('user/');
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
            'title' => 'Pet Ex | Login'
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
        $accountDetailsUser = $this->user_model->getinfo("user", $data);
        $accountDetailsAdmin = $this->admin_model->getinfo("user", $data);
        
        if ($accountDetailsAdmin->user_access == "admin") {
            if (!$accountDetailsAdmin) {
                echo "<script>alert('No results found');"
                . "window.location='" . base_url() . "login'</script>";
            } else {

                $accountDetailsAdmin = $accountDetailsAdmin[0];

                if ($accountDetailsAdmin->user_status == 0) {
                    echo "<script>alert('Account is Blocked!');"
                    . "window.location='" . base_url() . "login'</script>";
                } else {
                    if ($accountDetailsAdmin->user_isverified == 0) {
                        echo "<script>alert('Account is not yet verified in email');"
                        . "window.location='" . base_url() . "login'</script>";
                    } else {
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_userdata('userid', $accountDetailsAdmin->user_id);
                        redirect('admin/');
                    }
                }
            }
        } else {
            if (!$accountDetailsUser) {
                echo "<script>alert('No results found');"
                . "window.location='" . base_url() . "login'</script>";
            } else {

                $accountDetailsUser = $accountDetailsUser[0];

                if ($accountDetailsUser->user_status == 0) {
                    echo "<script>alert('Account is Blocked!');"
                    . "window.location='" . base_url() . "login'</script>";
                } else {
                    if ($accountDetailsUser->user_isverified == 0) {
                        echo "<script>alert('Account is not yet verified in email');"
                        . "window.location='" . base_url() . "login'</script>";
                    } else {
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_userdata('userid', $accountDetailsUser->user_id);
                        redirect('user/');
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

    public function signup_exec() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', "Username ", "required|alpha_numeric|min_length[5]|is_unique[user.user_username]|strip_tags");
        $this->form_validation->set_rules('password', "Password ", "required|matches[conpass]|alpha_numeric|min_length[8]|strip_tags");
        $this->form_validation->set_rules('conpass', "Confirm Password ", "required|matches[password]|alpha_numeric|min_length[8]|strip_tags");
        $this->form_validation->set_rules('phonenumber', "Phone Number ", "required|regex_match[^(09|\+639)\d{9}$^]|strip_tags");
        $this->form_validation->set_rules('email', "Email Address ", "required|valid_email|strip_tags");
        $this->form_validation->set_rules('lastname', "Lastname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
        $this->form_validation->set_rules('firstname', "Firstname ", "required|min_length[2]|strip_tags|callback__alpha_dash_space");
        $this->form_validation->set_rules('birthday', "Birthday ", "required|strip_tags");
        $this->form_validation->set_rules('address', "Address ", "required|regex_match[^[#.0-9a-zA-Z\s,-]+$^]|strip_tags");
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

    public function verifyCode() {
        $code = $this->uri->segment(3);
        $this->user_model->update('user', array('user_isverified' => '1'), array('user_verification_code' => $code));
        echo "Your Account is now verified. <br>";
        echo "<a href = '" . $this->config->base_url() . "login/'>Login To Your Account</a>";
    }

}

?>