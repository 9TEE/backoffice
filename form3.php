<html lang="en">
<?php include('ConData.php');
$sql = "SELECT * FROM eleave WHERE m_id=" . $_GET['user_id'] .  "  ";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

$sql1 = "SELECT *,SUM(`day`) FROM eleave WHERE m_id=" . $_GET['user_id'] .  " AND status='2' 
GROUP BY `leave_id`";
$result1 = mysqli_query($link, $sql1) or die(mysqli_error($link));

?>
<main id="content">
    <section class="content_bg">
        <header>
            <br>
            <h2 class="icon">สถิติการลา แอดมิน</h2>
            <br>
        </header>
        <section>
            <div class="icon2 div1">
                <table>
                    <thead>
                        <tr>
                            <th>ประเภทการลา</th>
                            <th>จำนวนวันลา</th>
                            <th>ลาได้ต่อปี</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result1)) :
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
                                <td><?= $row['SUM(`day`)']  ?> วัน</td>
                                <td><?= $row['Max'] ?> วัน</td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</main>