<?php
    require_once('connection.php');
    session_start();
    if(isset($_SESSION['id'])){
      $userid = $_SESSION['id'];
      $sql = " SELECT * FROM user WHERE id = '$userid'";
      $res = mysqli_query($connect,$sql);
      $rows = mysqli_fetch_assoc($res);
      $fname = $rows ['fullname'];
      $address = $rows ['uaddress'];
      $phone = $rows ['phone'];
      $email = $rows ['email'];
      $pic = $rows ['img'];

    }else{
      $error = "please login first";
      header('location:../public/index.php?error='.$error);
      
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mail</title>
	<link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css">
<style>
  .container .gallery embed{
    margin: 20px;
  }
</style>
</head>
<body>