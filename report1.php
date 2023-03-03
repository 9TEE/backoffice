<!DOCTYPE html>
<html lang="en">
<?php include('ConData.php');
$sql = "SELECT * FROM eleave WHERE m_id=" . $_GET['user_id'] .  " ";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$sql1 = "SELECT * FROM account WHERE user_id=" . $_GET['user_id'] .  " ";
$result1 = mysqli_query($link, $sql1) or die(mysqli_error($link));
$row1 = mysqli_fetch_assoc($result1) ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="report.css"> -->
    <title>Document</title>
</head>

<body>
    <div>
        <div class="col">
            <h3 align="center">รายละเอียดการลาพนักงาน</h3>
        </div>
        <br>
        <div class="text">
            <h3><?= $row1['fname'] ?></h3>
        </div>
        <br>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>วันที่ลา</th>
                        <th>ประเภทการลา</th>
                        <th>เหตุผลที่ลา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['ThDate'] ?></td>
                            <td><a class="checkall icon-uncheck" title="Select all"></a>
                                <?php
                                if (@$row['leave_id'] == '1')
                                    print 'ลากิจส่วนตัว';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '2')
                                    print 'ลาคลอดบุตร';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '3')
                                    print 'ลาป่วย';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '4')
                                    print 'ลาพักผ่อน';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '5')
                                    print 'ลาเข้ารับการตรวจเลือกทหารหรือเข้ารับการเตรียมพล';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '6')
                                    print 'ลาไปช่วยเหลือภรรยาที่คลอดบุตร';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '7')
                                    print 'ลาไปศึกษา ฝึกอบรม ปฏิบัติการวิจัย หรือดูงาน';
                                ?></td>
                            <td><?= $row['detail'] ?></td>
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