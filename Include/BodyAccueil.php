
        <section id="home" class="home">
            <div class="container">
                <div class="row">
                    <div class="main_home">
                        <div class="col-md-6">
                            <div class="home_text">
                          
                                <h1 class="text-white">Vente et Location entre particuliers.</h1>
                            </div>
                            <?php
                    
                            require_once '/../Vue/VueRechercher.php'; ?>
                            <div class="home_btns m-top-40">
                                <a href="index.php?Gestion=4" class="btn btn-danger m-top-20">Inscription</a>
                                <a href="index.php?action=1&Gestion=5&Connexion=3" class="btn btn-primary m-top-20">Connexion</a>
                            
                            </div>
                        </div>

                    </div>
                    <div class="scrooldown">
                        <a href="#features"><i class="fa fa-chevron-down"></i></a>
                    </div>

                </div><!--End off row-->
            </div><!--End off container -->
        </section> <!--End off Home Sections-->

       <?php

$allannonce = true ;
require_once '/../Vue/VueAffichageAnnonce.php';
       
     ?>

  


        <!--App Download Section-->
        <section id="download" class="download m-top-100">
            <div class="download_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="main_download ">
                        <div class="col-md-6">
                            <div class="download_item roomy-100">
                                <h2 class="text-white">Comment télécharger l'application ?</h2>
                                <h5 class="text-white m-top-20">Téléchargez simplement le Play Store ou l'app Store.
                                    entes et utiles.</h5>

                                <div class="download_app m-top-30">
                                    <a href=""><img src="/./LBL/assets/images/appstor.png" alt="" /></a>
                                    <a href=""><img src="/./LBL/assets/images/googleplay.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="download_item m-top-70">
                                <img class="app_right" src="/./LBL/assets/images/appdownload1.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- scroll up-->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div><!-- End off scroll up -->


        <footer id="footer" class="footer bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default bootsnav footer-menu">
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


                        
                                <!-- End Header Navigation -->

                                <!-- navbar menu -->
                                <div class="collapse navbar-collapse" id="navbar-footer">
                                    <ul class="nav navbar-nav navbar-center">
                                        <li><a href="#home">Home</a></li>                    
                                        <li><a href="#features">Features</a></li>
                                        <li><a href="#reviews">Reviews</a></li>
                                        <li><a href="#download">Connexion</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div>   
                        </nav>
                    </div>
                    <div class="divider"></div>
                    <div class="col-md-12">
                        <div class="main_footer text-center p-top-40 p-bottom-30">
                            <p class="wow fadeInRight" data-wow-duration="1s">
                                Made with 
                                <i class="fa fa-heart"></i>
                                by 
                                <a target="_blank" href="http://bootstrapthemes.co">Bootstrap Themes</a> 
                                2016. All Rights Reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>




    </div>