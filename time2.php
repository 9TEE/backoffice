<!DOCTYPE html>
<html lang="en">
<?php include('ConData.php'); ?>
<?php
//query member login
$queryemp = "SELECT * FROM account WHERE user_id='" . $_GET['user_id'] . "'";
$resultm = mysqli_query($condb, $queryemp) or die("Error in query: $queryemp " . mysqli_error($condb));
$rowm = mysqli_fetch_array($resultm);

function ThDate()
{
    //วันภาษาไทย
    $ThDay = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
    //เดือนภาษาไทย
    $ThMonth = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");

    //วันที่ ที่ต้องการเอามาเปลี่ยนฟอแมต
    $myDATE = date("Y/m/d"); //อาจมาจากฐานข้อมูล
    //กำหนดคุณสมบัติ
    $week = date("w", strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
    $months = date("m", strtotime($myDATE)) - 1; // ค่าเดือน (1-12)
    $day = date("d", strtotime($myDATE)); // ค่าวันที่(1-31)
    $years = date("Y", strtotime($myDATE)) + 543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

    return "วัน$ThDay[$week] ที่ $day เดือน $ThMonth[$months] พ.ศ. $years";
}
//เวลาปัจจุบัน
$timenow = date('H:i:s');
$datenow = ThDate(@$myDATE);
//เวลาที่บันทึก
$queryworkio = "SELECT MAX(workdate) as lastdate, workin, workout FROM time0 WHERE m_id='" . $_GET['user_id'] . "' AND workdate='$datenow' ";
$resultio = mysqli_query($condb, $queryworkio) or die("Error in query: $queryworkio " . mysqli_error($condb));
$rowio = mysqli_fetch_array($resultio);

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="time2.css">  -->
</head>
 
<body>
    <div class="col">
        <h3 align="center">เวลาเข้างานและออกงานของพนักงาน </h3>
    </div>
    <br>
    <div class="AB">
        <div class="btn">
            <h3> ลงเวลาเข้า-ออกงาน <?php echo ThDate(@$myDATE); ?></h3>
        </div>
        <form action="timesave.php?user_id=<?= $rowm['user_id'] ?>" method="post" class="form-horizontal">
            <div class="col2">
                <div>
                    <label for="user_id">รหัสพนักงาน</label>
                    <input type="text" class="form-control" name="user_id " placeholder="รหัสพนักงาน" value="<?php echo $rowm['user_id']; ?>" readonly>
                </div>
                <div style='display:none'>
                    <label for="user_id">วันที่</label>
                    <input type="text" class="form-control" name="Date" placeholder="รหัสพนักงาน" value="<?php echo ThDate(@$myDATE); ?>" readonly>
                </div>
                <div>
                    <label for="m_id">เวลาเข้างาน</label>
                    <?php if (isset($rowio['workin'])) { ?>
                        <input type="text" class="form-control" name="workin" value="<?php echo $rowio['workin']; ?>" disabled>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="workin" value="<?php echo date('H:i:s'); ?>">
                    <?php  } ?>
                </div>
                <div>
                    <label for="m_id">เวลาออกงาน</label>
                    <?php
                    if ($timenow > '18:00:00') {
                        if (isset($rowio['workout'])) { ?>
                            <input type="text" class="form-control" name="workout" value="<?php echo $rowio['workout']; ?>" disabled>
                        <?php } else { ?>
                            <input type="text" class="form-control" name="workout" value="<?php echo date('H:i:s'); ?>">
                    <?php
                        } //if(isset($rowio['workout'])){
                    } else {  //if($timenow > '11:00:00'){
                        echo '<br><font color="red"> หลัง 18.00 น. </font>';
                    } ?>
                </div>
                <div>
                    <label></label>
                    <button type="submit" class="button" style="vertical-align:middle"><span>บันทึกข้อมูล</span></button>
                </div>
            </div>
            <div class="col1">
                <img src="profile_img/<?= $rowm['profile'] ?>" width="70%">
                <br>
                <b>
                    <?php echo $rowm['pre'] . $rowm['fullname'] ?>
                    <br>
                    ตำแหน่ง : <?php echo $rowm['role']; ?>
                </b>
            </div>
    </div>
    <div class="a">
        </form>
        <br>
        <br>
        <br>
        <?php
        $querylist = "SELECT * FROM time0 WHERE m_id=" . $_GET['user_id'] . " ORDER BY workdate1 DESC";
        $resultlist = mysqli_query($condb, $querylist)  or die("Error:" . mysqli_error($condb));
        echo "
          <table>
          <thead>
          <br>
            <tr>
            <td style='display:none'>วันที่</td>
            <th>ลำดับ</th>
              <th>วันที่</th>
              <th>เวลา-เข้า</th>
              <th>เวลา-ออก</th>
              <th>เวลาทำงาน</th>
            </tr>
            </thead>
            ";
        //สูตรคำนวณเวลา
        function diff2time($time_a, $time_b)
        {
            $now_time1 = strtotime(date("Y-m-d " . $time_a));
            $now_time2 = strtotime(date("Y-m-d " . $time_b));
            $time_diff = abs($now_time2 - $now_time1);
            $time_diff_h = floor($time_diff / 3600); // จำนวนชั่วโมงที่ต่างกัน
            $time_diff_m = floor(($time_diff % 3600) / 60); // จำวนวนนาทีที่ต่างกัน
            $time_diff_s = ($time_diff % 3600) % 60; // จำนวนวินาทีที่ต่างกัน
            return $time_diff_h . " ชั่วโมง " . $time_diff_m . " นาที " . $time_diff_s . " วินาที";
        }

        $i = 1;
        foreach ($resultlist as $value) {
            $time_a = $value["workin"];
            $time_b = $value["workout"];
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td style='display:none' >" . $value["workdate1"] .  "</td> ";
            echo "<td>" . $value["workdate"] .  "</td> ";
            echo "<td>" . $value["workin"] .  "</td> ";
            echo "<td>" . $value["workout"] .  "</td> ";
            echo "<td>" . diff2time($time_a, $time_b) .  "</td> ";
            echo "</tr>";
            $i++;
        }
        echo '</table>';
        ?>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
    </div>
</body>

</html>