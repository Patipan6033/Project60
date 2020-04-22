<?php 


session_start();

 if($_SESSION['Username'] == null){
   header("Location:login.php"); 
 
 }

 require('connect.php');

$id = $_SESSION['admin'];


$sql = "SELECT * FROM profileadmin INNER JOIN logina ON profileadmin.adminID = logina.adminID WHERE admin = '$id'";

$result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) == 1) { 
                            $row = mysqli_fetch_assoc($result);
                                                    
 }
 $result1 = mysqli_query($conn,"SELECT COUNT(*) AS 'count' FROM datacar WHERE status = 'บุคคลทั่วไป'");

 $row1 = mysqli_fetch_assoc($result1);
////////////////////////////////////////////////////////////////////////////////////
 
$result2 = mysqli_query($conn,"SELECT COUNT(*) AS 'count' FROM datacar WHERE status = 'บุคลากร'");

 $row2 = mysqli_fetch_assoc($result2);

////////////////////////////////////////////////////////////////////////////////////

$result3 = mysqli_query($conn,"SELECT COUNT(*) AS 'count' FROM datacar WHERE status = 'นิสิต'");

 $row3 = mysqli_fetch_assoc($result3);
 



                      


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>FEATURE</title>
<link href="feature1.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style>
.img1{
    width: 50px;
    height: 50px;
    margin-left: 7%;
    margin-top: -60px;
}
.p8{
    float: left;
    margin-top:-40px;
    margin-left: 80px;
    color:gray;
}
</style> 


</head>
<body >
    
  <div id="form-m">
    <div id="form-d">
    <p id = "p1">ข้อมูลส่วนตัว</p>
     <img src="13.svg"  class = "img" id = "img">
     <div class = "font">
     <p class = "p1"> ID : <?php echo $row['adminID'];?></p>
     <p class  = "p2">ชื่อ-นามสกุล : <?php echo $row['name'];?></p>
     <p class  = "p3">คณะ : <?php echo $row['faculty'];?></p>
     <p class  = "p4">Email : <?php echo $row['email'];?></p>
     <p class  = "p5">เบอร์โทร : <?php echo $row['phone'];?></p>
     <p class  = "p6">วุฒิการศึกษา : <?php echo $row['education'];?></p>
     <p class  = "p7">username : <?php echo $row['username'];?></p>
     </div>
  
    </div>
    </div>
  <div class="count1">
  <p class = "s1">จำนวนรถยนต์<span class = "span1"> "บุคคลทั่วไป"</span></p>
  <p class  = "p9">  <?php echo "จำนวน".":". " " ."<span class = 'num1'>" .$row1['count']. "</span>"." ". "คัน";?></p>

  </div>
  <div class="count2">
  <p class = "s1">จำนวนรถยนต์<span class = "span2"> "บุคลากร"</span></p>
  <p class  = "p9">  <?php echo "จำนวน".":". " " ."<span class = 'num1'>" .$row2['count']. "</span>". " ". "คัน";?></p>

  </div>
  </div>
  <div class="count3">
  <p class = "s1">จำนวนรถยนต์<span class = "span3"> "นักศึกษา"</span></p>
  <p class  = "p9">  <?php echo "จำนวน".":". " "."<span class = 'num1'>" .$row3['count']. "</span>"." ". "คัน";?></p>

  </div>
    
</div><nav class="main-menu">


  

<div class="settings" style="padding-top: 20px; color:gray;">FEATURE</div>
<img src="13.svg"  class = "img1" id = "img1">
<div> <p class  = "p8">  <?php echo "Admin".":" . $row['username'];?></p></div>

<div class="scrollbar" id="style-1">
     
<ul>
 
<li>                                   
<a href="feature.php">
<i class="fa fa-home fa-lg"></i>
<span class="nav-text">Home</span>
</a>
</li>   
 
</li>
<li class="darkerlishadow">
<a href="search1.php">
<i class="fa fa-clock-o fa-lg"></i>
<span class="nav-text">ค้นหา</span>
</a>
</li>
 
<li class="darkerli">
<a href="update1.php">
<i class="fa fa-edit fa-lg"></i>
<span class="nav-text">แก้ไข้ข้อมูล</span>
</a>
</li>
 
<li class="darkerli">
<a href="delete1.php">
<i class="fa fa-minus-square-o fa-lg"></i>
<span class="nav-text">ลบข้อมูล</span>
</a>
</li>

<li class="darkerli">
<a href="checkto.php">
<i class="fa fa-camera fa-lg"></i>
<span class="nav-text">เช็คข้อมูลทะเบียน</span>
</a>
</li>




 
<ul class="logout">
<li>                  
                        <a href="out.php">
                  
                    
                        <i class="fa fa-lock fa-lg"></i>
                       <span class="nav-text">Logout</span>   
                        
                        </a>
</li>  
</ul>
</nav>
    
    
   </body>
</html>
