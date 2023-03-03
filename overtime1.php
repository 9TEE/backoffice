<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>    <!-- <link rel="stylesheet" href="overtime1.css"> -->
    <title>Document</title>
</head>
<?php include('ConData.php') ?>
<?php
$sql = "SELECT * FROM account ORDER BY role";
$result = mysqli_query($link, $sql) or die(mysqli_error($link)); ?>

<body>
    <div class="text-center m-2">
    <div class="text-center m-1">
        <h3 class="shadow-lg p-3 mb-3 bg-body rounded">ระบบจัดการล่วงเวลา</h3>
    </div>
    <div class="text-center m-1" >
        <table class="table table-bordered border-dark">
            <thead class="table-dark">
                <tr>
                    <th style="width: 5rem;">ลำดับที่</th>
                    <th style="width: 7rem;">คำนำหน้า</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th style="width: 27.125rem;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['pre'] ?></td>
                        <td><?= $row['fname'] ?></td>
                        <td><?= $row['lname'] ?></td>
                        <td>
                            <a href="menu.php?module=status=10&user_id=<?= $row['user_id'] ?>" class="btn btn-success"><i class="bi bi-file-earmark-diff-fill a"></i> บันทึกงานล่วงเวลา</a>
                            &nbsp;&nbsp;
                            <a href="menu.php?module=status=11&user_id=<?= $row['user_id'] ?>" class="btn btn-info"><i class="bi bi-file-earmark-spreadsheet-fill b"></i> ข้อมูลงานล่วงเวลา</a>
                        </td>
                    </tr>
                <?php
                $i++;
                }
                ?>
            </tbody>
        </table>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
        </div>
    </div>
</body>

</html>