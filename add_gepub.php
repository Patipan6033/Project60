<?php
session_start();

require("connect.php");



$Name = $_REQUEST['name'];                
$Email = $_REQUEST['email'];
$idcard = $_REQUEST['idcard'];
$idline = $_REQUEST['idline'];
$Phone = $_REQUEST['Phone'];
$lip = $_REQUEST['lip'];
$pro = $_REQUEST['pro'];
// $img = $_REQUEST['img'];


$sql1 = "SELECT * FROM datacar WHERE licenseplate ='$lip' AND province = '$pro'";
$result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) == 1) { 
                    $row = mysqli_fetch_assoc($result1);
                    echo "<script>";
                    echo "alert('ทะเบียนรถภายในจังหวัดนี้มีการลงทะเบียนแล้ว!!!');";
                    echo "window.history.back('re_Gepub.php');";
                    echo "</script>";
                   
                }
                else{
                    $sql = "INSERT INTO datapub (name,email,ID,status) 
                    VALUE('$Name', '$Email', '$idcard','บุคคลทั่วไป')";
                    $sql2 = "INSERT INTO datacar (licenseplate,IDuser,lineaccount,province,name,status) 
                    VALUE('$lip','$idcard', '$idline', '$pro','$Name','บุคคลทั่วไป')";
                    if ($conn->query($sql) === TRUE) {
                        if ($conn->query($sql2) === TRUE){
                            header("Location:add_true.php");
                        } 
   
     
                   } else {
                       if ($conn->query($sql2) === TRUE){
                            header("Location:add_true.php");
                        } 
                       else {
                           header("Location:add_false.php");
           
                       }
   

                     }
                }


    // header("Location:add_false.php"); 


?>