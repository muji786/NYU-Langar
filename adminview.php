<?php
ob_start();
session_start();
if (!isset($_SESSION["aid"])) {
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
      <p>NYU Center ID<br>
	  <b>N<?php echo $_SESSION["aid"]; ?></b></p>
      <ul class="nav">
        <li><a href="#">HOME</a></li>
        <li><a href="#">CAMPUS CASH</a></li>
        <li><a href="#">DINING SERVICES</a></li>
        <li><a href="#">ACCOUNT SETTINGS</a></li>
        <li><a href="#">INFORMATION</a></li>
        <li><a href="#">DONATE</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
	<div class="col-sm-8 content-body">
		<center>
			
		<h4>Welcome to the NYU Portal(<b><?php echo $_SESSION["name"]; ?></b>).</h4>
		
		<br><br>
		<table class="table table-strip table-bordered">
		<tr class="bg-pink txt-white"><th>Student Name</th><th>Meals</th><th>Status</th><th>Time</th><th>Date</th><tr>
		<?php if (isset($_GET["text"])) {
    $upd = "Update donatedmeals set status='1' where id='" . $_GET["id"] . "'";
    if ($conn->query($upd)) {
      //echo 'window.open("https://twitter.com/intent/tweet?text=". $_GET["text"])';
      header("location:https://twitter.com/intent/tweet?text=" . $_GET["text"]);
    }
  } ?>

		<?php
  $sql =
    "Select * from donatedmeals where center='" .
    $_SESSION["name"] .
    "' order by id desc";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
      $ql = "select * from student where id='" . $row["sid"] . "'";
      $es = $conn->query($ql);
      $rw = $es->fetch_assoc();

      $qx = 0;
      $sx =
        "Select * from donatedmeals where center='" . $_SESSION["name"] . "'";
      $resx = $conn->query($sx);
      if ($resx->num_rows > 0) {
        while ($resx->fetch_assoc()) {
          $qx++;
        }
      }

      $tweet =
        $rw["name"] .
        ' just donated a meal.
		  ' .
        $qx .
        " kind souls have donated their meals to " .
        $_SESSION["name"] .
        " so far. Thank you for sharing. ~ The best amongst you are those who are most beneficial to others. ~ #EndHunger #NYULangar #PowerofGiving ";
      echo '<tr class="">
				<td>' .
        $rw["name"] .
        '</td>
				<td>1</td>
				<td>';
      if ($row["status"] == "1") {
        echo '
				<a   href="#" class="btn bg-pink txt-white disabled">Used</a>';
      } else {
        echo '
				<a   href="?&id=' .
          $row["id"] .
          "&text=" .
          $tweet .
          '" class="btn bg-pink txt-white">Use Meal</a>
				';
      }
      echo '</td>
				<td>' .
        $row["time"] .
        "</td><td>" .
        $row["date"] .
        '</td>
</tr>';
    }
  }
  ?>
	
		</center>
	</div>
</div>
</div>
</body>
</html>