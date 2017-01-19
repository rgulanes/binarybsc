<?php
  $prompt = array(); 
  $prompt[0] = 'display: none;';
  $prompt[1] = 'display: none;';
  if(isset($_SESSION['login_msg'])){
    if($_SESSION['login_msg'] == "error") { $prompt[0] ='display: block;';}
    elseif($_SESSION['login_msg'] == "warning") { $prompt[1] ='display: block;';}
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Office of Student Affairs | Brokenshire College</title>

    <link rel="icon" type="image/png" href="<?php echo base_url().('assets/admin/img/brokenshirecollege.png')?>" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().('assets/admin/plugins/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url().('assets/admin/plugins/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url().('assets/admin/css/sb-admin-2.css');?>" rel="stylesheet">
    <link href="<?php echo base_url().('assets/admin/css/osa_bcs.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url().('assets/admin/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <img src="<?php echo base_url().('assets/admin/img/brokenshirecollege_sm.png')?>" class="img-responsive bcs-login-logo" />
                        <h2 class="panel-title text-center">BSC OSA Admin Panel</h2>
                    </div>
                    <div class="panel-body">
                        <center>
                            <div class="alert alert-danger" style="<?php echo $prompt[0];?>">
                              <strong>Danger!</strong> Invalid username or password.
                            </div>
                            <div class="alert alert-warning" style="<?php echo $prompt[1];?>">
                              <strong>Warning!</strong> Account Deactivated. Please contact Administrator to activate account.
                            </div>
                        </center>
                        <form action="<?php echo base_url().('AdminSvc/Login_ajaxforms/login_user.php');?>" method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                        <br>
                        <div class="row">
                           <div class="col-xs-12">
                                <p style="font-size: 10px; text-align: right;">Powered by <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> | Bootstrap</p>
                           </div>
                           <div class="col-xs-12">
                                <p style="font-size: 10px; text-align: center;" >
                                    <a href="<?php echo base_url().('Home.php');?>" style="text-decoration: none;"> <i class="fa fa-home fa-fw"></i> Go To Home</a> | 
                                    <a href="<?php echo base_url().('About.php');?>" style="text-decoration: none;"> <i class="fa fa-info-circle fa-fw"></i> Go To About</a> |
                                    <a href="<?php echo base_url().('Gallery.php');?>" style="text-decoration: none;"> <i class="fa fa-image fa-fw"></i> Go To Gallery</a> 
                                </p>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url().('assets/admin/plugins/jquery/dist/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().('assets/admin/plugins/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url().('assets/admin/plugins/metisMenu/dist/metisMenu.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url().('assets/admin/js/sb-admin-2.js');?>"></script>

</body>

</html>
