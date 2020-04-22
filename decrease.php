<?php
	require_once("connect.php");
	
	session_start();
	
	$member_token = $_SESSION['member_token'];
	
	$result_decrease = mysqli_query($conn,"UPDATE apps_notification SET msg_status = 0 WHERE  member_token = '".$member_token."'");
	$data = array(
		'badge_number' => 0
	);
	echo json_encode($data);
?>