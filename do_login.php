<?php
session_start();

include('ConData.php');

$sql = "SELECT * FROM account
WHERE Email='" . $_POST['Email'] . "'
AND phone='" . $_POST['phone'] . "'";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
if (mysqli_num_rows($result) == 0) {
    //ไม่เจอ
    echo "<script>";
    echo "alert('อีเมลหรือเบอร์ผิด');";
    echo "window.location='login.php';";
    echo "</script>";
} else {
    //เจอ
    $row = mysqli_fetch_assoc($result);
    $_SESSION['authen'] = true;
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION['pre'] = $row['pre'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['profile_img'] = $row['profile'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['IDcard'] = $row['IDcard'];

    if ($row['role'] == 'พนักงาน')
        header("location:menuuser.php");
    elseif ($row['role'] == 'ผู้จัดการ')
        header("location:menu.php");
    elseif ($row['role'] == 'ผู้ดูแลระบบ')
        header("location:menu.php");
}
