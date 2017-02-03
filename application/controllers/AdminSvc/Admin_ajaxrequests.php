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
                case 'activate_user' :
                    $this->_update_user_status($_REQUEST['id'], 'activate');
                    break;
                case 'inactivate_user' :
                    $this->_update_user_status($_REQUEST['id'], 'inactivate');
                    break;
                case 'delete_user' :
                    $this->_update_user_status($_REQUEST['id'], 'delete');
                    break;
                case 'update_user_info' :
                    $this->_update_user_info($_POST);
                    break;
                case 'get_active_feeds' :
                    $this->_get_active_feeds();
                    break;
                case 'get_feed_sections' :
                    $this->_get_feed_sections();
                    break;
                case 'get_feed_positions' :
                    $this->_get_feed_positions();
                    break;
                case 'create_newsfeed' :
                    $this->_create_newsfeed($_POST, $_FILES);
                    break;
                case 'delete_newsfeed' :
                    $this->_delete_newsfeed($_REQUEST['id']);
                    break;
                case 'get_newsfeed_info' :
                    $this->_get_newsfeed_info($_REQUEST['id']);
                    break;
                case 'update_newsfeed_info' :
                    $this->_update_newsfeed_info($_POST, $_FILES);
                    break;
                case 'get_all_users' :
                    $this->_get_all_users();
                    break;
                case 'get_tree_nodes' :
                    $this->_get_tree_nodes($_REQUEST['desc']);
                    break;
                case 'create_new_album' :
                    $this->_create_new_album($_POST);
                    break;
                case 'update_album_info' :
                    $this->_update_album_info($_POST);
                    break;
                case 'update_album_status':
                    $this->_update_album_status($_POST);
                    break;
                case 'add_new_photo':
                    $this->_add_new_photo($_POST, $_FILES);
                    break;
                case 'get_active_photos':
                    $this->_get_active_photos($_REQUEST['node_id']);
                    break;
                case 'update_photo_info':
                    $this->_update_photo_info($_POST, $_FILES);
                    break;
                case 'delete_photo':
                    $this->_delete_photo($_POST);
                    break;
                case 'get_active_messages':
                    $this->_get_active_messages();
                    break;
                case 'get_archived_messages':
                    $this->_get_archived_messages();
                    break;
                case 'get_deleted_messages':
                    $this->_get_deleted_messages();
                    break;
                case 'update_message_info':
                    $this->_update_message_info($_POST);
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

    private function _get_active_feeds(){
        $data = $this->Admin_model->get_active_feeds();
        return print json_encode($data);
    }

    private function _get_feed_sections(){
        $data = $this->Admin_model->get_feed_sections();
        return print json_encode($data);
    }

    private function _get_feed_positions(){
        $data = $this->Admin_model->get_feed_positions();
        return print json_encode($data);
    }

    // Save Data
    private function _add_new_user($details){
        $data = $this->Admin_model->add_new_user($details);
        return print json_encode($data);
    }

    private function _update_user_status($id, $status){
        $data = $this->Admin_model->update_user_status($id, $status);
        return print json_encode($data);
    }

    private function _update_user_info($details){
        $userInfo = array(
            'username' => $details['username'],
            'user_lname' => $details['lname'],
            'user_fname' => $details['fname'],
            'user_password' => $details['password'],
            'user_role' => $details['role'],
            'created_by' => $_SESSION['user']['username']
        );

        $data[0] = $this->Admin_model->update_user_info($userInfo, $details['user_id']);
        return print json_encode($data);
    }

    private function _create_newsfeed($details, $files){
        $data = $this->Admin_model->create_newsfeed($details, $files);
        return print json_encode($data);
    }

    private function _delete_newsfeed($id){
        $data = $this->Admin_model->delete_newsfeed($id);
        return print json_encode($data);
    }

    private function _get_newsfeed_info($id){
        $data = $this->Admin_model->get_newsfeed_info($id);
        return print json_encode($data);
    }

    private function _update_newsfeed_info($info, $files){
        $userInfo = array(
            'n_title' => $info['feedTitle'],
            'n_content' => $info['feedContent'],
            'n_section' => $info['feedSection'],
            'n_position' => $info['feedPosition'],
            'n_status' => !isset($info['news_stat']) ? 0 : 1 ,
            'updated_by' => $_SESSION['user']['username'],
            'date_update' => date('o-m-d h:i:s')
        );

        $data = $this->Admin_model->update_newsfeed_info($userInfo, $info['feed_id'], $files);
        return print json_encode($data);
    }

    private function _get_all_users(){
        $data = $this->Admin_model->get_all_users();
        return print json_encode($data);
    }

    private function _get_tree_nodes($desc){
        $data = $this->Admin_model->get_tree_nodes($desc);
        return print json_encode($data);
    }

    private function _create_new_album($info){
        $data = array();
        if($info['parent_node'] == ''){
            $data = array(
                'tree_id' => 1,
                'node_desc' => $info['albumTitle'],
                'parent_node' => NULL,
                'node_icon' => 'fa fa-folder fa-fw fa-lg',
                'node_status' => 1,
                'created_by' => $_SESSION['user']['username'],
                'datetime' => date('o-m-d h:i:s')
            );
        }else{
            $data = array(
                'tree_id' => 1,
                'node_desc' => $info['albumTitle'],
                'parent_node' => $info['parent_node'],
                'node_icon' => 'fa fa-folder fa-fw fa-lg',
                'node_status' => 1,
                'created_by' => $_SESSION['user']['username'],
                'datetime' => date('o-m-d h:i:s')
            );
        }

        $data = $this->Admin_model->create_new_album($data);
        return print json_encode($data);
    }

    private function _update_album_info($info){
        $userInfo = array(
            'node_desc' => $info['albumTitle']
        );

        $data = $this->Admin_model->update_album_info($userInfo, $info['node_id']);
        return print json_encode($data);
    }

    private function _update_album_status($info){
        $userInfo = array(
            'node_status' => $info['node_status']
        );

        $data = $this->Admin_model->update_album_info($userInfo, $info['node_id']);
        return print json_encode($data);
    }

    private function _add_new_photo($data, $files){
        $data = $this->Admin_model->add_new_photo($data, $files);
        return print json_encode($data);
    }

    private function _get_active_photos($id){
        $data = $this->Admin_model->get_active_photos($id);
        return print json_encode($data);
    }

    private function _update_photo_info($data, $files){
        $data = $this->Admin_model->update_photo_info($data, $files);
        return print json_encode($data);
    }

    private function _delete_photo($data){
        $_data = array( 'is_deleted' => $data['is_deleted'] );

        $data = $this->Admin_model->delete_photo($_data, $data['photo_id']);
        return print json_encode($data);
    }

    private function _get_active_messages(){
        $data = $this->Admin_model->get_active_messages();
        return print json_encode($data);
    }

    private function _get_archived_messages(){
        $data = $this->Admin_model->get_archived_messages();
        return print json_encode($data);
    }

    private function _get_deleted_messages(){
        $data = $this->Admin_model->get_deleted_messages();
        return print json_encode($data);
    }

    private function _update_message_info($d){
        $data = $this->Admin_model->update_message_info($d);
        return print json_encode($data);
    }
}