var userAccess = (function(){
	var getUserAccess = $('input[data-id="user_access"]').val();

	var hideNodes = function(){
		switch(getUserAccess){
				case '3' :
						$('#app_users').remove();
						$('#app_reports').remove();
						break;
				case '4' :
						$('#app_messsages').remove();
						$('#app_reports').remove();
						$('#app_users').remove();
						break;
				default :
						break;
		}
	}

	return {
		Build : function(){
			hideNodes();
		}
	}
})();

$(document).ready(function(){
	userAccess.Build();
});