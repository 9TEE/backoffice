<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>Log-in Page</title>
</head>
<!--คำสั่ง -->
<script type="text/javascript">
    function autoTab(obj) {
        var pattern = new String("__-____-____"); // กำหนดรูปแบบในนี้   
        var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้   
        var returnText = new String("");
        var obj_l = obj.value.length;
        var obj_l2 = obj_l - 1;
        for (i = 0; i < pattern.length; i++) {
            if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                returnText += obj.value + pattern_ex;
                obj.value = returnText;
            }
        }
        if (obj_l >= pattern.length) {
            obj.value = obj.value.substr(0, pattern.length);
        }
    }

    function check_key_number() {
        use_key = event.keyCode
        if (use_key != 13 && (use_key < 48) || (use_key > 57)) {
            event.returnValue = false;
        }
    }
</script>

<body>
    <div class="center">
        <h1>ล็อกอินบัญชี</h1>
        <form action="do_login.php" method="post" autocomplete="off">
            <div class="txt-field">
                <input type="text" name="Email" id="Email" required>
                <label for="Email">อีเมล</label>
            </div>
            <div class="txt-field">
                <input type="phone" name="phone" id="phone" required onkeyup="autoTab(this)" onkeypress="check_key_number();">
                <label for="phone">เบอร์โทรศัพท์</label>
            </div>
            <button type="submit">ล็อกอิน</button>
            <a class="forget" href="forget_password.php">ลืมรหัสผ่าน</a>
        </form>
    </div>
    <p align="center" class="div1"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
        Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
        </a>
    </p>
</body>

</html>