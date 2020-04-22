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
                      


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>SEARCH</title>
<link href="search_search1.css" rel="stylesheet" type="text/css"/>
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
    <p id = "p1">ค้นหาข้อมูล</p>
    <form class="form" name = "Form" action="search2.php"   >
			<input type="text" name = "liplate" placeholder="เลขทะเบียนรถยนต์" id = "input1"  class="in1 " style="color: black;"  />
            <input type="text" name = "pro" placeholder="จังหวัด" id = "input1" class="in2" />
            <select name="status"  id = "status"  required>
                                    <option value="pub" >บุคลทั่วไป</option>
                                    <option value="per" >บุคลากร</option>
                                    <option value="stu" >นิสิต</option>
                            </select>
            <div class="submit2">
            <a href="update.php"><button type="submit" id="login-button2" name = "send" value = "Edit">ค้นหา</button></a>
            <div class="ease2"></div>  
           
          
          </div>
        </form>
        
      
      
    </div>
    </div><nav class="main-menu">


  

<div class="settings"  style="padding-top: 20px; color: gray;">FEATURE</div>
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
