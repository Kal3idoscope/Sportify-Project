<?php
session_start();
include_once "config.php";

$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
//$photo = mysqli_real_escape_string($conn, $_POST['photo']); Photo de profil
$verif = 1;

if(!empty($prenom)){
    $sql = mysqli_query($conn, "UPDATE admin SET Prenom = '{$prenom}' WHERE ID_Admin = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if(!empty($nom)){
    $sql = mysqli_query($conn, "UPDATE admin SET Nom = '{$nom}' WHERE ID_Admin = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if(!empty($email)){
    $sql = mysqli_query($conn, "UPDATE admin SET Email = '{$email}' WHERE ID_Admin = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if(!empty($password)){
    $sql = mysqli_query($conn, "UPDATE admin SET Pass = '{$password}' WHERE ID_Admin = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if($verif)
{
    header("location: ../admin.php");
}