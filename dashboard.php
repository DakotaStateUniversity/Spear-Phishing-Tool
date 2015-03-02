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
   
      <ul>
        <li><a href="clients.php">Clients</a></li>
	<li><a href="manage.php">Manage Lists</a></li>
        <li><a href="results.php">Manage Campaign</a></li>
        <li><a href="results.php">View Results</a></li>

        </ul>

    



    <h2>Campaign</h2> <br /><br />

	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  	+New Campaign
	</button>	
    
    
<!-- Modal to access New campaign form -->

<form action="results.php" method="post"> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Campaign</h4>
      </div>
      <div class="modal-body">

	<!--Select group name for targets-->
	  <label>Type name for campaign</label> 
	
     <input type="text" name="Gname" value="" /><br />


	    <label>Select Group/Targets</label> 
<?php




	$sql = "SELECT Name FROM clients";

	$stmt = $db->prepare($sql);

	$stmt->execute();

	$results = $stmt->fetchAll();

	echo "<select name = 'clients'>";
	//while ($row = mysql_fetch_array($result)) {
	foreach($results as $row) 
	{
	echo "<option value=' " . $row['Name'] ."'>" . $row['Name'] ."</option>";
	}
	echo "</select>";
?>
<!--Inserst into group table -->

	<!--Pulls templates from folder-->
        <label>Template</label> 
        <select name="Templates">
<?php 
include_once ("include/db.php");
templates();

 
?>
  	</select>
	<!--PHP Script to send out email-->
        <label>Schedule Email</label> 
	<?php

    function createYears($start_year, $end_year, $id='year_select', $selected=null)
    {

        /*** the current year ***/
        $selected = is_null($selected) ? date('Y') : $selected;

        /*** range of years ***/
        $r = range($start_year, $end_year);

        /*** create the select ***/
        $select = '<select id="sm" name="'.$id.'" id="'.$id.'">';
        foreach( $r as $year )
        {
            $select .= "<option value=\"$year\"";
            $select .= ($year==$selected) ? ' selected="selected"' : '';
            $select .= ">$year</option>\n";
        }
        $select .= '</select>';
        return $select;
    }


    function createMonths($id='month_select', $selected=null)
    {
        /*** array of months ***/
        $months = array(
                1=>'January',
                2=>'February',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'October',
                11=>'November',
                12=>'December');

        /*** current month ***/
        $selected = is_null($selected) ? date('m') : $selected;

        $select = '<select id="sm" name="'.$id.'" id="'.$id.'">'."\n";
        foreach($months as $key=>$mon)
        {
            $select .= "<option value=\"$key\"";
            $select .= ($key==$selected) ? ' selected="selected"' : '';
            $select .= ">$mon</option>\n";
        }
        $select .= '</select>';
        return $select;
    }

   
?>

<label>start date</label> <?php echo createYears(2015, 2020, 'start_year', 2015); ?> 
<?php echo createMonths('start_month', 4); ?>
<?php

	$days = range (1, 31); 
	echo " <select id='sm' name='day'>";
foreach ($days as $value) {
echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo '</select><br />';

?>
<select id="sm" name="time">

<option value="">Select</option>

<?php

$start = strtotime('12:00am');
$end = strtotime('11:59pm');
$now = strtotime('now');
$nowPart = $now % 900;
 if ( $nowPart >= 450) {
    $nearestToNow =  $now - $nowPart + 900;
    if ($nearestToNow > $end) { // bounds check
        $nearestToNow = $start;
    }
} else {
    $nearestToNow = $now - $nowPart;
}
for ($i = $start; $i <= $end; $i += 900){
    $selected = '';
    if ($nearestToNow == $i) {
        $selected = ' selected="selected"';
    }
    echo "\t<option" . $selected . '>' . date('g:i a', $i) . "\n";
}
?>

</select>

        <label>Delay email</label> 

     <input type="password" name="password" value="" /> <br />
   ...
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
