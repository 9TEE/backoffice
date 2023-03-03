
    <?php
    include("ConData.php");
    ?>
    <?php

    function ThDate()
    {
        //วันภาษาไทย
        $ThDay = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
        //เดือนภาษาไทย
        $ThMonth = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");

        //วันที่ ที่ต้องการเอามาเปลี่ยนฟอแมต
        $myDATE = date("Y/m/d"); //อาจมาจากฐานข้อมูล
        //กำหนดคุณสมบัติ
        $week = date("w", strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
        $months = date("m", strtotime($myDATE)) - 1; // ค่าเดือน (1-12)
        $day = date("d", strtotime($myDATE)); // ค่าวันที่(1-31)
        $years = date("Y", strtotime($myDATE)) + 543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

        return "วัน$ThDay[$week] ที่ $day เดือน $ThMonth[$months] พ.ศ. $years";
    }
    //print_r($_POST);
    //exit;
    //header('location: fixtime2.php?module=status=0&user_id=' . $_REQUEST['user_id'] . '');

    $m_id = mysqli_real_escape_string($condb, $_GET["user_id"]);
    $leave_id = mysqli_real_escape_string($condb, $_POST["leave_id"]);
    $department = mysqli_real_escape_string($condb, $_POST["department"]);
    $detail = mysqli_real_escape_string($condb, $_POST["detail"]);
    $start_date = mysqli_real_escape_string($condb, $_POST["start_date"]);
    $end_date = mysqli_real_escape_string($condb, $_POST["end_date"]);
    $communication = mysqli_real_escape_string($condb, $_POST["communication"]);
    $date1 = mysqli_real_escape_string($condb, $_POST["start_date"]);
    $date2 = mysqli_real_escape_string($condb, $_POST["end_date"]);
    $date1 = new DateTime("$date1");
    $date2 = new DateTime("$date2");
    $day = $date2->diff($date1)->format("%a");
    $ThDate = ThDate(@$myDATE);
    $sql = "INSERT INTO eleave
            (m_id, leave_id, department, detail, start_date, end_date, communication, day, ThDate) 
            VALUES 
            ('$m_id','$leave_id','$department','$detail','$start_date','$end_date','$communication','$day','$ThDate')";
    $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));

    mysqli_close($condb);
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลสำเร็จ');";
        header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['user_id'] . '');
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error');";
        header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['user_id'] . '');
        echo "</script>";
    }


    ?>
