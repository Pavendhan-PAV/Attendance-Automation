<?php
session_start();
if(isset($_SESSION['parentuser'])){
	unset($_SESSION['parentuser']);
	session_destroy();
}


if(isset($_SESSION['studentuser'])){
	unset($_SESSION['studentuser']);
	session_destroy();
}

if(isset($_SESSION['fmail'])){
	unset($_SESSION['fmail']);
	session_destroy();
}

header("Location:index.php");




?>

