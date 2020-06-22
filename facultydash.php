<?php
session_start();
require_once "connect.php";


 
 
  if(isset($_POST['update']))
  {
    $_SESSION['cno'] = $_POST['cno'];
    if($_POST['option'] === "view")
    {
      header('Location: Faculty_view.php');
    }
    else if($_POST['option'] === "update")
    {
      header('Location: Update.php');
    }
    else
    {
      header('Location: Mark_Attendance.php');
    }
  }
 if(isset($_SESSION['fmail']))
  {
    $fmail = $_SESSION['fmail'];

    $sql = "SELECT * FROM faculty WHERE fmail='$fmail'";

    $result = mysqli_query($attendance, $sql);

    $row=mysqli_fetch_assoc($result);

    if(isset($row))
    {
       $fname=$row['fname'];
       $fid=$row['fid'];
        $dno=$row['dno'];

    }



    $sql1="SELECT cno,cname FROM course WHERE cno IN (SELECT cno from cnofid where fid='$fid')";

   $result = mysqli_query($attendance, $sql1);

   // $result = $pdo->query($sql1);


  }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
  <title>FACULTY DASHBOARD</title>
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
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4" style="margin-top: 2em;">
<h2 id="deta">
<?php if(!isset($_SESSION['fmail'])) {
  die("Please Log IN!!!");
    return;
  } ?></h2>

    <?php if(isset($_SESSION['fmail'])) ?>
 		<div>
     
 			<?php echo("<h2 id='deta'>Welcome ".$fname."</h2><p>"); ?>
 		</div>
<?php 
  $dept="SELECT dname from dept where dno='$dno' ";
  $dispdept=mysqli_query($attendance,$dept);
  $rowdept=mysqli_fetch_array($dispdept);
  $deptname=$rowdept['dname'];
  echo("<div id='detain'>Department:    <b id='inner'> ".$deptname."\n</b></div>");


?>

 		<div></div><p></p><br>
    <div>
      <form method="POST">
 		<select id="deta" required="" style="color: #1b1b1b; font-size: 1em;min-width: fit-content;padding-right: 70px; border: none;opacity: 0.7;min-height: 3.25em;border-radius: 0.25em; padding-left: 3.7em;" name="cno">
        <option value="">Select Course</option>
<?php
if(isset($_SESSION['fmail']))
{

        if(@mysqli_num_rows($result)>0)
        {
          while($rows=mysqli_fetch_array($result))
          {
              $cno=$rows['cno'];
              $name=$rows['cname'];
              ?> <option name="cno" value="<?php echo $cno; ?>"><?php echo($cno."-".$name);?></option><?php
          }     ?>
          </select><p><div></div>
          <input type="radio" name="option" value="view"><strong style="color: #c7c7c7;"> View</strong><br>
          <input type="radio" name="option" value="update"><strong style="color: #c7c7c7;"> Update</strong><br>
          <input type="radio" name="option" value="new"><strong style="color: #c7c7c7;"> New Attendance</strong>
      <?php  }
      echo "</br></br>";
}
?>  <input class="btn btn-success btn-block" type="submit" id="register" name="update" value="Submit" style="max-width: 12em;" >
  </form>

    </div>
    <form action="Remove_Student.php">
      <br><br>
      <input class="btn btn-success btn-block" type="submit" id="register" name="remove" value="Remove student" style="max-width: 16em;background-color: #ff2e2e;color: black;border-color: black;" >
    </form>

 </body>
 </html>
