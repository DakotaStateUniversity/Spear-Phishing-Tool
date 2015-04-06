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
	#sm {
		width: 75px;
		}
	
$(document).ready(function() {
    $('#example').dataTable();
} );
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
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container hero-unit">
    <h2>Campaigns</h2>

      <ul class="nav nav-pills">
        <li><a href="clients.php">Clients</a></li>
	<li><a href="manage.php">Manage Lists</a></li>
        <li><a href="campaign.php">Manage Campaign</a></li>
        <li><a href="results.php">View Results</a></li>
	<li><a href="">Emails</a></li>
        </ul>

	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  	+New Campaign
	</button>	
    
    
<!-- Modal to access New campaign form -->

<form action="" method="post"> 
<!-- Modal -->
<div class="modal hide fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Campaign</h4>
      </div>
      <div class="modal-body">


<!-- create drop down for user to select table to see results  -->

<form>

	  <label>Select Client to view phishing results</label> 
                        <div id="add_campaign">
                                <form method="post" action="">
                                    <div id="wizard">
                                    <ul>
                                        <li><a href="">Name & Path*</a></li>
                                        <li><a href="#wizard-2">Targets*</a></li>
                                        <li><a href="#wizard-3">Schedule</a></li>
                                        <li><a href="#wizard-4">Template</a></li>
                                  
                                    </ul>
                                    <div id="wizard-1">
                                    <table class="new_campaign_table">
                                        <tr><td><br /></td></tr>
<td></td>
                                            
                                        </tr>
                                        <tr>//get group name
                                            <td>Name</td>
                                       
</table> 

</form>
</body>
</html>
