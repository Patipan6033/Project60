<?php

session_start();
//1.connect
require("connect.php");

$user = $_REQUEST['Username'];
$pass = $_REQUEST['Password'];

//echo $user . "," . $password;
$sql = "SELECT * FROM profileadmin INNER JOIN logina ON profileadmin.adminID = logina.adminID WHERE username ='$user' AND password = '$pass'";
//echo $sql;

//3.Execute SQL
$result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) == 1) { 
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['admin']  = $row['admin'];
                            $_SESSION['Username'] = $row['username'];
                            $_SESSION['Password'] = $row['password'];
                            $_SESSION['username'] = $_REQUEST['Username'];
                            $_SESSION['password'] = $_REQUEST['Password'];
                            header("Location:feature.php");
                        }
                        else{
                            echo "<script>";
                            echo "alert('กรุณาเช็ค Username หรือ Password !!!');";
                            echo "window.location='login.php';";
                            echo "</script>";
                            

                        }
?>