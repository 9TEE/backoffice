<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('ConData.php') ?>

<body>
    <?php
    if ($_GET['page'] == 'approve') {
        $status = 1;
        $sql = "UPDATE eleave SET
        status = '$status'WHERE id = '" .  $_GET['id'] . "'LIMIT 1";
        $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));
        mysqli_close($condb);
        if ($result) {
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['m_id'] . '');
        } else {
            echo "alert('Error');";
            header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['m_id'] . '');
        }
    } elseif ($_GET['page'] == 'disapproved') {
        $status = 2;
        $sql = "UPDATE eleave SET
        status = '$status'WHERE id = '" .  $_GET['id'] . "'LIMIT 1";
        $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));
        mysqli_close($condb);
        if ($result) {
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['m_id'] . '');
        } else {
            echo "alert('Error');";
            header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['m_id'] . '');
        }
    } elseif ($_GET['page'] == 'delete') {
        $sql = "DELETE FROM eleave WHERE id='" . $_GET['id'] . "' LIMIT 1";
        if (mysqli_query($link, $sql)) {
            echo "alert('ลบข้อมูลสำเร็จ');";
            header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['m_id'] . '');
        } else {
            echo "alert('Error');";
            header('location: menu.php?module=status=9&mod=status=0&user_id=' . $_REQUEST['m_id'] . '');
        }
    }
    ?>
</body>

</html>