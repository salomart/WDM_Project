<?php

class Settings extends CI_Controller {
    public function index() {
        if (!isset($_SESSION['username'])) {
            redirect('login');
        } else {
            $data['title'] = "Settings - Where's The Item?";
            $data['update_success'] = false;
            $data['update_fail'] = false;
            
            $this->form_validation->set_error_delimiters('', '');
            
            $this->form_validation->set_rules('name', 'name', 'regex_match[/^[a-zA-Z ]*$/]|max_length[50]');
            $this->form_validation->set_rules('username', 'username', 'alpha_dash|max_length[15]');
            $this->form_validation->set_rules('email', 'email', 'valid_email|max_length[50]');
            $this->form_validation->set_rules('password', 'password', 'alpha_dash|max_length[50]');
            $this->form_validation->set_rules('confirm', 'confirm', 'matches[password]');
            
            if ($this->form_validation->run() == TRUE) {
                $update_data = array();
                
                if ($this->input->post('name') != null) {
                    $update_data["name"] = $this->input->post('name');
                }
                
                if ($this->input->post('username') != null) {
                    $update_data["username"] = $this->input->post('username');
                }
                
                if ($this->input->post('email') != null) {
                    $update_data["email"] = $this->input->post('email');
                }
                
                if ($this->input->post('password') != null) {
                    $update_data["password"] = $this->input->post('password');
                }
                
                if ($this->input->post('removeHousehold') != null) {
                    $update_data["accountType"] = 5;
                    $update_data["householdId"] = 0;
                }
                
                $update_result = $this->main_model->update_user($_SESSION['username'], $update_data);
                
                if ($update_result == null) {
                    $data['update_success'] = true;
                    $_SESSION['username'] = $this->input->post('username');
                } else {
                    $data['update_fail'] = true;
                }
            }
            
            $data['user_data'] = $this->main_model->fetch_user_settings($_SESSION['username']);
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/settings', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
