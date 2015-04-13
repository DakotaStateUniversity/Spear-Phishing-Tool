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
        .hero-unit { background-color: lightblue; }
        .center { display: block; margin: 0 auto; }
	#sm {
		width: 75px;
		}
	
	
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
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container hero-unit">
    <h2>Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, Welcome to the Dashboard.</h2>

      <ul class="nav nav-pills">
        <li><a href="clients.php">Clients</a></li>
	<li><a href="manage.php">Manage Lists</a></li>
        <li><a href="campaign.php">Manage Campaign</a></li>
        <li><a href="results.php">View Results</a></li>
	<li><a href="">Emails</a></li>
        </ul>

   

</body>
</html>
