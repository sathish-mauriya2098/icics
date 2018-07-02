<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ICICS | REGISTRATION</title>
     <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
 <script>
    function validation(){
            var file = document.forms["form"]["file"].value;
var fileLen = file.length;
var lastValue = file.substring(fileLen - 3, fileLen);
var lastValue1 = file.substring(fileLen - 4, fileLen);
if (lastValue=='doc'||lastValue1=='docx') {
   
    return true;
}
            else{
                 alert("File must be in .doc or .docx");
                return false;
            }
        }
    
    </script>
</head>

<body>
<div>
        <nav>
                <div class="nav-wrapper white">
                    <a href="#" class="brand-logo left"><img src="img/ksrce.png" alt="csilogo" width="50px" height="50px"></a>
                    <ul id="nav-mobile" class="right">
                    <li><a href="index.html" class=" black-text"><i class="material-icons left">home</i>Home</a></li>

                    </ul>
                </div>
         </nav>
    </div>
  <div class="container">
    <form id="contact" action="Dbregister.php" method="post" enctype="multipart/form-data" onsubmit="return validation()" name="form">
      <h3>ICICS | KSRCE </h3>
      <h4>Journal upload section</h4>
      <fieldset>
        <label>NAME</label>
        <input placeholder="Your name" type="text" name="name" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <label>EMAIL</label>
        <input placeholder="Your Email Address" type="email" name="mail" tabindex="2" required>
      </fieldset>
      <fieldset>
        <label>PHONE NUMBER</label>
        <input placeholder="Your Phone Number (optional)" type="tel" name="numb" tabindex="3" required>
      </fieldset>
      <fieldset>
        <label>INSTITUTION</label>
           <input placeholder="Institution" type="text" name="institute" tabindex="4" required>
         </fieldset>
          <fieldset>
            <label>FILE NAME</label>
            <input placeholder="ARTICLE TITLE" type="text" name="article" tabindex="4" required>
          </fieldset>
          <fieldset>
            <label>UPLOAD ARTICLE</label>
            <br>
            <input type="file" name="file" id="file" required accept="application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        <br>
            <b>file should be in doc format only</b>
            <br>
          </fieldset>
          
          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
    </form>
  </div>



</body>

</html>