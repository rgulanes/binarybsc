<?php

class Admin_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

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

	public function create_newsfeed($data, $files){
        if(!empty($data)){
            $fpath = '';
            if(!empty($files)){
                $f_name = 'N_'.date('mdo');

                $this->db->select('description');
                $query = $this->db->get_where('lk_feed_section', array('id' => $data['feedSection']));
                $output = $query->row_array();

                $f_path = "./files/newsfeeds/" . strtolower($output['description']);
                $path = "./files/newsfeeds/" . strtolower($output['description']) .'/'. $f_name ;

                if(!is_dir($path)) //create the folder if it's not already exists
                {
                  mkdir($path,0744,TRUE);
                  file_put_contents( $f_path.'/index.html' , '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>' );
                }

                $new_name = date('mdo_his_').preg_replace('/\s+/', '_', str_replace("#", "", $files['n_img_upload']['name']));

                $config['upload_path']          = $path;
                $config['allowed_types']        = '*';
                $config['max_size']             = '10000'; //update to 80000
                $config['overwrite']            = FALSE;
                $config['remove_spaces']        = TRUE;
                $config['file_name']            = $new_name;

                $img_status = '';
                $img_msg = '';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('n_img_upload'))
                {
                    if(null !== $this->upload->display_errors()){
                        $img_status = "error";
                        $img_msg = $this->upload->display_errors();
                    }
                }
                else
                {
                    $img_status = "success";
                    $img_msg = "File successfully uploaded";
                }

                $fpath = $path.'/'. $new_name;
            }else{
                $fpath = '';
            }

    		$title = $data['feedTitle'];
    		$content = $data['feedContent'];
    		$section = $data['feedSection'];
    		$position = $data['feedPosition'];
    		$stat = !isset($data['news_stat']) ? 0 : 1;
    		$createdBy = $_SESSION['user']['username'];
            $img_url = $fpath;

    		$result = $this->db->query("CALL add_newNewsfeed('$title', '$content', '$section', '$position', '$stat' , '$img_url', '$createdBy')");
            $output = array();
            if ($result->num_rows() > 0){
                $output = $result->result_array();
            }else{
                $output = array();
            }

            return $output;
        }
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

	public function update_newsfeed_info($data, $id, $files){
		$response = array();
		if(!empty($data)){
            $result = $this->db->query('SELECT is_AllowedFeeds('.$data['n_section'].','.$data['n_position'].') AS is_allowed');
            if ($result->num_rows() > 0){
                $cdata = $result->result_array();

                if($cdata[0]['is_allowed'] <= 0){
                    $response['growl'] = 'error';
                    $response['msg'] = 'Allowable items to be posted for selected position and section has exceeded its value.';
                }else{
                    $fpath = '';
                    if(!empty($files)){
                        $f_name = 'N_'.date('mdo');

                        $this->db->select('description');
                        $query = $this->db->get_where('lk_feed_section', array('id' => $data['n_section']));
                        $output = $query->row_array();

                        $f_path = "./files/newsfeeds/" . strtolower($output['description']);
                        $path = "./files/newsfeeds/" . strtolower($output['description']) .'/'. $f_name ;

                        if(!is_dir($path)) //create the folder if it's not already exists
                        {
                          mkdir($path,0744,TRUE);
                          file_put_contents( $f_path.'/index.html' , '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>' );
                        }

                        $new_name = date('mdo_his_').preg_replace('/\s+/', '_', str_replace("#", "", $files['n_img_upload']['name']));

                        $config['upload_path']          = $path;
                        $config['allowed_types']        = '*';
                        $config['max_size']             = '10000'; //update to 80000
                        $config['overwrite']            = FALSE;
                        $config['remove_spaces']        = TRUE;
                        $config['file_name']            = $new_name;

                        $img_status = '';
                        $img_msg = '';

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ( ! $this->upload->do_upload('n_img_upload'))
                        {
                            if(null !== $this->upload->display_errors()){
                                $img_status = "error";
                                $img_msg = $this->upload->display_errors();
                            }
                        }
                        else
                        {
                            $img_status = "success";
                            $img_msg = "File successfully uploaded";
                        }

                        $fpath = $path.'/'. $new_name;

                        if($files['n_img_upload']['name'] !=  ''){ $data['n_image_url'] = $fpath ; } 
                    }else{
                        $fpath = '';
                    }

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
            }

		$rdata = array( '0' => $response);

		return $rdata;
	   }
    }

	public function add_user_logs($u_action){
		$ip_address = getHostByName(php_uname('n'));
    	$_data = array(
                'user_id' => $_SESSION['user']['user_id'],
                'ip_address' => $ip_address,
                'action' => $u_action,
                'datetime' => date('o-m-d H:i:s'));
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

    public function get_tree_nodes($desc){
        $result = $this->db->query("CALL get_TreeNodes('$desc');");
        mysqli_next_result($this->db->conn_id);
        $data = array();
        if ($result->num_rows() > 0){
            foreach ($result->result_array() as $k => $v) {
                if($v['id'] != null){
                    $data[$k] = array(
                        'id' => $v['id'],
                        'text' => $v['text'],
                        'parent' => $v['parent'],
                        'icon' => $v['icon'],
                        'data' => array(
                            'node_id' => $v['node_id'],
                            'created_by' => $v['created_by'],
                            'datetime' => $v['datetime'],
                            'tree_id' => $v['tree_id']
                        )
                    );
                }
            }
        }else{
            $data = array();
        }

        return $data;
    }

    public function create_new_album($data){
        $response = array();

        $path = "";
        $f_path = "";

        if($data['parent_node'] == NULL || $data['parent_node'] == ''){
            $path = "./files/galleries/" . preg_replace('/\s+/', '_', $data['node_desc']);
            $f_path = "./files/galleries/" . preg_replace('/\s+/', '_', $data['node_desc']);
        }else{
            $this->db->select('node_desc');
            $query = $this->db->get_where('tree_node', array('node_id' => $data['parent_node']));
            $output = $query->row_array();

            $path = "./files/galleries/" . preg_replace('/\s+/', '_', $output['node_desc']) . '/' . preg_replace('/\s+/', '_', $data['node_desc']);
            $f_path = "./files/galleries/" . preg_replace('/\s+/', '_', $output['node_desc']) . '/' . preg_replace('/\s+/', '_', $data['node_desc']);
        }

        if(!is_dir($path)) //create the folder if it's not already exists
        {
          mkdir($path,0744,TRUE);
          file_put_contents( $f_path.'/index.html' , '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>' );
        }

        $data['directory'] = $path;
        
        $this->db->trans_start();
        $this->db->insert('tree_node', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $response['growl'] = 'error';
            $response['msg'] = 'Unable to process request.';
        }
        else
        {
            $response['growl'] = 'success';
            $response['msg'] = 'Successfully added new album.';
        }

        $rdata = array( '0' => $response);

        return $rdata;
    }

    public function update_album_info($data, $id){
        $response = array();

        $this->db->select('directory');
        $this->db->select('node_desc');
        $query = $this->db->get_where('tree_node', array('node_id' => $id));
        $output = $query->row_array();

        if(isset($data['node_desc'])){
            if($output['node_desc'] != $data['node_desc']){
                $old_path = $output['directory'];
                $new_path = str_replace(preg_replace('/\s+/', '_', $output['node_desc']) , preg_replace('/\s+/', '_', $data['node_desc']), $output['directory']);

                rename($old_path, $new_path);

                $data['directory'] = $new_path;
                
                $this->db->trans_start();
                $this->db->where('node_id', $id);
                $this->db->update('tree_node', $data);
                $this->db->trans_complete();
            }
        }else{

            $this->db->trans_start();
            $this->db->where('node_id', $id);
            $this->db->update('tree_node', $data);
            $this->db->trans_complete();
        }

        if ($this->db->trans_status() === FALSE)
        {
            $response['growl'] = 'error';
            $response['msg'] = 'Unable to process request.';
        }
        else
        {
            $response['growl'] = 'success';
            $response['msg'] = 'Successfully updated album details.';
        }

        $rdata = array( '0' => $response);

        return $rdata;
    }

    public function add_new_photo($data, $file){
        $response = array();

        $path = "";
        $f_path = "";

        $this->db->select('directory');
        $query = $this->db->get_where('tree_node', array('node_id' => $data['album_id']));
        $output = $query->row_array();

        $path = $output['directory'];
        $new_name = date('mdo_his_').preg_replace('/\s+/', '_', str_replace("#", "", $file['album_img']['name']));

        $config['upload_path']          = $path;
        $config['allowed_types']        = '*';
        $config['max_size']             = '10000'; //update to 80000
        $config['overwrite']            = FALSE;
        $config['remove_spaces']        = TRUE;
        $config['file_name']            = $new_name;

        $img_status = '';
        $img_msg = '';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('album_img'))
        {
            if(null !== $this->upload->display_errors()){
                $img_status = "error";
                $img_msg = $this->upload->display_errors();
            }
        }
        else
        {
            $img_status = "success";
            $img_msg = "File successfully uploaded";
        }

        $fpath = $path.'/'. $new_name;

        $data = array(
            'album_id' => $data['album_id'],
            'img_title' => $data['photo_title'],
            'img_desc' => $data['photo_desc'],
            'img_url' => $fpath,
            'img_status' => !isset($data['img_status']) ? 0 : 1,
            'is_deleted' => 0,
            'created_by' => $_SESSION['user']['username'],
            'date_create' => date('o-m-d H:i:s'),
            'updated_by' => $_SESSION['user']['username'],
            'date_update' => date('o-m-d H:i:s')
        );
        
        $this->db->trans_start();
        $this->db->insert('photo_tbl', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $response['growl'] = 'error';
            $response['msg'] = 'Unable to process request.';
        }
        else
        {
            $response['growl'] = 'success';
            $response['msg'] = 'Successfully added new photo to album.';
        }

        $rdata = array( '0' => $response);

        return $rdata;
    }

    public function get_active_photos($id){
        $result = $this->db->query("CALL get_ActivePhoto('$id');");
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

    public function update_photo_info($data, $file){
        $response = array();

        $path = "";
        $f_path = "";

        if(!empty($file)){
            $this->db->select('directory');
            $query = $this->db->get_where('tree_node', array('node_id' => $data['album_id']));
            $output = $query->row_array();

            $path = $output['directory'];
            $new_name = date('mdo_his_').preg_replace('/\s+/', '_', str_replace("#", "",  $file['album_img']['name']));

            $config['upload_path']          = $path;
            $config['allowed_types']        = '*';
            $config['max_size']             = '10000'; //update to 80000
            $config['overwrite']            = FALSE;
            $config['remove_spaces']        = TRUE;
            $config['file_name']            = $new_name;

            $img_status = '';
            $img_msg = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('album_img'))
            {
                if(null !== $this->upload->display_errors()){
                    $img_status = "error";
                    $img_msg = $this->upload->display_errors();
                }
            }
            else
            {
                $img_status = "success";
                $img_msg = "File successfully uploaded";
            }

            $fpath = $path.'/'. $new_name;
        }else{
            $this->db->select('img_url');
            $query = $this->db->get_where('photo_tbl', array('photo_id' => $data['photo_id']));
            $output = $query->row_array();

            $f_path = $output['img_url'];
        }

        $_data = array(
            'img_title' => $data['photo_title'],
            'img_desc' => $data['photo_desc'],
            'img_url' => $fpath,
            'img_status' => !isset($data['img_status']) ? 0 : 1,
            'updated_by' => $_SESSION['user']['username'],
            'date_update' => date('o-m-d H:i:s')
        );
        
        $this->db->trans_start();
        $this->db->where('photo_id', $data['photo_id']);
        $this->db->update('photo_tbl', $_data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $response['growl'] = 'error';
            $response['msg'] = 'Unable to process request.';
        }
        else
        {
            $response['growl'] = 'success';
            $response['msg'] = 'Successfully updated photo information.';
        }

        $rdata = array( '0' => $response);

        return $rdata;
    }

    public function delete_photo($data, $id){
        $response = array();

        $this->db->trans_start();
        $this->db->where('photo_id', $id);
        $this->db->update('photo_tbl', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $response['growl'] = 'error';
            $response['msg'] = 'Unable to process request.';
        }
        else
        {
            $response['growl'] = 'success';
            $response['msg'] = 'Successfully updated album details.';
        }

        $rdata = array( '0' => $response);

        return $rdata;
    }
}
?>