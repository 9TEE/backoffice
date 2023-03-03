<main id="content">
    <section class="content_bg">
        <header>
            <br>
            <h2 class="icon">เพิ่ม คำขออนุมัติลา</h2>
            <br>
        </header>
        <div class="form div1">
            <form action="form4.1.php?user_id=<?= $rowm['user_id'] ?>" method="post" enctype="multipart/form-data">

                <legend><span>รายละเอียดของ คำขออนุมัติลา</span></legend>
                <div><label for="leave_id">ประเภทการลา</label>
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
                <div><label for="Max">จำนวนวันลา</label>
                    <span class=""><br><select name="Max" id="Max" title="จำนวนวันลา">
                            <option value=1>10</option>
                            <option value=2>30</option>
                            <option value=3>15</option>
                            <option value=4>10</option>
                            <option value=5>60</option>
                            <option value=6>30</option>
                            <option value=7>25</option>
                        </select></span>
                </div>
                <div id="leave_detail"></div>
                <div><label for="department">ตำแหน่ง</label>
                    <span class="g-input icon-valid"><br><select name="department" id="department" title="ตำแหน่ง">
                            <option value=1>ผู้จัดการ</option>
                            <option value=2>พนังงาน</option>
                        </select></span>
                </div>
                <div><label for="">รายละเอียด/เหตุผลการลา</label>
                    <span class=""><br>
                        <textarea rows="5" name="detail" id="detail" title="รายละเอียด/เหตุผลการลา"></textarea></span>
                </div>
                <div>
                    <div class="">
                        <div><label for="start_date">วันที่เริ่มต้น</label><span class="">
                                <input type="date" name="start_date" id="start_date" value="<?= date('Y-m-d') ?>" title="วันที่เริ่มต้น"></span></div>
                    </div>
                </div>
                <div>
                    <div class="">
                        <div><label for="end_date">วันที่สิ้นสุด</label><span class="">
                                <input type="date" name="end_date" id="end_date" value="<?= date('Y-m-d') ?>" title="วันที่สิ้นสุด"></span></div>
                    </div>
                </div>
                <div class=""><label for="communication">การติดต่อ</label><span class=""><br>
                        <textarea rows="3" name="communication" id="communication" title="ข้อมูลการติดต่อระหว่างการลา"></textarea></span>
                </div>
                <button type="submit" class="button"><span>บันทึกข้อมูล</span></button>
            </form>
        </div>