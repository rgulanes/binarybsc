<?php

class Admin_model extends CI_Model{

	public function login_user($username, $password){
        $_cvalid = 0;
        $user_pass = '';
        $user_stat = '';
        
        $query = $this->db->query("SELECT * FROM users_tbl WHERE username = '$username';");
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $_SESSION['user']['name'] = $row['user_fname'] . ' ' . $row['user_lname'];
                $_SESSION['user']['fname'] = $row['user_fname'];
                $_SESSION['user']['username'] = $row['username'];
                $_SESSION['user']['app_access'] = $row['user_role'];
                $_SESSION['user']['user_id'] = $row['user_id'];
                $user_pass = $row['user_password'];
                $user_stat = $row['user_status'];
            }
            $_cvalid = 1;
        }

        if($_cvalid != 0){
            if(($_SESSION['user']['username'] == $username) && ($user_pass == $password)){
                if($user_stat == 1){
                    redirect(base_url().('Admin/Home.php'));
                }else{
                    $this->session->set_flashdata('login_msg', 'warning');
                    redirect(base_url().('Admin/Login.php'));
                }
            }else{
                $this->session->set_flashdata('login_msg', 'error');
                redirect(base_url().('Admin/Login.php'));
            }
        }else{
            $this->session->set_flashdata('login_msg', 'error');
            redirect(base_url().('Admin/Login.php'));
        }
	}

	public function get_active_users(){
		$result = $this->db->query("CALL get_activeUsers();");
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

	public function add_new_user($data){
		$userId = $data['username'];
		$password = $data['password'];
		$fname = $data['fname'];
		$lname = $data['lname'];
		$role = $data['role'];
		$createdBy = $_SESSION['user']['username'];

		$result = $this->db->query("CALL add_NewUser('$userId', '$password', '$fname', '$lname', '$role', '$createdBy')");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function get_user_roles(){
		$result = $this->db->query("SELECT * FROM lk_user_roles WHERE id <> 1 ORDER BY description ASC;");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function get_user_info($id){
		$result = $this->db->query("SELECT * FROM binarybsc.users_tbl WHERE user_id = '$id' LIMIT 1;");
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