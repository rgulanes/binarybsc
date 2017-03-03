<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- HEAD SECTION -->
<?php  $this->load->view('Globals/LandingPage/header');?>
<!--END HEAD SECTION -->
<body>
    <!-- NAV SECTION -->
<?php  $this->load->view('Globals/LandingPage/navbar');?>
    <!--END NAV SECTION -->
    <!-- CONTACT SECTION -->
    <div class="section">
        <div class="container">


            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1>Contact Details</h1>
                    <h5>text here
                    </h5>
                </div>
            </div>


        </div>
    </div>
       
        </div>
    <div class="container">
                    <hr>
                    <div class="container" align="center">
                            <div class="col-md-6 col-sm-6 text-center">
                <div class="circle-body"><i class="fa fa-book fa-5x  icon-set"></i></div>
                <h3>Brokenshire College Employees</h3>
                <p>Brokenshire College employees as of 2016</p>

                  <a href="<?php echo base_url().('employees.php'); ?>" class="btn btn-info" role="button">PDF file</a>
            </div>
                       

                                
          <div class="col-md-6 col-sm-6 text-center">
                <div class="circle-body"><i class="fa fa-book fa-5x  icon-set"></i></div>
                <h3>Student Organizations</h3>
                <p>The Office of Student Affairs undertakes the supervision and coordination of student organizations </p>

                  <a href="<?php echo base_url().('student_orgs.php'); ?>" class="btn btn-info" role="button">PDF file</a>
            </div>
                            
                        
                     
    </div>
        <div class="row main-low-margin ">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="circle-body"><i class="fa fa-location-arrow fa-5x  icon-set"></i></div>
                <h3>OUR LOCATION </h3>
                <p>
                     <p>
                         P.O. Box 80537<br>
                     Madapo Hills, Davao City.<br>
                    Landline: 227-2105 local 153<br>
                    mobile: 0905-771-3662<br>
                    Email: joycejasa@gmail.com<br>
                    </p>

                </p>
            </div>
        </div>


    </div>
    <div class="space-bottom"></div>
    <!--END CONTACT SECTION -->
    <!--FOOTER SECTION -->

    <?php  $this->load->view('Globals/LandingPage/footer');?>

    <?php  $this->load->view('Globals/LandingPage/scripts');?>

</body>
</html>
