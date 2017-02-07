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
                    

                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row main-low-margin text-center">
            <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-lightbulb-o fa-5x  icon-set"></i></div>
                <h3>STUDENT AFFAIRS</h3>
                
               <a href="<?php echo base_url().('Student_Affairs.php'); ?>" class="btn btn-info" role="button">PDF File</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-edit fa-5x  icon-set"></i></div>
                <h3>SCHOLARSHIPS</h3>
              
                <a href="<?php echo base_url().('scholarship.php'); ?>" class="btn btn-info" role="button">PDF File</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="circle-body"><i class="fa fa-picture-o fa-5x  icon-set"></i></div>
                <h3>STUDENT ACTIVITIES</h3>
               
                <a href="<?php echo base_url().('student_activities.php'); ?>" class="btn btn-info" role="button">PDF File</a>
            </div>

        </div>
        <hr>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8">

                <h3>BROKENSHIRE COLLEGE STUDENT HANDBOOK 2016 Edition</h3>
                <p>
                    This Handbook  is designed to orient you as you begin your academic journey in the College. You will find that it contains information, expected behaviors and procedures on how to do and deal with things we share responsibility in upholding the values and standards of the College as church institution. 
                </p>
                <p>
                    The handbook also provides you with the opportunities to enhance your academic, social, physical and personal development with the many curricular and extra – curricular activities that are available for you. You journey in Brokenshire College will be worth it if you make use of these to connect and reach out to diverse people who have embarked on the same journey as you.
                </p>
            </div>

            <div class="col-md-4 col-sm-4 text-center">
                <div class="circle-body"><i class="fa fa-book fa-5x  icon-set"></i></div>
                <h3>HANDBOOK</h3>
                

                  <a href="<?php echo base_url().('handbook.php'); ?>" class="btn btn-info" role="button">PDF file</a>
            </div>
        </div>
        <hr>
        <div class="row main-low-margin ">

            <h3 align="center" >
                     THE LIFE PURPOSE, VISION AND MISSION, <br>
                         QUALITY POLICY AND CORE VALUES OF <br>
                            BROKENSHIRE COLLEGE
                            <br>
                    <a href="<?php echo base_url().('life_purpose.php'); ?>" class="btn btn-info" role="button">PDF File</a>
            </h3>

            <h4>
                 <h3> LIFE PURPOSE </h3>

        <p> Brokenshire College fulfills the Evangelical Christian Teaching Ministry of the Church.</p>

                  <h3>  VISION STATEMENT </h3>
       <p> Brokenshire College is the leading learning and transforming Evangelical Christian institution enabling learners to make a difference in the world. </p>

                  <h3>  MISSION STATEMENT </h3>
        <p> Brokenshire College is a learning organization engaged in the pursuit and diffusion of knowledge through the highest standards of instruction, research and extension. It leads a life of faith, learning and action that develop people to become intellectually competent, sensitive, spiritually mature, aware and responsive to the needs and aspirations of the community. It manages and develops wisely all resources to ensure sustainable growth of the institution as responsible stewards of God and contributes to the realization of a just, free and responsible Christian social order. </p>

                  <h3>  QUALITY POLICY </h3>
       <p> Brokenshire College is committed to provide value-oriented quality Christian education through continuous improvement and total involvement for customer satisfaction. </p>
</h4> 
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
