<?php
    require("config.php");

$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);;





function get_passwords() {
	global $dbh;

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
	
}




?>
