<?php   
session_start();

require("connect.php");
$status = "";
$name = "";
$email = "";
$idline = "";
$pro = "";
$Phone = "";
$ID = "";
$liplate = "";
$id_lp ="";



if(isset($_GET['name']))  $name = $_GET['name']; 
if(isset($_GET['email'])) $email = $_GET['email'];
if(isset($_GET['idline'])) $idline =  $_GET['idline'];
if(isset($_GET['lip'])) $liplate = $_GET['lip'];
if(isset($_GET['pro'])) $pro = $_GET['pro'];
if(isset($_GET['status']))  $status = $_GET['status'];
if(isset($_GET['Phone'])) $Phone  = $_GET['Phone'];
if(isset($_GET['idcard'])) $ID = $_GET['idcard'];

$id_lp = $_SESSION['ID_lp'];


   if($status == "บุคลทั่วไป"){
      $sql = "UPDATE pub ";
      $sql .= "SET licenseplate = '$liplate', lineaccount = '$idline', province = '$pro'";
      $sql .= "WHERE ID_lp = '$id_lp'";
     
  
      if ($conn->query($sql) === TRUE) {
        header("Location:resultUpdate.php"); 
      echo "Update record  successfully";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      mysqli_close($conn);
    
     
   }
   elseif($status == "บุคลากร"){
    $sql = "UPDATE per ";
    $sql .= "SET licenseplate = '$liplate', lineaccount = '$idline', province = '$pro'";
    $sql .= "WHERE ID_lp = '$id_lp'";
  

    if ($conn->query($sql) === TRUE) {
 
      header("Location:resultUpdate.php"); 
    
    echo "Update record  successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
    
   
 }
 elseif($status == "นิสิต"){
    $sql = "UPDATE Stu ";
    $sql .= "SET licenseplate = '$liplate', lineaccount = '$idline', province = '$pro'";
    $sql .= "WHERE ID_lp = '$id_lp'";
    // $result = mysqli_query($conn, $sql);

   if ($conn->query($sql) === TRUE){
     
    header("Location:resultUpdate.php"); 
       
      echo "Update record  successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
   
    
   
 }
   
   
?>