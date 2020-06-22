<?php
	require_once "connect.php";
session_start();
if(isset($_POST['parentuser']))
{ 
		if(isset($_SESSION['studentuser']))
unset($_SESSION['studentuser']);

if(isset($_SESSION['fid']))
unset($_SESSION['fid']);



	$userid=$_POST['parentuser'];
	$password=$_POST['password'];
	$validate="SELECT * FROM parent where pmailid='$userid' and password='$password'";

	$result=mysqli_query($attendance,$validate);

	if(@mysqli_num_rows($result)>0)
	{
		$_SESSION['parentuser']=$userid;
		 header('location:student_dashboard.php');
	}
	else
	{

		$_SESSION['parenterror']="Wrong login details";
		header('location:index.php#programs-section');
	}

}
else if(isset($_POST['studentuser']))
{	

	if(isset($_SESSION['parentuser']))
unset($_SESSION['parentuser']);

if(isset($_SESSION['fid']))
unset($_SESSION['fid']);


	$userid=$_POST['studentuser'];
	$password=$_POST['password'];
	$validate="SELECT * FROM student where smailid='$userid' and password='$password'";

	$result=mysqli_query($attendance,$validate);

	if(@mysqli_num_rows($result)>0)
	{
		$_SESSION['studentuser']=$userid;
		 header('location:student_dashboard.php');
	}
	else
	{
		$_SESSION['studenterror']="Wrong login details";
		header('location:index.php#courses-section');
	}

}
else if(isset($_POST['fmail']))
{	

	if(isset($_SESSION['parentuser']))
unset($_SESSION['parentuser']);

	if(isset($_SESSION['studentuser']))
unset($_SESSION['studentuser']);


	$userid=$_POST['fmail'];
	$password=$_POST['password'];
	$validate="SELECT * FROM faculty where fmail='$userid' and password='$password'";

	$result=mysqli_query($attendance,$validate);

	if(@mysqli_num_rows($result)>0)
	{
		$_SESSION['fmail']=$userid;
		 header('location:facultydash.php');
	}
	else
	{
		$_SESSION['ferror']="Wrong login details";
		header('location:index.php#teachers-section');
	}

}
else
{
	die("Please Log In!!");
}
?>
