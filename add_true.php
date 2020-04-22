

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>LOGIN</title>
<link href="show1.css" rel="stylesheet" type="text/css"/>


</head>
<body >
    
  
  <div id="form-main">
    <div id="form-div">
    <p id = "p1">!!ลงทะเบียน สำเร็จ!!</p>
       <form   action="" >
	
            <div class="submit">
            <input type="submit"  name = "btn" value = "ลงทะเบียนเพิ่มเติม" id="login-button">
            
          </div>
      </form>
     
    </div>
   </body>
</html>
<?php


session_start();
require("connect.php");



$Name = $_SESSION['name'];                
$Email = $_SESSION['email']; 
$status = $_SESSION['status'];
$idcard = $_SESSION['idcard'];
$idline = $_SESSION['idline'];
$Phone = $_SESSION['phone'];
$lip = $_SESSION['lip'];
$pro =$_SESSION['pro'];
$img =$_SESSION['img'];
$btn =$_GET['btn'];
if($btn == 'ลงทะเบียนเพิ่มเติม' ){

if($status == 'บุคลากร'){

 
                        $sql = "INSERT INTO totle_p (licenseplate,ID,lineaccount,province,img,status,name) 
                        VALUE('$lip','$idcard', '$idline', '$pro','$img','$status','$Name')";
                        if ($conn->query($sql) === TRUE) {
                            
                
               
                            header("Location:out.php"); 
                            
           
          
                        } else {
                            header("Location:home2.php"); 
                        }
    
                    
                      
        
    



}
elseif($status == 'นิสิต'){


                    $sql1 = "INSERT INTO totle_p (licenseplate,ID,lineaccount,province,img,status,name) 
                    VALUE('$lip','$idcard','$idline','$pro','$img','$status','$Name')";
                    if ($conn->query($sql1) === TRUE) {
 
                        
                        header("Location:out.php"); 
                        
       
      
                    } else {
                      header("Location:home2.php");  
                    }

                
                
  
    
}
else{
    header("Location:login.php");
}

    
}







?>
