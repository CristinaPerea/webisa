<!doctype html>
<!--
	Template:	 Unika - Responsive One Page HTML5 Template
	Author:		 imransdesign.com
	URL:		 http://imransdesign.com/
    Designed By: https://www.behance.net/poljakova
	Version:	1.0	
-->
<html lang="es-ES">
	
<!-- Mirrored from demo.imransdesign.com/unika/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2015 10:01:19 GMT -->
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>ISA</title>
		<meta name="description" content="Bootstrap HTML5 Template">
		<meta name="keywords" content="HTML5, Bootsrtrap, One Page, Responsive, Template, Portfolio" />
		<meta name="author" content="imransdesign.com">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Google Fonts  -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'> <!-- Body font -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'> <!-- Navbar font -->

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="inc/animations/css/animate.min.css">
		<link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
		<link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">

		<!-- Theme CSS -->
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/mobile.css">

		<!-- Skin CSS -->
        <link rel="stylesheet" href="css/skin/cool-gray.css">
        <link rel="alternate stylesheet" media="screen" title="ice-blue" href="css/skin/ice-blue.css"> 
        <link rel="alternate stylesheet" media="screen" title="summer-orange" href="css/skin/summer-orange.css">
        <link rel="alternate stylesheet" media="screen" title="fresh-lime" href="css/skin/fresh-lime.css">
        <link rel="alternate stylesheet" media="screen" title="night-purple" href="css/skin/night-purple.css">
        <link rel="stylesheet" href="css/estilo-slider-herramientas.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

    <body data-spy="scroll" data-target="#main-navbar">
        <div class="page-loader"></div>  <!-- Display loading image while page loads -->
    	<div class="body">
        
            <!--========== BEGIN HEADER ==========-->
            <header id="header" class="header-main">

                <!-- Begin Navbar -->
                <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation"> <!-- Classes: navbar-default, navbar-inverse, navbar-fixed-top, navbar-fixed-bottom, navbar-transparent. Note: If you use non-transparent navbar, set "height: 98px;" to #header -->

                  <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">ISA</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand page-scroll" href="#text-carousel-intro-section">ISA</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="page-scroll" href="#team-section">Members</a></li>
                            <li><a class="page-scroll" href="#services-section">Research lines</a></li>
                            <li><a class="page-scroll" href="#portfolio-section">Funding</a></li>
                            <li><a class="page-scroll" href="#partners-section">Publications</a></li>
                            <li><a class="page-scroll" href="#services-section-2">Tools</a></li>                           
                            <li><a class="page-scroll" href="#social-section">Collaborations</a></li>
                            <li><a class="page-scroll" href="#contact-section">Contact</a></li>
                            <li><a class="page-scroll" href="http://www.isa.us.es/user">Login</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
                </nav>
                <!-- End Navbar -->

            </header>
            <!-- ========= END HEADER =========-->
            
           
        	<!-- Begin text carousel intro section -->

		    <?php include_once('leeCabeceraCSV.php'); ?>

			<!-- End text carousel intro section -->

            <!--Begin team section-->  
            <section id="team-section" class="page bg-style1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio">
                                <!-- Begin page header-->
                                <div class="page-header-wrapper">
                                    <div class="container">
                                        <div class="page-header page-header-members text-center wow fadeInDown" data-wow-delay="0.4s">
                                            <h2>Members</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End page header-->
                                <div class="portfoloi_content_area" >
                                    <div class="portfolio_menu portfolio-menu-members" id="filtersMembers">
                                        <ul>
                                            <li class="active_prot_menu"><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio="*">all</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".head">Head</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".researchstaff" >Research Staff</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".researchassistants">Research Assistants</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".externalcollaborators">External Collaborators</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".phdstudents" >PhD Students</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".mscstudents" >MSC Students</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".technicalstaff">Technical Staff</a></li>
                                            <li><a class="activaVisionTotal" href="#porfolio_menu2" data-filter-portfolio=".formermembers" >Former Members</a></li>
                                        </ul>
                                    </div>
                                    <div class="portfolio_content portfolio-content-members">
                                        <div class="row"  id="portfolioMembers">
                                        <?php include('leeJson.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End team section-->

            <!-- Begin page parallax-->
            <?php include_once('leeParallax-1CSV.php'); ?>
            <!-- End page parallax -->

              
              
            <!-- Begin Services -->
            <section id="services-section" class="page text-center">
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                            <!--<h2>Research Lines</h2>
                            <div class="devider"></div>
                            <p class="subtitle">Our research spans four research areas including Service Oriented Computing, Business Process Management, Software Engineering and Methodologies and Software Product Lines. More specifically, our research lines focus on the following topics:</p>
                        </div>
                    </div>
                </div>
                
                <div class="rotate-box-1-wrapper">
                    <div class="container">
                        <div class="row">-->
                            <?php include('leeResearchCSV.php'); ?>
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div>
                <!-- End rotate box-1 -->
                <div class="extra-space-l"></div>
            </section>
            <!-- End Services -->
           
            <!-- Begin page parallax-->
            <?php include_once('leeParallax-2CSV.php'); ?>
            <!-- End page parallax -->
                
            <!-- Begin Portfolio -->
            <section id="portfolio-section" class="page bg-style1">
            	<div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio">
                                <!-- Begin page header-->
                                <div class="page-header-wrapper">
                                    <div class="container">
                                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                                            <h2>Funding</h2>
                                            <div class="devider"></div>
                                            <p class="subtitle"></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End page header-->
                                <div class="portfoloi_content_area" >
                                    <div class="portfolio_menu" id="filters">
                                        <ul>
                                            <!--<li class="active_prot_menu"><a href="#porfolio_menu" data-filter="*">All project</a></li>-->
                                            <li><a href="#porfolio_menu" data-filter=".ongoing">Ongoing projects</a></li>
                                            <li><a href="#porfolio_menu" data-filter=".publicprivate" >Public-Private Partnerships</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="portfolio_content">
                                        <div class="row" id="portfolio">
                                            <?php include("leeFundingJson.php"); ?>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End portfolio -->
            
                
                
            <!-- Begin partners -->
            <section id="partners-section">
                <!-- Begin page header-->
                <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2 class="titulo-tablas-publicaciones">Publications</h2>
                                <div class="devider"></div>
                                <div class="extra-space-l"></div>
                                <div class="container tablaTotal col-md-12">
                                    <?php include("publications/tablaPublications.php"); ?>
                                </div>           
                                <div class="row">
                                   <a href="http://www.isa.us.es/publications" target="_blank" class="btn btn-default botonTabla">Full List</a>
                                </div>
                    </div>
                </div>      
            </section>
            <!-- End partners -->
              
                
                
                
 
                
            <section id="services-section-2" class="page text-center">
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Tools</h2>
                            <div class="devider"></div> 
                            <div class="extra-space-l"></div>
                             <?php 
                                  include_once("tools/toolsSliderResponsive.php");
                               ?>
                               <?php 
                                   include_once("tools/tools.php");
                                ?>
                              <div class="row">
                                   <a href="#services-section" class="btn btn-default botonFlipHerramientas">All tools</a>
                              </div>
                        </div>
                    </div>
                </div>
            </section>   
                
                
            <!-- Begin collaborations section -->
			<section id="social-section">
            
                 <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Collaborations</h2>
                            <div class="devider"></div>
                            <p class="subtitle"></p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                
                <div class="container">
                    <div class="row">
                    	<ul class="style-collaborations-section">
                            <?php include("leeCollaborationsCSV.php"); ?>                                                 
                        </ul>
                    </div>
                </div>
                
            </section>
            <!-- End collaborations section -->
                
                
                
                
            <!-- Begin contact section -->
			<section id="contact-section" class="page text-white parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/reina.png);">
            <div class="cover"></div>
            
                 <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Contact</h2>
                            <div class="devider"></div>
                            <p class="subtitle"></p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                
                <div class="contact wow bounceInRight" data-wow-delay="0.4s">
                    <div class="container">
                    	<div class="row">
                        
                            <div class="col-sm-6">
                                <div class="contact-info">
                                    <h4>Our address</h4>
                                    <ul class="contact-address">
			                            <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; Office F1.46. Dpto. Lenguajes y Sistemas Informáticos.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Universidad de Sevilla. ETSII.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Avda. Renia Mercedes, s/n 41012 Sevilla. Spain.</li>
			                            <li><i class="fa fa-phone"></i>&nbsp; +34 954556874</li>
			                            <li><i class="fa fa-envelope"></i><?php include_once("emailOfuscation.php"); echo hide_email("aruiz@us.es"); ?></li>
			                        </ul>
                                </div>
                            </div>
                        
                        	<div class="col-sm-6">
                                <div class="contact-form">
                                	<h4>Write to us</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control input-lg" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="Subject" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control input-lg" rows="5" placeholder="Message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn wow bounceInRight" data-wow-delay="0.8s">Send</button>
                                    </form>
                                </div>	
                            </div>
                                                                                
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div>
            </section>
            <!-- End contact section -->
                
                

                
            <!-- Begin footer -->
            <footer class="text-off-white">               
                <div class="footer">
                    <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                        <p class="copyright">Copyright &copy; 2015 - ISA</p>
                    </div>
                </div>

            </footer>
            <!-- End footer -->

            <a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> <!-- Scroll to top button -->
                                              
        </div><!-- body ends -->
        
        
        
        
        <!-- Plugins JS -->
		<script src="inc/jquery/jquery-1.11.1.min.js"></script>
		<script src="inc/bootstrap/js/bootstrap.min.js"></script>
		<script src="inc/owl-carousel/js/owl.carousel.min.js"></script>
		<script src="inc/stellar/js/jquery.stellar.min.js"></script>
		<script src="inc/animations/js/wow.min.js"></script>
        <script src="inc/waypoints.min.js"></script>
		<script src="inc/isotope.pkgd.min.js"></script>
		<script src="inc/classie.js"></script>
		<script src="inc/jquery.easing.min.js"></script>
		<script src="inc/jquery.counterup.min.js"></script>
		<script src="inc/smoothscroll.js"></script>
        <script src="inc/styleswitch.js"></script>


		<!-- Theme JS -->
		<script src="js/theme.js"></script>

        <script type="text/javascript" src="publications/manejoDeTabla.js"></script>
        <script type="text/javascript" src="js/manejoSliderHerramientas.js"></script>
        <script type="text/javascript" src="publications/searcher.js"></script>
        <script type="text/javascript" src="js/manejoMembers.js"></script>





        <!--================================================================================
        ///// Begin Stylesheet Switcher /////
        ================================================================================ -->
<!--    <div class="switcher-wrapper hidden-sm hidden-xs">
            <div class="switcher pull-left">
                <p>Color Scheme</p>
                <a class="switcher-box default" href="javascript:chooseStyle('none', 60)"></a>
                <a class="switcher-box blue" href="javascript:chooseStyle('ice-blue', 60)"></a>
                <a class="switcher-box lime" href="javascript:chooseStyle('fresh-lime', 60)"></a>
                <a class="switcher-box orange" href="javascript:chooseStyle('summer-orange', 60)"></a>
                <a class="switcher-box purple" href="javascript:chooseStyle('night-purple', 60)"></a>
            </div>
            <div class="switcher-btn pull-right"><i class="fa fa-paint-brush"></i></div>
        </div>

        <script type="text/javascript">
        $(function(){

            $(".switcher-btn").on("click", function(e) {
                e.preventDefault();
                var div = $(".switcher-wrapper");
                if (div.css("left") === "-160px") {
                    $(".switcher-wrapper").animate({
                        left: "0px"
                    });
                } else {
                    $(".switcher-wrapper").animate({
                        left: "-160px"
                    });
                }
            });

        });
        </script>-->
        <!--==============================================================================
        ///// End Stylesheet Switcher /////
        ============================================================================== -->

    </body> 
        
            

<!-- Mirrored from demo.imransdesign.com/unika/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2015 10:03:38 GMT -->
</html>
