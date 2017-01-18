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
                        <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Users</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <button type="button" id="add-new-user" class="btn btn-info btn-md">
                                                    <i class="fa fa-plus"></i> Add New User
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
                                                List of Users
                                            </div>
                                            <div class="panel-body">
                                                <table id="userDatatable" class="table table-condensed table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Role</th>
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" style="width: 40%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-circle-o fa-fw"></i> <span>Add New User</span></h4>
                    </div>
                    <div class="modal-body">
                        <form id="addNewUserForm">
                            <input type="hidden" name="action">
                            <input type="hidden" name="user_id">
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="First Name" name="fname">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="role"></select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="cancelAddUser">Cancel</button>
                        <button type="button" class="btn btn-primary" id="confirmAddUser">Add User</button>
                        <button type="button" class="btn btn-info hide" id="confirmInactivateUser">Inactivate User</button>
                        <button type="button" class="btn btn-success hide" id="confirmActivateUser">Activate User</button>
                        <button type="button" class="btn btn-primary hide" id="confirmUpdateUser">Update User</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>
    <!-- /#wrapper -->

    <!-- Scripts -->
    <?php $this->load->view('Globals/Admin/scripts');?>

    <!-- Page Specific Scripts -->
    <script src="<?php echo base_url().('assets/admin/js/admin/admin_users.js');?>"></script>
</body>
</html>