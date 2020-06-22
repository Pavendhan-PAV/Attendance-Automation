<?php

  session_start();
  require_once "connect.php";

 
?>

<html>
  <body style="background-color: #29292ade; opacity: 1;">
  <title>ATTENDANCE MARKER</title>
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


  <?php if(!isset($_POST['date']))
  {
    $cno = $_SESSION['cno'];
    $sql1 = "SELECT * FROM sidcno WHERE cno='$cno'";
    $query1 = mysqli_query($attendance,$sql1);
    $stud = array();
    $b = 0;
    while($row = mysqli_fetch_assoc($query1))
    {
      $stud[$b] = $row['sid'];
      $b = $b+1;
    }
    ?>
    <form style="margin-top: 15em;" method="post">
      <input id="detain" type="date" name="date" style="color: #1b1b1b; font-size: 1em; max-width: 20em;min-width: 15em;border: none;opacity: 0.7;min-height: 3.25em;border-radius: 0.25em; padding-left: 3.7em;"><br><br>
      <table id="detain" border="5px">
        <tr>
          <th>ROLL NO</th>
          <th>Attendance</th>
        </tr>
        <?php
        foreach ($stud as $name)
        { ?>
          <tr>
            <td><?php echo $name; ?></td>
            <td><input id="detain" type="checkbox" name="attendance[]" value="<?php echo $name; ?>" checked></td>
          </tr><?php
        } ?>
      </table>
      <br><br>
     <input class="btn btn-success btn-block" type="submit" id="register" name="submit" value="SUBMIT" style="max-width: 12em;">
    </form>
  <?PHP } ?>

  <?php 
     if(isset($_POST['date']))
  {
    $cno = $_SESSION['cno'];
    $date = $_POST['date'];
    $name = $_POST['attendance'];
    $present = array();
    $a = 0;
    foreach($name as $no)
    {
      $present[$a] = $no;
      $a = $a+1;
    }
    $sql1 = "SELECT sid FROM sidcno WHERE cno='$cno'";
    $query1 = mysqli_query($attendance,$sql1);
    $stud = array();
    $b = 0;
    while($row = mysqli_fetch_assoc($query1))
    {
      $stud[$b] = $row['sid'];
      $b = $b+1;
    }
    foreach ($stud as $id)
    {
      $c = 0;
      foreach ($present as $key)
      {
        if($id == $key)
        {
          $c = 1;
        }
      }
      $sql = "INSERT INTO attendance VALUES('$date','$id','$cno','$c')";
      $query = mysqli_query($attendance,$sql);
    }
    if($query)
    {
      echo "<h2 id='deta'>Attendance added Successfully!</h2><p>";
    }
    else
    {
      echo "<h2 id='deta'>Failed to add Attendance!</h2><p>";
    }
  }

   ?>
</html>
