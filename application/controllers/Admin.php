<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        @session_start();
        $this->load->model('Admin_model');    
    }

	public function index()
	{	
		redirect(base_url().('Admin/Login.php'));
	}

	public function login_screen(){
		$_SESSION["user"]['username'] = NULL;

		if($_SESSION["user"]['username'] == NULL)
        {
        	$this->load->view('Admin/login_screen');
		}else{
        	redirect(base_url());
        }
	}

	public function home(){
		if($_SESSION["user"]['username'] != NULL)
        {
			$this->load->view('Admin/index');
		}else{
			redirect(base_url().('Admin/Login.php'));
        }
	}

	public function users(){
		if($_SESSION["user"]['username'] != NULL)
        {
            $app_access = array('1', '2');
            if(in_array($_SESSION['user']['app_access'], $app_access)){
				$this->load->view('Admin/users');
			}else{
				redirect(base_url().('Admin/Home.php'));
			}
		}else{
			redirect(base_url().('Admin/Login.php'));
        }
	}

	public function galleries(){
		if($_SESSION["user"]['username'] != NULL)
        {
			$this->load->view('Admin/galleries');
		}else{
			redirect(base_url().('Admin/Login.php'));
        }
	}

	public function newsfeed(){
		if($_SESSION["user"]['username'] != NULL)
        {
			$this->load->view('Admin/newsfeed');
		}else{
			redirect(base_url().('Admin/Login.php'));
        }
	}

	public function user_activity_tracking(){
		if($_SESSION["user"]['username'] != NULL)
        {	
			$app_access = array('1', '2');
            if(in_array($_SESSION['user']['app_access'], $app_access)){
				$this->load->view('Reports/user_activity_tracking');
			}else{
				redirect(base_url().('Admin/Home.php'));
			}
		}else{
			redirect(base_url().('Admin/Login.php'));
        }
	}

	public function logout(){
		$this->Admin_model->add_user_logs('logout');
		session_destroy();
		redirect(base_url().('Admin/Login.php'));
	}
}
