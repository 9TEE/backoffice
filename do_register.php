<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูล</title>
</head>
<?php include('ConData.php') ?>

<body>
    <?php

//     echo '<pre>';
//     print_r($_POST);
//     echo '</pre';
// exit;
$IDcard=$_POST['IDcard'];

    //เช็คข้อมูลซ้ำ
    $sql = " SELECT  IDcard FROM account  WHERE IDcard = '$IDcard' ";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($num > 0) {
        echo "<script>";
        echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
        echo "window.location = 'menu.php?module=status=0';";
        echo "</script>";
    } else {
        //print_r($_POST);
        //exit;
        //ตรวจสอบเบอร์โทรศัพท์
        //print $phone;
        //exit;


        //รับข้อมูลจากฟอร์ม
        $sql = "INSERT INTO account SET
    pre = '" . $_POST['pre'] . "',
    fname = '" . $_POST['fname'] . "',
    Email = '" . $_POST['Email'] . "',
    phone = '" . $_POST['phone'] . "',
    address = '" . $_POST['address'] . "',
    IDcard = '" . $_POST['IDcard'] . "'";

        if (mysqli_query($link, $sql)) {
            //อัพรูป
            $user_id = mysqli_insert_id($link);
            if (move_uploaded_file(
                $_FILES["profile"]["tmp_name"],
                "profile_img/" . $_FILES["profile"]["name"]
            )) {
                $sql = "UPDATE account SET
            profile='" . $_FILES["profile"]["name"] . "'
            WHERE user_id='" . $user_id . "'LIMIT 1";
                mysqli_query($link, $sql) or die("Update Failed! -> " . mysqli_error($link));
                session_start();
                session_destroy();
                header("location:menu.php?module=status=0");
            }
        } else {
            print mysqli_error($link);
        }
    }

    ?>
</body>

</html>