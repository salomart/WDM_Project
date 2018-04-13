<?php

class Login extends CI_Controller {
    public function index() {
        $data['title'] = "Login - Where's The Item?";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer', $data);
    }
}
