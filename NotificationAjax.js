$(document).ready(function(e) {
	increaseNotify();
	checklock();
	setInterval(increaseNotify, 3000); //เรียกใช้ฟังก์ชัน increaseNotify ทุกๆ 3 วินาที
	setInterval(checklock, 3000); //เรียกใช้ฟังก์ชัน checkpass ทุกๆ 3 วินาที
	
});
function increaseNotify(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
	$.ajax({
		url: "increase.php",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".badge_number").text(obj.badge_number);
		}
		
	});
}
function decreaseNotify(){ // ลบตัวเลข badge number
	$.ajax({
		url: "decrease.php",
		type: 'GET',
		success: function(obj) {
			
		}
	});
}
function checklock(){ // โหลดสถานะ lock
	$.ajax({
		url: "check_lock.php",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".lock_status").text(obj.lock_status);
		}
		
	});
}
