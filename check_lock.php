<?php
session_start();
require("connect.php");
$liplatE = $_SESSION['liplate'];
$prO = $_SESSION['pro'];
   

    $query_lock = mysqli_query($conn,"SELECT * FROM datacar WHERE licenseplate = '$liplatE' AND province = '$prO'");
	
	
	if (mysqli_num_rows($query_lock) > 0) 
	{ 
		while ($row = mysqli_fetch_array($query_lock))
		{
			$lock = $row['LockedCar'];
	
		}
	} 

	//เอาจำนวน row ที่ค้นหาได้ใส่ในตัวแปร data type = array
	$data = array(
		'lock_status' => $lock
    );
	echo json_encode($data);
?>