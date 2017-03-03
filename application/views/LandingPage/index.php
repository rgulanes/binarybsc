<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<?php  $this->load->view('Globals/LandingPage/header');?>
<style type="text/css">
    #top_newsfeed p, #middle_newsfeed p, #bottom_newsfeed p{
        font-size: 12px;
        line-height: normal;
        margin-bottom: 0;
        text-align: justify;
    }
</style>
<body>
        <?php  $this->load->view('Globals/LandingPage/navbar');?>
    <!-- HOME SECTION -->

    <!-- SLIDER SECTION -->
    <div id="slides">
        <img src="<?php echo base_url().('assets/landingpage/img/slider/images/1.jpg');?>" alt="" />
        <img src="<?php echo base_url().('assets/landingpage/img/slider/images/2.jpg');?>" alt="" />
        <img src="<?php echo base_url().('assets/landingpage/img/slider/images/3.jpg');?>" alt="" />
        <img src="<?php echo base_url().('assets/landingpage/img/slider/images/4.jpg');?>" alt="" />

    </div>
    <!-- END SLIDER SECTION -->

    <div class="container"> 
    <h2 align="center" > OSA Announcements / News </h2>
        <div class="row main-low-margin text-center" id="top_newsfeed">
                                       

            <div class="col-md-4 col-sm-4">

                 <!--     <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px"> -->
                <h3></h3>
                <p>
                   
                </p>
            </div>
            
            <div class="col-md-4 col-sm-4">
                    <!-- <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px"> -->
                <h3></h3>
                <p>
                   
                </p>
            </div>

            <div class="col-md-4 col-sm-4">
                   <!--  <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px"> -->
               <h3></h3>
                <p>
                   
                </p>
            </div> 

        </div>
        <hr>
                                        <h2> OSA Information </h2>
        <div class="row main-low-margin ">
                    <div class="col-md-8 col-sm-8" id="middle_newsfeed">                   
                            <div class="col-md-4 col-sm-4" >
                               <h3></h3>
                                <p>
                                       
                                </p>
                                <p>
                                       
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-4" >
                               <h3></h3>
                                <p>
                                       
                                </p>
                                <p>
                                       
                                </p>
                            </div> 
                    </div>
            <div class="col-md-4 col-sm-4 text-center">
             <img class="img-circle" src="<?php echo base_url().('assets/landingpage/img/pres.jpg');?>" style="width: 200px">
                <h3>Brokenshire College | Acting President</h3>
                <h4>Dr. Felix C. Chavez, PhD</h4>

            </div>
        </div>
        <hr>
                                        <h2 align="center"> OSA Information </h2>
        <div class="row main-low-margin text-center" id="bottom_newsfeed">
                                        
            <div class="col-md-4 col-sm-4">

                     <!-- <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px"> -->
                <h3></h3>
                <p>
                   
                </p>
            </div>
            
            <div class="col-md-4 col-sm-4">
                    <!-- <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px"> -->
                <h3></h3>
                <p>
                   
                </p>
            </div>

            <div class="col-md-4 col-sm-4">
                   <!--  <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px"> -->
               <h3></h3>
                <p>
                   
                </p>
            </div>

        </div>


    </div>
    <div class="space-bottom"></div>
    <!--END HOME SECTION -->
    <?php  $this->load->view('Globals/LandingPage/footer');?>

    <?php  $this->load->view('Globals/LandingPage/scripts');?>

    <!-- page specific scripts -->
    <!-- SLIDER SCRIPTS LIBRARY -->
    <script src="<?php echo base_url().('assets/landingpage/Slides-SlidesJS-3/examples/playing/js/jquery.slides.min.js');?>"></script>
    <!-- CUSTOM SCRIPT-->
    <script>
        $(document).ready(function () {
            $('#slides').slidesjs({
                width: 940,
                height: 528,
                play: {
                    active: false,
                    effect: "slide",
                    interval: 2000,
                    auto: true,
                    swap: true,
                    pauseOnHover: false,
                    restartDelay: 2000
                },
                navigation : false
            });
        });

    </script>
    <script src="<?php echo base_url().('assets/landingpage/get_feeds.js');?>"></script>

</body>
</html>
