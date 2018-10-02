<?php 
$subject = "Unsere erste E-Mail"; 
$to = "mali@pls.ch"; 
$body = "Das ist Unsere erste E-Mail welche mir mit Xampp versendet haben"; 
 
if( mail($to, $subject, $body) ) { 
echo "E-Mail ist versendet worden"; 
} else { 
echo "E-Mail konnte nicht versendet werden"; 
} 
?>