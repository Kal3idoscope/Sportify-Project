<?php
session_start();
include_once "config.php";
$telephone = mysqli_real_escape_string($conn, $_POST['numTel']);
$adresse1 = mysqli_real_escape_string($conn, $_POST['adresse1']);
$adresse2 = mysqli_real_escape_string($conn, $_POST['adresse2']);
$ville = mysqli_real_escape_string($conn, $_POST['ville']);
$code_postal = mysqli_real_escape_string($conn, $_POST['codePostal']);
$pays = mysqli_real_escape_string($conn, $_POST['pays']);
$type_carte = mysqli_real_escape_string($conn, $_POST['carte']);
$num_carte = mysqli_real_escape_string($conn, $_POST['numCarte']);
$nom_carte = mysqli_real_escape_string($conn, $_POST['nomCarte']);
$date_expi = mysqli_real_escape_string($conn, $_POST['dateExpi']);
$CVV = mysqli_real_escape_string($conn, $_POST['codeSecu']);
$verif = 1;

if (!empty($telephone)) {
    $sql = mysqli_query($conn, "UPDATE client SET Telephone = '{$telephone}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($adresse1)) {
    $sql = mysqli_query($conn, "UPDATE client SET Adresse1 = '{$adresse1}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
       // echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($adresse2)) {
    $sql = mysqli_query($conn, "UPDATE client SET Adresse2 = '{$adresse2}'WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($ville)) {
    $sql = mysqli_query($conn, "UPDATE client SET Ville = '{$ville}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
      //  echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($code_postal)) {
    $sql = mysqli_query($conn, "UPDATE client SET Code_postal = '{$code_postal}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($pays)) {
    $sql = mysqli_query($conn, "UPDATE client SET Pays = '{$pays}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($type_carte)) {
    $sql = mysqli_query($conn, "UPDATE client SET Type_carte = '{$type_carte}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($num_carte)) {
    $sql = mysqli_query($conn, "UPDATE client SET Num_carte = '{$num_carte}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}
if (!empty($nom_carte)) {
    $sql = mysqli_query($conn, "UPDATE client SET Nom_carte = '{$nom_carte}' WHERE ID_Client = {$_SESSION['unique_id']}");
    if ($sql) {
        //echo "success";
    } else {
        echo "Something went wrong. Please try again!";
        $verif = 0;
    }
}

if($verif){
    $dateActuelle = date("Y-m-d");
    $montant = 40;
    $insert_query = mysqli_query($conn, "INSERT INTO paiement (Date, Montant) VALUES ('$dateActuelle', '$montant')");

    if ($insert_query) {
        $sql = mysqli_query($conn, "SELECT * FROM paiement WHERE ID_Paiement = LAST_INSERT_ID()");
        if ($sql && mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['ID_Paiement']= $row['ID_Paiement'];
            echo "success";
            echo 'Rdv pris';
            echo mysqli_error($conn);
            echo "<br>";

            header("Location: process_reservation.php?coach_id=" . $_SESSION['coach_id'] . "&date=" . $_SESSION['date'] . "&heure=" . $_SESSION['heure']);
        } else {
            // Gérer l'erreur si aucun élément n'a été inséré ou la récupération a échoué
            echo "Erreur lors de la récupération du dernier élément inséré";
        }
    }
    else {
        echo "Problem";
    }
} else {
    echo "Problem";
    //header("location: ../paiement.php");
}


