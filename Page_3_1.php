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
<title>Page 3</title>

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
	.txt-pink{
	color:#ff725e !important;
	font-size:22px !important;
	}.txt-green{
	color:#82cb8c !important;
	font-size:22px !important;
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
	<div class="col-sm-1"></div>
	<div class="col-sm-6 bg-white content-body" style="padding:0px 0px 0px 0px;">
		<div style="width:100%;height:40px;" class="bg-pink">
			<img src="inc/banner.png" width="100%" height="120px">
		</div>
		<center>
		<br><br><br><br><br>
		<div class="col-sm-4 h4">
			<span class="txt-pink">
			<?php
   $q = 0;
   $s = "Select * from donatedmeals where sid='" . $_SESSION["uid"] . "'";
   $res = $conn->query($s);
   if ($res->num_rows > 0) {
     while ($res->fetch_assoc()) {
       $q++;
     }
     echo $q;
   } else {
     echo "00";
   }
   ?>
			
			
			</span><br>
			Meals donated so far
		</div><div class="col-sm-4 h4">
			<span class="txt-pink">
				<?php
    $start_date = date("Y-m-d");
    $z = -7;
    $d = date("Y-m-d", strtotime("$z days", strtotime($start_date)));

    $sx =
      "Select * from donatedmeals where sid='" .
      $_SESSION["uid"] .
      "' and `date` > '$d'";
    $resx = $conn->query($sx);
    $qx = 0;

    if ($resx->num_rows > 0) {
      while ($resx->fetch_assoc()) {
        $qx++;
      }
      echo $qx;
    } else {
      echo "00" . $conn->error;
    }
    ?>
			
			</span><br>
			Meals donated this week
		</div><div class="col-sm-4 h4">
			<span class="txt-green"><?php
   $totalmeals = 70;
   echo $totalmeals - $qx;
   ?> </span><br>
			Maximum weekly meals left
		</div>
		
		<div class="col-sm-4 h4">
			<span class="txt-green"><?php
   $ax = 100;
   echo $ax - $q;
   ?> </span><br>
			Remaining Maximum meals Per Week
		</div>
		<div class="col-sm-4 h4">
			<span class="txt-green"><?php
   $totalmeals = 70;
   echo "100";
   ?> </span><br>
			Maximum meals Allowed Per Semester
		</div>
		<div class="col-sm-4 h4">
			<span class="txt-green"><?php echo "10"; ?> </span><br>
			Maximum meals Allowed Per Day
		</div>
		
			</center>
		<br><br>
		<br><br>	<br><br>
			<hr style="border: 1px solid #f8f8f8;">
		<br><br>
		
		<?php
  $a = 0;
  if (isset($_POST["donate"])) {
    //check if meals are below 100 than other donated
    $z = $_POST["type"];
    $x = 1;
    while ($x <= $z) {
      $x++;
      $cht = "Select * from donatedmeals where sid='" . $_SESSION["uid"] . "'";
      $rp = $conn->query($cht);
      if ($rp->num_rows > 99) {
        $a = 10;
      } else {
        $sxy =
          "Select * from donatedmeals where sid='" .
          $_SESSION["uid"] .
          "' and `date` > '$d'";
        $weeklyres = $conn->query($sxy);
        if ($weeklyres->num_rows > 69) {
          $a = 10;
        } else {
          //chk checks is  meals donated for this date is below
          $chk =
            "Select * from donatedmeals where sid='" .
            $_SESSION["uid"] .
            "' and `date`='" .
            $_POST["date"] .
            "'";
          $result = $conn->query($chk);
          if ($result->num_rows > 0) {
            $a = 0;
            while ($result->fetch_assoc()) {
              $a++;
            }
          }
          if ($a > 9) {
            //run statement in form below
          } else {
            echo $qw =
              "INSERT INTO `donatedmeals`(`sid`, `center`, `mealtype`, `date`, `status`, `time`) VALUES ('" .
              $_SESSION["uid"] .
              "','" .
              $_POST["center"] .
              "','meal','" .
              $_POST["date"] .
              "','0','" .
              $_POST["time"] .
              "')";
            if ($conn->query($qw)) {
              header("location:sucess.php");
            } else {
              header("location:error.php");
            }
          }
        }
      }
    }
  }
  ?>
		<form action="" method="post">
		<div class="col-sm-6">
		<label>Select Center</label>
		<input type="hidden" name="date" class="form-control" value="<?php echo $start_date; ?>">
		<input type="hidden" name="time" class="form-control" value="<?php echo date(
    "h:i:s"
  ); ?>">
		<select name="center" class="form-control">
			<option>Islamic Center</option>
			<option>Donation Center</option>
			<option>Xyz Center</option>
		</select>
		
		<?php if ($a >= 10) {
    echo "<br><span style='color:red;font-size:14px;font-weight:bold;'>Your Reached Your Maximum Donation Limit.</span>";
  } ?>			
		
		</div>
		<div class="col-sm-6">
		<label>Select a Meal</label>
		<select name="type" class="form-control">
		<option>1</option><option>2</option><option>3</option>
		<option>4</option><option>5</option>
		</select>
	
	
		</div>
		<div class="col-sm-12"><br>
	<button name="donate" class="bg-pink txt-white btn"> Donate Now</button>
				</form>
			</div>
		
	<br><br>
	</div>
	

</div>
</div>
</body>
</html>