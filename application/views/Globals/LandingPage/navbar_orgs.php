    <!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top" style="overflow: visible;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url().('Home.php'); ?>">HOME</a></li>
                    <li><a href="<?php echo base_url().('About.php'); ?>">ABOUT</a></li>
                    <li><a href="<?php echo base_url().('Services.php'); ?>">SERVICES</a></li>
                    <li><a href="<?php echo base_url().('Gallery.php'); ?>">GALLERY</a></li>
                    <li><a href="<?php echo base_url().('Contact.php'); ?>">CONTACT US</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        ORGANIZATIONS <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url().('bcssc.php'); ?>">BCSSC</a></li>
                            <li><a href="<?php echo base_url().('brokenshirian.php'); ?>">BROKENSHIRIAN</a></li>
                            <li><a href="<?php echo base_url().('lamp.php'); ?>">LAMP</a></li>
                            <li><a href="<?php echo base_url().('SoftEng.php'); ?>">S.E. Gr. 2</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url().('Admin/Login.php'); ?>"><span class="log-in"></span>LOGIN</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!--END NAV SECTION -->