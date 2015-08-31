<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    
?>
<?php
/*EMAIL TEMPLATE ENDS*/
//Select emails based off campaign ID 
/*
$sql = "SELECT contacts.email, campaigns.id FROM contacts INNER JOIN clients ON contacts.client_id = clients.id INNER JOIN campaigns ON clients.id = campaigns.client_id WHERE campaigns.id = 26 ";*/
$sql= "SELECT contacts.email FROM contacts WHERE contacts.client_id = 85";
$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll();
foreach($results as $row) {   
$to      = $row['email'];  } 


// subject
$subject = 'Practice Email';

// message
$message = '
<html>
<head>
  <title>Sample email test</title>
</head>
<body>
  <h1>Please update your password to help protect your account</h1>
<p>To update password please click the link below to begin the process.</p>
<p>http://localhost.com</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
//$headers .= 'To: ' . "\r\n";
$headers .= 'From: Corporation Name <localhost@localhost>' . "\r\n";
$headers .= 'Cc: archive@example.com' . "\r\n";
$headers .= 'Bcc: example@example.com' . "\r\n";

// Mail it
//mail($to, $subject, $message, $headers);
if(mail($to, $subject, $message, $headers))
{
echo 'HTML email sent successfully!';



}
else
{
echo 'Problem sending HTML email!';
}
?>







