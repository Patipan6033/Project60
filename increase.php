<?php
	require_once("connect.php");
	
	session_start();
	$member_token = $_SESSION['member_token'];
	
	$result_increase = mysqli_query($conn,"SELECT member_token FROM apps_notification WHERE member_token = '".$member_token."' AND msg_status = 1");
	$badge_number = mysqli_num_rows($result_increase);
	$data = array(
		'badge_number' => $badge_number
	);
	 echo json_encode($data);

?>