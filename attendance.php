<?php
require_once "connect.php";
session_start();
?>
	
<html>
<body>
    <title>ATTENDANCE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    
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

<div class="limiter">
<div class="container-table100">
<div class="wrap-table100" style="
    width: 100%;
    margin-left: 5em;">
              
      <div class="table100 ver1 m-b-110" style="
    display: grid;
    grid-gap: 2em;
    grid-template-columns: repeat(auto-fit,minmax(15em,auto));">
				
					

<?php
if(isset($_SESSION['parentuser']))
	{
		$sid=$_POST['sid'];
		$display="SELECT * from attendance where sid ='$sid' order by cno  ";
$result=mysqli_query($attendance,$display);
$cno=-1;
		if(@mysqli_num_rows($result)>0)
	{
		while($rows=mysqli_fetch_array($result))
		{	if($cno!=$rows['cno'])
			{
				$cno=$rows['cno'];
				$percentage="select ((select count(*) from attendance where sid='$sid' and attendance=1 and cno='$cno' group by cno)/ (select count(*) from attendance where sid='$sid' and cno='$cno'  group by cno)) *100 as percentage" ;
				$perquery=@mysqli_query($attendance,$percentage);
				$row=@mysqli_fetch_array($perquery);
				$totalperc=$row['percentage'];
				
$display2="SELECT * FROM course where cno='$cno'";
$course=@mysqli_query($attendance,$display2);
while($courses=@mysqli_fetch_array($course))
{
	$cname=$courses['cname'];
	
}?>

			
		
		<table data-vertable="ver1" style="max-width: fit-content; margin-top: 10em;">

    <thead>
	    <tr class="row100 head">
		<th class="column100 column1" data-column="column1" style="max-width: 8em;"></th>
		<th class="column100 column2" data-column="column2" style="padding-left: 10px;"><?php echo($cname."<br>".$totalperc);?></th></tr></thead>
		<?php

//echo("Percentage".$totalperc."\n");
}
$date=$rows['date'];
//echo("Date: ".$date."\n");
	
$present=$rows['attendance'];
?>

		<tbody>
			<tr class="row100">
			<td class="column100 column1" data-column="column1"><?php echo($date)?></td>
			<td class="column100 column2" data-column="column2"><?php 
																	if($present==1)
																		echo("Present\n");
																	else
																		echo("Absent\n"); ?></td>
		</tr></tbody>
<?php

}

		
	}?> </table></div>
	<?php




}
else if(isset($_SESSION['studentuser']))
{

	$smail=$_SESSION['studentuser'];
$sidquery="SELECT * from student where smailid ='$smail'";
$result=@mysqli_query($attendance,$sidquery);

while($sids=@mysqli_fetch_array($result))
{
	$sid=$sids['sid'];
}

$cno=-1;


		$display="SELECT * from attendance where sid ='$sid' order by cno ";
$result=@mysqli_query($attendance,$display);

		if(@mysqli_num_rows($result)>0)
	{
		
		while($rows=@mysqli_fetch_array($result))
		{	

			if($cno!=$rows['cno'])
			{
				$cno=$rows['cno'];
				$percentage="select ((select count(*) from attendance where sid='$sid' and attendance=1 and cno='$cno'  group by cno)/ (select count(*) from attendance where sid='$sid' and cno='$cno' group by cno)) *100 as percentage" ;
				$perquery=@mysqli_query($attendance,$percentage);
				$row=@mysqli_fetch_array($perquery);
				$totalperc=$row['percentage'];
				//echo("Percentage".$totalperc."\n");
$display2="SELECT * FROM course where cno='$cno'";
$course=@mysqli_query($attendance,$display2);

while($courses=@mysqli_fetch_array($course))
{
	$cname=$courses['cname'];
	
}
//echo("Coursename:".$cname."\n");
?>	

<table data-vertable="ver1" style="max-width: fit-content; margin-top: 10em;">

		 <thead>
	    <tr class="row100 head">
		<th class="column100 column1" data-column="column1" style="max-width: 8em;"></th>
		<th class="column100 column2"data-column="column2" style="padding-left: 10px;"><?php echo($cname."<br>".$totalperc);?></th></tr></thead>
		<?php


}


$date=$rows['date'];

$present=$rows['attendance'];
	

?>

		<tbody>
			<tr class="row100">
			<td class="column100 column1" data-column="column1"><?php echo($date)?></td>
			<td class="column100 column2" data-column="column2"><?php 
																	if($present==1)
																		echo("Present\n");
																	else
																		echo("Absent\n"); ?></td>
		</tr></tbody>
<?php


}

		
	}?></table></div>
<?php

}

else
{
	die("<h2 id='deta' style='color: grey;'>Please Login!</h2><p>");
}




?>
