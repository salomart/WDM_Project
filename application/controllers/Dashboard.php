<?php

class Dashboard extends CI_Controller {
    public function index() {
        $data['title'] = "Dashboard - Where's The Item?";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
}
