<?php
session_start();
include_once "php/config.php";
if (isset($_SESSION['unique_id'])) {
    if ($_SESSION['user_type'] == 'admin') {
        header("location: rdvadmin.php");
    } elseif ($_SESSION['user_type'] == 'client') {
        header("location: rdvclient.php");
    } elseif ($_SESSION['user_type'] == 'coach') {
        header("location: rdvcoach.php");
    }
}
else {
    header("location: ./login.php");
}
?>


