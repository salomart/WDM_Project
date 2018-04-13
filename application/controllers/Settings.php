<?php

class Settings extends CI_Controller {
    public function index() {
        $data['title'] = "Settings - Where's The Item?";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/settings', $data);
        $this->load->view('templates/footer', $data);
    }
}
