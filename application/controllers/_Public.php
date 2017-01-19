<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _Public extends CI_Controller {

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
        $this->load->model('Public_model');    
    }

    public function db_request(){
    	if(isset($_REQUEST['action'])){
	    	switch($_REQUEST['action']) {
	    		case 'get_newsfeeds':
	    			$this->_get_newsfeeds($_REQUEST);
	    			break;
	    		default :
	    			echo '404 Not Found.';
	    			break;
	    	}
	    }else{
	    	echo '404 Not Found.';
	    }
    }

	private function _get_newsfeeds($d){
		$data = $this->Public_model->get_newsfeeds($d);
		return print json_encode($data);
    }
}
