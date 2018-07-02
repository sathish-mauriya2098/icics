<?php
session_start();
mysql_connect('localhost','ksrceit_ksrceit','it@20201');
mysql_select_db('ksrceit_form');
$sql="select * from icics";
$record=mysql_query($sql);
if(isset($_SESSION['usrnam']))
{
?>

<html>
    <head>
    <title> DETAILS</title>
        <style>
            body{
                
            }
            img{
                float: left;
            }
            th{
                font-size: 20px;
            }
            #username{
           height: 80px;
            float: right;
        }
            button[type=button]{
                padding: 10px 25px;
            border-radius: 4px;
            background-color: #2ECC71;
            border: none;
            font-size: 15px;
            color: white;
            margin-left:10px;
            }
            img{
                float:left;
            }
        </style>
    </head>
    <body>
        <div id="username">
       <?php
            $disp=$_SESSION['usrnam'];
           echo strtoupper("Welcome <b>$disp</b>");
             ?>
            
            <a href="admin/logoutadmin.php"><button type="button">Log out</button></a>
        </div>
         <img src="img/ksrce.png" alt="csilogo" width="80px" height="80px">
        <center>
        <h1>ICICS 2K18</h1>
        <h3>REGISTERED DETAILS</h3></center>
       
      <table width="100%"  border="5px solid" cellspacing="0">
     <tr bgcolor="orange">
    <th>ID.NO</th>
    <th>NAME</th>
     <th>MAIL</th>
     <th>MOBILE</th>
     <th>INSTITUTION</th>
     <th>ARTICLE TITLE</th>
     <th>UPLOADED FILE</th>
     
    </tr>

  <?php    
   
while ($result=mysql_fetch_array($record))
{
 
   
     echo"<tr>";
     echo"<td>".$result['S.NO']."</td>";
    echo"<td>".$result['NAME']."</td>";
    echo"<td>".$result['EMAIL']."</td>";
     echo"<td>".$result['MOBILE']."</td>";
     echo"<td>".$result['INSTITUTION']."</td>";
     echo"<td>".$result['ARTICLE_TITLE']."</td>";
echo"<td><a href='upload/".$result['UPLOAD_PDF']."' target='_blank'><button type='button'>View</button></a><br></td>";
     
            echo"</tr>";
   
}

?>
    </table>
        </body>
</html>
<?php
  }
else{
   header("Location:admin/index.php");
}
    ?>
