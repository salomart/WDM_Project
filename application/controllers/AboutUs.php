<?php

class AboutUs extends CI_Controller {
    public function index() {
        $data['title'] = "About Us - Where's The Item?";
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/about_us', $data);
        $this->load->view('templates/footer', $data);
    }
}
