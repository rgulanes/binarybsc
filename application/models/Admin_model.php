<?php

class Admin_model extends CI_Model{

	public function login_user($username, $password){
        $_cvalid = 0;
        $user_pass = '';
        $user_stat = '';
        
        $query = $this->db->query("SELECT * FROM users_tbl WHERE username = '$username' AND user_status <> 2;");
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
                	$this->add_user_logs('login');
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

	public function update_user_status($id, $status){
       	$response = array();
        if(isset($id))
        {	
        	$data = array();
        	if($status == 'activate'){
        		$data = array(
        			'user_status' => 1
        			);
        	}elseif($status == 'inactivate'){
        		$data = array(
        			'user_status' => 0
        			);
        	}elseif($status == 'delete'){
        		$data = array(
        			'user_status' => 2
        			);
        	}

            $this->db->trans_start();
            $this->db->where('user_id', $id);
            $this->db->update('users_tbl', $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $response['growl'] = 'error';
                $response['msg'] = 'Unable to process request.';
            }
            else
            {
                $response['growl'] = 'success';
                if($status == 'activate'){
	        		$response['msg'] = 'Successfully updated user status to ACTIVE.';
	        	}elseif($status == 'inactivate'){
	        		$response['msg'] = 'Successfully updated user status to INACTIVE.';
	        	}elseif($status == 'delete'){
	        		$response['msg'] = 'Successfully deleted user in list.';
	        	}
            }
        }

        return $response;
	}

	public function update_user_info($data, $id){
		$response = array();
		if(!empty($data)){
            $this->db->trans_start();
            $this->db->where('user_id', $id);
            $this->db->update('users_tbl', $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $response['growl'] = 'error';
                $response['msg'] = 'Unable to process request.';
            }
            else
            {
                $response['growl'] = 'success';
                $response['msg'] = 'Successfully updated user information.';
            }
		}

		return $response;
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
		$result = $this->db->query("SELECT * FROM users_tbl WHERE user_id = '$id' LIMIT 1;");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function get_active_feeds(){
		$result = $this->db->query("CALL get_ActiveFeeds();");
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

	public function get_feed_sections(){
		$result = $this->db->query("SELECT * FROM lk_feed_section ORDER BY description ASC;");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function get_feed_positions(){
		$result = $this->db->query("SELECT * FROM lk_feed_position ORDER BY description ASC;");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function create_newsfeed($data){
		$title = $data['feedTitle'];
		$content = $data['feedContent'];
		$section = $data['feedSection'];
		$position = $data['feedPosition'];
		$stat = !isset($data['news_stat']) ? 0 : 1;
		$createdBy = $_SESSION['user']['username'];

		$result = $this->db->query("CALL add_newNewsfeed('$title', '$content', '$section', '$position', '$stat', '$createdBy')");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function delete_newsfeed($id){
       	$response = array();
        if(isset($id))
        {	
    		$data = array(
				'n_status' => 2,
				'updated_by' => $_SESSION['user']['username'],
				'date_update' => date('o-m-d h:i:s')
			);

            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->update('newsfeeds_tbl', $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $response['growl'] = 'error';
                $response['msg'] = 'Unable to process request.';
            }
            else
            {
                $response['growl'] = 'success';
	        	$response['msg'] = 'Successfully deleted newsfeed in list.';
            }
        }

        return $response;
	}

	public function get_newsfeed_info($id){
		$result = $this->db->query("SELECT * FROM newsfeeds_tbl WHERE id = '$id' LIMIT 1;");
        $output = array();
        if ($result->num_rows() > 0){
            $output = $result->result_array();
        }else{
            $output = array();
        }

        return $output;
	}

	public function update_newsfeed_info($data, $id){
		$response = array();
		if(!empty($data)){
            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->update('newsfeeds_tbl', $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $response['growl'] = 'error';
                $response['msg'] = 'Unable to process request.';
            }
            else
            {
                $response['growl'] = 'success';
                $response['msg'] = 'Successfully updated newsfeed deatils.';
            }
		}

		$rdata = array( '0' => $response);

		return $rdata;
	}

	public function add_user_logs($u_action){
		$ip_address = getHostByName(php_uname('n'));
    	$_data = array(
                'user_id' => $_SESSION['user']['user_id'],
                'ip_address' => $ip_address,
                'action' => $u_action,
                'datetime' => date('o-m-d h:i:s'));
        $this->db->insert('user_login_logs', $_data);
	}

    public function get_all_users(){
        $result = $this->db->query("SELECT user_id AS id, CONCAT(user_lname, ', ', user_fname, ' ( ', username, ')' ) AS description FROM users_tbl WHERE user_id <> 1 ORDER BY username ASC;");
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