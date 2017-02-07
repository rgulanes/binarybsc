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
                    Brokenshire College | Student Affairs
                    </h1>
                    
                </div>
            </div>


        </div>
    </div>
   

        <div class="container">
            <div class="row main-low-margin text-center">
                 

                <div class="col-md-4 col-sm-4">
                    <div class="circle-body"><i class="fa fa-info-circle fa-5x  icon-set"></i></div>
                        <h3>Identification</h3>
                             <p>
                                   renewal of I.D.'s, Lost I.D. , Validation and etc.
                             </p>
                </div>
                
                <div class="col-md-4 col-sm-4">                
                    <div class="circle-body"><i class="fa fa-info-circle fa-5x  icon-set"></i></div>
                        <h3>Sports Corner</h3>
                            <p>
                                  Varsities, Scholarships and etc.
                            </p>
                </div>
                
                <div class="col-md-4 col-sm-4">            
                     <div class="circle-body"><i class="fa fa-info-circle fa-5x  icon-set"></i></div>
                            <h3>Violations</h3>
                                <p>
                                     Do's and dont's inside Brokenshire College.
                                </p>
                </div>
        <hr>
                    <div class="container" align="center">
                        <h2>School Calendar A.Y. 2016 - 2017</h2>
            
                        <div class="col-lg-12" >
                             <iframe class="form-control" style="height: 500px" id="iframepdf" src="<?php echo base_url().('assets/landingpage/pdf_files/School_Calendar_16_17.pdf');?>#page=1&zoom=100" frameborder="0" allowtransparency="true" ></iframe>
                    </div>

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
