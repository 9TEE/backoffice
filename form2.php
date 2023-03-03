<main id="content">

    <?php
    $sql = "SELECT * FROM eleave 
    WHERE m_id=" . $_GET['user_id'] . "
    AND status='2' 
    ";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $datenow = date('d-m-Y');
    include('ConData.php');

    ?>

    <header>
        <br>
        <h2 class="icon ">คำขออนุมัติลา ไม่อนุมัติ</h2>
    </header>
    <div>
        <div class="t1 div1">
            <form method="POST">
                <table>
                    <thead>
                        <tr>
                            <th id="c0" class="sort_none col_create_date">วันที่ทำรายการ</th>
                            <th id="c1" class="sort_none col_leave_id">ประเภทการลา</th>
                            <th id="c2" class="sort_desc col_start_date">วันที่ลา</th>
                            <th id="c3" class="center">วัน</th>
                            <th id="c4">เหตุผล</th>
                            <th id="c5">สถานะ</th>
                            <th id="c6">ลบคำขอ</th>
                        </tr>
                    </thead>
                    </tr>
                    </thead>
                    <tfoot>
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo @$row['ThDate']; ?></td>
                                <td class=check-column><a class="checkall icon-uncheck" title="Select all"></a>
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
                                <td class=right colspan=1รวม>
                                    <?php
                                    $date = new DateTime($row['start_date']);
                                    echo $date->format('d-m-Y');
                                    ?>
                                    ถึง
                                    <?php
                                    $date = new DateTime($row['end_date']);
                                    echo $date->format('d-m-Y');
                                    ?>
                                </td>
                                <td class=center><?php echo @$row['day']; ?></td>
                                <td><?php echo $row['detail'] ?></td>
                                <td><?php
                                    if (@$row['status'] == '0')
                                        print 'ยังไม่เลือก';
                                    ?>
                                    <?php
                                    if (@$row['status'] == '1')
                                        print 'อนุมัติ';
                                    ?>
                                    <?php
                                    if (@$row['status'] == '2')
                                        print 'ไม่อนุมัติ';
                                    ?></td>
                                <td><a href="form1.1.php?page=delete&m_id=<?= @$row['m_id'] ?>&id=<?= @$row['id'] ?>" onclick="return confirm('ลบคำขอนี้ แน่ใจหรือไม่?')"><i class="bi bi-trash c"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tfoot>
                </table>
        </div>
        </form>
    </div>
    </div>
</main>


</html>