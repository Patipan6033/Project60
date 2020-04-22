<?php
   $accessToken = "dQpBcsG6xNKadXobEAEbOp/i9lJAI0XD77p30vlTE5XjdbWmrZH93h9WzJ6VhkkeHT9lK3vyMR8mXMQ6gsprtJkpU1wpcCIeODI9REHX4npcR0ZSGg8+NveVnerMezSuVKUcwWYRrPxywuB4IaFO5QdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
//    รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   // $timestamp = $jsonData["events"][0]["timestamp"];

   session_start();
   $licen = $_SESSION['licen'];
   $provinces = $_SESSION['provinces'];

   $liplate = $_GET['liplate'];
   $pro = $_GET['pro'];
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "linebot";
   
   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   mysqli_set_charset($conn,"utf8");
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   
     
     $sql = "INSERT INTO log (UserID,Text) 
                    VALUE('$id','$message')";
echo $sql;
     if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
     } else {
         echo "Error: " . $sql . "<br>" .  $conn->error;
     }
   //   $mysql->query("INSERT INTO `log`(`UserID`,`Text`,`Timestamp`) VALUES ('$id','$message','$timestamp')");
 $getUser = $conn->query("SELECT * FROM `datacar`   WHERE licenseplate = '$liplate' AND province = '$pro'");
     
  $getuserNum = $getUser->num_rows;
  $replyText["type"] = "text";
  if ($getuserNum == "0"){
     $_SESSION['liplate'] = $liplate ;
     $_SESSION['pro'] = $pro ;
     $sql1 = "INSERT INTO car_noregis (licenseplate,province) 
   VALUE('$liplate','$pro')";
   if ($conn->query($sql1) === TRUE) {
      echo "New record created successfully";
   } else {
   echo "Error: " . $sql . "<br>" .  $conn->error;
   }
 
  
   //   header("Location:GeneQR.php");


  } else {
   $sql = "INSERT INTO car_regis (licenseplate,province) 
   VALUE('$liplate','$pro')";
  
  if ($conn->query($sql) === TRUE) {
  
  } else {
  echo "Error: " . $sql . "<br>" .  $conn->error;
  }

    while($row = $getUser->fetch_assoc()){
      $_SESSION['liplate'] = $liplate ;
      $_SESSION['pro'] = $pro ;
      $Name = $row['name'];
     
      $CustomerID = $row['IDuser'];
      $licenseplate = $row['licenseplate'];
      $pro = $row['province'];
      // $timein = $row['timein'];
      $UserID = $row['lineaccount'];
    }
    $arrayPostData['to'] = $UserID;
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "เลขทะเบียน:$licenseplate จังหวัด:$pro เจ้าของชื่อ:$Name  มีการเข้ามอ ในเวลา ... (รหัสประจำตัว:$CustomerID)";
    pushMsg($arrayHeader,$arrayPostData);
    header("Location:checkto.php"); 
    // $replyText["text"] = "เลขทะเบียน  $licenseplate จังหวัด $pro ชื่อ $Name $Surname มีการเข้ามอ ในเวลา $timein  (#$CustomerID)";
  }
  





  if($message == "" || $message == null ){
   $arrayPostData['to'] = $id;
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = "$id" ;
   pushMsg($arrayHeader,$arrayPostData);
   

  }
  
  
  if($message == "ล็อกรถยนต์" ){
 
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = "คุณต้องการที่จะล็อกรถยนต์ของคุณใช่หรือไม่?" ;
          pushMsg($arrayHeader,$arrayPostData);

         
          
   }

//    if($message == "ปลดล็อกรถยนต์" ){
//       $getUser = $conn->query("SELECT * FROM `customer` WHERE UserID = '$id'");
//       $getuserNum = $getUser->num_rows;
//       $replyText["type"] = "text";
//       if ($getuserNum == "0"){
//          $replyText["text"] = "สวัสดีคับบบบ";
        
//    } else {
//       while($row = $getUser->fetch_assoc()){
//         $name = $row['Name'];
//         $lock = $row['LockedCar'];
//         $licenseplate = $row['licenseplate'];
//         $pro = $row['province'];
//         $Surname = $row['Surname'];
//         $CustomerID = $row['CustomerID'];
//         $UserID = $row['UserID'];
//       }
         
