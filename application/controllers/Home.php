<?php

class Home extends CI_Controller {
    public function index() {
        $data['title'] = "Home - Where's The Item?";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }
}
