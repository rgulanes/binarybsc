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
    <!-- GALLARY SECTION -->
    <div class="section">
        <div class="container">


            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h1>Gallery</h1>
                    <h5>A collection of activites throughout the Academic Year 2016 onwards.
                    </h5>
                </div>
            </div>


        </div>
    </div>

    
    <div class="space-bottom"></div>
    <!--END GALLARY SECTION -->
    <!--FOOTER SECTION -->
     <?php  $this->load->view('Globals/LandingPage/footer');?>

    <?php  $this->load->view('Globals/LandingPage/scripts');?>
    <!-- GRIDGALLERY SCRIPT SCRIPT-->
    <script src="assets/GridGallery/js/modernizr.custom.js"></script>
    <script src="assets/GridGallery/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/GridGallery/js/masonry.pkgd.min.js"></script>
    <script src="assets/GridGallery/js/classie.js"></script>
    <script src="assets/GridGallery/js/cbpGridGallery.js"></script>
    <!-- CUSTOM SCRIPT-->
    <script>
        new CBPGridGallery(document.getElementById('grid-gallery'));
    </script>
</body>
</html>
