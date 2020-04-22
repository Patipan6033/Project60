<?php
//step1.connect
require("connect.php");

$status = "";

$Name = $_REQUEST['name'];
$Email = $_REQUEST['email'];
if(isset($_GET['status']))  $status = $_GET['status'];
$idcard = $_REQUEST['idcard'];
$idline = $_REQUEST['idline'];
$Phone = $_REQUEST['Phone'];
$lip = $_REQUEST['lip'];
$pro = $_REQUEST['pro'];


// echo "name:". $name . "<br/>";
// echo "email:". $email . "<br/>";
// echo "status:". $status . "<br/>";

$sql = "INSERT INTO reper (licenseplate,name,email,status,idcard,lineaccount,phone,province) 
                         VALUE('$lip', '$Name', '$Email', '$status', '$idcard', '$idline', '$Phone', '$pro ')";
echo $sql;

//$sql .="('". $status_th ."','" . $status_en ."')";
//$sql .="(".$status_id .",'" . $status_th ."','" . $status_en ."')";

if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location:re_per.php"); 






?>