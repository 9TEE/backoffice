<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include('ConData.php') ?>

<body>
    <?php
    $sql = "SELECT profile FROM account WHERE user_id='" . $_GET['user_id'] . "' LIMIT 1";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $profile_img = mysqli_fetch_assoc($result);
    unlink("profile_img/" . $profile_img['profile']);

    $sql = "DELETE FROM account WHERE user_id='" . $_GET['user_id'] . "' LIMIT 1";
    if (mysqli_query($link, $sql)) {
        header("location:menu.php?module=status=0");
    } else {
        print "ลบผู้ใช่ไม่สำเร็จ --> " . mysqli_error($link);
        header("location:menu.php?module=status=0");
    }
    ?>
</body>

</html>