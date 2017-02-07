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
     <!-- ABOUT SECTION -->
    <div class="section">
        <div class="container">

            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1 align="center" >
                    Student Activities
                    </h1>
                    
                </div>
            </div>


        </div>
    </div>
   

    <div class="container" align="center">
            
            <h2>Schedule of Student Activities</h2>
            <div class="col-lg-12" >
                <iframe class="form-control" style="height: 500px" id="iframepdf" src="<?php echo base_url().('assets/landingpage/pdf_files/Student_Activities.pdf');?>#page=1&zoom=100" frameborder="0" allowtransparency="true" ></iframe>
            </div>

        <hr>

            <h2>Leadership Programme 2016</h2>
            <div class="col-lg-12" >
                <iframe class="form-control" style="height: 500px" id="iframepdf" src="<?php echo base_url().('assets/landingpage/pdf_files/Leadership_Training_Programme_2016.pdf');?>#page=1&zoom=100" frameborder="0" allowtransparency="true" ></iframe>
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
