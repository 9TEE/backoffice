<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link rel="stylesheet" href="edit_profile.css">
    <title>Document</title>
</head>
<?php include('ConData.php') ?>

<body>
    <div class="a">
        <div class="col">
            <h3 align="center">แก้ไขข้อมูลพนักงาน</h3>
        </div>
        <br>
        <form action="do_edit_profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="">
            <h4>ข้อมูลส่วนบุคคล</h4>
            <div class="form-group">
                <label for="profile"></label>
                <?php
                if ($_SESSION['profile_img'] != '') {
                ?>
                    <img src="profile_img/<?= $_SESSION['profile_img'] ?>">
                <?php
                }
                ?>
            </div>
            <br>
            <div class="form-grup">
                <label for="pre">คำนำหน้า</label>
                <select name="pre" id="pre" disabled="disabled">
                    <option value="นาย" <?php
                                        if ($_SESSION['pre'] == 'นาย')
                                            print 'selected';
                                        ?>>นาย</option>
                    <option value="นาง" <?php
                                        if ($_SESSION['pre'] == 'นาง')
                                            print 'selected';
                                        ?>>นาง</option>
                    <option value="นางสาว" <?= ($_SESSION['pre'] == 'นางสาว') ? 'selected' : '' ?>>นางสาว</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="fullname">ชื่อ-นามสกุล</label>
                <input type="text" name="fullname" id="fullname" required value="<?= $_SESSION['fullname'] ?>" disabled="disabled">
            </div>
            <br>
            <div class="form-group">
                <label for="Email">อีเมล</label>
                <input type="Email" name="Email" id="Email" required value="<?= $_SESSION['Email'] ?>" disabled="disabled">
            </div>
            <br>
            <div class="form-group">
                <label for="phone">เบอร์ติดต่อ</label>
                <input type="text" name="phone" id="phone" required value="<?= $_SESSION['phone'] ?>" disabled="disabled">
            </div>
            <br>
            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea name="address" id="address" cols="30" rows="3" disabled="disabled"><?= $_SESSION['address'] ?></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="IDcard">บัตรประชาชน</label>
                <input type="text" name="IDcard" id="IDcard" required value="<?= $_SESSION['IDcard'] ?>" disabled="disabled">
            </div>
            <br>
        </form>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
    </div>
</body>

</html>