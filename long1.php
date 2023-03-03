<!DOCTYPE html>
<html lang="en">
<?php
include('ConData.php');
$sql = "SELECT * FROM `eleave1` WHERE 1";
$result = mysqli_query($link, $sql) or die("Error in query: $sql " . mysqli_error($link));
$user_id = @$_POST['user_id'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<main id="content">
    <section class="content_bg">
        <header>
            <br>
            <h2 class="icon">แก้วันลา</h2>
        </header>
        <div class="div1 t1">
            <table>
                <thead>
                    <tr>
                        <th>ประเภทการลา</th>
                        <th>จำนวนวันลาได้</th>
                        <th>แก้จำนวนวัน</th>
                    </tr>
                </thead>

                <body>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><a class="checkall icon-uncheck" title="Select all"></a>
                                <?php
                                if (@$row['leave_id'] == '1')
                                    print 'ลากิจส่วนตัว';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '2')
                                    print 'ลาคลอดบุตร';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '3')
                                    print 'ลาป่วย';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '4')
                                    print 'ลาพักผ่อน';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '5')
                                    print 'ลาเข้ารับการตรวจเลือกทหารหรือเข้ารับการเตรียมพล';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '6')
                                    print 'ลาไปช่วยเหลือภรรยาที่คลอดบุตร';
                                ?>
                                <?php
                                if (@$row['leave_id'] == '7')
                                    print 'ลาไปศึกษา ฝึกอบรม ปฏิบัติการวิจัย หรือดูงาน';
                                ?></td>
                            <td><?= $row['Max'] ?></td>
                            <td> <a href=" Conmenu.php?module=status=9&amp;mod=eleave1&amp; user_id=<?= $rowm['user_id'] ?>&amp;page=id&id=<?= $row['id'] ?>"><i class="bi bi-gear c"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </body>
            </table>
        </div>

        <div class="div1 t2">
            <hr width=98% size=10> <br>
            <?php
            if (isset($_GET['id'])) {
                $sql = "SELECT * FROM eleave1 WHERE id = '" .  $_GET['id'] . "'LIMIT 1";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                if (mysqli_num_rows($result) > 0) {
                    $r_info = mysqli_fetch_assoc($result);
                }
            }
            ?>
            <form action="ลอง.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value=" <?= @$_GET['id'] ?>">
                <input type="hidden" name="user_id" value=" <?= @$_GET['user_id'] ?>">
                <div class="container">
                    <div class="mb-3">
                        <label for="leave_id">ประเภทการลา</label>
                        <span class=""><br><select name="leave_id" id="leave_id" title="ประเภทการลา">
                                <option value=1>ลากิจส่วนตัว</option>
                                <option value=2>ลาคลอดบุตร</option>
                                <option value=3>ลาป่วย</option>
                                <option value=4>ลาพักผ่อน</option>
                                <option value=5>ลาเข้ารับการตรวจเลือกทหารหรือเข้ารับการเตรียมพล</option>
                                <option value=6>ลาไปช่วยเหลือภรรยาที่คลอดบุตร</option>
                                <option value=7>ลาไปศึกษา ฝึกอบรม ปฏิบัติการวิจัย หรือดูงาน</option>
                            </select></span>
                    </div>
                </div>
                <div class="container">
                    <div class="mb-3">
                        <label for="">ใสจำนวนวัน</label>
                        <br>
                        <input type="text" required name="Max" id="Max" value="<?= @$r_info['Max'] ?>">
                    </div>
                </div>
                <div class="mb-3 container">
                    <button type="submit" class="button"><span>บันทึกข้อมูล</span></button>
                </div>
            </form>

        </div>