<?php 
// login.php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>LOGIN</title>
<link href="login4.css" rel="stylesheet" type="text/css"/>



</head>
<body>
    
    <!-- <div  id="label" >
       <img src="man.png" height="130" width="140" class="img1" />
        <img src="11.svg" height="130" width="140" class="img2" /> 
         <p>LOGIN</p> </div> -->
      
  <div id="form-main">
    <div id="form-div">
    <p id = "p1">ADMIN</p>
    <form class="form" name = "Form" action="Chacklogin.php"   >
			<input type="text" name = "Username" placeholder="Username" id = "input" class="in1 " style="color: black;" pattern="[a-z]{1,30}[0-9]{1,20}" title="กรุณากรอก Username ก่อนทำการเข้าสู่ระบบให้ถูกต้อง"  required/>
            <input type="password" name = "Password" placeholder="Password" id = "input" class="in2"  required/>
            <div class="submit">
            <button type="submit" id="login-button">Login</button>
            <div class="ease"></div>  
          
          </div>
        </form>
      
    </div>
   </body>
</html>
