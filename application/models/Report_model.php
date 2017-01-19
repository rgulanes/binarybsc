<?php

class Report_model extends CI_Model{

	public function user_logs_report($d){

		$qstring = '';
		$user_role = '';
		if($d['user_roles'] != ''){
			$user_role = ' user_role = '.$d['user_roles'];
		}else{
			$user_role = '';
		}

		$user_list = '';
		if($d['user_lists'] != ''){
			$user_list = ' user_id = '.$d['user_lists'];
		}else{
			$user_list = '';
		}

		if($user_role != '' && $user_list != ''){
			$qstring = 'WHERE '.$user_role.' AND '.$user_list;
		}elseif($user_role != '' && $user_list == ''){
			$qstring = 'WHERE '.$user_role;
		}elseif($user_role == '' && $user_list != ''){
			$qstring = 'WHERE '.$user_list;
		}

		$result = $this->db->query("CALL report_UserLogs('$qstring');");
        mysqli_next_result($this->db->conn_id);
        $data = array();
        $counter = 0;

        if ($result->num_rows() > 0){
            $data = $result->result_array();
            $counter = sizeof($data);
        }else{
            $data = array();
            $counter = 0;
        }

        $output = array(
            "iTotalRecords" => $counter,
            "aaData" => array()
        );

        if($counter != 0){
            $output['aaData'] = $data;
        }else{
            $output['aaData'] = [];
        }

        return $output;
	}
}
?>