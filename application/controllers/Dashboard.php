<?php

class Dashboard extends CI_Controller {
    public function index() {
        if (!isset($_SESSION['username'])) {
            redirect('login');
        } else {
            $data['title'] = "Dashboard - Where's The Item?";
            $data['user_data'] = null;
            $data['action_success'] = null;
            $data['action_fail'] = null;
            
            if ($this->input->post('submit') != null) {
                if (strcmp($this->input->post('submit'), "Create Household") == 0) {
                    $post_data = array(
                        'username' => $_SESSION['username'],
                        'householdName' => $this->input->post('householdName')
                    );
                    
                    $result = $this->main_model->create_household($post_data);
                    
                    if ($result) {
                        $data['action_success'] = "Successfully created a household.";
                    } else {
                        $data['action_fail'] = "An error occured when creating the household.";
                    }
                }
            }
            
            if (isset($_SESSION['username'])) {
                $session_data = array( 'username' => $_SESSION['username'] );
                $data['user_data'] = $this->main_model->fetch_user($session_data);
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/dashboard', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
