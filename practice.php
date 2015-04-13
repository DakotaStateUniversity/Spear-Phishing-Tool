<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    include("functions.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="Dashboard Page" content="Dashboard">
    <meta name="author" content="Dsu.edu">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body { background: url(assets/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand">DSU Spearphishing</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="divider-vertica"></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container hero-unit">

<?php 
echo "<select name = 'time'>";
foreach (range(0,23) as $fullhour) {
$fullhour2digit = strlen($fullhour)==1 ? '0' . $fullhour : $fullhour;
$parthour = $fullhour > 12 ? $fullhour - 12 : $fullhour;
$parthour .= $fullhour > 11 ? ":00 pm" : ":00 am";
$parthour = $parthour=='0:00 am' ? 'midnight' : $parthour;
$parthour = $parthour=='12:00 pm' ? 'noon' : $parthour;

$parthalf = $fullhour > 12 ? $fullhour - 12 : $fullhour;
$parthalf .= $fullhour > 11 ? ":30 pm" : ":30 am";


//SHOWS THE TEST FOR 'SELECTED' IN THE OPTION TAG
     echo '<option ';
     if (date("H:i:s", strtotime($startdate)) === $fullhour2digit . ':00:00')
        {echo ' SELECTED ';}
     echo 'value="' . $fullhour2digit . ':00:00">' .  $parthour . '</option>';
     echo '<option ';
     if (date("H:i:s", strtotime($startdate)) === $fullhour2digit  . ':30:00')
        {echo ' SELECTED ';}
     echo 'value="' . $fullhour2digit . ':30:00">' .  $parthalf . '</option>';
}
"</select>";
?>
</select>



<select name="starttime">
<option value="00:00:00">midnight</option><option value="00:30:00">0:30 am</option>
</div>
</body>

  
</html>









