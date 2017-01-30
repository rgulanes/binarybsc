            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo base_url().('Admin/Home.php');?>">
                        <i class="fa fa-home fa-lg  fa-fw"></i>
                    </a>
                </li>
                <?php 
                    $app_access = array('1', '2', '3');
                    if(in_array($_SESSION['user']['app_access'], $app_access)){
                ?>
                <li class="dropdown" id="app_messsages">
                    <a class="mouse-over" data-toggle="modal" data-target="#viewMessages">
                        <i class="fa fa-envelope-o fa-lg fa-fw"></i>
                    </a>
                </li>
                <?php
                    }
                ?>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-circle fa-lg fa-fw"></i>  <?php echo isset($_SESSION['user']['fname']) ? $_SESSION['user']['fname'] : '';?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <input type="hidden" data-id="user_access" value="<?php echo isset($_SESSION['user']['app_access']) ? $_SESSION['user']['app_access'] : '';?>">
                        <li><a href="#"><i class="fa fa-user fa-lg fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url().('Admin/Logout.php');?>"><i class="fa fa-sign-out fa-lg fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>