        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().('Admin/Home.php');?>"> <img src="<?php echo base_url().('assets/admin/img/brokenshirecollege_sm.png')?>" class="img-responsive bcs-logo" /> BSC OSA Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <?php $this->load->view('Globals/Admin/top_navbar');?>
            <!-- /.navbar-top-links -->

            <?php $this->load->view('Globals/Admin/sidebar');?>
            <!-- /.navbar-static-side -->
        </nav>