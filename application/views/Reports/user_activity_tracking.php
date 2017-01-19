<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('Globals/Admin/header');?>
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
                        <h1 class="page-header">User Activity Tracking Report</h1>
                    </div>
                    <div class="col-lg-12">
                        <form id="generateReportForm">
                            <div class="form-group col-lg-4">
                                <select class="form-control" name="user_roles"></select>
                            </div>
                            <div class="form-group col-lg-4">
                                <select class="form-control" name="user_lists"></select>
                            </div>
                            <div class="form-group col-lg-4">
                                <button class="btn btn-md btn-info" type="button" id="generateReportbtn"><i class="fa fa-files-o fa-fw"></i> Generate Report</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <iframe id="report-view" class="form-control" style="width: 100%; height: 500px;"></iframe>
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

    <!-- Scripts -->
    <?php $this->load->view('Globals/Admin/scripts');?>

    <!-- Page Specific Scripts -->
    <script type="text/javascript">
        $(document).ready(function(){
            $.post('../../AdminSvc/Admin_ajaxrequests/db_request?do=get_user_roles', { 'action': 'get_user_roles'}, function(data) {
                $('#generateReportForm').find('select[name="user_roles"]').append('<option value="" selected>All Roles</option>');
                $.each(JSON.parse(data), function(k,v){
                    $('#generateReportForm').find('select[name="user_roles"]').append('<option value="'+v.id+'">'+v.description+'</option>');
                });
            });

            $.post('../../AdminSvc/Admin_ajaxrequests/db_request?do=get_all_users', { 'action': 'get_all_users'}, function(data) {
                $('#generateReportForm').find('select[name="user_lists"]').append('<option value="" selected>All Users</option>');
                $.each(JSON.parse(data), function(k,v){
                    $('#generateReportForm').find('select[name="user_lists"]').append('<option value="'+v.id+'">'+v.description+'</option>');
                });
            });

            $('#generateReportbtn').on('click', function(){
                $('#report-view').attr('src', '../../Reports/db_request?do=get_user_activity_tracking' + '&action=user_activity_tracking&' + $('#generateReportForm').serialize());
            });
        });

    </script>
</body>
</html>