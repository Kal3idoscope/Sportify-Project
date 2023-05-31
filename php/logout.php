<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $status = "Offline now";
        $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE ID_Admin=$logout_id");
        $sql_client = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client=$logout_id");
        $sql_coach = mysqli_query($conn, "SELECT * FROM coach WHERE ID_Coach=$logout_id");
        if (mysqli_num_rows($sql_admin) > 0 || mysqli_num_rows($sql_client) > 0 || mysqli_num_rows($sql_client) > 0) {
            if (mysqli_num_rows($sql_admin) > 0) {
                $sql = mysqli_query($conn, "UPDATE admin SET Status = '{$status}' WHERE ID_Admin={$_GET['logout_id']}");
                //echo "success";
            } else if (mysqli_num_rows($sql_client) > 0) {
                $sql = mysqli_query($conn, "UPDATE client SET Status = '{$status}' WHERE ID_Client={$_GET['logout_id']}");
                //echo "success";
            } else if (mysqli_num_rows($sql_coach) > 0) {
                $sql = mysqli_query($conn, "UPDATE coach SET Status = '{$status}' WHERE ID_Coach={$_GET['logout_id']}");
                //echo "success";
            }
            if ($sql) {
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        } else {
            header("location: ../login.php");
        }
    } else {
        header("location: ../login.php");
    }
}
?>