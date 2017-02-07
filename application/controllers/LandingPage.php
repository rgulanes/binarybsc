<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {

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
        //@session_start();
        $this->load->model('Landingpage_model');       
    }
/* start  navigations */
/* start  Main pages */
	public function index()
	{	
		redirect(base_url().("Home.php"));
	}

	public function home(){
		$this->load->view('LandingPage/index');
	}

	public function about(){
		$this->load->view('LandingPage/about');
	
	}
	public function services(){
		$this->load->view('LandingPage/services');
	
	}
	public function gallery(){
		$this->load->view('LandingPage/gallery');
	
	}
	public function contact(){
		$this->load->view('LandingPage/contact');
	
	}
	public function login(){
		$this->load->view('LandingPage/login');
	
	}
	/* end  main pages */
	/* start  organizations */
	public function bcssc(){
		$this->load->view('LandingPage/bcssc');
	
	}
	public function brokenshirian(){
		$this->load->view('LandingPage/brokenshirian');
	
	}
	public function lamp(){
		$this->load->view('LandingPage/lamp');
	
	}
	/* end  organizations */
	/* end  navigations */


	/* start  services links */
	public function softeng(){
		$this->load->view('LandingPage/softeng');
	
	}
	public function scholarship(){
		$this->load->view('LandingPage/scholarship.php');
	
	}
	public function handbook(){
		$this->load->view('LandingPage/handbook.php');
	
	}

	public function student_activities(){
		$this->load->view('LandingPage/student_activities.php');
	
	}

	public function Student_Affairs(){
		$this->load->view('LandingPage/Student_Affairs.php');
	
	}

	public function life_purpose(){
		$this->load->view('LandingPage/life_purpose.php');
	
	}
	public function school_calendar(){
		$this->load->view('LandingPage/school_calendar.php');
	
	}
	public function employees(){
		$this->load->view('LandingPage/employees.php');
	
	}
	public function student_orgs(){
		$this->load->view('LandingPage/student_orgs.php');
	
	}



	/* end  services links */

}

