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
        <div class="row main-low-margin text-center">
            <div class="col-md-4 col-sm-4">
                
                <div class="circle-body"><i class="fa fa-info-circle fa-5x  icon-set"></i></div>
                <h3>PERSONNEL DETAILS</h3>
                <p>
                    text here
                </p>
            </div>
             <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-info-circle fa-5x  icon-set"></i></div>
                <h3>PERSONNEL DETAILS</h3>
                <p>
                    text here
                </p>
            </div>

             <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-info-circle fa-5x  icon-set"></i></div>
                <h3>PERSONNEL DETAILS</h3>
                <p>
                    text here
                </p>
            </div>       
        </div>
                <hr>
                    <div class="container" align="center">
            
                            <h2>Brokenshire College Employees</h2>
                       <div class="col-lg-12" >
                                <iframe class="form-control" style="height: 500px" id="iframepdf" src="<?php echo base_url().('assets/landingpage/pdf_files/Brokenshire_College_Employees.pdf');?>#page=1&zoom=100"></iframe>
                       </div>

                                <hr>

                            <h2>Student Organizations</h2>
                        <div class="col-lg-12" >
                              <iframe class="form-control" style="height: 500px" id="iframepdf" src="<?php echo base_url().('assets/landingpage/pdf_files/Student_Organizations.pdf');?>#page=1&zoom=100"></iframe>
                      </div>
                <hr>      
    </div>
        <div class="row main-low-margin ">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="circle-body"><i class="fa fa-location-arrow fa-5x  icon-set"></i></div>
                <h3>OUR LOCATION </h3>
                <p>
                     <p>
                        P.O. Box 80537<br>
                         Madapo Hills, Davao City.<br>
                         Call: +639 bla bla<br>
                         Email: osabrokenshire@gmail.com<br>
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
