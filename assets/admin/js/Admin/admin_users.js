var users = (function(){
	var getActiveUsers = function(){
	    $('#userDatatable').DataTable( {
			"ajax": {
				"url" : "../AdminSvc/Admin_ajaxrequests/db_request?do=get_active_users",
				"type" : 'POST',
				"data" : {
					action : 'get_active_users'
				}
			},
			"columns": [
			    { "data": "username" },
			    { "data": "user_fname" },
			    { "data": "user_lname" },
			    { "data": "user_role" },
			    { 
			    	"data": "user_id",
			    	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
	            		$(nTd).html('<a data-id="'+oData.user_id+'" id="view_userInfo" class="mouse-over btn btn-md btn-info"><i class="fa fa-eye fa-fw"></i> View</a>&nbsp;&nbsp;<a data-id="'+oData.user_id+'" id="delete_userInfo" class="mouse-over btn btn-md btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>').on('click', 'a', function(){
		            			var link = $(this).attr('id');

		            			switch(link){
		            				case 'view_userInfo' :
					            			$('#addNewUserModal').modal('show');
					            			$("#addNewUserForm").find('input[name="action"]').val('update_user_info');
					            			$('#myModalLabel').find('span').html('Update User Details');
					            			showUpdateBtn();
										    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=get_user_info', { 'action': 'get_user_info', 'id' : oData.user_id}, function(data) {
										        var form = $('#addNewUserForm');
										        $.each(JSON.parse(data), function(k,v){
													form.find('input[name="username"]').val(v.username);
													form.find('input[name="fname"]').val(v.user_fname);
													form.find('input[name="lname"]').val(v.user_lname);
													form.find('input[name="password"]').val(v.user_password);
													form.find('select[name="role"]').val(v.user_role);
													form.find('input[name="user_id"]').val(v.user_id);

													if(v.user_status == 1){
														$('#confirmInactivateUser').removeClass('hide');
														$('#confirmActivateUser').addClass('hide');
													}else{
														$('#confirmInactivateUser').addClass('hide');
														$('#confirmActivateUser').removeClass('hide');
													}
										        });
										    });
										    break;
									case 'delete_userInfo' :
										    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=delete_user', { 'action': 'delete_user', 'id' : oData.user_id }, function(data) {
										    		var data = JSON.parse(data);
										    		if((data.growl) == 'success'){
											            $('#userDatatable').DataTable().ajax.reload();
											            $.growl.notice({ message: data.msg, size: 'medium', location: 'br'});
										    		}else{
											            $('#userDatatable').DataTable().ajax.reload();
											            $.growl.error({ message: data.msg, size: 'medium', location: 'br'});
										    		}
										    });
											break;
		            			}
	            		});
			        },
			        "sortable": false,
		        	"searchable": false
				}
			],
			"order": [[0, 'asc']]
		});
	};

	var submitForm = function(link){
		$.ajax({
	        url: link,
	        type: 'POST',
	        data: $('#addNewUserForm').serialize(),
	        dataType: "json",
	        error : function(xhr, ajaxOptions, thrownError) {
				$.growl.error({ message: xhr.status + '<br>' + thrownError, size: 'medium', location: 'br'});
	        },
	        beforeSend: function(){
	            //confirm("Are you sure you want to continue deleting this letter?");
	        },
	        success: function(json) {
	        	if((json.growl) == 'success'){
	        		$.growl.notice({ message: json.msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: json.msg, size: 'medium', location: 'br'});
	        	}
	            $('#addNewUserModal').modal('hide');
	            $('#userDatatable').DataTable().ajax.reload();
	        }
	    });
	};

	var validateForm = function(){
		var form = $('#addNewUserForm');

		if((form.find('input[name="lname"]').val() == '') || (form.find('input[name="fname"]').val() == '') || (form.find('input[name="password"]').val() == '') || (form.find('input[name="username"]').val() == '') || (form.find('select[name="role"]').val() == '')){
			return false;
		}else{
			return true;
		}
	};

	var getRoles = function(){
	    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=get_user_roles', { 'action': 'get_user_roles'}, function(data) {
	        $('#addNewUserForm').find('select[name="role"]').append('<option value="" selected>-- Select Role --</option>');
	        $.each(JSON.parse(data), function(k,v){
				$('#addNewUserForm').find('select[name="role"]').append('<option value="'+v.id+'">'+v.description+'</option>');
	        });
	    });
	};

	var showUpdateBtn = function(){
		$('#confirmAddUser').addClass('hide');
		$('#confirmInactivateUser').removeClass('hide');
		$('#confirmUpdateUser').removeClass('hide');
	};

	var showAddBtn = function(){
		$('#confirmAddUser').removeClass('hide');
		$('#confirmInactivateUser').addClass('hide');
		$('#confirmActivateUser').addClass('hide');
		$('#confirmUpdateUser').addClass('hide');
	};

	var resetModalInfo = function(){
		$('#myModalLabel').find('span').html('Add New User');
		$("#addNewUserForm")[0].reset();
	};

	$('#add-new-user').on('click', function(){
		$('#addNewUserModal').modal('show');
		$("#addNewUserForm").find('input[name="action"]').val('add_new_user');
	});

	$('#cancelAddUser').on('click', function(){
		$('#addNewUserModal').modal('hide');
	});

	$('#addNewUserModal').on('hide.bs.modal', function(){
		$("#addNewUserForm")[0].reset();
	}).on('hidden.bs.modal', function(){
		resetModalInfo();
		showAddBtn();
	});

	$('#confirmActivateUser').on('click', function(){
	    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=activate_user', { 'action': 'activate_user', 'id' : $('#addNewUserForm').find('input[name="user_id"]').val() }, function(data) {
	    		var data = JSON.parse(data);
	    		if((data.growl) == 'success'){
		            $('#addNewUserModal').modal('hide');
		            $('#userDatatable').DataTable().ajax.reload();
		            $.growl.notice({ message: data.msg, size: 'medium', location: 'br'});
	    		}else{
	    			$('#addNewUserModal').modal('hide');
		            $('#userDatatable').DataTable().ajax.reload();
		            $.growl.error({ message: data.msg, size: 'medium', location: 'br'});
	    		}
	    });
	});

	$('#confirmInactivateUser').on('click', function(){
	    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=inactivate_user', { 'action': 'inactivate_user', 'id' : $('#addNewUserForm').find('input[name="user_id"]').val() }, function(data) {
	    		var data = JSON.parse(data);
	    		if((data.growl) == 'success'){
		            $('#addNewUserModal').modal('hide');
		            $('#userDatatable').DataTable().ajax.reload();
		            $.growl.notice({ message: data.msg, size: 'medium', location: 'br'});
	    		}else{
	    			$('#addNewUserModal').modal('hide');
		            $('#userDatatable').DataTable().ajax.reload();
		            $.growl.error({ message: data.msg, size: 'medium', location: 'br'});
	    		}
	    });
	});


	$('#confirmAddUser').on('click', function(){
		if(validateForm() == true){
			submitForm('../AdminSvc/Admin_ajaxrequests/db_request?do=add_new_user');
		}else{
			$.growl.error({ message: "<i class='fa fa-times'></i> Please check if there are fields that are empty.", size: 'medium', location: 'br'});
		}
	});

	$('#confirmUpdateUser').on('click', function(){
		if(validateForm() == true){
			submitForm('../AdminSvc/Admin_ajaxrequests/db_request?do=update_user_info');
		}else{
			$.growl.error({ message: "<i class='fa fa-times'></i> Please check if there are fields that are empty.", size: 'medium', location: 'br'});
		}
	});

	$('#refresh-table').on('click', function(){
		$('#userDatatable').DataTable().ajax.reload();
	});



	return{
		Build : function(){
			getActiveUsers();
			getRoles();
		},
		Refresh : function(){
			$("#addNewUserForm")[0].reset();
		}
	};
})();

$(document).ready(function(){
	users.Build();
});