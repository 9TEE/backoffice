<?php include('ConData.php') ?>
<?php
$sql = "SELECT * FROM account ORDER BY role";
$result = mysqli_query($link, $sql) or die(mysqli_error($link)); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <!-- <link rel="stylesheet" href="employee.css">
    <link rel="stylesheet" href="register.css"> -->

    <title>Document</title>
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

function autoTab1(obj) {
    var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้   
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
<script>
        $(document).ready(function() {
            $('#dataa').DataTable();
        });
    </script>
    
        <div class="text-center m-2">
            <h3 class="shadow-lg p-3 mb-3 bg-body rounded"><i class="bi bi-person-fill"></i> ข้อมูลพนักงาน </h3>
        </div>
        <div class="m-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-person-fill-add"></i>
                เพิ่มพนักงาน
            </button>
        </div>
        <div class="text-center m-2">

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">กรอกข้อมูล</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="do_register.php" method="post" enctype="multipart/form-data"
                                autocomplete="off">
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
                                    <input type="text" name="fname" id="fname" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="Email"><i class="bi bi-envelope-fill"></i> อีเมล</label>
                                    <input type="Email" name="Email" id="Email" required>
                                </div>
                                <br>
                                <div class="form-group txt-field">
                                    <label for="phone"><i class="bi bi-telephone-fill"></i> เบอร์ติดต่อ</label>
                                    <input type="text" name="phone" id="phone" required onkeyup="autoTab(this)"
                                        onkeypress="check_key_number();">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="address"><i class="bi bi-house-fill"></i> ที่อยู่</label>
                                    <textarea name="address" id="address" cols="30" rows="3"></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="IDcard"><i class="bi bi-credit-card-2-back-fill"></i>
                                        บัตรประชาชน</label>
                                    <input type="text" name="IDcard" id="IDcard" required onkeyup="autoTab1(this)"
                                        onkeypress="check_key_number();">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="profile"><i class="bi bi-image-fill"></i> รูปโปรไฟล์</label>
                                    <input type="file" name="profile" id="profile">
                                </div>
                                <br />
                                <button type="submit" class="button"
                                    style="vertical-align:middle"><span>บันทึกข้อมูล</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center m-1"  >
            <table class="table table-bordered table-dark table-hover" id="dataa" >
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5rem;">คำนำหน้า</th>
                        <th class="text-center">ชื่อ</th>
                        <th class="text-center">นามสกุล</th>
                        <!-- <th class="text-center">ที่อยู่</th> -->
                        <th class="text-center">เบอร์โทรศัพท์</th>
                        <th class="text-center">ตำแหน่งงาน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td class="text-end"><?= $row['pre'] ?></td>
                        <td class="text-start"><?= $row['fname'] ?></td>
                        <td class="text-start"><?= $row['lname'] ?></td>
                        <!-- <td><?= $row['address'] ?></td> -->
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td>
                            <!-- <a href="menu.php?module=status=7&user_id=<?= $row['user_id'] ?>"><i
                                    class="bi bi-gear-wide-connected a"></i></a> -->
                            &nbsp;&nbsp;
                            <a href="delete_user.php?user_id=<?= $row['user_id'] ?>"
                                onclick="return confirm('ลบผู้ใช่คนนี้ แน่ใจหรือไม่?')"><i
                                    class="bi bi-trash b"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <!-- <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
                Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
                </a>
            </p> -->
        </div>

</body>

</html>