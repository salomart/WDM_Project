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
                } else if (strcmp($this->input->post('submit'), "Add Member") == 0) {
                    $fetch_data = array( 'username' => $this->input->post('username') );
                    $user = $this->main_model->fetch_user($fetch_data);
                    
                    if (count($user) == 1) {
                        if ($user[0]["householdId"] == 0) {
                            $update_data = array(
                                'accountType' => $this->input->post('accountType'),
                                'householdId' => $this->input->post('householdId')
                            );
                            
                            $update_result = $this->main_model->update_user($this->input->post('username'), $update_data);
                            
                            if ($update_result == null) {
                                $data['action_success'] = "Successfully added the user to your household.";
                            } else {
                                $data['action_fail'] = "An error occured when adding the user to your household.";
                            }
                        } else {
                            $data['action_fail'] = "The user is already associated with a household.";
                        }
                    } else {
                        $data['action_fail'] = "The username entered doesn't exist.";
                    }
                }
                else if (strcmp($this->input->post('submit'), "Add Room") == 0) {            
                    
                            

                        
                            $householdId=$this->input->post('householdId');
                            
                            
                            $update_result = $this->main_model->add_room($this->input->post('roomname'), $householdId);
                            
                            if ($update_result == null) {
                                $data['action_success'] = "Successfully added the room to your household.";
                            } else {
                                $data['action_fail'] = "An error occured when adding the room to your household.";
                            }
                        }  
                 else if (strcmp($this->input->post('submit'), "Add Place") == 0) {
                    

                        
                            $householdId = $this->input->post('householdId');
                            
                            $placename = $this->input->post('placename');
                            $roomName =  $this->input->post('accountType');
                            
                            
                            $update_result = $this->main_model->add_place($householdId,$placename,$roomName);
                            
                            if ($update_result == null) {
                                $data['action_success'] = "Successfully added the place to your household.";
                            } else {
                                $data['action_fail'] = "An error occured when adding the room to your household.";
                            }
                        }  
                          else if (strcmp($this->input->post('submit'), "Add Item") == 0) {
                    
                            $householdId = $this->input->post('householdId');
                            $itemname = $this->input->post('itemname');
                        
                            $username = $_SESSION['username'];

                            $placename = $this->input->post('placename');
                            $roomName =  $this->input->post('roomName');
                            
                            
                            $update_result = $this->main_model->add_item($householdId,$itemname,$username,$placename,$roomName);
                            
                            if ($update_result == null) {
                                $data['action_success'] = "Successfully added the place to your household.";
                            } else {
                                $data['action_fail'] = "An error occured when adding the room to your household.";
                            }
                        }              
                 else if (strcmp($this->input->post('submit'), "Update Member") == 0) {
                    $update_data = array(
                        'accountType' => $this->input->post('accountType')
                    );
                    $update_result = $this->main_model->update_user($this->input->post('username'), $update_data);
                    
                    if ($update_result == null) {
                        $data['action_success'] = "Successfully updated the user.";
                    } else {
                        $data['action_fail'] = "An error occured when updating the user.";
                    }
                } else if (strcmp($this->input->post('submit'), "Delete Member(s)") == 0) {
                    $usernames = $this->input->post('usernames');
                    
                    if ($usernames && $usernames != "") {
                        $usernamesArr = explode(",", $usernames);
                        $update_result = $this->main_model->remove_members($usernamesArr);
                        
                        if ($update_result == null) {
                            $data['action_success'] = "Successfully removed the user(s) from your household.";
                        } else {
                            $data['action_fail'] = "An error occured when removing the user(s) from your household.";
                        }
                    } else {
                        $data['action_fail'] = "An error occured when removing the user(s) from your household.";
                    }
                }
            }
            
            $session_data = array( 'username' => $_SESSION['username'] );
            $data['user_data'] = $this->main_model->fetch_user($session_data);
            

            if ($data['user_data'][0] && $data['user_data'][0]['householdId'] != 0) {
                $data['member_data'] = $this->main_model->fetch_member_data($data['user_data'][0]['householdId']);

            }
            $data['roomdata'] = $this->main_model->fetch_rooms_storage($data['user_data'][0]['householdId']);
            $data['rooms'] = $this->main_model->fetch_rooms($data['user_data'][0]['householdId']);
            $data['items'] = $this->main_model->fetch_items($data['user_data'][0]['householdId']);

            $this->load->view('templates/header', $data);
            $this->load->view('pages/dashboard', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
