<?php
$licen = "";
$provinces = "";
session_start();
$_SESSION['member_token'] = "EAsdfwS213s2dfas!";
require("connect.php");
//$licen = $_SESSION['licen'];
//$provinces = $_SESSION['provinces'];
if(isset($_GET['licen'])){ 
  $licen = $_GET['licen'];}
  if(isset($_GET['provinces'])){ 
    $provinces = $_GET['provinces'];}

$sql = "SELECT * FROM datacar WHERE licenseplate = '$licen' AND province = '$provinces'";
//echo $sql;
$query = mysqli_query($conn,$sql);
$result = mysqli_num_rows($query);
$_SESSION['licen'] = $licen;
$_SESSION['provinces'] = $provinces;

// $status = "SELECT * FROM apps_notification WHERE msg_status = '1'";
// $status_query = mysqli_query($conn,$status);
// $status_result = mysqli_num_rows($status_query);
// if($result > 0){
//     $row = mysqli_fetch_assoc($query);
//     $_SESSION['licen'] = $row['licen'];
//     $_SESSION['provinces'] = $row['provinces'];
// }
// if($result > 0){
//   while($rows = mysqli_fetch_assoc($query)){
//     echo "<th>" . $rows['licen'] . "</th>";
//   }
// }
?>
<!DOCTYPE html>
<html>
<title>Monitor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style5.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="NotificationAjax.js"></script>
<script type="text/javascript" src="check_pass1.js"></script>



<body>
<!--  โค้ดนี้แสดง sidebar และรับ input ต่างๆ -->
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <h4>ค้นหา</h4>
  <form action="" id="myform">
  <input type="text" name="licen" placeholder="เลขป้ายทะเบียน" size="10" id="input1" require><br>
  <input type="text" name="provinces" placeholder="จังหวัด" size="10" id="input2" require><br>
  <input type="submit" send="search" value="ค้นหา" id="input3">
  </form>
  <table class="table" style="margin-top: 20px;">
  <thead class="thead-dark">
  <tr>
  <th scope="col">ป้ายทะเบียน</th>
  <th scope="col">จังหวัด</th>
  <th scope="col">รหัสผู้ใช้</th>
  <th scope="col">Lock</th>
  <th scope="col">แก้ไข</th>
  <tbody>
  <?php
if($result > 0){
  while($rows = mysqli_fetch_assoc($query)){
    $_SESSION['IDcar'] = $rows['IDcar'];
    if($rows['LockedCar'] == 'lock'){
      echo "<form action='vedioedit.php' method='get' >";
      echo "<tr>";
      echo "<th>" . $rows['licenseplate'] . "</th>" . "<td>" . $rows['province'] . "</td>"
      . "<td>" . $rows['IDuser'] . "</td>"
      . "<td><select name='show_status'><option value='lock' selected>lock</option>"
      . "<option value='unlock' >Unlock</option>"
      . "</select></td>"
  
  
      . "<td><input type='submit' name='send' value='Edit' onClick='return confirmUpdate()'></td>";
      echo "</form>";

    }
    else{
      echo "<form action='vedioedit.php' method='get' >";
      echo "<tr>";
      echo "<th>" . $rows['licenseplate'] . "</th>" . "<td>" . $rows['province'] . "</td>"
      . "<td>" . $rows['IDuser'] . "</td>"
      . "<td><select name='show_status'><option value='lock' >lock</option>"
      . "<option value='unlock' selected>Unlock</option>"
      . "</select></td>"
  
  
  
      . "<td><input type='submit' name='send' value='Edit' onClick='return confirmUpdate()'></td>";
      echo "</form>";


    }

  }
}
else{echo "<th>ไม่พบข้อมูล</th>#<td>#</td>#<td>#</td>#<td>#</td><td>#</td>";}
  ?>
  </tbody>
  </thead>
  </table>
</div>

<!-- โค้ดนี้ใช้กับปุุ่ม hamburgur ของ sidebar -->
<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;<img src="16.svg" id="noti" alt="Smiley face" height="42" width="42"><p class="badge badge_number">0</p><span class="caret"></span></button>
  <button class="w3-button w3-teal w3-xlarge" ><img src="15.svg" id="no" alt="Smiley face" height="42" width="42"><span class="caret"></span></button>
  <button class="w3-button w3-teal w3-xlarge" style='margin-left: 5px;'><span><img src="17.svg" id="QR" alt="Smiley face" height="42" width="42"></span><span class="caret"></span></button>
  <div class="w3-container">
    <h1 style="margin-top: -50px;">Monitor</h1>
  </div>
</div>

<!-- ใช้กับ popup ของปุ่มแจ้งเตือน -->
<div id="myModal" class="modal" style = 'width: 30%; height: 70%; margin-left: 40%; margin-top:-100px;'>
  <div class="modal-content" >
    <div class="modal-header" style = 'margin-top:-5px;'>
    <h3 class = 'h3'>แจ้งเตือน</h3>
      <span class="close">&times;</span>
      <h2>Close</h2>
    </div>
    <div class="modal-body">
    <?php 
            $sql="SELECT * FROM apps_notification WHERE  msg_status = '1'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result))
            {
              
              echo "<p style = 'color:black;'><span style = 'color:red;'> แจ้งเตือน: </span> เวลา ". $row['timestamp'] ."<br> ผู้ใช้ไอดี  ". $row['UserID'] ."<br>" . "  เป็นเจ้าของเลขทะเบียน    "  . $row['msg_text'] . "</p>";
              echo "<p>" . "________________________________________________________________________________________". "</p>";
               

      
             }
          }
      ?>
    </div>
    <!-- <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> -->
  </div>
