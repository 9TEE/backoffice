<?php
include('ConData.php');

//print_r($_POST);
//exit;
$user_id = $_POST['user_id'];
$id = $_POST['id'];
$leave_id = $_POST['leave_id'];
$Max = $_POST['Max'];

$sql = "SELECT * FROM `eleave1` WHERE leave_id = '$leave_id' AND id = '$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_num_rows($result);
if ($row == 0) {
    echo "<script>";
    echo "alert('มีข้อมูลอยู่แล้วไม่สามารถเพิ่มได้ !');";
    echo "window.location='menu.php?module=status=9&mod=eleave1&user_id=$user_id';";
    echo "</script>";
} else {

    //ส่วนเพิ่มข้อมูลและแก้ข้อมูล
    if ($_POST['id'] == ' ') {
        $sql = "INSERT INTO `eleave1`( `leave_id`, `Max`) VALUES ('$leave_id','$Max')";
        $result = mysqli_query($link, $sql);
        header("location:menu.php?module=status=9&mod=eleave1&user_id=$user_id");
    }
    $sql = "UPDATE eleave1 SET
                leave_id='" . $_POST['leave_id'] . "',
                Max='" . $_POST['Max'] . "'
                WHERE id='" . $_POST['id'] . "' LIMIT 1";

    if (mysqli_query($link, $sql)) {
        $sql = "INSERT INTO eleave1 SET
leave_id='" . $_POST['leave_id'] . "',  
Max='" . $_POST['Max'] . "'";
        header("location:menu.php?module=status=9&mod=eleave1&user_id=$user_id");
    }
}
