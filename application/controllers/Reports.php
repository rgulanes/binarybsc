<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
        $this->load->model('Report_model');    
    }

    public function db_request(){
    	if(isset($_REQUEST['action'])){
	    	switch($_REQUEST['action']) {
	    		case 'user_activity_tracking':
	    			$this->_user_activity_tracking($_GET);
	    			break;
	    		default :
	    			echo '404 Not Found.';
	    			break;
	    	}
	    }else{
	    	echo '404 Not Found.';
	    }
    }

	private function _user_activity_tracking($d){
		$data['data'] = $this->Report_model->user_logs_report($d);
		$html = $this->load->view('Reports/Templates/user_activity_tracking', $data, true);
        $file = "";

        ini_set('memory_limit','32M');
             
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($file, 'I');
    }
}
?>