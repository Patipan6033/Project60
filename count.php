<?php 


session_start();


 require('connect.php');




//  $sql = "SELECT COUNT(*) AS 'count' FROM 'pub'";                    

 $result1 = mysqli_query($conn,"SELECT COUNT(*) AS 'count' FROM pub");

 $rowl = mysqli_fetch_assoc($result1);
 $count = $rowl['count'];
 if($count >= 0){
    $_SESSION['cpub'] =  $count;

 }

 echo $count;
//  $_SESSION['pub'] =  $count;
    
  
    

  


                      


?>