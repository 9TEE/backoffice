<?php
$link = mysqli_connect("localhost", "root", "", "proj_m")
    or die("Connect Failed! -> " . mysqli_error($link));
mysqli_query($link, "SET NAMES UTF8") or die(mysqli_error($link));
date_default_timezone_set('Asia/Bangkok');
$condb = mysqli_connect("localhost", "root", "", "proj_m")
    or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');

@$user_id = $_POST['user_id'];
@$id = $_GET['user_id'];
@$pre = $_POST['pre'];
@$fullname = $_POST['fname'];
@$address = $_POST['address'];
@$phone = $_POST['phone'];
@$role = $_POST['role'];
@$profile = $_POST['profile'];
@$IDcard = $_POST['IDcard'];
@$Email = $_POST['Email'];
@$timenow = date('H:i:s');