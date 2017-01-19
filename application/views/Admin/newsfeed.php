<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('Globals/Admin/header');?>
    <!-- Summernote CSS -->
    <link href="<?php echo base_url().('assets/admin/plugins/summernote/summernote.css');?>" rel="stylesheet">
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
                        <h1 class="page-header"><i class="fa fa-newspaper-o fa-fw"></i> Newsfeed</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <button type="button" id="add-new-feed" class="btn btn-info btn-md">
                                                    <i class="fa fa-rss-square"></i> Add New Feed
                                                </button>
                                                <button type="button" id="refresh-table" class="btn btn-success btn-md">
                                                    <i class="fa fa-refresh"></i> Refresh
                                                </button>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Active Newsfeed
                                            </div>
                                            <div class="panel-body">
                                                <table id="feedDatatable" class="table table-condensed table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Section</th>
                                                            <th>Date Created</th>
                                                            <th>Status</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="addNewFeedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" style="width: 60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-rss fa-fw"></i> <span>Add New Feed</span></h4>
                </div>
                <div class="modal-body">
                    <form id="addNewFeedForm">
                        <input type="hidden" name="action">
                        <input type="hidden" name="feed_id">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
                            <input type="text" class="form-control" placeholder="Newsfeed Title" name="feedTitle">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="checkbox-inline  pull-right">
                                        <input type="checkbox" name="news_stat"> <i class="fa fa-globe fa-fw"></i>Publish to Newsfeed
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-outdent"></i></span>
                                        <select class="form-control" name="feedSection"></select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                                        <select class="form-control" name="feedPosition"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea id="newsfeed-content" name="feedContent"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cancelCreation"><i class="fa fa-times fa-fw"></i> Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmCreation"><i class="fa fa-save fa-fw"></i> Create Feed</button>
                    <button type="button" class="btn btn-primary hide" id="confirmUpdate"><i class="fa fa-save fa-fw"></i> Update Feed</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Scripts -->
    <?php $this->load->view('Globals/Admin/scripts');?>

    <!-- Summernote JS -->
    <script src="<?php echo base_url().('assets/admin/plugins/summernote/summernote.js').'?v='.date('mdohis');?>"></script>
    
    <!-- Page Specific Scripts -->
    <script src="<?php echo base_url().('assets/admin/js/admin/admin_newsfeeds.js').'?v='.date('mdohis');?>"></script>
</body>
</html>