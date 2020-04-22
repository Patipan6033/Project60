<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>DELETE</title>
<link href="delete_table3.css" rel="stylesheet" type="text/css"/>
<script >
    function confirmDelete(){
        return confirm("คุณต้องการที่จะลบข้อมูลนี้ ใช่หรือไม่? ");


    }</script>
</head>
<body >
<p id = "p1">ผลลัพธ์การค้นหา</p>      
<div id="form-m">
    <div id="form-d">
    
    <table >
                <tr>
                <th>ID</th>
                <th>เลขทะเบียนรถยนต์</th>
                <th>จังหวัด</th>
                <th>ชื่อ-นามสกุล</th>
                <th>สถานะ</th>
                <th>Lineaccount</th>
                <th>เบอร์โทรศัพท์</th>
                <th>รหัสรถยนต์</th>
                <th>Delete</th>
                </tr>
              <?php
                 require("connect.php");

                 $liplate = "";
                 $pro = "";
                 $status="";

                 if(isset($_GET['status']))  $status = $_GET['status'];
                 if(isset($_GET['pro']))  $pro = $_GET['pro'];
                 if(isset($_GET['liplate']))  $liplate = $_GET['liplate'];

                
                if($status == "pub") {
                $sql="SELECT * FROM datapub INNER JOIN pub ON datapub.ID = pub.ID WHERE licenseplate LIKE '%$liplate%' AND  province LIKE '%$pro%'";
                // $sql="SELECT * FROM pub WHERE licenseplate LIKE '%$liplate%' AND  province LIKE '%$pro%'";
                $result = mysqli_query($conn,$sql);

                if (mysqli_num_rows($result) > 0) 
                { 
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<form action='delete_pub.php'>";
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['licenseplate'] . "</td>";
                        echo "<td>" . $row['province'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . "บุคคลทั่วไป" . "</td>";
                        echo "<td>" . $row['lineaccount'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td><input type='text' name='ID_lp' class = 'id' style='text-align: center;' value=" . $row['ID_lp'] . " readonly></td>";
                        echo "<td><input type='submit' class ='Delete' name='send' value='Delete' onClick='return confirmDelete()' ></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                } 
                } 
                elseif($status == "per") {
                    $sql="SELECT * FROM dataper INNER JOIN per ON dataper.idper = per.ID WHERE licenseplate LIKE '%$liplate%' AND  province LIKE '%$pro%'";
                    $result = mysqli_query($conn,$sql);
    
                    if (mysqli_num_rows($result) > 0) 
                    { 
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "<form action='delete_per.php'>";
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['licenseplate'] . "</td>";
                            echo "<td>" . $row['province'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . "บุคลากร" . "</td>";
                            echo "<td>" . $row['lineaccount'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td><input type='text' name='ID_lp' class = 'id' style='text-align: center;' value=" . $row['ID_lp'] . " readonly></td>";
                            echo "<td><input type='submit' class ='Delete' name='send' value='Delete' onClick='return confirmDelete()' ></td>";
                            echo "</tr>";
                            echo "</form>";
                        }
                    } 
                    } 
                    elseif($status == "stu") {
                        $sql="SELECT * FROM datastu INNER JOIN stu ON datastu.idstu = stu.ID WHERE licenseplate LIKE '%$liplate%' AND  province LIKE '%$pro%'";
                        $result = mysqli_query($conn,$sql);
        
                        if (mysqli_num_rows($result) > 0) 
                        { 
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "<form action='delete_stu.php'>";
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['licenseplate'] . "</td>";
                                echo "<td>" . $row['province'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . "นิสิต" . "</td>";
                                echo "<td>" . $row['lineaccount'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td><input type='text' name='ID_lp' class = 'id' style='text-align: center;' value=" . $row['ID_lp'] . " readonly></td>";
                                echo "<td><input type='submit' class ='Delete' name='send' value='Delete' onClick='return confirmDelete()' ></td>";
                                echo "</tr>";
                                echo "</form>";
                            }
                        } 
                        } 
                ?>               
        </table>
          
           
          
          </div>
        </form>
        <div class="submit2">
            <a href="delete1.php"><button type="submit" id="login-button2" name = "send" value = "Edit">ค้นหาเพิ่มเติม</button></a>
            <div class="ease2"></div>  
           
      
    </div>