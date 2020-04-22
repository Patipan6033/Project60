<?php 


session_start();

 if($_SESSION['Username'] == null){
   header("Location:login.php"); 
 
 }


require('connect.php');

$id = $_SESSION['admin'];


$sql1 = "SELECT * FROM profileadmin INNER JOIN logina ON profileadmin.adminID = logina.adminID WHERE admin = '$id'";

$result1 = mysqli_query($conn, $sql1);

                        if (mysqli_num_rows($result1) == 1) { 
                            $row1 = mysqli_fetch_assoc($result1);
                                                    
 }
 
// $status = "";
// $liplate = "";
// $pro = "";

// if(isset($_GET['status']))  $status = $_GET['status'];
// if(isset($_GET['pro']))  $pro = $_GET['pro'];
// if(isset($_GET['liplate']))  $liplate = $_GET['liplate'];

 


//   //  if($status == "pub") {
//     $sql="SELECT * FROM datapub INNER JOIN pub ON datapub.ID = pub.ID WHERE licenseplate = '$liplate' and province = '$pro'";
//     // $sql="SELECT * FROM pub WHERE licenseplate = '$liplate' and province = '$pro'";
//      $result = mysqli_query($conn, $sql);
//      if (mysqli_num_rows($result) > 0) {
//       $row = mysqli_fetch_array($result);
//       $_SESSION['status'] = $_GET['status'];
//       $_SESSION['pro'] = $_GET['pro'];
//       $_SESSION['liplate'] = $_GET['liplate'];
//       $_SESSION['ID_lp'] = $row['ID_lp'];

  // }
         
  //  else{
  //    header("Location:update1.php"); 
  // }            
  //  }
  //  elseif ($status == "per") {
   
  //   $sql="SELECT * FROM dataper INNER JOIN per ON dataper.idper = per.ID WHERE licenseplate = '$liplate' and province = '$pro'";
  //    $result = mysqli_query($conn, $sql);
  //    if (mysqli_num_rows($result) > 0) {
  //        $row = mysqli_fetch_array($result);
  //        $_SESSION['status'] = $_GET['status'];
  //        $_SESSION['pro'] = $_GET['pro'];
  //        $_SESSION['liplate'] = $_GET['liplate'];
  //        $_SESSION['ID_lp'] = $row['ID_lp'];
  //    }
            
  //    else{
  //       header("Location:checkto.php"); 
  //    }
  //  }
  //  elseif($status == "stu"){
    
  //   $sql="SELECT * FROM datastu INNER JOIN stu ON datastu.idstu = stu.ID WHERE licenseplate = '$liplate' and province = '$pro'";
  //    $result = mysqli_query($conn, $sql);
  //    if (mysqli_num_rows($result) > 0) {
  //     $row = mysqli_fetch_array($result);
  //     $_SESSION['status'] = $_GET['status'];
  //     $_SESSION['pro'] = $_GET['pro'];
  //     $_SESSION['liplate'] = $_GET['liplate'];
  //     $_SESSION['ID_lp'] = $row['ID_lp'];
      



  // }
         
//   else{
//     header("Location:checkto.php"); 
//  }
   


//   }

// $upload = "";
// if(isset($_GET['upload'])) $upload =$_GET['upload'];  

//   if($upload == "อัพโหลด"){
//     $sql="SELECT * FROM dataper INNER JOIN per ON dataper.idper = per.ID WHERE licenseplate = '$liplate' and province = '$pro'";
//     $result = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_array($result);
//         $image_path = "img/";
//         $uploaded = move_uploaded_file($row['img'],$image_path);
//         if($uploaded==TRUE){
//           header("Location:feature.php"); 
         
//         }
//         else{
//             header("Location:login.php");
//         }
    
//     }
 
//   }              

 
?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>FEATURE</title>
<link href="search3.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style>
#img1{
  width:80px;
}

</style>


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
                <th>รูปสมุดทะเบียน</th>
                </tr>
              <?php
                 require("connect.php");

                 $liplate = $_GET['liplate'];
                 $pro = $_GET['pro'];
                //  SELECT Orders.OrderID, Customers.CustomerName, Shippers.ShipperName
                //  FROM ((Orders
                //  INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID)
                //  INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID);
                $sql="SELECT * FROM totle_p WHERE licenseplate LIKE '%$liplate%' AND province LIKE '%$pro%'";
                
    
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
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>". $row['lineaccount'] ."</td>";
                        echo "<td><img  src=". $row['img'] ."  id = 'img1'></td>";
                       
                        echo "</tr>";
                        echo "</form>";
                    }
                } 
               
                ?>               
        </table>

     

    
   </body>
</html>
