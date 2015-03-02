<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    
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
    <h2>
<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?> Clients</h2>
            <?php
   $option = isset($_POST['clients']) ? $_POST['clients'] : false;
   if($option) {
      echo htmlentities($_POST['clients'], ENT_QUOTES, "UTF-8");
   } else {
     echo "task option is required";
     exit; 
   }
      ?>
 <?php
   $option = isset($_POST['Gname']) ? $_POST['Gname'] : false;
   if($option) {
      echo htmlentities($_POST['Gname'], ENT_QUOTES, "UTF-8");
   } else {
     echo "task option is required";
     exit; 
   }
      ?>




</body>
</html>
