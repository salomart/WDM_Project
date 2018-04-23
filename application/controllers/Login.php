<?php

class Login extends CI_Controller {
    public function index() {
        $data['title'] = "Login - Where's The Item?";
        $data['login_error'] = '';
        $data['user_data'] = null;
        
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        
        $this->form_validation->set_rules('username', 'username', 'required|alpha_dash|max_length[15]');
        $this->form_validation->set_rules('password', 'password', 'required|alpha_dash|max_length[50]');
        
        if (strcmp($this->input->post('submit'), "Login") != 0 || $this->form_validation->run() == FALSE) {
            if (strcmp($this->input->post('submit'), "Logout") == 0) {
                unset($_SESSION['username']);
            }
            
            if (isset($_SESSION['username'])) {
                redirect('dashboard');
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/login', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $post_data = array( 'username' => $this->input->post('username') );
            
            $result = $this->main_model->fetch_user($post_data);
            
            if (count($result) == 1 && strcmp($result[0]["password"], $this->input->post('password')) == 0) {
                $_SESSION['username'] = $this->input->post('username');
                redirect('dashboard');
            } else {
                $data['login_error'] = '<p class="text-danger text-center">The credentials entered are invalid.</p>';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/login', $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }
}
