var getGalleryAlbums = (function(){
	var getActiveGalleries = function(){
		$.post('./_Public/db_request?do=get_gallery_albums', { 'action': 'get_gallery_albums'}, function(data) {
			var size = JSON.parse(data).length;
			if(size > 0){
				$('#active_galleries').html('');
				$.each(JSON.parse(data), function(k, v){
					$('#active_galleries').append(
						'<div class="col-lg-4 mouse-over view-album" data-album-id="'+v.album_id+'" data-album-title="'+ v.child + ' - ' + v.parent +'" >'+
                    		'<div class="panel panel-success">'+
                        		'<div class="panel-heading">'+
                        			'<p class="panel-content"><b style="font-size: 20px;">'+v.child.toUpperCase()+'</b><br><small>'+v.parent+'</small></p>'+
                        		'</div>'+
	                        	'<div class="panel-body">'+
	                        		'<img src="'+v.img_url+'" />'+
	                        	'</div>'+
                    		'</div>'+
                		'</div>'
					);
				});

				$('.view-album').on('click', function(){
					var id = $(this);
					$('#album-title').html(id.data('albumTitle'));
					$('#album-contents').html('');
					$('#viewAlbum').modal('show');
					
					$.post('./_Public/db_request?do=get_album', { 'action': 'get_album', 'id' : id.data('albumId')}, function(data) {
						var size = JSON.parse(data).length;
						if(size > 0){
							$.each(JSON.parse(data), function(k, v){
								$('#album-contents').append(
									'<div class="col-xs-3">'+
										'<div class="panel panel-default">'+
											'<div class="panel-body">'+
												'<a href="'+v.img_url+'" data-lightbox="roadtrip" data-title="'+v.img_title+' : '+ v.img_desc +'">'+
													'<img src="'+v.img_url+'" class="img-preview"/>'+
													'<p class="img-title">'+v.img_title+'</p>'+
												'</a>'+
											'</div>'+
										'</div>'+
									'</div>');
							});
						}
					});
				});
			}
		});
	}

	return {
		Build : function(){
			getActiveGalleries();
		}
	}
})();

$(document).ready(function(){
	getGalleryAlbums.Build();
});