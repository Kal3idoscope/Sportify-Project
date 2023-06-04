<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($email) && !empty($password)) {
    //$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}' UNION SELECT * FROM client WHERE email = '{$email}' UNION SELECT * FROM coach WHERE email = '{$email}'");
    $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE Email = '{$email}'");
    $sql_client = mysqli_query($conn, "SELECT * FROM client WHERE Email = '{$email}'");
    $sql_coach = mysqli_query($conn, "SELECT * FROM coach WHERE Email = '{$email}'");
    if (mysqli_num_rows($sql_admin) > 0 || mysqli_num_rows($sql_client) > 0 || mysqli_num_rows($sql_coach) > 0 ) {
        if (mysqli_num_rows($sql_admin) > 0) {
            $result = mysqli_fetch_assoc($sql_admin);
            $user_pass = $password;
            //echo "success";
        } else if (mysqli_num_rows($sql_client) > 0){
            $result = mysqli_fetch_assoc($sql_client);
            $user_pass = md5($password);
            //echo "success";
        } else if (mysqli_num_rows($sql_coach) > 0) {
            $result = mysqli_fetch_assoc($sql_coach);
            $user_pass = $password;
            //echo "success";
        }

        $enc_pass = $result['Pass'];
        if ($user_pass === $enc_pass) {
            $status = "Active now";
            if (mysqli_num_rows($sql_admin) > 0) {
                $sql2 = mysqli_query($conn, "UPDATE admin SET Status = '{$status}' WHERE ID_Admin = {$result['ID_Admin']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result['ID_Admin'];
                    $_SESSION['user_type'] = 'admin';
                    echo "success";
                    header("location: ../admin.php");
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else if (mysqli_num_rows($sql_client) > 0){
                $sql2 = mysqli_query($conn, "UPDATE client SET Status = '{$status}' WHERE ID_Client = {$result['ID_Client']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result['ID_Client'];
                    $_SESSION['user_type'] = 'client';
                    echo "success";
                    header("location: ../client.php");
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else if (mysqli_num_rows($sql_coach) > 0) {
                $sql2 = mysqli_query($conn, "UPDATE coach SET Status = '{$status}' WHERE ID_Coach = {$result['ID_Coach']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result['ID_Coach'];
                    $_SESSION['user_type'] = 'coach';
                    echo "success";
                    header("location: ../coach.php");
                } else {
                    echo "Something went wrong. Please try again!";
                }
            }
        } else {
            echo "Email or Password is Incorrect!";
            header("location: ../login.php");
        }
    } else {
        echo "$email - This email not Exist!";
        header("location: ../login.php");
    }
} else {
    echo "All input fields are required!";
    header("location: ../login.php");
}
?>