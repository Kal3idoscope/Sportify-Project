<?php
session_start();
include_once "./config.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
    exit();
}
$coachId = $_GET['coach_id'];
$date = $_GET['date'];
$heure = $_GET['heure'];



// Effectuer la réservation en mettant à jour la base de données
$clientId = $_SESSION['unique_id'];


$insert_query = mysqli_query($conn, "INSERT INTO prendre_rdv (ID_Client, ID_Coach, Date_rdv, Plage_horaire,ID_Paiement, Statut)
                VALUES ($clientId, $coachId, '$date', '$heure',{$_SESSION['ID_Paiement']}, 1)");
if ($insert_query) {

    header("location: ../rdv.php");
} else {
    echo mysqli_error($conn);
    echo "<br>";
    echo $coachId;
    echo "<br>";
    echo $clientId;
    echo "<br>";
    echo $date;
    echo "<br>";
    echo $heure;
    echo "<br>";
    echo $_SESSION['ID_Paiement'];
    //header("location: ../index.html");
}

?>
