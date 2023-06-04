<?php
session_start();
include_once "./config.php";

if(isset($_SESSION['unique_id'])) {
    if(isset($_GET['coach_id']) && isset($_GET['date']) && isset($_GET['heure'])) {
        $coach_id = $_GET['coach_id'];
        $date = $_GET['date'];
        $heure = $_GET['heure'];

        // Recherchez le rendez-vous correspondant dans votre base de données
        $sql = mysqli_query($conn, "SELECT * FROM prendre_rdv WHERE ID_Coach = '$coach_id' AND ID_Client = {$_SESSION['unique_id']} AND Date_rdv = '$date' AND Plage_horaire = '$heure'");
        if(mysqli_num_rows($sql) > 0) {
            // Le rendez-vous correspondant a été trouvé, supprimez-le de la base de données
            $delete = mysqli_query($conn, "DELETE FROM prendre_rdv WHERE ID_Coach = '$coach_id' AND ID_Client = {$_SESSION['unique_id']} AND Date_rdv = '$date' AND Plage_horaire = '$heure'");

            if($delete) {
                // Désinscription réussie, redirigez l'utilisateur vers une page de confirmation ou affichez un message de succès
                header("location: ../rdv.php");
                exit();
            } else {
                // Erreur lors de la désinscription, affichez un message d'erreur ou effectuez d'autres actions nécessaires
                echo "Une erreur s'est produite lors de la désinscription. Veuillez réessayer.";
            }
        } else {
            // Aucun rendez-vous correspondant n'a été trouvé, affichez un message d'erreur approprié ou redirigez l'utilisateur vers une page d'erreur
            echo "Le rendez-vous correspondant n'a pas été trouvé.";
        }
    } else {
        // Les paramètres nécessaires ne sont pas définis, affichez un message d'erreur ou redirigez l'utilisateur vers une page d'erreur
        echo "Les informations du rendez-vous ne sont pas complètes.";
    }
} else {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("location: login.php");
    exit();
}
?>
