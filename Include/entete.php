<?php
session_start();
if(isset($_REQUEST['id'])){
$_SESSION['EMAIL'] = $_REQUEST['id'];
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Weather App Landing page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.ico">


        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">


        <link rel="stylesheet" href="/./LBL/assets/css/swiper.min.css">
        <link rel="stylesheet" href="/./LBL/assets/css/animate.css">
        <link rel="stylesheet" href="/./LBL/assets/css/iconfont.css">
        <link rel="stylesheet" href="/./LBL/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/./LBL/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/./LBL/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="/./LBL/assets/css/bootsnav.css">

        <link rel="stylesheet" type="text/css" href="/./LBL/Style/style.css"/>

        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->
        <!--Theme custom css -->
        <link rel="stylesheet" href="/./LBL/assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="/./LBL/assets/css/responsive.css" />

        <script src="/./LBL/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <!--    <div id="loading">
                <div id="loading-center">
                    <div id="loading-center-absolute">
                        <div class="object" id="object_one"></div>
                        <div class="object" id="object_two"></div>
                        <div class="object" id="object_three"></div>
                        <div class="object" id="object_four"></div>
                    </div>
                </div>
            </div>-->
        <!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default bootsnav navbar-fixed white">
                <div class="container">  

                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>        
                    <!-- End Atribute Navigation -->


                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="#brand">
                            <img src="/./LBL/assets/images/logo1.png" class="logo logo-scrolled" alt="">
                        </a>

                    </div>
                    <!-- End Header Navigation -->

                    <!-- navbar menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-center">
                            <li><a href="/./LBL/index.php?action=1&Gestion=1">Accueil</a></li>                    

                            <li><a href="/./LBL/index.php?Gestion=2" >Déposer une annonce</a></li>
                            <li><a href="/./LBL/Controleur/Controleur_Message.php" >Message</a></li>
                            <?php
                      
                                if (isset($_SESSION['EMAIL'])) {
                                    echo $_SESSION['EMAIL'];
                                    echo '<li><a href="/./LBL/index.php?Gestion=11">Déconnexion.</a></li>';
                                }
                                
                         
                            ?>
                            <a href="/./LBL/Controleur/Controleur_Page_Accueil.php"></a>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>   
            </nav>
        </div>  
        <!--Home Sections-->


        <!-- JS includes -->

        <script src="/./LBL/assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="/./LBL/assets/js/vendor/bootstrap.min.js"></script>

        <script src="/./LBL/assets/js/jquery.magnific-popup.js"></script>
        <script src="/./LBL/assets/js/jquery.easing.1.3.js"></script>
        <script src="/./LBL/assets/js/swiper.min.js"></script>
        <script src="/./LBL/assets/js/jquery.collapse.js"></script>
        <script src="/./LBL/assets/js/bootsnav.js"></script>



        <script src="/./LBL/assets/js/plugins.js"></script>
        <script src="/./LBL/assets/js/main.js"></script>
        <!-- scroll up-->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div><!-- End off scroll up -->
