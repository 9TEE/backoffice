<meta charset="utf-8">
<?php
include('ConData.php');
//print_r($_POST);
//exit;
$user_id = mysqli_real_escape_string($condb, $_GET["user_id"]);
$date = mysqli_real_escape_string($condb, $_POST["date"]);
$Job = mysqli_real_escape_string($condb, $_POST["Job"]);
$timestart = mysqli_real_escape_string($condb, $_POST["timestart"]);
$timeend = mysqli_real_escape_string($condb, $_POST["timeend"]);
$timestandard = mysqli_real_escape_string($condb, $_POST["timestandard"]);

$sql = "INSERT INTO overtime
        (user_id, date, Job, timestart, timeend, timestandard)
        VALUES
        ('$user_id', '$date', '$Job', '$timestart', '$timeend', '$timestandard')";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));

mysqli_close($condb);
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกข้อมูลสำเร็จ');";
    echo "window.location = 'menu.php?module=status=3'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error');";
    echo "window.location = 'menu.php?module=status=3'; ";
    echo "</script>";
}
