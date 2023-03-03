<!DOCTYPE html>
<html lang="en">
<?php include('ConData.php');
$sql = "SELECT * FROM account ORDER BY role";
$result = mysqli_query($link, $sql) or die(mysqli_error($link)); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- <link rel="stylesheet" href="report.css"> -->
    <title>Document</title>
</head>

<body>
    <div class="text-center m-2">
        <div class="">
            <h3 class="shadow-lg p-3 mb-2 bg-body rounded">รายงานข้อมูลพนักงาน</h3>
        </div>
        <div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ตำแหน่งงาน</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['pre'] ?></td>
                            <td><?= $row['fname'] ?></td>
                            <td><?= $row['lname'] ?></td>
                            <td><?= $row['role'] ?></td>
                            <td>
                                <div class="">
                                    <div class="">
                                        <a href="menu.php?module=status=12&user_id=<?= $row['user_id'] ?>" class="btn" style="background-color: #000096; color: #FFFFFF ;">ลา</a>
                                        <a href="menu.php?module=status=13&user_id=<?= $row['user_id'] ?>" class="btn" style="background-color:#000096; color:#FFFFFF">ล่วงเวลา</a>
                                    </div>
                                </div>
                            </td>
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
            &nbsp;&nbsp;
            <a href="menu.php?module=status=14"><i class="bi bi-gear-fill"></i></a>
        </div>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
    </div>
</body>

</html>