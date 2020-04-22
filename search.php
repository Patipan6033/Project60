<?php
session_start();
require("consql.php");
$licen = $_REQUEST['licen'];
$provinces = $_REQUEST['provinces'];

$sql = "SELECT * FROM user WHERE licen = '$licen' AND provinces = '$provinces'";
$query = mysqli_query($conn,$sql);
$result = mysqli_num_rows($query);
if($result > 0){
    $row = mysqli_fetch_assoc($query);
    $_SESSION['licen'] = $row['licen'];
    $_SESSION['provinces'] = $row['provinces'];
}
header("Location:video.php");
?>