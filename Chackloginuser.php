<?php

session_start();
//1.connect
require("connect.php");

$id = $_REQUEST['Username'];
$pass = $_REQUEST['Password'];
$status =  $_REQUEST['status'];


if($status == 'นิสิต'){

$sql = "SELECT * FROM datastu WHERE idstu ='$id' AND Password = '$pass'";

$result = mysqli_query($conn, $sql);


                        if (mysqli_num_rows($result) == 1) { 
                            $row = mysqli_fetch_assoc($result);
                           
                            $_SESSION['Password'] = $row['Password'];
                            $_SESSION['id'] =   $row['idstu'];
                            $_SESSION['name'] =   $row['name'];
                            $_SESSION['username'] = $_REQUEST['Username'];
                            $_SESSION['password'] = $_REQUEST['Password'];
                            $_SESSION['status'] =   $row['status'];
                            echo "เสร็จ";
                            header("Location:re_per.php");
                        }
                        else{
                            echo "<script>";
                            echo "alert('กรุณาเช็ค Username หรือ Password !!!');";
                            echo "window.location='loginuser.php';";
                            echo "</script>";
                            


                        }

  }
elseif($status == 'บุคลากร'){
    
$sql = "SELECT * FROM dataper WHERE idper ='$id' AND Password = '$pass'";

$result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) == 1) { 
                            $row = mysqli_fetch_assoc($result);
                          
                            $_SESSION['Password'] = $row['Password'];
                            $_SESSION['username'] = $_REQUEST['Username'];
                            $_SESSION['password'] = $_REQUEST['Password'];
                            $_SESSION['status'] = $_REQUEST['status'];
                            $_SESSION['id'] =   $row['idper'];
                            $_SESSION['name'] =   $row['name'];
                            echo "เสร็จ";
                            header("Location:re_per.php");
                           
                        }
                        else{
                            echo "<script>";
                            echo "alert('กรุณาเช็ค Username หรือ Password !!!');";
                            echo "window.location='loginuser.php';";
                            echo "</script>";

                        }

}
else {
    header("Location:login.php");
}
?>
