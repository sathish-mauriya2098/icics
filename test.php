<?php
$headers = "From:sathishkumar200298@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
if(isset($_POST['submt']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$subj=$_POST['subject'];
$message=$_POST['message'];
$msg="<b>Name :</b>$name<br>
<b>Email :</b>$email<br>
<b>Subject :</b>$subj<br>
<b>Message :</b>$message";
mail("ksrceitrd@gmail.com","ICICS Contact Us",$msg,$headers);  
echo'<html><body><br><br><br><br><br><br><br><br><center><h1>Message Sent Successfully.<br>Click <a href="index.html">here</a> to go back.</h1></center></body></html>';
}
?>