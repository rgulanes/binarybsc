<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ajaxforms extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        @session_start();
        $this->load->model('Admin_model');
    }

    public function login_user(){

        $pass = trim($this->input->post('password'));
        $username = trim($this->input->post('username'));

        $this->Admin_model->login_user($username, $pass);
    }

}