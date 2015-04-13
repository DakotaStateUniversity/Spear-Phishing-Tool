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
        
	body { background-color: black; }
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

<form action="" method="POST"> 
<!-- Modal -->
<div class="modal hide fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Campaign</h4>
      </div>
      <div class="modal-body">

	<!--Select group name for targets-->
	  
<?php
      
      $insert_group = $_POST['groupname'];
      $insert_date = $_POST['datecreated'];


if(!empty($insert_group) && !empty($insert_date))
{
     try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "INSERT INTO campaigns (client_id, GName, date_created)
    VALUES (".$_POST['clients'] . ", '".$insert_group."', '".$insert_date."')";

	//$sql = "INSERT INTO sentmail (client_id)
    //VALUES (".$_POST['clients'] . ")";
    
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>
	<label>Type name for campaign</label> 
	<input type="text" name="groupname" value="" /><br />


	    <label>Select Group/Targets</label> 
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


	<!--Pulls templates from folder-->
        <label>Template</label> 
        <select name="Templates">
<?php 
	$dir = "/var/www/html/Spear-Phishing-Tool/templates/"; 

	// Open a known directory, and proceed to read its contents 
	if (is_dir($dir)) { 
  	if ($dh = opendir($dir)) { 
       	while (($file = readdir($dh)) !== false)
	{ 
        print "<option value=\"{$file}\">{$file}</option>"; 
       	} 
       closedir($dh); 
  		 } 
} 
 
?> </select>

	<label>Date Created</label> 
	<input type="date" name="datecreated" value="" /><br />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

	    <?php if ($_POST['submit'])
	{	
	
	}
		?>

        <button type="submit" name="submit" class="btn btn-primary">Send</button>


        

      </div>
    </div>
  </div>
</div> 
    
   </form>



<!-- create drop down for user to select table to see results  -->



	  <label>Select Phishing Attack Name</label> 

<form action="" method="post">
<?php


	

	$sql = "SELECT id, GName FROM campaigns";

	$stmt = $db->prepare($sql);

	$stmt->execute();

	$results = $stmt->fetchAll();

	echo "<select name = 'campaigns' id='campaigns'>";
	//while ($row = mysql_fetch_array($result)) {
	foreach($results as $row) 
	{
	echo "<option value='" . $row['id'] ."'>" . $row['GName'] ."</option>";
	}
	echo "</select>";

	


?>
</form>



<!--Table for viewing campaign results-->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
<!--create a search function for table -->
<div class="col-sm-6">
<div class="col-sm-6"></div>
<div id="example_filter" class="dataTables_filter">

</div>
</div>
<!--view results of each campaign submitted-->
<form action="" method="POST">
<h2 class="text-center">Phishing Results</h2>
			<hr width="25%">
<table id="myTable" class="table table-striped">
    <thead>
      <tr>
	<th width="3%" align="left">Campaign ID</th>
	<th width="3%" align="left">Client ID</th>
	<th width="10%" align="left">Phishing Attack name</th>
	<th width="10%" align="left">Client name</th>
       	<th width="10%" align="left">Sent Date</th>
	<th width="10%" align="left">Results</th>
       	
     </tr>
    </thead>
    <tbody>
<?php
	$link = 'results.php';
	
	
	
	$sql = "SELECT campaigns.id, GName, date_created, client_id, clients.name FROM campaigns INNER JOIN clients ON campaigns.client_id = clients.id
		ORDER BY campaigns.date_created LIMIT 10"; 
/*INNER JOIN clients ON campaigns.client_id = clients.id
 INNER JOIN contacts ON clients.id = contacts.client_id "*/

	//$sql = "SELECT '".$answer."'";

	$stmt = $db->prepare($sql);

	$stmt->execute();

	$results = $stmt->fetchAll();

	

	foreach($results as $row) 

{
echo ' <tr> ';
echo ' <td> ';
echo $row['id'];
echo ' <td> ';
echo $row['client_id'];
echo ' <td> ';
echo $row['GName'];
echo ' <td> ';
echo $row['name'];
echo ' <td> ';
echo $row['date_created'];
echo ' <td> ';
echo "<a href='".$link."?cid=". $row['id']."'>View Results</a>";
echo ' </tr> ';
$id = $_GET['cid'];

}

?>



  </tbody>
  </table>

</div>
</div>
</div>
</div>

</form>
<!-- pulling data from mysql to insert into bootstrap table -->

	




</body>
</html>
