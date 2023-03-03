<!DOCTYPE html>
<html lang="en">
<?php 
if (!isset($_SESSION['Email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>    <!-- <link rel="stylesheet" href="time1.css"> -->
    <title>Document</title>
</head>
<?php include('ConData.php') ?>
<?php
$sql = "SELECT * FROM account ORDER BY role ";
$result = mysqli_query($link, $sql) or die(mysqli_error($link)); ?>

<body>
<div>
    <div class="text-center m-2">
        <h3 class="shadow-lg p-3 mb-3 bg-body rounded">เวลาเข้างานและออกงานของพนักงาน </h3>
    </div>
    <div class="m-2">
        
        <table class="table table-dark table-hover">
            <thead class="text-center">
                <tr>
                    <th class="" style="width: 10rem;">#</th>
                    <th class="" style="width: rem;">คำนำหน้า</th>
                    <th class="" style="width: 10rem;">ชื่อ</th>
                    <th class="" style="width: 10rem;">นามสกุล</th>
                    <th ></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-end"><?= $row['pre']?></td>
                        <td class="text-start"><?= $row['fname'] ?></td>
                        <td class="text-start"><?= $row['lname'] ?></td>

                        <td class="text-center">
                            <a href="menu.php?module=status=8&user_id=<?= $row['user_id'] ?>" class="btn btn-success"><i class="bi bi-clock-history a"></i> ดูเวลาเข้างาน</a>
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                <?php
                $i++;
                }
                
                ?>
            </tbody>
        </table>
        
    </div>
    </div>
    </div>
</body>

</html>