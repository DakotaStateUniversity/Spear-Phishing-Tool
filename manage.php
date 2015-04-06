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
    <h2>Manage Clients</h2>
   
      <ul class="nav nav-pills">
        <li><a href="clients.php">Clients</a></li>
	<li><a href="manage.php">Manage Clients</a></li>
        <li><a href="campaign.php">Manage Campaign</a></li>
        <li><a href="results.php">View Results</a></li>

        </ul>

    <br /><br />
<!--
#First modal lets you create new client
 
-->
	<h2>Create Client</h2>


	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  	+New Client
	</button>


<form action="" method="post" > 
<!-- Modal -->
<div class="modal hide fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Client</h4>
      </div>
      <div class="modal-body">

	
<?php
      
      $insert_Name = $_POST['Name'];
      $insert_Location = $_POST['Location'];
      
if(!empty($insert_Name) && !empty($insert_Location)){
     try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


   $sql = "INSERT INTO clients (name, location, user_id)
    VALUES ('".$insert_Name."', '".$insert_Location."', (SELECT id FROM users WHERE username = '".$_SESSION ['user']['username']."') )";
    
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>
<label>Client Name</label>
<input type="text" name="Name" value="" /><br /> 
<label>Client Location</label>
<input type="text" name="Location" value="" /> <br />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

	    <?php if ($_POST['submit']) 
{

}
  
		?>

        <button type="submit" name="submit" class="btn btn-primary" >Send</button>

      </div>
    </div>
  </div>
</div> 
    
		

   </form>



<!--
#Second Modal creates dropdown menu of already inserted Clients. 
#Lets you add user one by one to clients
-->

    <h2>Update Client</h2> 

	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">
  	+Add Contact
	</button>	
    
  
<form action="" method="post"> 
<!-- Modal -->
<div class="modal hide fade in" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Contact</h4>
      </div>
      <div class="modal-body">

	<!--Select group name for targets-->
	  <label>Select Client to add contact</label> 
<?php




	$sql = "SELECT Name, id FROM clients";

	$stmt = $db->prepare($sql);

	$stmt->execute();

	$results = $stmt->fetchAll();

	echo "<select name = 'clients'>";
	//while ($row = mysql_fetch_array($result)) {
	foreach($results as $row) 
	{
	echo "<option value='" . $row['id'] ."'>" . $row['Name'] ."</option>";
	}
	echo "</select>";
?>

        <label>First Name</label> 
<?php



 $insert_FName = $_POST['First'];
 $insert_LName = $_POST['Last'];
 $insert_Email = $_POST['Email'];
      
      
	if(!empty($insert_FName) && !empty($insert_LName) && !empty($insert_Email)){
     		try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $sql = "INSERT INTO contacts (client_id, fname, lname, email) VALUES (".$_POST['clients'] . ", '".$insert_FName."','".$insert_LName."','".$insert_Email."')";
 
	
    $conn->exec($sql);
    }
	catch(PDOException $e)
    {
   	echo $sql . "<br>" . $e->getMessage();
    }

	$conn = null;
	
    }


 
?>
	<input type="text" name="First" value="" /><br /> 

   	<label>Last Name</label> 

	<input type="text" name="Last" value="" /><br /> 

   	<label>Email</label> 

	<input type="text" name="Email" value="" /><br />


	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

	    <?php if ($_POST['submit']) {}


		?>
	
        <button type="submit" name="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div> 
    
		

   </form>



</body>
</html>





