<?php session_start();
if (!isset($_SESSION['Email'])) {
    header('location: login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>ระบบสารสนเทศเพื่อการจัดการข้อมูลหอพักช่อชงโคอู่ทองทวารวดี</title>
</head>

<body>
    <table>
        <rt>
            <td>
                <ul>
                    <li><a class="active" href="menuuser.php">Menu</a></li>

                    <li><a href="menuuser.php?module=status=0">ข้อมูลพนักงาน</a></li>

                    <li><a href="menuuser.php?module=status=1">การแจ้งซ่อม</a></li>

                    <li><a href="logout.php">ออกจากระบบ</a></li>
                </ul>
            </td>
        </rt>
    </table>
    <?php

    if (@$_GET['module'] == 'status=0') {
        include('employeeuser.php');
    } elseif (@$_GET['module'] == 'status=1') {
        include('repair1.php');
    }
    ?>