var galleryTree = (function(){
	var album = { parent_id : '', tree_id : '', node_id : 0, node_desc : '', node_status : 1};

	var createTree = function(){
		var json = $.post('../AdminSvc/Admin_ajaxrequests/db_request?do=get_tree_nodes', { 'action': 'get_tree_nodes', 'desc' : 'Galleries'}, function(data) {
			var jsonData = JSON.parse(data);
			$('#gallery-tree').jstree({ 
				'core' : {
				    'data' : jsonData,
					'multiple' : false
		        },
		        "plugins" : [ "changed" ]
			});
		});
	};

	var openTree = function(){
		$('#gallery-tree').on('loaded.jstree', function() {
			$('#gallery-tree').jstree('open_all');
		});
	}

	var getNodeInfo = function(data){
		var nodeId = $('#gallery-tree').jstree("get_node", data);
		return nodeId;
	};

	var updateAlbumStatus = function(status){
		var ajaxdata = { 'action' : 'update_album_status', 'node_id' : album.node_id , 'node_status' : status };

		$.ajax({
	        url: '../AdminSvc/Admin_ajaxrequests/db_request?do=update_album_status',
	        type: 'POST',
	        data: ajaxdata,
	        dataType: "json",
	        error : function(xhr, ajaxOptions, thrownError) {
				$.growl.error({ message: xhr.status + '<br>' + thrownError, size: 'medium', location: 'br'});
	        },
	        success: function(json) {
	        	if((json[0].growl) == 'success'){
	        		$.growl.notice({ message: json[0].msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: json[0].msg, size: 'medium', location: 'br'});
	        	}
				$('#addNewAlbumModal').modal('hide');
				$('#addNewAlbumForm')[0].reset();
				$('#gallery-tree').jstree('refresh', false, true);
				$('#gallery-tree').jstree("destroy");
				galleryTree.Build();
	        }
	    });
	}

	var saveAlbum = function(link){
		$.ajax({
	        url: link,
	        type: 'POST',
	        data: $('#addNewAlbumForm').serialize() + '&parent_node=' + album.parent_id + '&node_id=' + album.node_id,
	        dataType: "json",
	        error : function(xhr, ajaxOptions, thrownError) {
				$.growl.error({ message: xhr.status + '<br>' + thrownError, size: 'medium', location: 'br'});
	        },
	        success: function(json) {
	        	if((json[0].growl) == 'success'){
	        		$.growl.notice({ message: json[0].msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: json[0].msg, size: 'medium', location: 'br'});
	        	}
				$('#addNewAlbumModal').modal('hide');
				$('#addNewAlbumForm')[0].reset();
				$('#gallery-tree').jstree('refresh', false, true);
				$('#gallery-tree').jstree("destroy");
				galleryTree.Build();
	        }
	    });
	}

	var triggerEvents = function(){
		$('#gallery-tree').on("select_node.jstree", function (e, data) {
			var tree = $('#gallery-tree');
			if(data.selected.length) {
				var selected = getNodeInfo(data.selected[0]);
				var firstChild = selected.children[0] != undefined ? selected.children[0] : '';

				//console.log(selected.data);
				if(selected.parent == '#'){
					$('#album-name').html('Default Panel');
					$('#viewOptions').modal('show');
					$('#show-album-details').addClass('hide');
					$('#show-album-details').find('input[name="album_id"]').val('');
					album.parent_id = selected.data.node_id;
					album.node_desc = selected.text;
					album.node_id = selected.data.node_id;
				}else{
					$('#album-name').html(selected.text);
					$('#show-album-details').removeClass('hide');
					$('#show-album-details').find('input[name="album_id"]').val(selected.data.node_id);
					getActivePhotos(selected.data.node_id);
					album.node_desc = selected.text;
					album.node_id = selected.data.node_id;
				}
			}
		}).on("changed.jstree", function (e, data) {
			var tree = $('#gallery-tree');
			if(data.selected.length) {
				var selected = getNodeInfo(data.selected[0]);
				var firstChild = selected.children[0] != undefined ? selected.children[0] : '';

				//console.log(selected.data);
				if(selected.parent == '#'){
					$('#album-name').html('Default Panel');
					$('#viewOptions').modal('show');
					album.parent_id = selected.data.node_id;
				}else{
					$('#album-name').html(selected.text);
				}
			}
		});
	}

	var getActivePhotos = function(id){
		$('#activePhotosTable').DataTable().destroy();
		$('#activePhotosTable').DataTable({
			"ajax": {
				"url" : "../AdminSvc/Admin_ajaxrequests/db_request?do=get_active_photos",
				"type" : 'POST',
				"data" : {
					action : 'get_active_photos',
					node_id : id
				}
			},
			"columns": [
			    {
			    	"data": "img_title", 
			    	"width" : '30%',
			    	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
			    		$(nTd).html('<a class="mouse-over" data-id="'+oData.photo_id+'">'+oData.img_title+'</a>').on('click', function(){
		    				$('#addNewPhotoModal').modal('show');
							$('#addNewPhotoForm')[0].reset();
							$('#addNewPhotoForm').find('input[name="action"]').val('update_photo_info');
							var album_id = $('#show-album-details').find('input[name="album_id"]').val();
							$('#addNewPhotoForm').find('input[name="album_id"]').val(album_id);
							$('#photo-info').append('<input type="hidden" name="photo_id" value="'+oData.photo_id+'">');
							$('#confirmCreationPhoto').addClass('hide');
							$('#confirmUpdatePhoto').removeClass('hide');
							$('#confirmDeletePhoto').removeClass('hide');

							if(oData.img_status == 1){
								$('#addNewPhotoForm').find('input[name="img_status"]').prop('checked', true);
							}else{
								$('#addNewPhotoForm').find('input[name="img_status"]').prop('checked', false);
							}

							$('#addNewPhotoForm').find('input[name="photo_title"]').val(oData.img_title);
							$('#addNewPhotoForm').find('textarea[name="photo_desc"]').val(oData.img_desc);
			    		})
			    	}
			   	},
			    { "data": "img_desc" },
			    { "data": "created_by" },
			    { "data": "date_create" }
			],
			"order": [[0, 'asc']]
		});
	}

	$('#update-album-info').on('click', function(){
		$('#addNewAlbumForm').find('input[name="action"]').val('update_album_info');
		$('#addNewAlbumModal').modal('show');
		$('#addNewAlbumForm')[0].reset();
		$('#addNewAlbumForm').find('input[name="albumTitle"]').val(album.node_desc);
		$('#viewOptions').modal('hide');
		$('#confirmCreationAlbum').addClass('hide');
		$('#confirmDeleteAlbum').removeClass('hide');
		$('#confirmUpdateAlbum').removeClass('hide');
	});

	$('#create-album').on('click', function(){
		$('#addNewAlbumModal').modal('show');
		$('#viewOptions').modal('hide');
		$('#addNewAlbumForm')[0].reset();
		$('#addNewAlbumForm').find('input[name="action"]').val('create_new_album');
		$('#confirmCreationAlbum').removeClass('hide');
		$('#confirmUpdateAlbum').addClass('hide');
	});

	$('#create-new-album').on('click', function(){
		$('#addNewAlbumModal').modal('show');
		$('#addNewAlbumForm')[0].reset();
		$('#addNewAlbumForm').find('input[name="action"]').val('create_new_album');
		album.parent_id = '';
		$('#confirmCreationAlbum').removeClass('hide');
		$('#confirmUpdateAlbum').addClass('hide');
		$('#confirmDeleteAlbum').addClass('hide');
	});

	$('#cancelCreationAlbum').on('click', function(){
		$('#addNewAlbumModal').modal('hide');
		$('#addNewAlbumForm')[0].reset();
		album.parent_id = '';
		$('#confirmCreationAlbum').removeClass('hide');
		$('#confirmUpdateAlbum').addClass('hide');
		$('#confirmDeleteAlbum').addClass('hide');
	});

	$('#confirmCreationAlbum').on('click', function(){
		saveAlbum('../AdminSvc/Admin_ajaxrequests/db_request?do=create_new_album');
	});

	$('#confirmUpdateAlbum').on('click', function(){
		saveAlbum('../AdminSvc/Admin_ajaxrequests/db_request?do=update_album_info');
	});

	$('#confirmDeleteAlbum').on('click', function(){
		updateAlbumStatus(2);
	});

	$('#add-new-photo').on('click', function(){
		$('#addNewPhotoModal').modal('show');
		$('#addNewPhotoForm')[0].reset();
		$('#photo-info').html('');
		$('#addNewPhotoForm').find('input[name="action"]').val('add_new_photo');
		var album_id = $('#show-album-details').find('input[name="album_id"]').val();
		$('#addNewPhotoForm').find('input[name="album_id"]').val(album_id);
		$('#confirmCreationPhoto').removeClass('hide');
		$('#confirmUpdatePhoto').addClass('hide');
		$('#confirmDeletePhoto').addClass('hide');
	});

	$('#cancelCreationPhoto').on('click', function(){
		$('#addNewPhotoModal').modal('hide');
		$('#addNewPhotoForm')[0].reset();
		$('#photo-info').html('');
		$('#confirmCreationPhoto').removeClass('hide');
		$('#confirmUpdatePhoto').addClass('hide');
		$('#confirmDeletePhoto').addClass('hide');
	});

	$('#confirmCreationPhoto').on('click', function(){
		var formData = new FormData($("#addNewPhotoForm")[0]);

		$.ajax({
	        url: '../AdminSvc/Admin_ajaxrequests/db_request?do=add_new_photo',
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
	        	if((data[0].growl) == 'success'){
	        		$.growl.notice({ message: data[0].msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: data[0].msg, size: 'medium', location: 'br'});
	        	}
				$('#addNewPhotoModal').modal('hide');
				$('#addNewPhotoForm')[0].reset();
				$('#activePhotosTable').DataTable().ajax.reload();
	        }
	    });
	});

	$('#refresh-table').on('click', function(){
		$('#activePhotosTable').DataTable().ajax.reload();
	});

	$('#delete-album').on('click', function(){
		updateAlbumStatus(2);
		$('#album-name').html('Default Panel');
		$('#show-album-details').addClass('hide');
		$('#show-album-details').find('input[name="album_id"]').val('');
	});

	$('#confirmUpdatePhoto').on('click', function(){
		var formData = new FormData($("#addNewPhotoForm")[0]);

		$.ajax({
	        url: '../AdminSvc/Admin_ajaxrequests/db_request?do=update_photo_info',
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
	        	if((data[0].growl) == 'success'){
	        		$.growl.notice({ message: data[0].msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: data[0].msg, size: 'medium', location: 'br'});
	        	}
				$('#addNewPhotoModal').modal('hide');
				$('#addNewPhotoForm')[0].reset();
				$('#activePhotosTable').DataTable().ajax.reload();
	        }
	    });
	});

	$('#confirmDeletePhoto').on('click', function(){
		var ajaxdata = { 'action' : 'delete_photo', 'photo_id' : $('#addNewPhotoForm').find('input[name="photo_id"]').val() , 'is_deleted' : 1 };

		$.ajax({
	        url: '../AdminSvc/Admin_ajaxrequests/db_request?do=delete_photo',
	        type: 'POST',
	        data: ajaxdata,
	        dataType: "json",
	        error : function(xhr, ajaxOptions, thrownError) {
				$.growl.error({ message: xhr.status + '<br>' + thrownError, size: 'medium', location: 'br'});
	        },
	        success: function(json) {
	        	if((json[0].growl) == 'success'){
	        		$.growl.notice({ message: json[0].msg, size: 'medium', location: 'br'});
	        	}else{
	        		$.growl.error({ message: json[0].msg, size: 'medium', location: 'br'});
	        	}
				$('#addNewPhotoModal').modal('hide');
				$('#addNewPhotoForm')[0].reset();
				$('#activePhotosTable').DataTable().ajax.reload();
	        }
	    });
	});

	return {
		Build : function(){
			createTree();
			openTree();
			triggerEvents();
		}
	}
})();


$(document).ready(function(){
	galleryTree.Build();
});