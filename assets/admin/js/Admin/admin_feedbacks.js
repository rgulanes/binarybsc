$(document).ready(function(){
	$('#clickToViewMsg').on('click', function(){
			$('#viewMessages').modal('show');
				var emailTree = $('#email-tree');

				var _action = 'get_active_messages';

				if ( $.fn.DataTable.isDataTable('#emailReceivedTable') ) {
				  $('#emailReceivedTable').DataTable().destroy();
				}

				$('#emailReceivedTable tbody').empty();

				var emailTable = $('#emailReceivedTable').DataTable({
					"ajax": {
							"url" : "../AdminSvc/Admin_ajaxrequests/db_request?do=get_active_messages",
							"type" : 'POST',
							"data" : function ( d ) {
						        d.action = _action;
						    }
					},
					"columns" : [
							{ 
								"data": "feedback_id",
								"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

									var btn = '';
									if(oData.is_read == 1){
										btn = '<a class="mouse-over view-message" data-id="'+oData.feedback_id+'"><i class="fa fa-envelope-open fa-lg"></i></a>';
									}else{
										btn = '<a class="mouse-over view-message" data-id="'+oData.feedback_id+'"><i class="fa fa-envelope fa-lg"></i></a>';
									}

									$(nTd).html('<center>'+btn+'</center>').on('click', 'a.view-message', function(){

										$.post('../AdminSvc/Admin_ajaxrequests/db_request?do=read_message', { action : 'update_message_info', msg_id : oData.feedback_id , msg_action : 'read_message' }, function(data){
											console.log(data);
											emailTable.ajax.reload();
										});

										$('#emailTree-content').removeClass('hide');
										$('#emailTree-inbox').addClass('hide');

										$('#emailTree-content').find('label.sender').html(oData.sender);
										$('#emailTree-content').find('label.sender_email').html(oData.email_address);
										$('#emailTree-content').find('label.sender_timestamp').html(oData.timestamp);
										$('#emailTree-content').find('textarea[name="sender_feedback"]').val(oData.feedback);

										$('#emailTree-content').find('input[name="feedback_id"]').val(oData.feedback_id);
										
									});
								},
								"sortable" : false,
								"searchable" : false,
								"width" : '10%'
							},
						    { "data": "email_address" },
						    { "data": "timestamp" }
						],
					"order": [[1, 'asc']]
				});

				$('#emailTree-content').find('a.return-inbox').on('click', function(){
					$('#emailTree-inbox').removeClass('hide');
					$('#emailTree-content').addClass('hide');
					emailTable.ajax.reload();
				});

				$('#emailTree-content').find('a.archive-message').on('click', function(){
					$.post('../AdminSvc/Admin_ajaxrequests/db_request?do=archive_message', { action : 'update_message_info', msg_id : $('#emailTree-content').find('input[name="feedback_id"]').val() , msg_action : 'archive_message' }, function(data){
						$('#emailTree-inbox').removeClass('hide');
						$('#emailTree-content').addClass('hide');
						emailTable.ajax.reload();
					});
				});

				$('#emailTree-content').find('a.delete-message').on('click', function(){
					$.post('../AdminSvc/Admin_ajaxrequests/db_request?do=delete_message', { action : 'update_message_info', msg_id : $('#emailTree-content').find('input[name="feedback_id"]').val() , msg_action : 'delete_message' }, function(data){
						$('#emailTree-inbox').removeClass('hide');
						$('#emailTree-content').addClass('hide');
						emailTable.ajax.reload();
					});
				});

				$('#emailTree-content').find('a.restore-message').on('click', function(){
					$.post('../AdminSvc/Admin_ajaxrequests/db_request?do=restore_message', { action : 'update_message_info', msg_id : $('#emailTree-content').find('input[name="feedback_id"]').val() , msg_action : 'restore_message' }, function(data){
						$('#emailTree-inbox').removeClass('hide');
						$('#emailTree-content').addClass('hide');
						emailTable.ajax.reload();
					});
				});

				$('#emailTree-content').find('a.unarchive-message').on('click', function(){
					$.post('../AdminSvc/Admin_ajaxrequests/db_request?do=unarchive_message', { action : 'update_message_info', msg_id : $('#emailTree-content').find('input[name="feedback_id"]').val() , msg_action : 'unarchive_message' }, function(data){
						$('#emailTree-inbox').removeClass('hide');
						$('#emailTree-content').addClass('hide');
						emailTable.ajax.reload();
					});
				});

				emailTree.on("changed.jstree", function (e, data) {
					if(data.selected.length) {
						switch(data.instance.get_node(data.selected[0]).id){
							case 'email-inbox' :
								$('#emailTree-inbox').removeClass('hide');
								$('#emailTree-content').addClass('hide');
								$('#emailTree-content').find('a.restore-message').addClass('hide');
								$('#emailTree-content').find('a.delete-message').removeClass('hide');
								$('#emailTree-content').find('a.archive-message').removeClass('hide');
								$('#emailTree-content').find('a.unarchive-message').addClass('hide');
								_action = 'get_active_messages';
								emailTable.ajax.url("../AdminSvc/Admin_ajaxrequests/db_request?do=get_active_messages").load();
								$.growl.notice({ message: 'Latest messages received. Messages synced successfully.', size: 'medium', location: 'br'});
								break;
							case 'email-archived' :
								$('#emailTree-inbox').removeClass('hide');
								$('#emailTree-content').addClass('hide');
								$('#emailTree-content').find('a.restore-message').addClass('hide');
								$('#emailTree-content').find('a.delete-message').removeClass('hide');
								$('#emailTree-content').find('a.unarchive-message').removeClass('hide');
								$('#emailTree-content').find('a.archive-message').addClass('hide');
								_action = 'get_archived_messages';
								emailTable.ajax.url("../AdminSvc/Admin_ajaxrequests/db_request?do=get_archived_messages").load();
								break;
							case 'email-trash' :
								$('#emailTree-inbox').removeClass('hide');
								$('#emailTree-content').addClass('hide');
								$('#emailTree-content').find('a.restore-message').removeClass('hide');
								$('#emailTree-content').find('a.delete-message').addClass('hide');
								$('#emailTree-content').find('a.archive-message').addClass('hide');
								$('#emailTree-content').find('a.unarchive-message').addClass('hide');
								_action = 'get_deleted_messages';
								emailTable.ajax.url("../AdminSvc/Admin_ajaxrequests/db_request?do=get_deleted_messages").load();
								break;
							case 'email-sync' :
								emailTree.jstree("select_node", "#email-inbox");
								emailTree.jstree("deselect_node", "#email-sync");
								break;
						}
					}
				}).bind('ready.jstree', function(){
					emailTree.jstree("select_node", "#email-inbox");
				}).jstree({ 
					'core' : {
						    'data' : [
							       { "id" : "email-inbox", "parent" : "#", "text" : "Inbox", "icon" : "fa fa-inbox"},
							       { "id" : "email-archived", "parent" : "#", "text" : "Archived", "icon" : "fa fa-archive"},
							       { "id" : "email-trash", "parent" : "#", "text" : "Trash", "icon" : "fa fa-trash-o"},
							       { "id" : "email-sync", "parent" : "#", "text" : "Sync", "icon" : "fa fa-retweet"},
						    ]
						}
				});
	});
});