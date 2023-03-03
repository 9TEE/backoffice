<?php
include('ConData.php');
$date = date('Y-m-d');
// print_r($_POST);
// exit;

if ($_POST['ID_repair'] == '') {

    $sql = "INSERT INTO repair SET
m_id='" . $_POST['m_id'] . "',
date='" . $date . "',    
repair_name='" . $_POST['repair_name'] . "',
number='" . $_POST['number'] . "',
problem='" . $_POST['problem'] . "',
status='" . $_POST['status'] . "',
note='" . $_POST['note'] . "'";

    if (mysqli_query($link, $sql)) {

        $ID_repair = mysqli_insert_id($link);
        if (move_uploaded_file(
            $_FILES["profile"]["tmp_name"],
            "profile_img/repair/" . $_FILES["profile"]["name"]
        )) {

            $sql = "UPDATE repair SET
               profile = '" . $_FILES["profile"]["name"] . "'
            WHERE ID_repair='" . $ID_repair . "' LIMIT 1";

            mysqli_query($link, $sql) or die("Update Failed! -> " . mysqli_error($link));

            header("location:menu.php?module=status=5&page=repair");
        }
    } else {
        print mysqli_error($link);
    }
} else {
    $sql = "UPDATE repair SET
                repair_name='" . $_POST['repair_name'] . "',
                number='" . $_POST['number'] . "',
                problem='" . $_POST['problem'] . "',
                status='" . $_POST['status'] . "',
                note='" . $_POST['note'] . "'
                WHERE ID_repair='" . $_POST['ID_repair'] . "' LIMIT 1";
                
    if (mysqli_query($link, $sql)) {
        if (isset($_FILES)) {
            $sql = "SELECT profile FROM repair 
        WHERE ID_repair='" . $_POST['ID_repair'] . "' LIMIT 1";
            $result = mysqli_query($link, $sql);
            $product_img = mysqli_fetch_assoc($result);
            @unlink("profile_img/repair/" . $product_img['profile']);

            if (move_uploaded_file(
                $_FILES["profile"]["tmp_name"],
                "profile_img/repair/" . $_FILES["profile"]["name"]
            )) {
                $sql = "UPDATE repair SET
            profile = '" . $_FILES["profile"]["name"] . "'
            WHERE ID_repair = '" .  $_POST['ID_repair'] . "'LIMIT 1";
                mysqli_query($link, $sql)
                    or die("Update Failed!->" . mysqli_error($link));
            }
            header("location:menu.php?module=status=5&page=repair");
        }
    }
}
