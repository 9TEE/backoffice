<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="register.css"> -->
    <title>ข้อมูลพนักงาน</title>
</head>

<body>
    <div class="a">
        <div class="col">
            <h3 align="center">กรอกข้อมูลพนักงาน</h3>
        </div>
        <br>
        <form action="do_register.php" method="post" enctype="multipart/form-data">
            <h4>ข้อมูลพนักงาน</h4>
            <div class="form-grup">
                <label for="pre"><i class="bi bi-emoji-neutral-fill"></i> คำนำหน้า</label>
                <select name="pre" id="pre">
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="fname"><i class="bi bi-person-circle"></i> ชื่อ-นามสกุล</label>
                <input type="text" name="f1name" id="fname" required>
            </div>
            <br>
            <div class="form-group">
                <label for="Email"><i class="bi bi-envelope-fill"></i> อีเมล</label>
                <input type="Email" name="Email" id="Email" required>
            </div>
            <br>
            <div class="form-group">
                <label for="phone"><i class="bi bi-telephone-fill"></i> เบอร์ติดต่อ</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <br>
            <div class="form-group">
                <label for="address"><i class="bi bi-house-fill"></i> ที่อยู่</label>
                <textarea name="address" id="address" cols="30" rows="3"></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="IDcard"><i class="bi bi-credit-card-2-back-fill"></i> บัตรประชาชน</label>
                <input type="text" name="IDcard" id="IDcard" required>
            </div>
            <br>
            <div class="form-group">
                <label for="profile"><i class="bi bi-image-fill"></i> รูปโปรไฟล์</label>
                <input type="file" name="profile" id="profile">
            </div>
            <br />
            <button type="submit" class="button" style="vertical-align:middle"><span>บันทึกข้อมูล</span></button>
        </form>
    </div>
</body>

</html>