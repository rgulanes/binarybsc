<?php

class Public_model extends CI_Model{
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
}
?>