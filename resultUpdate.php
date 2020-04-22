<?php

session_start();

require("connect.php");

$status = $_SESSION['status'];
$pro = $_SESSION['pro'];
$liplate = $_SESSION['liplate'];
$ID_lp = $_SESSION['ID_lp'];
 
  
 
 
    if($status == "pub") {
      $sql="SELECT * FROM datapub INNER JOIN pub ON datapub.ID = pub.ID WHERE ID_lp = '$ID_lp'";
    //  $sql="SELECT * FROM pub WHERE licenseplate = '$liplate' and province = '$pro'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_array($result);
       
     
 
   }
          
    else{
      header("Location:update_toDB.php"); 
   }            
    }
    elseif ($status == "per") {
    
      $sql="SELECT * FROM dataper INNER JOIN per ON dataper.idper = per.ID WHERE ID_lp = '$ID_lp'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          // header("Location:resultUpdate.php");
      }
             
      // else{
      //   header("Location:update_toDB.php"); 
      // }
    }
    elseif($status == "stu"){
    
      $sql="SELECT * FROM datastu INNER JOIN stu ON datastu.idstu = stu.ID  WHERE ID_lp = '$ID_lp'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_array($result);
      //  header("Location:resultUpdate.php");
      
       
 
 
 
   }
          
  //  else{
  //   header("Location:update_toDB.php"); 
  //  }
       
                      
    }
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>UPDATE</title>
<link href="h2.css" rel="stylesheet" type="text/css"/>

</head>
<body >
<table>
   <div id="form-main">
    <div id="form-div">
   
        
      <form class="form" id="form1"  name = "Form" action="update_toDB.php" >
        <p class="regis" style="font-size: 35px; color: yellow; margin-left: 30px; margin-top: 10px;">ทำการแก้ไขเสร็จสมบูรณ์!!!</p>
        <p class="regis" style="font-size: 15px; margin-left: 0px; margin-top: 10px;">**หมายเหตุ: ไม่สามารถแก้ไขในหน้านี้ได้</p>
        
        <p class="name">
          <input name="name" type="text" class="feedback-input" value="<?php echo $row['name'];?>" id="name" readonly/>
        </p>
        <p class="status">
          <input name="name" type="text" class=" feedback-input" id="name" value="<?php echo $row['status'];?>" readonly/>
        </p>

        
        <p class="email">
          <input name="email" type="text" class=" feedback-input" id="email" value="<?php echo $row['email'];?>" readonly/>
        </p>

       
        <p class="idcard">
            <input name="idcard" type="text"  class=" feedback-input" id="idcard"  value="<?php echo $row['ID'];?>" placeholder="ID " pattern="[0-9]{13}" title="กรอกเลขบัตรประชาชนเป็นตัวเลข 13 หลัก" readonly/>
          </p>
          <p class="idline">
            <input name="idline" type="text" class=" feedback-input" id="idline" value="<?php echo $row['lineaccount'];?>" placeholder="LineID" readonly/>
          </p>
          <p class="Phone">
            <input name="Phone" type="text" class=" feedback-input" value="<?php echo $row['phone'];?>" id="Phone" placeholder="เบอร์โทรศัพท์" pattern="[0-9]{10}" title="กรอกเลขเบอร์โทรศัพท์เป็นตัวเลข 10 หลัก" readonly/>
          </p>
          <p class="lip">
            <input name="lip" type="text" class=" feedback-input" id="lip" value="<?php echo $row['licenseplate'];?>" readonly/>
          </p>
          <p class="pro">
            <input name="pro" type="text" class=" feedback-input" id="pro" value="<?php echo $row['province'];?>" placeholder="จังหวัดทะเบียน" readonly/>
          </p>
          <br>
        
      
        
      </form>
      <div class="submit">
      <a href="update1.php"><input type="submit" value="แก้ไขเพิ่มเติม" id="button-blue"/>
          <div class="ease"></div>  
        </div><br><br>
        <div class="submit">
        <a href="feature.php"><input type="submit"  value="ยกเลิก" id="button-blue" class="out"/></a>
            <div class="ease"></div>  
          </div>
          
        
    </div>
    </table>
   </body>
</html>
