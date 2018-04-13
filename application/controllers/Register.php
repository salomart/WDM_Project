<?php

class Register extends CI_Controller {
    public function index() {
        $data['title'] = "Register - Where's The Item?";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/register', $data);
        $this->load->view('templates/footer', $data);
    }
}
