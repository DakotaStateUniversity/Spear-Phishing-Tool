<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    
?>
<?php


// Email script that can be formatted 

$imgSrc   = ''; // Change image src to your site specific settings
$imgDesc  = ''; // Change Alt tag/image Description to your site specific settings
$imgTitle = 'Hello Yoda'; // Change Alt Title tag/image title to your site specific settings

$subjectPara1 = 'Hello User. It seems your password has not been reset in sometime now. Please take a minute to reset, please click the link below.';
$subjectPara2 = NULL;
$subjectPara3 = NULL;
$subjectPara4 = NULL;
$subjectPara5 = NULL;

$message = '<!DOCTYPE HTML>'.
'<head>'.
'<meta http-equiv="content-type" content="text/html">'.
'<title>Email notification</title>'.
'</head>'.
'<body>'.
'<h1>Hello Yoda Master</h1>'.
'<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">'.
   '<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" alt="'.$imgDesc.'" title="'.$imgTitle.'">'.
'</div>'.

'<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">'. 
   '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'.
       '<p>'.$subjectPara1.'</p>'.
       '<p>'.$subjectPara2.'</p>'.
       '<p>'.$subjectPara3.'</p>'.
       '<p>'.$subjectPara4.'</p>'.
       '<p>'.$subjectPara5.'</p>'.
   '</div>'.  
'</div>'.

'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'.
   'All rights reserved @ mysite.html 2014'.
'</div>'.
'</body>';

/*EMAIL TEMPLATE ENDS*/

//Select emails based off campaign ID 


$sql = "SELECT contacts.email, campaigns.id FROM contacts INNER JOIN clients ON contacts.client_id = clients.id INNER JOIN campaigns ON clients.id = campaigns.client_id WHERE campaigns.id = 24 ";
$stmt = $db->prepare($sql);

	$stmt->execute();

	$results = $stmt->fetchAll();
foreach($results as $row) {   
$to      = $row['email'];  }  // give to email address
$subject = 'Out-of-date information';  //change subject of email
$from    = 'example@localhost';        // give from email address

// mandatory headers for email message, change if you need something different in your setting.
$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: ";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// may need to install (PHPmailer, swiftmailer, PHPMail classes etc.)

if(mail($to, $subject, $message, $headers))
{
echo 'HTML email sent successfully!';

}
else
{
echo 'Problem sending HTML email!';
}
?>

