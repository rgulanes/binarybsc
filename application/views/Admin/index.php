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
                        <h1 class="page-header"><i class="fa fa-dashboard fa-fw"></i> Dashboard</h1>
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
</body>
</html>