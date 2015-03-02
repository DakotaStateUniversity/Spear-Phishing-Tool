<?php

include "config.php";


$dbh = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB,MYSQL_USER,MYSQL_PASS);

function templates(){	
global $dbh;
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
}
?>
