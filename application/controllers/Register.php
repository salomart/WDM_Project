<?php

class Register extends CI_Controller {
    public function index() {
        $data['title'] = "Register - Where's The Item?";
        $data['user_data'] = null;
        
        if (isset($_SESSION['username'])) {
            redirect('dashboard');
        }
        
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        
        $this->form_validation->set_rules('name', 'name', 'required|regex_match[/^[a-zA-Z ]*$/]|max_length[50]');
        $this->form_validation->set_rules('username', 'username', 'required|alpha_dash|max_length[15]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[50]');
        $this->form_validation->set_rules('password', 'password', 'required|alpha_dash|max_length[50]');
        $this->form_validation->set_rules('confirm', 'confirm', 'required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/register', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $post_data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'accountType' => 5,
                'householdId' => 0
            );
            
            $result = $this->main_model->register_user($post_data);
            
            if ($result == null) {
                $_SESSION['username'] = $this->input->post('username');
                redirect('dashboard');
            }
        }
    }
}
