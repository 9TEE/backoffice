<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link rel="stylesheet" href="edit_profile.css">
    <title>Document</title>
</head>
<?php
include('ConData.php');
$sql = "SELECT * FROM account WHERE user_id='" . $_GET['user_id'] . "'LIMIT 1";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$info = mysqli_fetch_assoc($result);

?>

<body>
    <div class="a">
        <div class="col">
            <h3 align="center">บันทึกงานล่วงเวลา</h3>
        </div>
        <br>
        <form action="overtimesave.php?user_id=<?= $info['user_id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= @$_GET['user_id'] ?>">
            <h4>บันทึกงานล่วงเวลา</h4>
            <div class="form-group">
                <i class="fa fa-male"></i>
                <label for="fullname">ชื่อ-นามสกุล</label>
                <input type="text" name="fname" id="fname" required value="<?= $info['pre'] ?> <?= $info['fname'] ?>" disabled="disabled">
            </div>
            <div class="form-group">
                <i class="glyphicon glyphicon-calendar"></i>
                <label for="date">วันทำงาน</label>
                <input type="date" name="date" id="date" required value="<?= date('Y-m-d') ?>">
            </div>
            <div class="form-group">
                <i class="glyphicon glyphicon-list-alt"></i>
                <label for="Job">ชื่อกะงาน</label>
                <input type="text" name="Job" id="Job" required value="">
            </div>
            <div class="form-group">
                <i class="bi bi-clock-history"></i>
                <label for="time">เวลาเข้า-ออก</label>
                <input type="text" name="timestart" id="timestart" required value="<?= date('H:i:s') ?>">
                <input type="text" name="timeend" id="timeend" required value="<?= date('H:i:s') ?>">
            </div>
            <div class="form-group">
                <i class="bi bi-stopwatch"></i>
                <label for="text">ชม.ทำงานมาตรฐาน</label>
                <input type="text" name="timestandard" id="timestandard" required value="08:00:00">
            </div>
            <button type="submit" class="button" style="vertical-align:middle"><span>บันทึกข้อมูล</span></button>
        </form>
    </div>
</body>

</html>