</div>
<!-- ประวัติ -->

<div id="myModal2" class="modal2">
  <div class="modal-content2">
    <div class="modal-header2">
      <span class="close2">&times;</span>
      <h2>ประวัติการแจ้งเตือน</h2>
    </div>
    <div class="modal-body2">
      <?php 
          $sql="SELECT * FROM apps_notification WHERE  msg_status = '0'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result))
            {
              
                echo "<p style = 'color:black;'><span style = 'color:red;'> แจ้งเตือน: </span> เวลา ". $row['timestamp'] ."<br> ผู้ใช้ไอดี  ". $row['UserID'] ."<br>" . "  เป็นเจ้าของเลขทะเบียน    "  . $row['msg_text'] . "</p>";
                echo "<p>" . "________________________________________________________________________________________". "</p>";
               

      
             }
          }
      ?>

   
    </div>
    <!-- <div class="modal-footer2">
      <h3 style = 'color:blue;'>Modal Footer</h3>
    </div> -->
  </div>
</div>

<div id="QRcode" class="modal2">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close3">&times;</span>
      <h2>Close</h2>
    </div>
    <div class="modal-body">
    <?php

require('connect.php');
// $sql = "SELECT * FROM datadurable ";
// $result = mysqli_query($con,$sql);
// $row = mysqli_fetch_array($result)){

 $Liplate = $_SESSION['liplate'];
 $Pro = $_SESSION['pro'];

 $sql = "INSERT INTO car_noregis (licenseplate,province) 
 VALUE('$Liplate','$Pro')";

if ($conn->query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" .  $conn->error;
}

    echo "<div style = 'margin-left: 120px; font-size:20px; '>";
    echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . $Liplate . " title='Link to my Website' />";
    echo "<br>";
    echo "******เลขทะเบียน " .  $Liplate;
    echo "<br>";
    echo "**********จังหวัด " .   $Pro;
    echo "</div>";
    
?>
    </div>
    <!-- <div class="modal-footer">
      <h3 style = 'color:white;'>Display</h3>
    </div> -->
  </div>
</div>

<!-- แสดงวิดีโอ -->
<video id="video"  autoplay controls>
						<source src="https://www.youtube.com/watch?v=RO00xJ1zWnU&list=RDRO00xJ1zWnU&start_radio=1" type="video" />
</video>



<!-- กรอบแสดงสถานะผ่านหรือไม่ -->
<div class="container1" style="margin-left: 35%;">
<div class="row">
<div class="col-sm">
<div class="card text-white bg-warning mb-3" style="max-width: 40rem; margin-top: 30px;">
    <div class='card-header' ><span style = 'margin-left: 80px; font-size:20px;' >สถานะในการลงทะเบียน ?</span>  <span style = 'margin-left: 50px; font-size:20px;'> สถานะการ Locked Car?</span></div>
    <div class='card-body'>
    <h5 class='card-title found_status' style="margin-left: 22%; ">ผ่าน</h5>
    <h5 class='card-title lock_status' style="margin-left: 40%; margin-top: -30px; margin-left: 75%; ">Lock</h5>
</div>
</div>
</div>
<div class="clearflix"></div>


</div>
<!-- กรอบแสดงlockหรือไม่ -->
<!-- <div class="container1" style="margin-left: 15%; width: 250px; " >
<div class="row"  >
<div class="col-sm" >
<div class="card text-white bg-info mb-3" style="max-width: 15rem; margin-top: 10px; ">
    <div class='card-header'><span style = 'margin-left: 50px; font-size:20px;' >Gene QR</span></div>
    <div class='card-body'>
    <button class="w3-button w3-teal w3-xlarge" style='margin-left: 50px;'><span><img src="QR.png" id="QR" alt="Smiley face" height="42" width="42"></span><span class="caret"></span></button>
</div>
</div>
</div> -->

</div>

<script>
//เปิด sidebar
function w3_open() {
  document.getElementById("main").style.marginLeft = "40%";
  document.getElementById("mySidebar").style.width = "40%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
  checklock();
}
//ปิด sidebar
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
  decreaseNotify(); //ลบแจ้งเตือนเมื่อกดปุ่ม hamburgur เรียกใช้ผ่าน NotificationAjax.js
console.log('run');
}
//เปิดแจ้งเตือนขึ้นมา
// Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
var QRcode = document.getElementById("QRcode");

// Get the button that opens the modal
var btn = document.getElementById("noti"); 
var bt = document.getElementById("no"); 
var QR = document.getElementById("QR"); 
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close3")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";

}
bt.onclick = function() {
  modal2.style.display = "block";
}
QR.onclick = function() {
  QRcode.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
 
}
span2.onclick = function() {
  modal2.style.display = "none";
 
}
span3.onclick = function() {
  QRcode.style.display = "none";
 
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    
    modal2.style.display = "none";
  }
}
window.onclick = function(event) {
  if (event.target == QRcode) {
    
    QRcode.style.display = "none";
  }
}






</script>
</body>
</html>


