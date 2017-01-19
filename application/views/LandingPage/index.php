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
        <img src="<?php echo base_url().('assets/landingpage/img/slider/images/1.jpg');?>" alt="" />
        <img src="<?php echo base_url().('assets/landingpage/img/slider/images/2.jpg');?>" alt="" />

    </div>
    <!-- END SLIDER SECTION -->

    <div class="container">
        <div class="row main-low-margin text-center" id="top_newsfeed">
            <div class="col-md-4 col-sm-4">
                      <img src="assets/landingpage/img/img2.jpg" width="300px" height="210px">
                <h3>INFO 1</h3>
                <p>
                    edit here.
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                     <img src="assets/landingpage/img/img2.jpg" width="300px" height="210px">
                <h3>INFO 2</h3>
                <p>
                    edit here.
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                     <img src="assets/landingpage/img/img2.jpg" width="300px" height="210px">
                <h3>INFO 3</h3>
                <p>
                    edit here.
                </p>
            </div>

        </div>
        <hr>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8" id="middle_newsfeed">
                <h3>INFO 4</h3>
                <p>
                    edit here.
                </p>
                <p>
                    edit here.
                </p>
            </div>

            <div class="col-md-4 col-sm-4 text-center">
             <img class="img-circle" src="<?php echo base_url().('assets/landingpage/img/person.jpg');?>" style="width: 200px">
                <h3>Office of Student Affairs | Head</h3>
                <h4>Ms. Joyce Jasa, MAEd</h4>

            </div>
        </div>
        <hr>
        <div class="row main-low-margin " id="bottom_newsfeed">
            <div class="col-md-3 col-sm-3 text-center">
                         <img src="assets/landingpage/img/img2.jpg" width="200px" height="140px">
                <h3>INFO</h3>
                <p>
                    edit here.
                </p>
            </div>
            <div class="col-md-3 col-sm-3 text-center">
                        <img src="assets/landingpage/img/img2.jpg" width="200px" height="140px">
                 <h3>INFO</h3>
                <p>
                    edit here.
                </p>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3>INFO</h3>
                <p>
                    edit here.

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
