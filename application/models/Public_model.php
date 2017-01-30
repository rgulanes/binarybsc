<?php

class Public_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

	public function get_newsfeeds($d){
		$section = $d['section'];
		$position = $d['position'];

		$result = $this->db->query("CALL get_NewsFeeds('$section', '$position');");
        mysqli_next_result($this->db->conn_id);
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

    public function get_gallery_albums(){
        $result = $this->db->query("CALL get_GalleryAlbums();");
        mysqli_next_result($this->db->conn_id);
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
    }

    public function get_album($id){
        $result = $this->db->query("CALL get_PublishedPhoto('$id');");
        mysqli_next_result($this->db->conn_id);
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
    }

    public function send_feedback($data){
        $response = array();

        $ip_address = getHostByName(php_uname('n'));
        $_data = array(
            'sender' => $data['submitter_name'],
            'email_address' => $data['submitter_email'],
            'feedback' => $data['submitter_message'],
            'ip_address' => $ip_address,
            'email_status' => 1,
            'is_deleted' => 0,
            'is_read' => 0,
            'timestamp' => date('o-m-d H:i:s')
        );


        $this->db->trans_start();
        $this->db->insert('feedbacks_tbl', $_data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $response['growl'] = 'error';
            $response['msg'] = 'Unable to process request.';
        }
        else
        {
            $response['growl'] = 'success';
            $response['msg'] = 'Successfully added feedback.';
        }

        return $response;
    }
}
?>