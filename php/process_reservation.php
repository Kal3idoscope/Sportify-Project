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

// Insérer la réservation dans la table prendre_rdv
$insertQuery = "INSERT INTO prendre_rdv (ID_Client, ID_Coach, Date_rdv, Plage_horaire,ID_Paiement, Statut)
                VALUES ($clientId, $coachId, '$date', '$heure',1, '1')";

if ($conn->query($insertQuery) === TRUE) {
    // Réservation effectuée avec succès
    header("location: ../index.html");
    exit();
} else {
    // Erreur lors de la réservation
    header("location: ../index.html");
    exit();
}
?>
