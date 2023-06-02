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

$targetDir = 'xml/';
$targetFile = $targetDir . basename($_FILES['xmlFile']['name']);

if (!empty($password)) {
    $sql = mysqli_query($conn, "UPDATE coach SET Pass = '{$password}' WHERE ID_Coach = {$_SESSION['unique_id']}");
    if ($sql) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if (isset($_FILES['xmlFile'])) {
    $xml_name = $_FILES['xmlFile']['name'];
    $xml_type = $_FILES['xmlFile']['type'];
    $tmp_name = $_FILES['xmlFile']['tmp_name'];

    $xml_explode = explode('.', $xml_name);
    $xml_ext = end($xml_explode);

    $extensions = ["xml"];
    if (in_array($xml_ext, $extensions) === true) {
        if (move_uploaded_file($tmp_name, "../CVxml/" . $xml_name)) {
            $insert_query = mysqli_query($conn, "UPDATE coach SET CV = '{$xml_name}' WHERE ID_Coach = {$_SESSION['unique_id']}");
            if ($insert_query) {

            } else {
                echo "Something went wrong. Please try again!";
                $verif = 0;
            }
        }
    } else {
        echo "Please upload an xml file";
        $verif = 0;
    }

}

if ($verif) {
    header("location: ../coach.php");
}