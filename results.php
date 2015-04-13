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
	<li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container hero-unit">

<h2>Results</h2>
      <ul class="nav nav-pills">
        <li><a href="clients.php">Clients</a></li>
	<li><a href="manage.php">Manage Lists</a></li>
        <li><a href="campaign.php">Manage Campaign</a></li>
        <li><a href="results.php">View Results</a></li>
	<li><a href="">Emails</a></li>
        </ul>
</br>


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

<h2 class="text-center">Phishing Results</h2>
			<hr width="25%">

<table id="myTable" class="table table-striped">
    <thead>
      <tr>
	<th width="3%" align="left">Camp.ID</th>
	<th width="10%" align="left">Clients name</th>
	<th width="10%" align="left">First name</th>
       	<th width="10%" align="left">last name</th>
	<th width="10%" align="left">email</th>
	<th width="10%" align="left">Date Created</th>
       	<th width="10%" align="left">Clicked</th>
     </tr>
    </thead>
    <tbody>
<?php
	$link = 'results.php';
	$id = $_GET['cid'];
	
	$sql = "SELECT contacts.fname, contacts.lname, contacts.email, clients.id, clients.name, campaigns.id, campaigns.date_created FROM contacts INNER JOIN clients ON contacts.client_id = clients.id 
		INNER JOIN campaigns ON clients.id = campaigns.client_id WHERE campaigns.id = $id"; 


	/*$sql = "SELECT campaigns.id, date_created, client_id, clients.name FROM campaigns INNER JOIN clients ON campaigns.client_id = clients.id WHERE campaigns.id = $id ";*/

		
	$stmt = $db->prepare($sql);

	$stmt->execute();

	$results = $stmt->fetchAll();

	

	foreach($results as $row) 

 {
echo ' <tr> ';
echo ' <td> ';
echo $row['id'];
echo ' <td> ';
echo $row['name'];
echo ' <td> ';
echo $row['fname'];
echo ' <td> ';
echo $row['lname'];
echo ' <td> ';
echo $row['email'];
echo ' <td> ';
echo $row['date_created'];
echo ' </tr> ';


}

?>
  </tbody>
  </table>

</div>
</div>
</div>
</div>

</form>






</body>
</html>





