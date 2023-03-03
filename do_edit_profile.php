<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('ConData.php') ?>
    <?php
    $sql = "UPDATE account SET 
        pre='" . $_POST['pre'] . "',
        fname ='" . $_POST['fname'] . "',
        lname ='" . $_POST['lname'] . "',
        address ='" . $_POST['address'] . "',
        Email ='" . $_POST['Email'] . "',
        phone ='" . $_POST['phone'] . "',
        IDcard ='" . @$_POST['IDcard'] . "'
        WHERE user_id='" . $_POST['user_id'] . "' LIMIT 1";
    if (mysqli_query($link, $sql)) {
        //อัพเดตสำเร็จ

        //อัพเดตรูปโปรไฟล์
        if (isset($_FILES)) {
            $sql = "SELECT profile FROM account WHERE user_id='" . $_POST['user_id'] . "' LIMIT 1";
            $result = mysqli_query($link, $sql);
            @unlink("profile_img/" . $profile_img['profile']);
            if (move_uploaded_file($_FILES["profile"]["tmp_name"], "profile_img/" . $_FILES["profile"]["name"])) {
                $sql = "UPDATE account SET
                profile = '" . $_FILES["profile"]["name"] . "'
                WHERE user_id = '" .  $_POST['user_id'] . "'LIMIT 1";
                mysqli_query($link, $sql) or die("Update Failed!->" . mysqli_error($link));
            } else {
                print "อัพเดตรูปโปรไฟล์ไม่สำเร็จ!!!<br>";
                header("location:menu.php?module=status=0");
                exit();
            }
        }
        print "<h2>อัพเดตสำเร็จแล้ว<h2/>";
        header("location:menu.php?module=status=0");
    } else {
        print "UPDATE Failed!!!" . mysqli_error($link);
    }
    ?>
</body>

</html>