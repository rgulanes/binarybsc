<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- HEAD SECTION -->
<?php  $this->load->view('Globals/LandingPage/header');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().('assets/landingpage/plugins/lightbox/css/lightbox.min.css');?>">
<style type="text/css">
    .mouse-over{
        cursor: pointer;
    }

    .panel-content{
        line-height: 15px;
        margin: 0px;
    }

    .panel-body{
        padding: 0px;
    }

    .panel-body img{
        width: 100%;
        height: 15%;
        padding: 3px;
        max-width: 370px;
        max-height: 245px;
    }

    #viewAlbum{
        outline: none;
        overflow: hidden;
    }

    .img-preview{
        width: 15rem;
        border-radius: 4px;
    }

    #album-contents a:hover{
        text-decoration: none;
    }

    .img-title{
        line-height: 15px;
        margin: 5px;
        text-align: center;
        color: #6b6a6a;
    }
</style>
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

    <div class="container">
        <div class="row main-low-margin text-center">
            <div class="row" id="active_galleries">
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 10%;">
        <div class="modal-dialog" style="width: 65%;">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close mouse-over" data-dismiss="modal" aria-hidden="true" style="font-size: 15px;"><i class="fa fa-times-circle fa-fw"></i> Close</a>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o fa-fw"></i> <span id="album-title">Sample Album</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="album-contents"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <div class="space-bottom"></div>
    <!--END GALLARY SECTION -->
    <!--FOOTER SECTION -->
     <?php  $this->load->view('Globals/LandingPage/footer');?>

    <?php  $this->load->view('Globals/LandingPage/scripts');?>
    
    <!-- Lightbox JS -->
    <script src="<?php echo base_url().('assets/landingpage/plugins/lightbox/js/lightbox.min.js').'?v='.date('mdohis');?>"></script>

    <!-- Page Specific Scripts -->
    <script src="<?php echo base_url().('assets/landingpage/get_galleryAlbums.js').'?v='.date('mdohis');?>"></script>
</body>
</html>
