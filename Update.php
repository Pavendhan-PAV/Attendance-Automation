<?php

  session_start();
  require_once "connect.php";
  $cno = $_SESSION['cno'];
?>
<html>
  <body style="background-color: #29292ade; opacity: 1;">
  <title>ATTENDANCE UPDATE</title>
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
  <form style="margin-top: 10em;" method="post">

    <input type="text" name="sid" placeholder="Student id" value="Student id"
    style="color: #1b1b1b;
      font-size: 1em; max-width: 20em;min-width: 15em;border: none;opacity: 0.7;min-height: 3.25em;border-radius: 0.25em; padding-left: 3.7em;"><t><t><p><div></div>
    <input type="date" name="date" value="2020-01-01" style="color: #1b1b1b;
      font-size: 1em; max-width: 20em;min-width: 15em;border: none;opacity: 0.7;min-height: 3.25em;border-radius: 0.25em; padding-left: 3.7em;"><br><br>

    <input type="submit" name="search" class="btn btn-success btn-block" id="register" value="SUBMIT" style="max-width: 12em;">
  </form>
<?php
  if(isset($_POST['search']))
  {
  if(!($_POST['sid'] === "Student id") && !($_POST['date'] === "2020-01-01"))
  {
   
    $_SESSION['a'] = "set";
    
    if(isset($_SESSION['b']))
    {
      unset($_SESSION['b']);
    }
    if(isset($_SESSION['c']))
    {
      unset($_SESSION['c']);
    }
    $_SESSION['sid'] = $_POST['sid'];
    $_SESSION['date'] = $_POST['date'];
    $sid = $_POST['sid'];
    $date = $_POST['date'];
    $sql = "SELECT * FROM attendance WHERE sid='$sid' AND date='$date' AND cno='$cno'";
    $query = mysqli_query($attendance,$sql);

    $row = mysqli_fetch_assoc($query);
    ?>
    <form action="change.php" method="post">
      <p><div></div>
      <table border="2px">
        <tr>
          <th></th>
          <th><?php echo $row['date']; ?></th>
        </tr>
        <tr>
          <td><?php echo $row['sid']; ?></td>
          <td><?php if($row['attendance'] == "1")
                    {?>
                      <input type="checkbox" name="attendance[]" value="<?php echo $row['sid']; ?>" checked>
                <?php }
                    else
                    {?>
                      <input type="checkbox" name="attendance[]" value="<?php echo $row['sid']; ?>">
                <?php }?>
        </tr>
      </table>
      <p><div></div>
      <input type="submit" class="btn btn-success btn-block" id="register" value="SUBMIT" style="max-width: 12em;">
    </form>
<?php  }
  else if((!($_POST['date'] === "2020-01-01")) && ($_POST['sid'] === "Student id"))
  {
   
    $_SESSION['b'] = "setb";
    if(isset($_SESSION['a']))
    {
      unset($_SESSION['a']);
    }
    if(isset($_SESSION['c']))
    {
      unset($_SESSION['c']);
    }
    $date = $_POST['date'];
    $_SESSION['date'] = $date;
    $sql = "SELECT * FROM attendance WHERE date='$date' AND cno='$cno'";
    $query = mysqli_query($attendance,$sql);
    ?>
    <form action="change.php" method="post">
      <p><div></div>
      <table border="2px">
        <tr>
          <th></th>
          <th><?php echo $date; ?></th>
        </tr>
      <?php while($row = mysqli_fetch_assoc($query))
      {?>
          <tr>
            <td><?php echo $row['sid']; ?></td>
            <td><?php if($row['attendance'] == "1")
                      {?>
                        <input type="checkbox" name="attendance[]" value="<?php echo $row['sid']; ?>" checked>
                  <?php }
                      else
                      {?>
                        <input type="checkbox" name="attendance[]" value="<?php echo $row['sid']; ?>">
                  <?php }?>
          </tr>
  <?php    }?>
      </table>
      <p><div></div>
    <input type="submit" class="btn btn-success btn-block" id="register" value="SUBMIT" style="max-width: 12em;">
  </form>
<?php }
else if(($_POST['date'] === "2020-01-01") && (!($_POST['sid'] === "Student id")))
{
 
  $_SESSION['c'] = "setc";
  if(isset($_SESSION['a']))
  {
    unset($_SESSION['a']);
  }
  if(isset($_SESSION['b']))
  {
    unset($_SESSION['b']);
  }
  $sid = $_POST['sid'];
  $_SESSION['sid'] = $sid;
  $sql = "SELECT * FROM attendance WHERE sid='$sid' AND cno='$cno'";
  $query = mysqli_query($attendance,$sql);
  ?>
  <form action="change.php" method="post">
    <p><div></div>
    <table border="2px">
      <tr>
        <th></th>
        <th><?php echo $sid; ?></th>
      </tr>
    <?php while($row = mysqli_fetch_assoc($query))
    {?>
        <tr>
          <td><?php echo $row['date']; ?></td>
          <td><?php if($row['attendance'] == "1")
                    {?>
                      <input type="checkbox" name="attendance[]" value="<?php echo $row['date']; ?>" checked>
                <?php }
                    else
                    {?>
                      <input type="checkbox" name="attendance[]" value="<?php echo $row['date']; ?>">
                <?php }?>
        </tr>

<?php    }?>
    </table>
    <p><div></div>
 <input type="submit" class="btn btn-success btn-block" id="register" value="SUBMIT" style="max-width: 12em;">
</form>
<?php }
}?>

</body>
</html>
