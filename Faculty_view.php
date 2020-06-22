<?php

  session_start();
  require_once "connect.php";

  $cno = $_SESSION['cno'];
  $sql = "SELECT sid FROM sidcno WHERE cno='$cno' ORDER BY sid";
  $query = mysqli_query($attendance,$sql);

  $row1 = mysqli_fetch_assoc($query);
  $sid = $row1['sid'];

  $sql1 = "SELECT count(*) FROM attendance WHERE sid='$sid' AND cno='$cno'";
  $query1 = mysqli_query($attendance,$sql1);

  $totclass = mysqli_fetch_array($query1);

 

  $query2 = mysqli_query($attendance,$sql);
  $present = array();
  $a = 0;
  while($row = mysqli_fetch_assoc($query2))
  {
    $id = $row['sid'];
    $sql2 = "SELECT count(*) FROM attendance WHERE sid='$id' AND cno='$cno' AND attendance='1'";
    $query3 = mysqli_query($attendance,$sql2);

    $present[$a] = mysqli_fetch_array($query3);
    $a = $a+1;
  }
  $query4 = mysqli_query($attendance,$sql);
?>
<html>
<head>
  <html>
<head>
  <title></title>
 </head>
 <body style="background-color: #29292ade; opacity: 1;">
  <title>VIEW ATTENDANCE</title>
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
                
                <li><a href="facultydash.php" class="nav-link"  style=" font-weight: bold; color: #000000b0;" >Dashboard</a></li>


                  
              </ul>
            </nav>
          </div>
            <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="logout.php" class="nav-link"><span><?php 
                  if(isset($_SESSION['fmail']))
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
      
      <!div class="slide-1" style="background-color: #192024; opacity: 0.95;" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4" style="margin-top: 2em;">
            <?php echo "<h2 id='deta' style='margin-top: 5em;'>Total Number of Classes: ".$totclass[0]."</h2><p>";
?>
  <br><br>
  <table border="2px">
    <tr>
      <th>STUDEND ID</th>
      <th>PRESENT</th>
      <th>ABSENT</th>
      <th>ELIGIBILITY</th>
    </tr>
    <?php
    $b = 0;
    while($row1 = mysqli_fetch_assoc($query4))
    {?>
      <tr>
        <td><?php echo $row1['sid']; ?></td>
        <td><?php echo $present[$b][0]; ?></td>
        <td><?php echo $totclass[0]-$present[$b][0]; ?></td>
        <td><?php if($totclass[0]-$present[$b][0] >10)
                  {
                    echo "Not eligible";
                  }
                  else
                  {
                    echo "Eligible";
                  } ?></td>
      </tr>
<?php
      $b = $b+1;
    }
    ?>
  </table>
  <br><br>
  
</body>
</html>
