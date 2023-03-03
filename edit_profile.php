<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- <link rel="stylesheet" href="edit_profile.css"> -->
    <title>Document</title>
</head>
<?php include('ConData.php') ?>
<?php
$sql = "SELECT * FROM account WHERE user_id='" . $_GET['user_id'] . "'LIMIT 1";
$result = mysqli_query($link, $sql) or dir(mysqli_error($link));
if (mysqli_num_rows($result) == 0) {
    print "Error! ไม่พบ User ที่่่เลือก";
    exit();
}
$info = mysqli_fetch_assoc($result);
?>

<body>
    <div class="a">
        <div class="col">
            <h3 align="center">แก้ไขข้อมูลพนักงาน</h3>
        </div>
        <form action="do_edit_profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">
            <h4>ข้อมูลส่วนบุคคล</h4>
            <div class="form-grup">
                <label for="pre">คำนำหน้า</label>
                <select name="pre" id="pre">
                    <option value="นาย" <?php
                                        if ($info['pre'] == 'นาย')
                                            print 'selected';
                                        ?>>นาย</option>
                    <option value="นาง" <?php
                                        if ($info['pre'] == 'นาง')
                                            print 'selected';
                                        ?>>นาง</option>
                    <option value="นางสาว" <?= ($info['pre'] == 'นางสาว') ? 'selected' : '' ?>>นางสาว</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="fullname" class="form-label">ชื่อ</label>
                <input type="text" name="fname" id="fname" required value="<?= $info['fname'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="fullname">นามสกุล</label>
                <input type="text" name="lname" id="lname" required value="<?= $info['lname'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="Email">อีเมล</label>
                <input type="Email" name="Email" id="Email" required value="<?= $info['Email'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="phone">เบอร์ติดต่อ</label>
                <input type="text" name="phone" id="phone" required value="<?= $info['phone'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="address">ที่อยู่</label>
                <textarea name="address" id="address" cols="30" rows="3"><?= $info['address'] ?></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="IDcard">บัตรประชาชน</label>
                <input type="text" name="IDcard" id="IDcard" required value="<?= $info['IDcard'] ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="profile">รูปโปรไฟล์</label>
                <?php
                if ($info['profile'] != '') {
                ?>
                    <img src="profile_img/<?= $info['profile'] ?>" width="80">
                <?php
                }
                ?>
                <br>
                อัพรูปใหม่
                <input type="file" name="profile" id="profile">
            </div>
            <br>
            <button type="submit" class="button" style="vertical-align:middle"><span>บันทึกข้อมูล</span></button>
            <br>
        </form>
    </div>
    <!-- <div class="container">
        <div class="shadow-sm text-center m-2">
            <h3>แก้ไขมูลพนักงาน</h3>
        </div>
        <div>
            <form action="do_edit_profile.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">
                <h4>ข้อมูลพนักงาน</h4>




                
            </form>
        </div>
    </div> -->
</body>

</html>