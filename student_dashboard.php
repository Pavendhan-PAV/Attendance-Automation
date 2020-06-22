<?php
	require_once "connect.php";
session_start();
?>

<html>
<body>
<head>
    <title>STUDENT DASHBOARD</title>
    <style type="text/css">
      
      .disp{
         display: grid;
    grid-gap: 1em;
    grid-template-columns: repeat(auto-fit,minmax(13em,auto));

      }

    </style>
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
  <body  data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header  class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner" style="background-color: #ffffffe8;" >
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
        	<div>
        		<img src="images/logo.png" style="height: 4em; padding-right: 1em;">
        	</div>
          <div class="site-logo mr-auto w-25" ><a href="index.php" style="color: #000000b0;">IIITDM Kancheepuram</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                
              	<li><a href="student_dashboard.php" class="nav-link"  style=" font-weight: bold; color: #000000b0;" >Dashboard</a></li>


                <?php
                if(isset($_SESSION['parentuser']))
                	{?>
				<li><a href="attendancecheck.php" class="nav-link" style="font-weight: bold; color: #000000b0;" >Attendance</a></li>

				<li><a href="fidchooser.php" class="nav-link" style="font-weight: bold; color: #000000b0;" >Contact Faculty</a></li>
                <?php
            }
            	else
            	{
            		?><li><a href="attendance.php" class="nav-link" style="font-weight: bold; color: #000000b0;" >Attendance</a></li>

				<li><a href="facultycontact.php" class="nav-link" style="font-weight: bold; color: #000000b0;" >Contact Faculty</a></li>
            	<?php } ?>
              </ul>
            </nav>
          </div>
            <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="logout.php" class="nav-link"><span><?php 
                	if(isset($_SESSION['parentuser']) || isset($_SESSION['studentuser']))
            		    echo("LOGOUT");
            		else
            			echo("LOGIN");
            		?>
            </span></a></li>
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
              	<?php 
              		if(isset($_SESSION['parentuser']))
{
	$userid=$_SESSION['parentuser'];
	
	$validate="SELECT * FROM parent where pmailid='$userid'";

	$result=mysqli_query($attendance,$validate);

	if(@mysqli_num_rows($result)>0)
	{
		while($un=mysqli_fetch_array($result))
			$name=$un['pname'];

		echo("<h2 id='deta' style='margin-top: 3em;'>Welcome ".$name."</h2><p>");
	}

	$display="SELECT * FROM student where pmailid='$userid'";
	$result=mysqli_query($attendance,$display);
echo("<div id='deta'>Student details:\n </div>");
	if(@mysqli_num_rows($result)>0)
	{
		
		
		echo("<div class='disp'> ");
		while($rows=mysqli_fetch_array($result))
		{		$name=$rows['sname'];
$dno=$rows['dno'];
	$display2="SELECT * FROM dept where dno='$dno'";
$dept=mysqli_query($attendance,$display2);
while($depts=mysqli_fetch_array($dept))
{
	$department=$depts['dname'];
	
}
$batch=$rows['batch'];
		$mail=$rows['smailid'];


echo("<div class='disp1'> ");
echo("<div id='detain'>Name:          <b id='inner'> ".$name."\n</b></div>");
echo("<div id='detain'>Department:    <b id='inner'> ".$department."\n</b></div>");
echo("<div id='detain'>Batch :        <b id='inner'> ".$batch."\n</b></div>");
echo("<div id='detain'>Student Mail:  <b id='inner'> ".$mail."\n</b></div></div>");


}

	echo("</div>");	
	}
 

}
else if(isset($_SESSION['studentuser']))
{
	$userid=$_SESSION['studentuser'];
	
	$validate="SELECT * FROM student where smailid='$userid' ";

	$result=mysqli_query($attendance,$validate);

	if(@mysqli_num_rows($result)>0)
	{
		while($rows=mysqli_fetch_array($result))
		{		$name=$rows['sname'];
$dno=$rows['dno'];
	$display2="SELECT * FROM dept where dno='$dno'";
$dept=mysqli_query($attendance,$display2);
while($depts=mysqli_fetch_array($dept))
{
	$department=$depts['dname'];
	
}
$batch=$rows['batch'];
		$mail=$rows['smailid'];

		echo("<h2 id='deta'>Welcome ".$name."</h2><p>");

echo("<div id='detain'>Department:    <b id='inner'> ".$department."\n</b></div>");
echo("<div id='detain'>Batch :        <b id='inner'> ".$batch."\n</b></div>");


}
		
}
}
else
{


	die("<h2 id='deta'>Please Login!</h2><p>");

}


              	?>

      
    </header>
	
	

</body>
</html>