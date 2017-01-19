
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <h2 id="runtime"></h2>
                                    <h4><i class="fa fa-clock-o fa-fw"></i> System Time</h4>
                                </div>
                            </div>
                        </li>
                        <li id="app_dashboard">
                            <a href="<?php echo base_url().('Admin/Home.php');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li id="app_newsfeeds">
                            <a href="<?php echo base_url().('Admin/Newsfeed.php');?>"><i class="fa fa-newspaper-o fa-fw"></i> Newsfeeds</a>
                        </li>
                        <li id="app_galleries">
                            <a href="<?php echo base_url().('Admin/Galleries.php');?>"><i class="fa fa-image fa-fw"></i> Galleries</a>
                        </li>
                        <?php 
                            $app_access = array('1', '2');
                            if(in_array($_SESSION['user']['app_access'], $app_access)){
                        ?>
                        <li id="app_users">
                            <a href="<?php echo base_url().('Admin/Users.php');?>"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        <?php
                            }

                            $app_access = array('1', '2');
                            if(in_array($_SESSION['user']['app_access'], $app_access)){
                        ?>
                        <li id="app_reports">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li id="reports_uat">
                                    <a href="<?php echo base_url().('Admin/Reports/UserActivityTracking.php');?>"><i class="fa fa-check-square-o fa-fw"></i> User Activity Tracking</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                            }

                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>