<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<?php  $this->load->view('Globals/LandingPage/header');?>
<body>
        <?php  $this->load->view('Globals/LandingPage/navbar');?>
    <!-- HOME SECTION -->

    <div class="container">

        <div class="row main-low-margin text-center">

        <h2 align="center">Brokenshire College Student Supreme Council</h2>
            <hr>
            <div class="col-md-4 col-sm-4">
                      <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px">
                <h3>News 1</h3>
                <p>
                    edit here. 
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                     <img src="assets/landingpage/img/img2.jpg" width="300px" height="210px">
                <h3>News 2</h3>
                <p>
                    edit here.
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                     <img src="assets/landingpage/img/img1.jpg" width="300px" height="210px">
                <h3>News 3</h3>
                <p>
                    edit here.
                </p>
            </div>

        </div>
        <hr>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8">
                <h3>INFO 1</h3>
                <p>
                    Paragraph 1.
                </p>
                <p>
                    Paragraph 2.
                </p>
            </div>

            
        </div>
        <hr>
        <div class="row main-low-margin ">

            <div class="col-md-8 col-sm-8">
                <h3>INFO 2</h3>
                <p>
                    Paragraph 1.
                </p>
                <p>
                    Paragraph 2.
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
                    active: true,
                    auto: true,
                    interval: 4000,
                    swap: true
                }
            });
        });

    </script>

</body>
</html>
