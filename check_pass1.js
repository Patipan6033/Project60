$(document).ready(function(e) {
	checkpass()
	setInterval(checkpass, 3000);
});
function checkpass(){ // โหลดสถานะ lock
	$.ajax({
		url: "check_pass1.php",
		type: 'GET',
		success: function(obj) {
			var obj = JSON.parse(obj);
			$(".found_status").text(obj.found_status);
		}
		
	});
}