<?php
session_start();
include_once "config.php";

$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
$bureau = mysqli_real_escape_string($conn, $_POST['bureau']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
//$photo = mysqli_real_escape_string($conn, $_POST['photo']); Photo de profil
$verif = 1;

if (!empty($prenom)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Prenom = '{$prenom}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if (!empty($nom)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Nom = '{$nom}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if (!empty($telephone)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Telephone = '{$telephone}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if (!empty($bureau)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Bureau = '{$bureau}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if (!empty($email)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Email = '{$email}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if (!empty($password)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Pass = '{$password}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if ($verif) {
    header("location: ../coach.php");
}