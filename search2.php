<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>SEARCH</title>
<link href="search3.css" rel="stylesheet" type="text/css"/>

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
                </tr>
              <?php
                 require("connect.php");

                $liplate = $_GET['liplate'];
                $pro = $_GET['pro'];
                $status = $_GET['status'];

                
                if($status == "pub") {
                $sql="SELECT * FROM datapub INNER JOIN pub ON datapub.ID = pub.ID WHERE licenseplate LIKE '%$liplate%' AND  province LIKE '%$pro%'";
                // $sql="SELECT * FROM pub WHERE licenseplate LIKE '%$liplate%' AND  province LIKE '%$pro%'";
                $result = mysqli_query($conn,$sql);

                if (mysqli_num_rows($result) > 0) 
                { 
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['licenseplate'] . "</td>";
                        echo "<td>" . $row['province'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . "บุคคลทั่วไป" . "</td>";
                        echo "<td>" . $row['lineaccount'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "</tr>";
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
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['licenseplate'] . "</td>";
                            echo "<td>" . $row['province'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . "บุคลากร" . "</td>";
                            echo "<td>" . $row['lineaccount'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "</tr>";
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
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['licenseplate'] . "</td>";
                                echo "<td>" . $row['province'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . "บุคลากร" . "</td>";
                                echo "<td>" . $row['lineaccount'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "</tr>";
                            }
                        } 
                        } 
                ?>               
        </table>
           
           
          
          </div>
        </form>
        <div class="submit2">
            <a href="search1.php"><button type="submit" id="login-button2" name = "send" value = "Edit">ค้นหาเพิ่มเติม</button></a>
            <div class="ease2"></div>  
      
    </div>