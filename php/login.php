<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($email) && !empty($password)) {
    //$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}' UNION SELECT * FROM client WHERE email = '{$email}' UNION SELECT * FROM coach WHERE email = '{$email}'");
    $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
    $sql_client = mysqli_query($conn, "SELECT * FROM client WHERE email = '{$email}'");
    $sql_coach = mysqli_query($conn, "SELECT * FROM coach WHERE email = '{$email}'");
    if (mysqli_num_rows($sql_admin) > 0 || mysqli_num_rows($sql_client) > 0 || mysqli_num_rows($sql_client) > 0 ) {
        if (mysqli_num_rows($sql_admin) > 0) {
            $result = mysqli_fetch_assoc($sql_admin);
            $user_pass = $password;
            echo "success";
        } else if (mysqli_num_rows($sql_client) > 0){
            $result = mysqli_fetch_assoc($sql_client);
            $user_pass = md5($password);
            echo "success";
        } else if (mysqli_num_rows($sql_coach) > 0) {
            $result = mysqli_fetch_assoc($sql_coach);
            $user_pass = $password;
            echo "success";
        }

        $enc_pass = $result['Pass'];
        if ($user_pass === $enc_pass) {
            $status = "Active now";
            if (mysqli_num_rows($sql_admin) > 0) {
                $sql2 = mysqli_query($conn, "UPDATE admin SET status = '{$status}' WHERE unique_id = {$result['ID_Admin']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result['ID_Admin'];
                    echo "success";
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else if (mysqli_num_rows($sql_client) > 0){
                $sql2 = mysqli_query($conn, "UPDATE client SET status = '{$status}' WHERE unique_id = {$result['ID_Client']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result['ID_Client'];
                    echo "success";
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else if (mysqli_num_rows($sql_coach) > 0) {
                $sql2 = mysqli_query($conn, "UPDATE coach SET status = '{$status}' WHERE unique_id = {$result['ID_Coach']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result['ID_Coach'];
                    echo "success";
                } else {
                    echo "Something went wrong. Please try again!";
                }
            }
        } else {
            echo "Email or Password is Incorrect!";
        }
    } else {
        echo "$email - This email not Exist!";
    }
} else {
    echo "All input fields are required!";
}
?>