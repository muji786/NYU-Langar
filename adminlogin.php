<?php
ob_start();
session_start();
require_once "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

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
		<a href="studentlogin.php">
		<img src="inc/logo.png">
		</a>
		</center>
	</div>
	</div><br><br>
	<div class="row content">
	<div class="col-sm-4 sidenav bg-white">
     
    </div>
	<div class="col-sm-4 content-body">
		<center>
			
		<h4>Welcome to the NYU Admin Login.</h4>
		<h4>Please login to continue!</h4><a href="studentlogin.php" class="text-black">Student Login</a>
		
		<br><br>
		<form action="" method="post">
			<input type="email" name="email" placeholder="Enter Email" required class="form-control"><br>
			<input type="password" name="pass" placeholder="Enter password" required class="form-control"><br>
			<input type="submit" name="login" value="LOGIN" class="bg-pink txt-white btn btn-lg">
		</form><br>
		
		<a href="adminlogin.php" class="text-black">Admin Login</a>
		<?php if (isset($_POST["login"])) {
    $sql =
      "select * from admin where email='" .
      $_POST["email"] .
      "' and pass='" .
      $_POST["pass"] .
      "'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
      $row = $res->fetch_assoc();
      $_SESSION["name"] = $row["name"];
      $_SESSION["aid"] = $row["id"];
      header("location:adminview.php");
    } else {
      echo "<h3><i>Try Again Later</i></h3>";
    }
  } ?>
		</center>
	</div>
</div>
</div>
</body>
</html>