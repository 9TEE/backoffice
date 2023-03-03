<!DOCTYPE html>
<html lang="en">
<?php include('ConData.php');
$sql = "SELECT * FROM repair ";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

$sql2 = "SELECT * FROM account ";
$result2 = mysqli_query($link, $sql2) or die(mysqli_error($link));
$name = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
    $name[$row2['user_id']] = $row2['pre'] . $row2['fullname'];
}
function ThDate()
{
    include('ConData.php');
    $sql = "SELECT * FROM repair ";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    //วันภาษาไทย
    $ThDay = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
    //เดือนภาษาไทย
    $ThMonth = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");

    //วันที่ ที่ต้องการเอามาเปลี่ยนฟอแมต
    $myDATE = $row["date"]; //อาจมาจากฐานข้อมูล
    //กำหนดคุณสมบัติ
    $week = date("w", strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
    $months = date("m", strtotime($myDATE)) - 1; // ค่าเดือน (1-12)
    $day = date("d", strtotime($myDATE)); // ค่าวันที่(1-31)
    $years = date("Y", strtotime($myDATE)) + 543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

    return " $day / $ThMonth[$months] / $years";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link rel="stylesheet" href="report.css">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="col">
            <h3 align="center">รายงานแจ้งซ่อม</h3>
        </div>
        <br>
        <br>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รูป</th>
                        <th>วันที่แจ้ง</th>
                        <th>ชั้นที่</th>
                        <th>เลขที่ห้อง</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                        <th>ผู้แจ้งซ่อม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="profile_img/repair/<?= $row['profile'] ?>" width="100px" height="100px" alt=""></td>
                            <td><?= ThDate(@$myDATE); ?></td>
                            <td><?= $row['note'] ?></td>
                            <td><?= $row['number'] ?></td>
                            <td><?= $row['problem'] ?></td>
                            <td><?php
                                if (@$row['status'] == '0')
                                    print 'ยังไม่ซ่อม';
                                ?>
                                <?php
                                if (@$row['status'] == '1')
                                    print 'ซ่อมแล้ว';
                                ?></td>
                            <td><?= $name[$row['m_id']] ?></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <div class="icon">
            <a href="menu.php?module=status=4"><i class="bi bi-arrow-bar-left"></i></a>
            &nbsp;&nbsp;
            <a href="menu.php?module=status=4"><i class="bi bi-house-door-fill"></i></a>
        </div>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
    </div>
</body>

</html>