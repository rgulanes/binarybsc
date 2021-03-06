var newsfeeds = (function () {
	var getActiveFeeds = function () {
	    $('#feedDatatable').DataTable( {
			"ajax": {
				"url" : "../AdminSvc/Admin_ajaxrequests/db_request?do=get_active_feeds",
				"type" : 'POST',
				"data" : {
					action : 'get_active_feeds'
				}
			},
			"columns": [
			    { "data": "n_title", "width" : '30%' },
			    { "data": "section" },
			    { "data": "date_create" },
			    { "data": "status_desc" },
			    { 
			    	"data": "id",
			    	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
			    		$(nTd).html('<a data-id="'+oData.id+'" id="view_newsfeedInfo" class="mouse-over btn btn-md btn-info"><i class="fa fa-eye fa-fw"></i> View</a>&nbsp;&nbsp;<a data-id="'+oData.id+'" id="delete_newsfeedInfo" class="mouse-over btn btn-md btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>').on('click', 'a', function(){
			    				var link = $(this).attr('id');

			    				switch(link){
			    					case 'view_newsfeedInfo' :
			    						$('#addNewFeedModal').modal('show');
			    						showUpdateBtn();
				            			$("#addNewFeedForm").find('input[name="action"]').val('update_newsfeed_info');
				            			$("#addNewFeedForm").find('input[name="feed_id"]').val(oData.id);
				            			$('#myModalLabel').find('span').html('Update Newsfeed Details');
									    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=get_newsfeed_info', { 'action': 'get_newsfeed_info', 'id' : oData.id}, function(data) {
									        var form = $('#addNewFeedForm');
									        $.each(JSON.parse(data), function(k,v){
												form.find('input[name="feedTitle"]').val(v.n_title);
												$('#newsfeed-content').summernote('code',v.n_content);
												if(v.n_status == 1){
													form.find('input[name="news_stat"]').attr('checked', 'checked');
												}else{
													form.find('input[name="news_stat"]').removeAttr('checked');
												}

												var img_url = v.n_image_url;
												if(img_url == null || img_url == "" || img_url == " " ){
													$("#is_img").prop('checked', false);
													$("#is_imageNeeded").addClass('hide');
												    $("#is_imageNeeded").find('input[id="n_img_upload"]').attr('disabled', 'true');
												    $('#img_preview').html('');
												}else if(img_url != null || img_url != " " || img_url != ""){
													$("#is_img").prop('checked', true);
													$("#is_imageNeeded").removeClass('hide');
												    $("#is_imageNeeded").find('input[name="n_img_upload"]').removeAttr('disabled');
												    $('#img_preview').append('<a href=".'+img_url+'" data-lightbox="roadtrip" style="color: #5cb85c; cursor: pointer;"><i class="fa fa-file-image-o fa-2x"></i></a>');
												}else{
													$("#is_img").prop('checked', false);
													$("#is_imageNeeded").addClass('hide');
												    $("#is_imageNeeded").find('input[id="n_img_upload"]').attr('disabled', 'true');
												    $('#img_preview').html('');
												}
																								
												form.find('select[name="feedSection"]').val(v.n_section);
												form.find('select[name="feedPosition"]').val(v.n_position);
									        });
									    });
			    						break;
			    					case 'delete_newsfeedInfo' :
			    						$.post('../AdminSvc/Admin_ajaxrequests/db_request?do=delete_newsfeed', { 'action': 'delete_newsfeed', 'id' : oData.id }, function(data) {
									    		var data = JSON.parse(data);
									    		if((data.growl) == 'success'){
										            $('#feedDatatable').DataTable().ajax.reload();
										            $.growl.notice({ message: data.msg, size: 'medium', location: 'br'});
									    		}else{
										            $('#feedDatatable').DataTable().ajax.reload();
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

	var getFeedPositions = function(){
	    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=get_feed_positions', { 'action': 'get_feed_positions'}, function(data) {
	        $('#addNewFeedForm').find('select[name="feedPosition"]').append('<option value="" selected>-- Select Position --</option>');
	        $.each(JSON.parse(data), function(k,v){
				$('#addNewFeedForm').find('select[name="feedPosition"]').append('<option value="'+v.id+'">'+v.description+'</option>');
	        });
	    });
	};

	var getFeedSections = function(){
	    $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=get_feed_sections', { 'action': 'get_feed_sections'}, function(data) {
	        $('#addNewFeedForm').find('select[name="feedSection"]').append('<option value="" selected>-- Select Section --</option>');
	        $.each(JSON.parse(data), function(k,v){
				$('#addNewFeedForm').find('select[name="feedSection"]').append('<option value="'+v.id+'">'+v.description+'</option>');
	        });
	    });
	};

	var submitForm = function(link){
		var formData = new FormData($("#addNewFeedForm")[0]);
	    $.ajax({
	        url: link,
	        type: 'POST',
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        error : function(xhr, ajaxOptions, thrownError) {
	            $.growl.error({ message: xhr.status + '<br>' + thrownError, size: 'medium', location: 'br'});
	        },
	        success: function(json) {
	        	var data = JSON.parse(json);
	        	if(data[0].growl == 'success'){
	        		$.growl.notice({ message: data[0].msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: data[0].msg, size: 'medium', location: 'br'});
	        	}

	            $('#addNewFeedModal').modal('hide');
	            $('#feedDatatable').DataTable().ajax.reload();
	            document.getElementById("addNewFeedForm").reset();
	        }
	    });
	};

	$('#add-new-feed').on('click', function(){
		$('#addNewFeedModal').modal('show');
		$("#addNewFeedForm").find('input[name="action"]').val('create_newsfeed');
		$('input:checkbox').removeAttr('checked');
	});

	$('#cancelCreation').on('click', function(){
		$('#addNewFeedModal').modal('hide');
	});

	$('#confirmCreation').on('click', function(){
		submitForm('../AdminSvc/Admin_ajaxrequests/db_request?do=add_new_feed');
	});

	$('#confirmUpdate').on('click', function(){
		submitForm('../AdminSvc/Admin_ajaxrequests/db_request?do=update_newsfeed_info');
	});

	$('#refresh-table').on('click', function(){
		$('#feedDatatable').DataTable().ajax.reload();
	});

	$('#is_img').on('change', function(){
		if($("#is_img").is(':checked')){
		    $("#is_imageNeeded").removeClass('hide');
		    $("#is_imageNeeded").find('input[name="n_img_upload"]').removeAttr('disabled');
		}
		else{
		    $("#is_imageNeeded").addClass('hide');
		    $("#is_imageNeeded").find('input[name="n_img_upload"]').attr('disabled', 'true');
		}
	});

	var showUpdateBtn = function(){
		$('#confirmCreation').addClass('hide');
		$('#confirmUpdate').removeClass('hide');
	};

	var showAddBtn = function(){
		$('#confirmCreation').removeClass('hide');
		$('#confirmUpdate').addClass('hide');
	};

	var resetModalInfo = function(){
		$('#myModalLabel').find('span').html('Add New Feed');
		$("#addNewFeedForm")[0].reset();
		$('#newsfeed-content').summernote('reset');
		$("#addNewFeedForm").find('input[name="feed_id"]').val('');
	    $("#is_imageNeeded").addClass('hide');
	    $("#is_imageNeeded").find('input[name="n_img_upload"]').attr('disabled', 'true');
	    $('#img_preview').html('');
	};

	$('#addNewFeedModal').on('hide.bs.modal', function(){
		$("#addNewFeedForm")[0].reset();
	}).on('hidden.bs.modal', function(){
		resetModalInfo();
		showAddBtn();
	});

	$('#newsfeed-content').summernote({
		height: 150,
		focus: true,
		shortcuts: false,
		dialogsInBody: true
	});

	return{
		Build : function(){
			getActiveFeeds();
			getFeedPositions();
			getFeedSections();
		}
	};
})();



$(document).ready(function(){
	newsfeeds.Build();
});