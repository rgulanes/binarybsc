var getFeeds = (function(){
	var topFeeds = function(){
		$.post('./_Public/db_request?do=get_newsfeeds', { 'action': 'get_newsfeeds', 'section' : 'Home', 'position' : 'Top'}, function(data) {
			var size = JSON.parse(data).length;
			if(size > 0){
				$('#top_newsfeed').html(''); 
				$.each(JSON.parse(data), function(k, v){
					var columns = '';

					switch(size){
						case 1 : columns = 'col-md-12 col-sm-12'; break;
						case 2 : columns = 'col-md-6 col-sm-6'; break;
						case 3 : columns = 'col-md-4 col-sm-4'; break;
					}

					if(v.n_image_url != '' || v.n_image_url != null){
						$('#top_newsfeed').append('<div class="'+columns+'"><img src="'+v.n_image_url+'" class="img-responsive" style="display: inline-block; min-width: 300px; height: 210px;" height="210px"><h3>'+v.n_title+'</h3><div style="font-size: 12px;">'+v.n_content+'</div style="font-size: 10px; line-height: 2px;"><br><small class="pull-right">By '+v.created_by+' on '+v.date_create+'</small></div>');
					}else{
						$('#top_newsfeed').append('<div class="'+columns+'"><h3>'+v.n_title+'</h3><div style="font-size: 12px;">'+v.n_content+'</div style="font-size: 10px; line-height: 2px;"><br><small class="pull-right">By '+v.created_by+' on '+v.date_create+'</small></div>');
					}

				});
			}
		});
	}

	var middleFeeds = function(){
		$.post('./_Public/db_request?do=get_newsfeeds', { 'action': 'get_newsfeeds', 'section' : 'Home', 'position' : 'Middle'}, function(data) {
			var size = JSON.parse(data).length;
			if(size > 0){
				$('#middle_newsfeed').html(''); 
				$.each(JSON.parse(data), function(k, v){
					var columns = 'col-md-8 col-sm-8';

					switch(size){
						case 1 : columns = 'col-md-12 col-sm-12'; break;
						case 2 : columns = 'col-md-6 col-sm-6'; break;
						case 3 : columns = 'col-md-4 col-sm-4'; break;
					}

					if(v.n_image_url != '' || v.n_image_url != null){
						$('#middle_newsfeed').append('<div class="'+columns+'"><img src="'+v.n_image_url+'" class="img-responsive" style="display: inline-block; min-width: 300px; height: 210px;" height="210px"><h3>'+v.n_title+'</h3><div style="font-size: 12px;">'+v.n_content+'</div style="font-size: 10px; line-height: 2px;"><br><small class="pull-right">By '+v.created_by+' on '+v.date_create+'</small></div>');
					}else{
						$('#middle_newsfeed').append('<div class="'+columns+'"><h3>'+v.n_title+'</h3><div style="font-size: 12px;">'+v.n_content+'</div style="font-size: 10px; line-height: 2px;"><br><small class="pull-right">By '+v.created_by+' on '+v.date_create+'</small></div>');
					}
				});
			}
		});
	}

	var bottomFeeds = function(){
		$.post('./_Public/db_request?do=get_newsfeeds', { 'action': 'get_newsfeeds', 'section' : 'Home', 'position' : 'Bottom'}, function(data) {
			var size = JSON.parse(data).length;
			if(size > 0){
				$('#bottom_newsfeed').html(''); 
				$.each(JSON.parse(data), function(k, v){
					var columns = '';

					switch(size){
						case 1 : columns = 'col-md-12 col-sm-12'; break;
						case 2 : columns = 'col-md-6 col-sm-6'; break;
						case 3 : columns = 'col-md-4 col-sm-4'; break;
					}

					if(v.n_image_url != '' || v.n_image_url != null){
						$('#bottom_newsfeed').append('<div class="'+columns+'"><img src="'+v.n_image_url+'" class="img-responsive" style="display: inline-block; min-width: 300px; height: 210px;" height="210px"><h3>'+v.n_title+'</h3><div style="font-size: 12px;">'+v.n_content+'</div style="font-size: 10px; line-height: 2px;"><br><small class="pull-right">By '+v.created_by+' on '+v.date_create+'</small></div>');
					}else{
						$('#bottom_newsfeed').append('<div class="'+columns+'"><h3>'+v.n_title+'</h3><div style="font-size: 12px;">'+v.n_content+'</div style="font-size: 10px; line-height: 2px;"><br><small class="pull-right">By '+v.created_by+' on '+v.date_create+'</small></div>');
					}
				});
			}
		});
	}

	return {
		Build : function(){
			topFeeds();
			middleFeeds();
			bottomFeeds();
		}
	}
})();

$(document).ready(function(){
	getFeeds.Build();
});