//       $arrayPostData['to'] = $id;
//       $arrayPostData['messages'][0]['type'] = "text";
//       $arrayPostData['messages'][0]['text'] = "คุณ $name $Surname ต้องการที่จะ ปลดล็อกรถยนต์เลขทะเบียน $licenseplate จังหวัด $pro ของคุณใช่หรือไม่ ?" ;
//       pushMsg($arrayHeader,$arrayPostData);
//    }
      
// }
if($message == "ใช่" ){
 
   $arrayPostData['to'] = $id;
   $arrayPostData['messages'][0]['type'] = "text";
   $arrayPostData['messages'][0]['text'] = "กรุณาแจ้งเลขทะเบียนรถยนต์และจังหวัดที่ต้องการ!!" ;
   pushMsg($arrayHeader,$arrayPostData);

  
   
}

   
   if($message != "ใช่" AND $message != "ล็อกรถยนต์" AND $message != "" ){
      // $sql = "DELETE FROM apps_notification WHERE UserID = '$id'";
      
   $sql = "INSERT INTO apps_notification (UserID,msg_text,msg_status,member_token) 
     VALUE('$id','$message','1','EAsdfwS213s2dfas!')";
        
     if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
     } else {
     echo "Error: " . $sql . "<br>" .  $conn->error;
     }

 }
 // }
// if($message == "ล็อกรถยนต์" || $message == "ปลดล็อกรถยนต์" ){
 
//    $sql = "INSERT INTO apps_notification (text_reqest) 
//      VALUE('$message')";
        
//      if ($conn->query($sql) === TRUE) {
//               echo "New record created successfully";
//      } else {
//      echo "Error: " . $sql . "<br>" .  $conn->error;
//      }

  
   
// }


// //          elseif($Name == "lock"){
//             $sql = "UPDATE customer ";
//             $sql .= "SET LockedCar = 'unlock'";
//             $sql .= "WHERE UserID = '$id'";
//             // $sql = "INSERT INTO customer (LockedCar) 
//             // VALUE('lock') WHERE UserID = '$id'";
//             // echo $sql;
//                if ($conn->query($sql) === TRUE) {
//                   echo "New record created successfully";
//                       $arrayPostData['to'] = $UserID ;
//                       $arrayPostData['messages'][0]['type'] = "text";
//                       $arrayPostData['messages'][0]['text'] = "รถยนต์ของคุณทำการ ปลดล็อกเรียนร้อยแล้ว!!" ;
//                       pushMsg($arrayHeader,$arrayPostData);
         
//                } else {
//                   echo "Error: " . $sql . "<br>" .  $conn->error;
//                   }
      
//          }
//          else{
//             $sql = "UPDATE customer ";
//             $sql .= "SET LockedCar = 'lock'";
//             $sql .= "WHERE UserID = '$id'";
//             // $sql = "INSERT INTO customer (LockedCar) 
//             // VALUE('lock') WHERE UserID = '$id'";
//             // echo $sql;
//                if ($conn->query($sql) === TRUE) {
//                   echo "New record created successfully";
//                       $arrayPostData['to'] = $UserID ;
//                       $arrayPostData['messages'][0]['type'] = "text";
//                       $arrayPostData['messages'][0]['text'] = "รถยนต์ของคุณทำการ ล็อกเรียนร้อยแล้ว !!" ;
//                       pushMsg($arrayHeader,$arrayPostData);
         
//                } else {
//                   echo "Error: " . $sql . "<br>" .  $conn->error;
//                   }
      
//          }


   

//     }
       
        
//    }
//    if($message == "ไม่"){
//       $arrayPostData['to'] = $id  ;
//       $arrayPostData['messages'][0]['type'] = "text";
//       $arrayPostData['messages'][0]['text'] = "OK จ้ะะะะะ" ;
//       pushMsg($arrayHeader,$arrayPostData);
//    } 
   // else{
   //    $arrayPostData['to'] = $UserID ;
   //    $arrayPostData['messages'][0]['type'] = "text";
   //    $arrayPostData['messages'][0]['text'] = "คุณพุดไรอ่ะะะ" ;
   //    pushMsg($arrayHeader,$arrayPostData);
   // }
   $sql2 = "DELETE FROM log WHERE UserID = '' ";

   if ($conn->query($sql2) === TRUE) {
      echo  $sql2;
   } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
   }
  mysqli_close($conn);
 
 
      
   
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