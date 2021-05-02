<?php
ob_start();
session_start();
if (!isset($_SESSION["uid"])) {
  header("location:logout.php");
}
require_once "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<style>
body{
background:#fbfbfb !important;
}
	h1,p,button,a,li,ul,ol,svg,span{
	font-size:1em !important;
	}
	.bg-purple,.nav>li{
	background:#4e1887 !important;
	}
	.bg-pink{
	background:#ff725e;
	}
	.bg-white,#bg-white{
	background:white !important;
	}
	.nav>li>a{
	color:white;
	}
	#bg-white>a{
	color:black;
	margin-left:25px;
	}
	.txt-white{
	color:white !important;
	}
	.content,.sidenav{
	padding-top:10px;
	}
	.content-body{
	margin-left:40px;
	border-radius:15px;
	filter:drop-shadow(0px 10px 50px rgba(0, 0, 0, 0.161));
	}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
	
	  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 bg-purple">
		<center>
		<img src="inc/logo.png">
		</center>
	</div>
	</div><br><br>
	<div class="row content">
	<div class="col-sm-3 sidenav bg-white">
      <p>Customer Information</p>
      <br>
	  <p>NAME<br>
	 <b><?php echo $_SESSION["name"]; ?></b></p>
      <p>NYU ID number<br>
	  <b>N<?php echo $_SESSION["uid"]; ?></b></p>
     <?php include "sidebar.php"; ?>
    </div>
	<div class="col-sm-8 content-body">
		<center>
			
		<h4>Welcome to the NYU Portal.</h4>
		<h4>Please select a service to continue!</h4>
		<br><br>
		</center>
	</div>
</div>
</div>
</body>
</html>