<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajaxrequests extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        @session_start();
        $this->load->model('Admin_model');
    }

    public function db_request(){
        if(isset($_REQUEST['action'])){
           switch($_REQUEST['action']) {
                case 'get_active_users' :
                    $this->_get_active_users();
                    break;
                case 'add_new_user' :
                    $this->_add_new_user($_POST);
                    break;
                case 'get_user_roles' :
                    $this->_get_user_roles();
                    break;
                case 'get_user_info' :
                    $this->_get_user_info($_REQUEST['id']);
                    break;
                default : 
                    echo '404 Not Found';
                    break;
            } 
        }else{
            echo '404 Not Found';
        }
        
    }

    // Get Data
    private function _get_active_users(){
        $data = $this->Admin_model->get_active_users();
        return print json_encode($data);
    }

    private function _get_user_roles(){
        $data = $this->Admin_model->get_user_roles();
        return print json_encode($data);
    }

    private function _get_user_info($id){
        $data = $this->Admin_model->get_user_info($id);
        return print json_encode($data);
    }


    // Save Data
    private function _add_new_user($details){
        $data = $this->Admin_model->add_new_user($details);
        return print json_encode($data);
    }

}