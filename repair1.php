<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="repair.css">

<?php
include('ConData.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="repair.css"> -->
    <title>Document</title>
</head>

<body>

    <div class="col">
        <h3 align="center">ข้อมูลแจ้งซ่อม </h3>
    </div>
    <br>
    <div>
        <?php
        $sql = "SELECT * FROM repair
ORDER BY ID_repair asc";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        ?>
        <table>
            <thead>
                <tr>
                    <th>รูปแจ้งซ่อม</th>
                    <th>ชั้นที่</th>
                    <th>เลขที่ห้อง</th>
                    <th>สิ่งที่ต้องซ่อม</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td>
                            <img src="profile_img/repair/<?= $row['profile'] ?>">
                        </td>
                        <td><?= $row['note'] ?></td>
                        <td><?= $row['number'] ?></td>
                        <td><?= $row['repair_name'] ?></td>
                        <td><?= $row['problem'] ?></td>
                        <td><?php
                            if (@$row['status'] == '0')
                                print 'ยังไม่ซ่อม';
                            ?>
                            <?php
                            if (@$row['status'] == '1')
                                print 'ซ่อมแล้ว';
                            ?></td>
                        <td> <a href="menuuser.php?module=status=1&ID_repair=<?= $row['ID_repair'] ?>"><i class="bi bi-gear-wide-connected a"></i></a>
                            &nbsp;&nbsp;
                            <a href="delete_repair.php?page=repair1&ID_repair=<?= $row['ID_repair'] ?>" onclick="return confirm('ลบรายการนี้ แน่ใจหรือไม่?')"><i class="bi bi-trash b"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <?php
        if (isset($_GET['ID_repair'])) {
            $sql = "SELECT * FROM repair
       WHERE ID_repair = '" .  $_GET['ID_repair'] . "'LIMIT 1";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            if (mysqli_num_rows($result) > 0) {
                $r_info = mysqli_fetch_assoc($result);
            }
        }
        ?>
        <form action="repairsave1.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="page" value="repair">
            <input type="hidden" name="ID_repair" value="<?= @$_GET['ID_repair'] ?>">

            <legend>ข้อมูลแจ้งซ่อม</legend>
            <div class="form_group">
                <label for="profile">รูปแจ้งซ่อม</label>
                <?php
                (@$r_info['profile'] != '')
                ?>
                <img src="profile_img/repair/<?= $r_info['profile'] ?>" width="150px" height="150px" alt="" value="">
                <input type="file" name="profile" id="profile" required>
            </div>
            <div class="form_group" style='display:none'>
                <input type="text" name="m_id" id="m_id" value="<?= $_SESSION['user_id'] ?>">
            </div>
            <div class="form_group">
                <label for="date">วันที่แจ้ง</label>
                <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" disabled="disabled">
            </div>
            <div class="form_group">
                <label for="note">ชั้นที่</label>
                <input type="int" name="note" id="note" value="<?= @$r_info['note'] ?>" required>
            </div>
            <div class="form_group">
                <label for="number">เลขที่ห้อง</label>
                <input type="text" name="number" id="number" value="<?= @$r_info['number'] ?>" required>
            </div>
            <div class="form_group">
                <label for="repair_name">สิ่งที่ต้องซ่อม</label>
                <input type="text" name="repair_name" id="repair_name" value="<?= @$r_info['repair_name'] ?>" required>
            </div>
            <div class=" form_group">
                <label for="problem">รายละเอียด</label>
                <textarea name="problem" id="problem" cols="30" rows="2" required><?= @$r_info['problem'] ?></textarea>
            </div>
            <div class=" form_group"><label for="form_group">สถานะ</label>
                <select class=" form_group" name="status" id="status" title="สถานะ">
                    <option value=0>ยังไม่ซ่อม</option>
                    <option value=1>ซ่อมแล้ว</option>
                </select>
            </div>
            <br>
            <button type="submit" class="button"><span>บันทึกข้อมูล</span></button>

        </form>
        <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
            Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
            </a>
        </p>
    </div>
</body>

</html>