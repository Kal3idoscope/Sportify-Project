<?php
session_start();
include_once "config.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$ID = mysqli_real_escape_string($conn, $_POST['id']);

if (!empty($ID)) {
    $sql = "DELETE FROM coach WHERE ID_Coach = '$ID'";
    if (mysqli_query($conn, $sql)) {
        echo "Suppression réussie";
        header("location: ../admin.php");
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($conn);
    }
} else if (!empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "DELETE FROM coach WHERE Email = '$email'";
        if (mysqli_query($conn, $sql)) {
            echo "Suppression réussie";
            header("location: ../admin.php");
        } else {
            echo "Erreur lors de la suppression : " . mysqli_error($conn);
        }
    } else {
        echo "$email is not a valid email!";
        header("location: ../retrait_coach.php");
    }
} else {
    echo "One input fields is required!";
    header("location: ../retrait_coach.php");
}
?>
