<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="menu.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <title>ระบบสารสนเทศเพื่อการจัดการข้อมูลหอพักช่อชงโคอู่ทองทวารวดี</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #A34693 ;">
    <div class="container-fluid">
      <a class="navbar-brand" href="menu.php"><i class="bi bi-house-fill" style="font-size: 2rem;"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
        <a class="nav-link" href="menu.php" >Menu</a>
        </li> -->
          <li class="nav-item">
            <a href="menu.php?module=status=0" class="nav-link" style="color:aliceblue">ข้อมูลพนักงาน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php?module=status=1" style="color:aliceblue">ตรวจดูเวลาเข้างานของพนักงาน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php?module=status=2" style="color:aliceblue">ลาของพนักงาน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php?module=status=3" style="color:aliceblue">จัดการล่วงเวลา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php?module=status=5" style="color:aliceblue">การแจ้งซ่อม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php?module=status=4" style="color:aliceblue">รายงาน</a>
          </li>
          <li class="nav-item">

          </li>
        </ul>

      </div>
      <a class="navbar-brand" href="logout.php">ออกจากระบบ</a>
    </div>
  </nav>

  <!-- <nav class="navbar">
        <ul class="nav flex-column">
            <li><a class="active" href="menu.php">Menu</a></li>

            <li><a href="menu.php?module=status=0">ข้อมูลพนักงาน</a></li>

            <li><a href="menu.php?module=status=1">ตรวจดูเวลาเข้างานของพนักงาน</a></li>

            <li><a href="menu.php?module=status=2">ทำเรื่องลาของพนักงาน</a></li>

            <li><a href="menu.php?module=status=3">จัดการล่วงเวลา</a></li>

            <li><a href="menu.php?module=status=4">ระบบรายงาน</a></li>

            <li><a href="menu.php?module=status=5">การแจ้งซ่อม</a></li>

            <li><a href="logout.php">ออกจากระบบ</a></li>
        </ul>
        </nav>

     -->
  <?php

  if (@$_GET['module'] == 'status=0') {
    include('employee.php');
  } elseif (@$_GET['module'] == 'status=1') {
    include('time1.php');
  } elseif (@$_GET['module'] == 'status=2') {
    include('fixtime1.php');
  } elseif (@$_GET['module'] == 'status=3') {
    include('overtime1.php');
  } elseif (@$_GET['module'] == 'status=4') {
    include('report.php');
  } elseif (@$_GET['module'] == 'status=5') {
    include('repair.php');
  } elseif (@$_GET['module'] == 'status=6') {
    include('register.php');
  } elseif (@$_GET['module'] == 'status=7') {
    include('edit_profile.php');
  } elseif (@$_GET['module'] == 'status=8') {
    include('time2.php');
  } elseif (@$_GET['module'] == 'status=9') {
    include('fixtime2.php');
  } elseif (@$_GET['module'] == 'status=10') {
    include('overtime2.1.php');
  } elseif (@$_GET['module'] == 'status=11') {
    include('overtime2.2.php');
  } elseif (@$_GET['module'] == 'status=12') {
    include('report1.php');
  } elseif (@$_GET['module'] == 'status=13') {
    include('report2.php');
  } elseif (@$_GET['module'] == 'status=14') {
    include('SummaryReport.php');
  }
  ?>
</body>

</html>