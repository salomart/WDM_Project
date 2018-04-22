<?php

class Dashboard extends CI_Controller {
    public function index() {
        $data['title'] = "Dashboard - Where's The Item?";
        $data['user_data'] = null;
        
        if (isset($_SESSION['username'])) {
            $session_data = array( 'username' => $_SESSION['username'] );
            $data['user_data'] = $this->main_model->fetch_user($session_data);
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
}
