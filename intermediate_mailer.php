<?php
require_once("connect.php");
session_start();
if(isset($_SESSION['parentuser']))
{
$sid=$_SESSION['sid'];
$cno=$_POST['cno'];
$mail=$_SESSION['parentuser'];
$_SESSION['description']=$_POST['content'];

$query1="SELECT * from student where sid='$sid' ";
$query2="SELECT * from parent where pmailid='$mail'";
$query3="SELECT * from faculty where fid=(SELECT fid from cnofid where cno='$cno')";

$result1=mysqli_query($attendance,$query1);
$result2=mysqli_query($attendance,$query2);
$result3=mysqli_query($attendance,$query3);

while($rows=mysqli_fetch_array($result1))
{
	$_SESSION['sid']=$rows['sid'];
	$_SESSION['sname']=$rows['sname'];
	$_SESSION['smail']=$rows['smailid'];
}

while($rows=mysqli_fetch_array($result2))
{
	$_SESSION['pname']=$rows['pname'];
	$_SESSION['pmail']=$rows['pmailid'];
}

while($rows=mysqli_fetch_array($result3))
{
	
	$_SESSION['fmail']=$rows['fmail'];
}


require_once("faculty_mailer.php");
	
}
else if(isset($_SESSION['studentuser']))
{
$smail=$_SESSION['studentuser'];
$cno=$_POST['cno'];

$_SESSION['description']=$_POST['content'];

$query1="SELECT * from student where smailid='$smail'";
$query2="SELECT * from faculty where fid in (SELECT fid from cnofid where cno='$cno')";

$result1=mysqli_query($attendance,$query1);
$result2=mysqli_query($attendance,$query2);

while($rows=mysqli_fetch_array($result1))
{ 
	$_SESSION['sid']=$rows['sid'];
	$_SESSION['sname']=$rows['sname'];
	
}

while($rows=mysqli_fetch_array($result2))
{
	
	$_SESSION['fmail']=$rows['fmail'];
}

require_once("student_mailer.php");
	


}
else
{
	die("Please Log In!!!");
}



?>