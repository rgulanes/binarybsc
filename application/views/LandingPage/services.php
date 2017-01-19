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
    <!-- SERVICES SECTION -->
    <div class="section">
        <div class="container">


            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1>Our Services</h1>
                    <h5>text here.
                    </h5>
                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row main-low-margin text-center">
            <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-lightbulb-o fa-5x  icon-set"></i></div>
                <h3>STUDENT DISCIPLINE</h3>
                <p>
                    text here.
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-edit fa-5x  icon-set"></i></div>
                <h3>SCHOLARSHIPS</h3>
                <p>
                    text here.
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-picture-o fa-5x  icon-set"></i></div>
                <h3>STUDENT ACTIVITIES</h3>
                <p>
                    text here.
                </p>
            </div>

        </div>
        <hr>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8">

                <h3>INFORMATION HERE</h3>
                <p>
                    text here.
                </p>
                <p>
                    Text here.
                </p>
            </div>

            <div class="col-md-4 col-sm-4 text-center">
                <div class="circle-body"><i class="fa fa-book fa-5x  icon-set"></i></div>
                <h3>HANDBOOK</h3>
                <p>
                   text here.
                   PDF here.
            </div>
        </div>
        <hr>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8">

                <h3>INFORMATION HERE</h3>
                <p>
                    text here.
                </p>
                <p>
                    Text here.
                </p>
            </div>

        </div>
</div>
    <div class="space-bottom"></div>
    <!--END SERVICES SECTION -->
    <!--FOOTER SECTION -->
  <!-- CORE BOOTSTRAP LIBRARY -->
    
    <?php  $this->load->view('Globals/LandingPage/footer');?>

    <?php  $this->load->view('Globals/LandingPage/scripts');?>
</body>
</html>
