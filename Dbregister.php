<?php
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
//echo"connected successfully";
if(isset($_POST['submit']))
{
    $headers = "From:ksrceitrd@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$target_dir = "upload/";
$target_file = $_FILES["file"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$name=$_POST['name'];
$email=$_POST['mail'];
$mobile=$_POST['numb'];
$institute=$_POST['institute'];
$artititle=$_POST['article'];

$existmail=mysql_query("select*from icics where UPLOAD_PDF='$target_file'");
$sql="INSERT INTO icics(NAME,EMAIL,MOBILE,INSTITUTION,ARTICLE_TITLE,UPLOAD_PDF)
VALUES('$name','$email','$mobile','$institute','$artititle','$target_file')";
if (mysql_num_rows($existmail)>0) {
    echo'<html><body bgcolor=""><br><br><br><br><br><br><br><br><center><h1>File name already exists.Please rename with new filename.<br>Click <a href="register.php">here</a> to go back.</h1></center></body></html>';
   
	
}
        else
        {
         move_uploaded_file($_FILES["file"]["tmp_name"],'upload/'.$target_file);
           mysql_query($sql);
           echo'<script>window.alert("Your ICICS id is:ICICS'.mysql_insert_id($link).'");</script>';
            echo"<html><body><br><br><br><br><br><br><br><br><center><h1>Registered Sucessfully.<br>Click <a href='index.html'>here</a> to go home.</h1><h3>Your paper ID is:ICICS ".mysql_insert_id($link)."</h3></center></body></html>";
            $id=mysql_insert_id($link);
            $msg1="<html><head>
<style>
        body{
           background-color: dimgray;
        }
      
        .log{
           text-align: justify;
           width: 550px;
            height:auto;
            font-size: 23px;
            background-color: #E6E6FA;
            border:2px solid;
            border-radius: 4px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 15px 30px;
            box-shadow: 3px 3px 8px 8px ;
           }
     
       h4{
           font-family: Times New Roman;
        }
        h3{
            font-family: sans-serif;
        }
         h1{
            font-size: 35px;
            font-family:Castellar;
             text-align: center;
             color:indigo;
        }
        p{
            color: red;
            text-decoration: underline;
            font-family: serif;
        }
       
        p2{
            color: brown;
            font-weight: bold;
        }
       
    </style>
    
</head>
    <body> 
      
         
       <center>
           
              <center> <div class='log'>
    <h1>ICICS 2K18</h1>
                  <h3>Thank You for registration...</h3>
                  <h4>We are heartly Welcome you </h4>
                  <h2>Your Paper Id is:ICICS $id</h2>
                  <p>CONTACT US:</p>
                  <b>Email Id:</b>ksrceitrd@gmail.com<br>
                  <b>Convenor:</b>9943455245<br>
                  <p>Address:</p><h5>The Convenor, ICICS 2K18, Department of Information Technology<br>K.S.R College of Engineering,Tiruchengode,<br>
                  <center>Namakkal-637 215.</center></h5>
               
                  </div></center>
    </body>
</html>";
            mail($email,"ICICS 2K18",$msg1,$headers);
        }
    }
mysql_close();
?>
     