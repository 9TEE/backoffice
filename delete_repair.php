<?php
include('ConData.php');
if (@$_GET['page'] == 'repair') {
    $sql = "SELECT profile FROM repair 
WHERE ID_repair='" . $_GET['ID_repair'] . "' LIMIT 1";
    $result = mysqli_query($link, $sql);
    $product_img = mysqli_fetch_assoc($result);
    @unlink("profile_img/repair/" . $product_img['profile']);

    $sql = "DELETE FROM repair
WHERE ID_repair = '" .  $_GET['ID_repair'] . "'LIMIT 1";
    if (mysqli_query($link, $sql)) {
        header("location:menu.php?module=status=5");
    } else {
        print mysqli_error($link);
    }
} elseif (@$_GET['page'] == 'repair1') {
    $sql = "SELECT profile FROM repair 
WHERE ID_repair='" . $_GET['ID_repair'] . "' LIMIT 1";
    $result = mysqli_query($link, $sql);
    $product_img = mysqli_fetch_assoc($result);
    @unlink("profile_img/repair/" . $product_img['profile']);

    $sql = "DELETE FROM repair
WHERE ID_repair = '" .  $_GET['ID_repair'] . "'LIMIT 1";
    if (mysqli_query($link, $sql)) {
        header("location:menuuser.php?module=status=1");
    } else {
        print mysqli_error($link);
    }
}
