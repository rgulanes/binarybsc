<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('Globals/Admin/header');?>
    <!-- JSTree CSS -->
    <link href="<?php echo base_url().('assets/admin/plugins/jstree/dist/themes/default/style.min.css');?>" rel="stylesheet">
</head>
<body>

    <div id="wrapper">
        <!-- Navigation -->
    	<?php $this->load->view('Globals/Admin/navbar');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-image fa-fw"></i> Galleries</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 15px 0px;">
                                    <div class="col-lg-12">
                                        <span class="pull-left"><i class="fa fa-folder fa-fw fa-lg"></i> Albums</span>
                                        <span class="pull-right"><a class="mouse-over" id="create-new-album"><i class="fa fa-plus fa-fw"></i></a></span>
                                    </div>
                                    <div class="col-lg-12" id="gallery-tree"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading" id="album-name">
                                    Default Panel
                                </div>
                                <div class="panel-body" style="min-height: 375px;">
                                    <div class="row hide" id="show-album-details">
                                        <input type="hidden" name="album_id">
                                        <div class="col-lg-6">
                                            <button type="button" id="add-new-photo" class="btn btn-info btn-sm">
                                                <i class="fa fa-image"></i> Add Photo
                                            </button>
                                            <button type="button" id="refresh-table" class="btn btn-success btn-sm">
                                                <i class="fa fa-refresh"></i> Refresh
                                            </button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" id="delete-album" class="btn btn-primary btn-sm pull-right">
                                                <i class="fa fa-trash red"></i> Delete Album
                                            </button>
                                        </div>
                                        <br/><br/>
                                        <div class="col-lg-12" style="font-size: 11px;">
                                            <table id="activePhotosTable" class="table table-condensed table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Image Name</th>
                                                        <th>Image Description</th>
                                                        <th>Uploaded By</th>
                                                        <th>Date Uploaded</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="viewOptions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 200px;">
        <div class="modal-dialog" style="width: 28%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cog fa-fw"></i> <span>Options</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <button class="btn btn-md btn-info" id="create-album"><i class="fa fa-image fa-fw"></i> Create New Album</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-md btn-success" id="update-album-info"><i class="fa fa-check-square fa-fw"></i> Update Album</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="addNewAlbumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="top: 20%;">
        <div class="modal-dialog" style="width: 40%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-image fa-fw"></i> <span>Album Details</span></h4>
                </div>
                <div class="modal-body">
                    <form id="addNewAlbumForm">
                        <input type="hidden" name="action">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
                            <input type="text" class="form-control" placeholder="Album Title" name="albumTitle">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cancelCreationAlbum"><i class="fa fa-times fa-fw"></i> Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmCreationAlbum"><i class="fa fa-save fa-fw"></i> Create Album</button>
                    <button type="button" class="btn btn-primary hide" id="confirmUpdateAlbum"><i class="fa fa-save fa-fw"></i> Update Album</button>
                    <button type="button" class="btn btn-warning hide" id="confirmDeleteAlbum"><i class="fa fa-trash fa-fw"></i> Delete Album</button>
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="addNewPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="top: 14%;">
        <div class="modal-dialog" style="width: 45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-image fa-fw"></i> <span>Photo Details</span></h4>
                </div>
                <div class="modal-body">
                    <form id="addNewPhotoForm">
                        <input type="hidden" name="action">
                        <input type="hidden" name="album_id">
                        <div id="photo-info"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
                            <input type="text" class="form-control" placeholder="Photo Title" name="photo_title">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="checkbox-inline  pull-left">
                                            <input type="checkbox" name="img_status"> <i class="fa fa-globe fa-fw"></i>Publish to Gallery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                        <input type="file" class="form-control" name="album_img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-paragraph"></i></span>
                            <textarea class="form-control" name="photo_desc"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" id="cancelCreationPhoto"><i class="fa fa-times fa-fw"></i> Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm" id="confirmCreationPhoto"><i class="fa fa-save fa-fw"></i> Upload Photo</button>
                    <button type="button" class="btn btn-primary btn-sm hide" id="confirmUpdatePhoto"><i class="fa fa-save fa-fw"></i> Update Photo</button>
                    <button type="button" class="btn btn-warning btn-sm hide" id="confirmDeletePhoto"><i class="fa fa-trash fa-fw"></i> Delete Photo</button>
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Scripts -->
    <?php $this->load->view('Globals/Admin/scripts');?>

    <!-- JSTree JS -->
    <script src="<?php echo base_url().('assets/admin/plugins/jstree/dist/jstree.min.js').'?v='.date('mdohis');?>"></script>
    
    <!-- Page Specific Scripts -->
    <script src="<?php echo base_url().('assets/admin/js/admin/admin_galleries.js').'?v='.date('mdohis');?>"></script>
</body>
</html>