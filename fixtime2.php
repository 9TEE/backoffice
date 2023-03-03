<!DOCTYPE html>
<html lang="en">
<?php include('ConData.php'); ?>
<?php
//query member login
$queryemp = "SELECT * FROM account WHERE user_id='" . $_GET['user_id'] . "'";
$resultm = mysqli_query($condb, $queryemp) or die("Error in query: $queryemp " . mysqli_error($condb));
$rowm = mysqli_fetch_array($resultm);
$sql = "SELECT * FROM eleave WHERE status ";
$resultm2 = mysqli_query($link, $sql) or die(mysqli_error($link));
$row = mysqli_fetch_array($resultm2);

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="fixtime2.css"> -->
</head>

<body>
    <div class="div1 col">
        <h3 align="center">แก้ไขการลาของพนักงาน</h3>
    </div>
    <br>
    <div class="div1 row">
        <img src="profile_img/<?= $rowm['profile'] ?>">
        <br>
        <b>
            <?php echo $rowm['pre'] . $rowm['fname'] ?>
            <br>
            ตำแหน่ง : <?php echo $rowm['role']; ?>
        </b>
        <br>
    </div>
    <div class='t div1'>
        <table>
            <thead>
                <tr>
                    <th>ระบบลางาน</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a class="btn btn2" href="menu.php?module=status=9&amp;mod=status=0&amp;user_id=<?= $rowm['user_id'] ?>" title="รออนุมัติ"><span>รออนุมัติ</span></a></td>
                    <td><a class="btn btn2" href="menu.php?module=status=9&amp;mod=status=1&amp;user_id=<?= $rowm['user_id'] ?>" title="อนุมัติ"><span>อนุมัติ</span></a></td>
                    <td><a class="btn btn2" href="menu.php?module=status=9&amp;mod=status=2&amp;user_id=<?= $rowm['user_id'] ?>" title="ไม่อนุมัติ"><span>ไม่อนุมัติ</span></a></td>
                    <td><a class="btn btn2" href="menu.php?module=status=9&amp;mod=eleave-statistics&amp;user_id=<?= $rowm['user_id'] ?>" title="สถิติการลา"><span>สถิติการลา</span></a></td>
                    <td><a class="btn btn2" href="menu.php?module=status=9&amp;mod=eleave-leave&amp;user_id=<?= $rowm['user_id'] ?>" title="เพิ่ม คำขออนุมัติลา"><span>เพิ่ม คำขออนุมัติลา</span></a></td>
                    <td><a class="btn btn2" href="menu.php?module=status=9&amp;mod=eleave1&amp;user_id=<?= $rowm['user_id'] ?>" title="ตั้งค่าจำนวนวัน"><span>ตั้งค่าจำนวนวัน</span></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
    if ($_GET['mod'] == 'status=0') {
        include('form.php');
    } elseif ($_GET['mod'] == 'status=1') {
        include('form1.php');
    } elseif ($_GET['mod'] == 'status=2') {
        include('form2.php');
    } elseif ($_GET['mod'] == 'eleave-statistics') {
        include('form3.php');
    } elseif ($_GET['mod'] == 'eleave-leave') {
        include('form4.php');
    } elseif ($_GET['mod'] == 'eleave1') {
        include('long.php');
    }
    ?>
    <p align="center" class="div1"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
        Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
        </a>
    </p>
</body>

</html>