<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>LOGIN</title>
<link href="shownotify2.css" rel="stylesheet" type="text/css"/>


</head>
<body >
    
  
  <div id="form-main">
    <div id="form-div">
    <p id = "p1">!!แจ้งแตือนให้ผู้ใช้และแก้ไขสำเร็จ!!</p>
     
	
            <div class="submit">
            <a href="video.php"><input type="submit"  name = "btn" value = "กลับไปหน้าหลัก" id="login-button"></a>
            
          </div>
    
     
    </div>
   </body>
</html>



<?php

require('connect.php');
// $sql = "SELECT * FROM datadurable ";
// $result = mysqli_query($con,$sql);
// $row = mysqli_fetch_array($result)){
    $accessToken = "dQpBcsG6xNKadXobEAEbOp/i9lJAI0XD77p30vlTE5XjdbWmrZH93h9WzJ6VhkkeHT9lK3vyMR8mXMQ6gsprtJkpU1wpcCIeODI9REHX4npcR0ZSGg8+NveVnerMezSuVKUcwWYRrPxywuB4IaFO5QdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
 //    รับข้อความจากผู้ใช้
    // $message = $arrayJson['events'][0]['message']['text'];
    // //รับ id ของผู้ใช้
    // $id = $arrayJson['events'][0]['source']['userId'];
    // $timestamp = $jsonData["events"][0]["timestamp"];
 session_start();
 $licen = $_SESSION['licen'];
 $provinces = $_SESSION['provinces'];
 $IDcar = $_SESSION['IDcar'];
// $send = $_GET['send'];
$lockcar = $_GET['show_status'];


    if($lockcar == 'lock'){
        $sql = "UPDATE datacar ";
        $sql .= "SET LockedCar = '$lockcar'";
        $sql .= "WHERE IDcar = '$IDcar'";
        // echo  $sql;
        // echo "<br>";
      
    
        if ($conn->query($sql) === TRUE) {
            
            $Licen = $_SESSION['licen'];
            $Provinces = $_SESSION['provinces'];
        
            $sql1 = "SELECT * FROM datacar WHERE licenseplate = '$Licen' AND province = '$Provinces'";
            // echo $sql1;
                $result = mysqli_query($conn,$sql1);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)){
                   $Licenseplate = $row['licenseplate'];
                   $idline = $row['lineaccount'];
                   header("Location:video.php");
            
          
                 }
          
            
             $arrayPostData['to'] = $idline;
             $arrayPostData['messages'][0]['type'] = "text";
             $arrayPostData['messages'][0]['text'] = "ระบบได้ทำการล็อกรถยนต์เรียบร้อยแล้ว" ;
             pushMsg($arrayHeader,$arrayPostData);
            
         
        
             
            }
        
  
  

     
        
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        

    }
    else{
        $sql = "UPDATE datacar ";
        $sql .= "SET LockedCar = '$lockcar'";
        $sql .= "WHERE IDcar = '$IDcar'";
        // echo  $sql;
    
        if ($conn->query($sql) === TRUE) {
            
            $Licen = $_SESSION['licen'];
            $Provinces = $_SESSION['provinces'];
        
            $sql1 = "SELECT * FROM datacar WHERE licenseplate = '$Licen' AND province = '$Provinces'";
            // echo $sql1;
                $result = mysqli_query($conn,$sql1);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)){
                   $Licenseplate = $row['licenseplate'];
                   $idline = $row['lineaccount'];
                   header("Location:video.php");
            
          
                 }
          
            
             $arrayPostData['to'] = $idline;
             $arrayPostData['messages'][0]['type'] = "text";
             $arrayPostData['messages'][0]['text'] = "ระบบได้ทำการล็อกรถยนต์เรียบร้อยแล้ว" ;
             pushMsg($arrayHeader,$arrayPostData);
            
             
             
            }
             
      
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
    }


 
    function pushMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/push";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
     }
   
    http_response_code(200);
     exit;  


?>