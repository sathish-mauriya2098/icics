<?php
session_start();
define('DB_NAME','ksrceit_form');
define('DB_USER','ksrceit_ksrceit');
define('DB_PASSWORD','it@20201');
define('DB_HOST','localhost');
$link=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if(!$link)
{
    die('Could not connect:'.mysql_error());
}
$db_selected=mysql_select_db(DB_NAME,$link);
if(!$db_selected)
{
    die('Can not use'.DB_NAME.':'.mysql_error());
}
$user=$_POST['usrnam'];
$pasword=md5($_POST['psw']);
//echo $id;
 $_SESSION['usrnam']=$user;
$disp="SELECT * FROM admindb WHERE NAME='$user' AND PASSWORD='$pasword'";
$res=mysql_query($disp);
$dbusername;
$dbpassword;
if($res){
while ($result=mysql_fetch_assoc($res))
{
    $dbusername=$result['NAME'];
      $dbpassword=$result['PASSWORD'];
//echo"<center><h1>Login successfully</h1></center>";
     //Redirect to the web page
}
    if($user==$dbusername&&$pasword==$dbpassword)
    {
         header("Location: /Viewdata.php");
        $_SESSION['usrnam']=$user;
    }
}
$row=mysql_num_rows($res);
if(!$row){
    echo"<h1>Invalid Password</h1>";
}
mysql_close();
?>