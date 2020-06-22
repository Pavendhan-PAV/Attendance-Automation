<?php

  session_start();
  require_once "connect.php";

  $a = 0;
  $value = array();
  if(isset($_POST['attendance']))
  {
    $name = $_POST['attendance'];
    foreach($name as $no)
    {
      $value[$a] = $no;
      $a = $a+1;
    }
  }
  $cno = $_SESSION['cno'];

  if(isset($_SESSION['a']))
  {
    unset($_SESSION['a']);
    $sid = $_SESSION['sid'];
    $date = $_SESSION['date'];

    if($a == 0)
    {
      $sql = "UPDATE attendance SET attendance='0' WHERE cno='$cno' AND sid='$sid' AND date='$date'";
      $query = mysqli_query($attendance,$sql);
    }
    else
    {
      $sql = "UPDATE attendance SET attendance='1' WHERE cno='$cno' AND sid='$sid' AND date='$date'";
      $query = mysqli_query($attendance,$sql);
    }
  }
  else if(isset($_SESSION['b']))
  {
    unset($_SESSION['b']);
    $date = $_SESSION['date'];
    $stud = array();
    $b = 0;
    $sql1 = "SELECT sid FROM sidcno WHERE cno='$cno'";
    $query1 = mysqli_query($attendance,$sql1);
    while($row = mysqli_fetch_assoc($query1))
    {
      $stud[$b] = $row['sid'];
      $b = $b+1;
    }
    foreach ($stud as $id)
    {
      $c = 0;
      foreach ($value as $key)
      {
        if($id == $key)
        {
          $c = 1;
        }
      }
        $sql = "UPDATE attendance SET attendance='$c' WHERE cno='$cno' AND sid='$id' AND date='$date'";
        $query = mysqli_query($attendance,$sql);
      }
    }
  else if(isset($_SESSION['c']))
  {
    unset($_SESSION['c']);
    $sid = $_SESSION['sid'];
    $stud = array();
    $b = 0;
    $sql1 = "SELECT date FROM attendance WHERE sid='$sid' AND cno='$cno'";
    $query1 = mysqli_query($attendance,$sql1);
    while($row = mysqli_fetch_assoc($query1))
    {
      $stud[$b] = $row['date'];
      $b = $b+1;
    }
    foreach ($stud as $id)
    {
      $c = 0;
      foreach ($value as $key)
      {
        if($id == $key)
        {
          $c = 1;
        }
      }
        $sql = "UPDATE attendance SET attendance='$c' WHERE cno='$cno' AND sid='$sid' AND date='$id'";
        $query = mysqli_query($attendance,$sql);
    }
  }
header('Location: facultydash.php')
?>
