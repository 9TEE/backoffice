<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="overtime2.2.css">
    <title>Document</title>
    <?php include('ConData.php');
    $sql = "SELECT * FROM account WHERE user_id='" . $_GET['user_id'] . "'";
    $resultm = mysqli_query($link, $sql) or die("Error in query: $sql " . mysqli_error($link));
    $rowm = mysqli_fetch_array($resultm);

    $sql2 = "SELECT * FROM overtime WHERE user_id='" . $_GET['user_id'] . "'";
    $resultm = mysqli_query($link, $sql2) or die("Error in query: $sql2 " . mysqli_error($link));
    ?>
</head>

<body>
    <div class="col">
        <h3 align="center">ระบบจัดการล่วงเวลา</h3>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col1">
                <img src="profile_img/<?= $rowm['profile'] ?>">
                <br>
                <b>
                    <?php echo $rowm['pre'] . $rowm['fullname'] ?>
                    <br>
                    ตำแหน่ง : <?php echo $rowm['role']; ?>
                </b>
            </div>
            <br>
        </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>วันทำงาน</th>
                    <th>ชื่อกะงาน</th>
                    <th>เวลาเข้า-ออก</th>
                    <th>ชม.ทำงานมาตรฐาน</th>
                    <th>ชม.ทำงานล่วงเวลา</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rowm1 = mysqli_fetch_assoc($resultm)) {
                    $time_a = $rowm1['timestart'];
                    $time_b = $rowm1['timeend'];
                    $a = diff2time($time_a, $time_b);

                    $c = strtotime($a);
                    $time_a = $rowm1['timestandard'];
                    $time_b = date('H:i:s', $c);
                    $b = diff2time1($time_a, $time_b);
                ?>

                    <tr>
                        <td><?php
                            $date = new DateTime($rowm1['date']);
                            echo $date->format('d-m-Y');
                            ?></td>
                        <td><?php echo $rowm1['Job'] ?></td>
                        <td><?php echo $rowm1['timestart'] . ' ' . '-' . ' ' . $rowm1['timeend'] ?></td>
                        <td><?php echo $rowm1['timestandard'] ?></td>
                        <td><?php if ($b < '1 ชั่วโมง 0 นาที 0 วินาที') {
                                echo '<font color="red"> 0 ชั่วโมง 0 นาที 0 วินาที </font>';
                            } else {
                                echo "<font color='Green'>" . $b .  "</font>";
                            } ?></td>
                    </tr>
                <?php
                }
                ?>
                
            </tbody>
        </table>
    </div>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
    </div>
</body>

</html>

<?php
//สูตรคำนวณล่วงเวลา
function diff2time($time_a, $time_b)
{

    $now_time1 = strtotime(date("Y-m-d " . $time_a));
    $now_time2 = strtotime(date("Y-m-d " . $time_b));
    $time_diff = abs($now_time2 - $now_time1);
    $time_diff_h = floor($time_diff / 3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m = floor(($time_diff % 3600) / 60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s = ($time_diff % 3600) % 60; // จำนวนวินาทีที่ต่างกัน
    return sprintf("%02d", $time_diff_h) . "" . sprintf("%02d", $time_diff_m) . "" . sprintf("%02d", $time_diff_s) . "";
}
//$time_a = "08:14:40";
//$time_b = "19:32:57";
//$a = diff2time($time_a, $time_b);

function diff2time1($time_a, $time_b)
{

    $now_time1 = strtotime(date("Y-m-d " . $time_a));
    $now_time2 = strtotime(date("Y-m-d " . $time_b));
    $time_diff = abs($now_time2 - $now_time1);
    $time_diff_h = floor($time_diff / 3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m = floor(($time_diff % 3600) / 60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s = ($time_diff % 3600) % 60; // จำนวนวินาทีที่ต่างกัน
    return $time_diff_h . " ชั่วโมง " . $time_diff_m . " นาที " . $time_diff_s . " วินาที";
}
//$c = strtotime($a);
//$time_a = "08:00:00";
//$time_b = date('H:i:s', $c);
//$b = diff2time1($time_a, $time_b);
?>