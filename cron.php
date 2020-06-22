<?php 
	require_once "connect.php";
	$y= date("Y");
	
	try {
    // First of all, let's begin a transaction
    $connection1->beginTransaction();

    // A set of queries; if one fails, an exception should be thrown
    $connection1->exec("UPDATE student SET status='passive' WHERE $y>batch+year");

    $connection1->exec("INSERT INTO attendancearchive  SELECT * FROM attendance WHERE sid IN (SELECT sid FROM student WHERE status='passive')");
    $connection1->exec("DELETE FROM sidcno WHERE  sid IN (SELECT sid FROM student WHERE status='passive')");
    $connection1->exec("DELETE FROM atttendance WHERE  sid IN (SELECT sid FROM student WHERE status='passive') ");
     $connection1->exec("DELETE FROM student WHERE status='passive'");

  
    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
    $connection1->commit();
} catch (Exception $e) {
	echo "failed";
    // An exception has been thrown
    // We must rollback the transaction
    $connection1->rollback();
}
header("location:facultydash.php");

	

 ?>
 