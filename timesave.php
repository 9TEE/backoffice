<meta charset="utf-8">
<?php
include('ConData.php');
//print_r($_POST);
//exit;
//save workin
if (isset($_POST["workin"])) {
    $workdate1 = date("Y/m/d");
    $workdate = mysqli_real_escape_string($condb, $_POST["Date"]);
    $m_id = mysqli_real_escape_string($condb, $_GET["user_id"]);
    $workin = mysqli_real_escape_string($condb, $_POST["workin"]);

    $sql = "INSERT INTO time0
			(workdate, m_id, workin, workdate1)
			VALUES
			('$workdate', '$m_id', '$workin', '$workdate1')";
    $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));

    mysqli_close($condb);
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลสำเร็จ');";
        echo "window.location = 'menu.php?module=status=1'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error');";
        echo "window.location = 'menu.php?module=status=1'; ";
        echo "</script>";
    }

    //save workout			
} elseif (isset($_POST["workout"])) {

    // echo $_POST["workout"];

    // exit;
    $workdate1 = date("Y/m/d");
    $workdate = mysqli_real_escape_string($condb, $_POST["Date"]);
    $m_id = mysqli_real_escape_string($condb, $_GET["user_id"]);
    $workout = mysqli_real_escape_string($condb, $_POST["workout"]);

    $sql2 = "UPDATE time0 SET 
			workout='$workout'
			WHERE m_id=$m_id  AND workdate='$workdate'
			";
    $result2 = mysqli_query($condb, $sql2) or die("Error in query: $sql2 " . mysqli_error($condb));

    //echo $sql2;
    //exit;

    mysqli_close($condb);
    if ($result2) {
        echo "<script type='text/javascript'>";
        echo "alert('บันทึกข้อมูลสำเร็จ');";
        echo "window.location = 'menu.php?module=status=1'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error');";
        echo "window.location = 'menu.php?module=status=1'; ";
        echo "</script>";
    }
} //}elseif (isset(($_POST["workout"])) {
else {
    echo "<script type='text/javascript'>";
    echo "alert('คุณได้บันทึกเวลาเข้า-ออกงานวันนี้เรียบร้อยแล้ว');";
    echo "window.location = 'menu.php?module=status=1'; ";
    echo "</script>";
}
?>