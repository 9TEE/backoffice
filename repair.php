<!DOCTYPE html>
<html lang="en">
<!-- <link rel="stylesheet" href="repair.css"> -->

<?php
include('ConData.php');


// if(isset($_GET['ID_repair'])) {
//     $sql = "SELECT account.fname, account.lname,
//     repair.ID_repair, repair.m_id, repair.repair_name, repair.problem, repair.note, repair.profile, repair.status, repair.number, repair.date
//     FROM account RIGHT JOIN repair ";

// }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- <link rel="stylesheet" href="repair.css"> -->
    <title>repair</title>
</head>

<body>

    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables.">
        <i class="bi bi-person-circle"></i>
    </button>

    <div class="text-center m-1">
        <h3 class="shadow-lg p-3 mb-3 bg-body rounded">ข้อมูลแจ้งซ่อม </h3>
    </div>
    <!-- modal เพิ่มแจ้งซ่อม -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-plus-circle"></i>
    </button>

    <!-- Modal  เพิ่มแจ้งซ่อม -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <!--modal-body -->
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="date" class="form-label">วันที่</label>
                            <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d') ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationDefault03" required>
                        </div>
                        <div class="col-md-3">
                            <label for="validationDefault04" class="form-label">State</label>
                            <select class="form-select" id="validationDefault04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="validationDefault05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div> -->
            </div>
        </div>
    </div>
    </div>

    <?php
    $sql = "SELECT * FROM repair
ORDER BY ID_repair asc";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>รูปแจ้งซ่อม</th>
                <!-- <th>ชื่อ</th>
                <th>นามสกุล</th> -->
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
                        <img src="profile_img/repair/<?= $row['profile'] ?>" width="80">
                    </td>
                    <!-- <td><?= $row['fname'] ?></td>
                    <td><?= $row['lname'] ?></td> -->
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
                    <td>
                        <!-- ปุ่มกด modal แก้ไขแจ้งซ่อม -->

                        <!-- <input type="button" name="view" value="เบิก" class="btn btn-warning view_data" style="width: 10rem;" id="<?= $row['ID_repair']; ?>" data-bs-toggle="modal" data-bs-target="#Modal" readonly> -->
                        <a class="btn btn-primary" href="menu.php?module=status=5&ID_repair=<?= $row['ID_repair'] ?>" data-bs-toggle="modal" data-bs-target="#Modal" id=""><i class="bi bi-gear-wide-connected a"></i></a>
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="delete_repair.php?page=repair&ID_repair=<?= $row['ID_repair'] ?>" class="btn" onclick="return confirm('ลบรายการนี้ แน่ใจหรือไม่?')"><i class="bi bi-trash b"></i></a>
                    </td>
                </tr>
            <?php
            // echo $row['ID_repair'];
            }
            ?>
        </tbody>
    </table>


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
    <!-- modal แก้ไขแจ้งซ่อม -->

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">กรอกข้อมูลอุปกรณ์ที่จะซ่อม</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php

                    $sql = "SELECT * FROM repair
       WHERE ID_repair='" .  $_GET['ID_repair'] . "'";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

                    $r_info = mysqli_fetch_assoc($result);


                    ?>
                    <form action="repairsave.php" method="post" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="page" value="repair">
                        <input type="hidden" name="m_id" value="<?= $_SESSION['fname'] ?>">
                        <input type="hidden" name="ID_repair" value="<?= @$_GET['ID_repair'] ?>">

                        <div class="container">
                            <div class="row">

                                <div class="input-group  mb-2">
                                    <span class="input-group-text" id="basic-addon1">วันที่</span>
                                    <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d') ?>" disabled>
                                </div>
                                <div class="row">
                                    <div class="input-group col mb-2">
                                        <span class="input-group-text" id="basic-addon2">เลขที่ห้อง</span>
                                        <input type="text" class="form-control" name="number" id="number" value="<?= @$r_info['number'] ?>" required>
                                    </div>


                                    <div class="input-group col mb-2">

                                        <span class="input-group-text">ชั้นที่</span>
                                        <input class="form-control" type="int" name="note" id="note" value="<?= @$r_info['note'] ?>" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <label for="basic-url" class="form-label">เลือกรูปภาพที่จะซ่อม</label>
                                    <div class="input-group col mb-3">

                                        <input type="file" class="form-control" id="profile" name="profile">
                                    </div>

                                    <!-- <div class="col">
                                            <label for="file" class="form-label">รูปแจ้งซ่อม</label>
                                            <?php
                                            if (@$r_info['profile'] == '') { ?>
                                                <img src="profile_img/repair/NOimages.jpg" width="150px" height="150px" alt="" value="">
                                            <?php  } else { ?>

                                                <img src="profile_img/repair/NOimages.jpg" width="150px" height="150px" alt="" value="">
                                                <input type="file" class="form-control" name="profile" id="profile" required>
                                            <?php  } ?>
                                        </div> -->
                                </div>
                                <div class="row">
                                    <label for="floatingTextarea">รายละเอียด</label>
                                    <div class="form-floating col mb-3">
                                        <textarea class="form-control" name="problem" id="problem" style="height: 100px"><?= @$r_info['problem'] ?></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="input-group">
                                <input type="text" class="form-control" name="m_id" id="m_id" value="<?= $_SESSION['fname'] ?>">
                            </div> -->


                            <div class="form_group">
                                <label for="repair_name">สิ่งที่ต้องซ่อม</label>
                                <input type="text" class="form-control" name="repair_name" id="repair_name" value="<?= @$r_info['repair_name'] ?>" required>
                            </div>

                            <div class="form_group m-2"><label for="form_group">สถานะ</label>
                                <select class="form_group btn" name="status" id="status" title="สถานะ" style="background-color: red;">
                                    <option value=0>ยังไม่ซ่อม</option>
                                    <option value=1>ซ่อมแล้ว</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success"><span>บันทึกข้อมูล</span></button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <p align="center"> BSRU​ : มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา<br>
        Copyright 2022 © Bansomdejchaopraya Rajabhat University All right reserved.
        </a>
    </p>
    </div>
</body>

</html>