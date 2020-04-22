<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>ลงทะเบียน</title>
<link href="h3.css" rel="stylesheet" type="text/css"/>
<!-- <script>
        function validateForm() {
        var a = document.forms["Form"]["name"].value;
        var b = document.forms["Form"]["email"].value;
        var c = document.forms["Form"]["idcard"].value;
        var d = document.forms["Form"]["idline"].value;
        var e = document.forms["Form"]["Phone"].value;
        var f = document.forms["Form"]["lip"].value;
        var g = document.forms["Form"]["pro"].value;
        if (a == "" || a == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้");
            document.getElementById("name").focus();
            return false;         
        }
        
        if (b == "" || b == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้");
            document.getElementById("email").focus();
            return false;
            }
        if (c == "" || c == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้t");
            document.getElementById("idcard").focus();
            return false;         
        }
        
        if (d == "" || d == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้");
            document.getElementById("idline").focus();
            return false;
            }
        if (e == "" || e == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้");
            document.getElementById("Phone").focus();
            return false;
            }
         if (f == "" || f == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้");
            document.getElementById("lip").focus();
            return false;
            }
         if (g == "" || g == null) {
            alert("กรุณากรอกข้อมูลให้ครบตามที่กำหนดไว้");
            document.getElementById("pro").focus();
            return false;
            }
    }

    </script> -->
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>ลงทะเบียน</title>
<link href="h3.css" rel="stylesheet" type="text/css"/>
<style>
.img2{
  width: 150px;
    height: 150px;
    margin-left: 33%;
    /* margin-top: -60px; */
}
</style>
</head>
<body >
  <div id="form-main">
    <div id="form-div">
        
      <form class="form" id="form1"  name = "Form" action="add_gepub.php" method ="GETS" >
        <p class="regis" style="font-size: 32px; color: white ; margin-left: 30px; margin-top: 10px;">ลงทะเบียนสำหรับบุคคลทั่วไป</p>
        <p class="regis" style="font-size: 15px; margin-left: 0px; margin-top: 10px;">**หมายเหตุ: กรุณากรอกให้ครบทุกช่อง</p>
        
        <p class="name">
          <input name="name" type="text" class=" feedback-input" placeholder="ชื่อ-นามสกุล" id="name" required/>
        </p>
        
        <p class="email">
          <input name="email" type="email" class=" feedback-input" id="email" placeholder="Email" required/>
        </p>
        <p class="idcard">
            <input name="idcard" type="text" class="feedback-input" id="idcard" placeholder="เลขบัตรประชาชน" pattern="[0-9]{13}" title="กรอกเลขบัตรประชาชนเป็นตัวเลข 13 หลัก" required/>
          <p class="Phone">
            <input name="Phone" type="text" class=" feedback-input" id="Phone" placeholder="เบอร์โทรศัพท์"  pattern="[0-9]{10}" title="กรอกเลขเบอร์โทรศัพท์เป็นตัวเลข 10 หลัก" required/>
          </p>
          <p class="lip">
            <input name="lip" type="text" class=" feedback-input" id="lip" placeholder="เลขทะเบียนรถยนต์" required/>
          </p>
          <p class="pro">
            <input name="pro" type="text" class=" feedback-input" id="pro" placeholder="จังหวัดทะเบียน" required/>
          </p>
          <p class="img1"> แสกนคิวอาร์โค้ด เพื่อรับไอดี </p>
          <img src="QR.png"  class = "img2" id = "img2"><br><br><br>
          <p style="color:white; margin-top:-25px;">:คัดลอก ID ของคุณที่ได้จากแชทนำมาวางไว้ที่ LineID <br><span> ตัวอย่าง : U24aa555f6cdc32688575cce54d5ba288</span>
</p> 
          <p class="idline">
            <input name="idline" type="text" class=" feedback-input" id="idline" placeholder="LineID" required/>
          </p>

          <!-- <p class="img1"> อัพโหลดรูปภาพสมุดทะเบียนรถ  </p>

<p class="img2">
  <input name="img" type="file" class="feedback-input" id="img" placeholder="จังหวัดทะเบียน" pattern="{1,30}" title="อัพโหลดรูปภาพ พ.ร.บ ของผู้ลงทะเบียน" />
</p>
<p style="color:white; margin-top:-25px;">**ให้เห็นหลักฐานในการเป็นเจ้าของ</p> -->
<br>

          <br>
        
        <div class="submit">
          <input type="submit" value="ลงทะเบียน" id="button-blue" name="btnper"/>
          <div class="ease"></div>  
        </div><br><br>
      
        
      </form>
      <form action="out.php" >
        <div class="submit">
        <a href="login.php"><input type="submit"  value="ยกเลิก" id="button-blue" class="out"/></a>
            <div class="ease"></div>  
          </div>
        </form>
    </div>
   </body>
</html>




