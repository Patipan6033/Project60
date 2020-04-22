<?php

require("connect.php");

$id = "";
$send = "" ;

if(isset($_GET['ID_lp']))  $id = $_GET['ID_lp'];
if(isset($_GET['send']))  $send = $_GET['send'];


if($send == 'Delete'){
    $sql = "DELETE FROM stu WHERE ID_lp = $id";




 if ($conn->query($sql) === TRUE) {
    echo "ลบการลบเสร็จสมบูรณ์";
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }
mysqli_close($conn);
header("Location:delete_stu.php"); 
     
   
   
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>DELETE</title>
<link href="delete_table3.css" rel="stylesheet" type="text/css"/>
<script >
    function confirmDelete(){
        return confirm("คุณต้องการที่จะลบข้อมูลนี้ ใช่หรือไม่? ");


    }</script>
</head>
<body >
<p id = "p1">ผลลัพธ์การค้นหา</p>      
<div id="form-m">
    <div id="form-d">
    
    <table >
                <tr>
                <th>ID</th>
                <th>เลขทะเบียนรถยนต์</th>
                <th>จังหวัด</th>
                <th>ชื่อ-นามสกุล</th>
                <th>สถานะ</th>
                <th>Lineaccount</th>
                <th>เบอร์โทรศัพท์</th>
                <th>รหัสรถยนต์</th>
                <th>Delete</th>
                </tr>
              <?php
                 require("connect.php");


                
               
                $sql="SELECT * FROM datastu INNER JOIN stu ON datastu.idstu = stu.ID";
                $result = mysqli_query($conn,$sql);

                if (mysqli_num_rows($result) > 0) 
                { 
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<form action='' >";
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['licenseplate'] . "</td>";
                        echo "<td>" . $row['province'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . "บุคลากร" . "</td>";
                        echo "<td>" . $row['lineaccount'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td><input type='text' name='ID_lp' class = 'id' style='text-align: center;' value=" . $row['ID_lp'] . " readonly></td>";
                        echo "<td><input type='submit' class ='Delete' name='send' value='Delete' onClick='return confirmDelete()' ></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                } 
               
                ?>               
        </table>
         
           
        </div>
          </div>
        </form>
        <div class="submit2">
            <a href="delete1.php"><button type="submit" id="login-button2" name = "send" value = "Edit">ค้นหาเพิ่มเติม</button></a>
            <div class="ease2"></div>  
           
      
    </div>