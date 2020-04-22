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
<link href="login7.css" rel="stylesheet" type="text/css"/>

<script>
        function ChackForm() {
        var x = document.forms["Form"]["Username"].value;
        var y = document.forms["Form"]["Password"].value;
        if (x == "" || x == null) {
            alert("กรุณากรอก Username และ Password  ");
            document.getElementById("Username").focus();
            return false;         
        }
        
        if (y == "" || y == null) {
            alert("กรุณากรอก Username และ Password ");
            document.getElementById("Password").focus();
            return false;
            }
    }

    </script>

</head>
<body >
    
    <!-- <div  id="label" >
       <img src="man.png" height="130" width="140" class="img1" />
        <img src="11.svg" height="130" width="140" class="img2" /> 
         <p>LOGIN</p> </div> -->
      
  <div id="form-main">
    <div id="form-div">
    <p id = "p1">PERSONNEL</p>
    <form class="form" name = "Form" action="Chackloginuser.php"  onsubmit="return ChackForm()" >
			<input type="text" name = "Username" placeholder="Username" id = "input" class="in1 " style="color: black;" >
            <input type="password" name = "Password" placeholder="Password" id = "input" class="in2" >
            <select name="status"  id = "status"  required>
                                    <option value="ว่าง" >เลือกสถานะ</option>
                                    <option value="นิสิต">นิสิต</option>
                                    <option value="บุคลากร" >บุคลากร</option>
            </select>
            <div class="submit">
            <button type="submit" id="login-button">Login</button>
            <div class="ease"></div>  
          
          </div>
        </form>
        <div class="submit">
            <a href="home2.php"><button type="submit" id="login-button">Exit</button></a>
            <div class="ease"></div> 
    </div>
   </body>
</html>
