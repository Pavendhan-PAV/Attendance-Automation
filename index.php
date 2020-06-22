<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IIITDM KANCHEEPURAM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
        	<div>
        		<img src="images/logo.png" style="height: 4em; padding-right: 1em;">
        	</div>
          <div class="site-logo mr-auto w-25"><a href="index.php">IIITDM Kancheepuram</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#courses-section" class="nav-link">Student</a></li>
                <li><a href="#programs-section" class="nav-link">Parent</a></li>
                <li><a href="#teachers-section" class="nav-link">Facutly</a></li>
                
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4" style="margin-top: 2em;">
                  <h1  data-aos="fade-up" data-aos-delay="100">ATTENDANCE PORTAL</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Feature allowing Students & Parents to check the respective attendance alloted by the Faculties of various courses on specified dates.</p>
              </div>
              <div style="margin-left: 11em;">
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#courses-section" class="btn btn-primary py-3 px-5 btn-pill" style="min-width: 17em;">Student LogIn</a></p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#programs-section" class="btn btn-primary py-3 px-5 btn-pill" style="min-width: 17em;">Parent LogIn</a></p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#teachers-section" class="btn btn-primary py-3 px-5 btn-pill" style="min-width: 17em;">Faculty LogIn</a></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
<div><p><br><br><br><br><br><br></p></div>
    <div class="site-section courses-title" id="courses-section" style=" background-color: #192024;  align-content: center; opacity: 0.9;">
            	<h2 class="section-title" data-aos="fade-up" data-aos-delay="200" style="font-weight: 600; text-align: center; margin-top: 2em;">STUDENT LOGIN</h2>

      <div class="container">
        
       
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
             <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
              	 <div class="row mb-5 justify-content-center">
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                  <form action="checkfromparent.php" method="post" class="form-box" style="margin-left: 2.25em; min-width: 25em; margin-top: 1em;">
                    <h3 class="h4 text-black mb-4">
                      <?php 
                      if(isset($_SESSION['studenterror']))
                        {echo($_SESSION['studenterror']);unset($_SESSION['studenterror']);} ?></h3>
                    <h3 class="h4 text-black mb-4">Log In</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" name="studentuser" required="" placeholder="studentuser">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="LOGIN">
                    </div>
                  </form>

                </div>
          </div>
        </div>
      </div>
    </div>
   </div></div>
   <div ><p><br><br><br><br><br><br></p></div>
    <div class="site-section" id="programs-section" style="background-color: #192024; opacity: 0.9;">
    	<h2 class="section-title" data-aos="fade-up" data-aos-delay="200" style="font-weight: 600; text-align: center; margin-top: 2em;">PARENT LOGIN</h2>
    	<div class="container">
        
       
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
             <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
              	 <div class="row mb-5 justify-content-center">
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                  <form action="checkfromparent.php" method="post" class="form-box" style="margin-left: 2.25em; min-width: 25em; margin-top: 1em;">
                    <h3 class="h4 text-black mb-4"><?php  if(isset($_SESSION['parenterror'])){echo($_SESSION['parenterror']);unset($_SESSION['parenterror']);} ?></h3>
                    <h3 class="h4 text-black mb-4">Log In</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" name="parentuser" required="" placeholder="Email Addresss">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="LOGIN">
                    </div>
                  </form>

                </div>
          </div>
        </div>
      </div>
    </div></div>
   </div>
   <div ><p><br><br><br><br><br><br></p></div>
     
    <div class="site-section" id="teachers-section" style="background-color: #192024; opacity: 0.9;">

<h2 class="section-title" data-aos="fade-up" data-aos-delay="200" style="font-weight: 600; text-align: center; margin-top: 2em;">FACULTY LOGIN</h2>
    	<div class="container">
        
       
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
             <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
              	 <div class="row mb-5 justify-content-center">
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                  <form action="checkfromparent.php" method="post" class="form-box" style="margin-left: 2.25em; min-width: 25em; margin-top: 1em;">
                   <h3 class="h4 text-black mb-4"><?php  if(isset($_SESSION['ferror'])){echo($_SESSION['ferror']);unset($_SESSION['ferror']);} ?></h3>
                    <h3 class="h4 text-black mb-4">Log In</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" name="fmail" required="" placeholder="Email Addresss">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="LOGIN">
                    </div>
                  </form>

                </div>
          </div>
        </div>
      </div>
    </div></div>
   </div>
   <div ><p><br><br><br><br><br><br></p></div>

     
    <div class="site-section bg-light" id="contact-section" style="height: 40em;">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-7">


            
            <h2 class="section-title mb-3" style="color: #214B8C; margin-top: 2em;">CONTACT US</h2>
            <div style="width: 350px">
							<p class="paragraph" style=" margin-top: 2em; ;color: #214B8C; width: 15em;  font-size: 24px; margin-bottom: 0; font-family: Palatino">IIITDM Kancheepuram</p>
							<p class="paragraph" style="line-height: 24px; width: 25em; color: #214B8C;
						 margin-bottom: 0">Vandalur-Kelambakkam Road, <br style="margin: 0">Chennai: 600127.<br style="margin: 0"><img width="15px" src="images/phone.png"> +91-44-2747 6300 | <img width="15px" src="images/fax.png"> +91-44-2747 6301<br style="margin: 0"><img width="15px" src="images/email.png"> office@iiitdm.ac.in</p>
							<a href="Others/map.php" style="color: #3275AA">Maps and Directions</a>
							
							<ul style="margin: 0; padding-left: 0; display: flex">
								<li style="list-style-type: none; margin: 10px"><a href="https://www.facebook.com/IIIT-DM-Kancheepuram-628084297317220/" target="_blank" style="border-bottom-style: none"><img src="images/facebook.png" width="30px" style="border-radius: 5px"></a></li>
								<li style="list-style-type: none; margin: 10px"><a href="https://www.linkedin.com/school/15098639?pathWildcard=15098639" target="_blank" style="border-bottom-style: none"><img src="images/linkedin.png" width="30px" style="border-radius: 5px"></a></li>
								<li style="list-style-type: none; margin: 10px"><a href="https://www.researchgate.net/institution/Indian_Institute_of_Information_Technology_Design_Manufacturing_Kancheepuram_India" target="_blank" style="border-bottom-style: none"><img src="images/research_gate.png" width="30px" style="border-radius: 5px"></a></li>
								<li style="list-style-type: none; margin: 10px"><a href="https://twitter.com/iiitdm_kancheep" target="_blank" style="border-bottom-style: none"><img src="images/twitter.png" width="30px" style="border-radius: 5px"></a></li>
								<li style="list-style-type: none; margin: 8px"><a href="https://www.instagram.com/iiitdmkancheepuram/" target="_blank" style="border-bottom-style: none"><img src="images/instagram_logo.png" width="42px" style="border-radius: 5px"></a></li>
							</ul>
						</div>
          </div>
        </div>
      </div>
    </div>
    
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>