$(document).ready(function(){
	$('#submitFeedback').on('click', function(){
		var ajaxData = $('#feebackForm').serialize() + '&action=send_feedback';

		$.post('./_Public/db_request?do=send_feedback', ajaxData , function(data){
			var json = JSON.parse(data);
			if(json.growl == 'success'){
				$('#feebackForm')[0].reset();
				confirm(json.msg);
			}else{
				confirm(json.msg);
			}
			
		});
	});
});