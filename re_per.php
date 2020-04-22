<?php   

session_start();

 if($_SESSION['Password']  == null){
   header("Location:login.php");

   
 }
 require("connect.php");

//  $user = $_SESSION['Username'];
//  $pass = $_SESSION['Password'];
    
    $status = $_SESSION['status'];
    $id = $_SESSION['username'] ;
    $pass =$_SESSION['password'];
    
 
 
 
 if($status == 'นิสิต'){
  $sql = "SELECT * FROM datastu WHERE idstu ='$id' AND Password = '$pass'";
//  INNER JOIN stu ON datastu.idstu = stu.ID
 
 
 $result = mysqli_query($conn, $sql);
 
 
                         if (mysqli_num_rows($result) == 1) { 
                             $row = mysqli_fetch_assoc($result);
                             $_SESSION['status'] =   $row['status'];
                             $_SESSION['id'] =   $row['idstu'];
                             
                             $_SESSION['email'] =   $row['email'];
                             $_SESSION['phone'] =   $row['phone'];
                             echo "เสร็จ";
 
 
                           
                         }
                         else{
                          echo "ผิด";

                            //  header("Location:login.php");
 
 
                         }
 
   }
 elseif($status == 'บุคลากร'){
    
  $sql = "SELECT * FROM dataper WHERE idper ='$id' AND Password = '$pass'";

$result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) == 1) { 
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['status'] =   $row['status'];
                            $_SESSION['id'] =   $row['idper'];
                            $_SESSION['name'] =   $row['name'];
                            $_SESSION['email'] =   $row['email'];
                            $_SESSION['phone'] =   $row['phone'];
          
                        }
                        else{
                            header("Location:login.php");

                        }

}
else {
    header("Location:login.php");
}
     
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>ลงทะเบียน</title>
<link href="h3.css" rel="stylesheet" type="text/css"/>
<style>
.img2{
  width: 150px;
    height: 150px;
    margin-left: 33%;
    /* margin-top: -60px; */
}
</style>
</head>
<body >
  <div id="form-main">
    <div id="form-div">
        
      <form class="form" id="form1"  name = "Form" action="add_data.php" method ="GETS" >
        <p class="regis" style="font-size: 35px; color: white ; margin-left: 30px; margin-top: 10px;">ลงทะเบียนสำหรับบุคลากร</p>
        <p class="regis" style="font-size: 15px; margin-left: 0px; margin-top: 10px;">**หมายเหตุ: กรุณากรอกให้ครบทุกช่อง</p>
        
        <p class="name">
          <input name="name" type="text" class="feedback-input"  id="name" value="<?php echo $_SESSION['name'];?>" style ="color: rgb(47, 169, 240);" readonly/>
        </p>
        
        <p class="name">
          <input name="status" type="text" class="feedback-input" id="name" value="<?php echo $_SESSION['status'];?>" style ="color: rgb(47, 169, 240);" readonly/>
        </p>
        <p class="email">
          <input name="email" type="email" class=" feedback-input" id="email" value="<?php echo $_SESSION['email'];?>" style ="color: rgb(47, 169, 240);"readonly/>
        </p>
      

        <p class="idcard">
            <input name="idcard" type="text" class=" feedback-input" id="idcard" value="<?php echo $_SESSION['id'];?>" style ="color: rgb(47, 169, 240);"readonly/>
          </p>
         
          <p class="Phone">
            <input name="Phone" type="text" class=" feedback-input" id="Phone" placeholder="เบอร์โทรศัพท์"  pattern="[0-9]{10}" title="กรอกเลขเบอร์โทรศัพท์เป็นตัวเลข 10 หลัก" />
          </p>
          <p class="lip">
            <input name="lip" type="text" class=" feedback-input" id="lip" placeholder="เลขทะเบียนรถยนต์" required/>
          </p>
          <p class="pro">
            <input name="pro" type="text" class=" feedback-input" id="pro" placeholder="จังหวัดทะเบียน" required/>
          </p>
          <p class="img1"> แสกนคิวอาร์โค้ด เพื่อรับไอดี </p>
          <img src="QR.png"  class = "img2" id = "img2"><br><br><br>
          <p style="color:white; margin-top:-25px;">:คัดลอก ID ของคุณที่ได้จากแชทนำมาวางไว้ที่ LineID <br><span> ตัวอย่าง : U24aa555f6cdc32688575cce54d5ba288</span>
</p> 
          <p class="idline">
            <input name="idline" type="text" class=" feedback-input" id="idline" placeholder="LineID" required/>
          </p>

          <!-- <p class="img1"> อัพโหลดรูปภาพสมุดทะเบียนรถ  </p>

<p class="img2">
  <input name="img" type="file" class="feedback-input" id="img" placeholder="จังหวัดทะเบียน" pattern="{1,30}" title="อัพโหลดรูปภาพ พ.ร.บ ของผู้ลงทะเบียน" />
</p>
<p style="color:white; margin-top:-25px;">**ให้เห็นหลักฐานในการเป็นเจ้าของ</p> -->
<br>

          <br>
        
        <div class="submit">
          <input type="submit" value="ลงทะเบียน" id="button-blue" name="btnper"/>
          <div class="ease"></div>  
        </div><br><br>
      
        
      </form>
      <form action="out.php" >
        <div class="submit">
        <a href="login.php"><input type="submit"  value="ยกเลิก" id="button-blue" class="out"/></a>
            <div class="ease"></div>  
          </div>
        </form>
    </div>
   </body>
</html>
