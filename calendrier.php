<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .current-date {
            font-weight: bold;
        }

        .appointment {
            background-color: #ffffcc;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Configuration de la connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "sportify";

    // Récupérer la date et l'heure actuelles
    $dateActuelle = date("Y-m-d");
    $heureActuelle = date("H:i");

    // Calculer la date du premier jour de la semaine (lundi)
    $premierJourSemaine = date("Y-m-d", strtotime('monday this week', strtotime($dateActuelle)));

    // Connecter à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Erreur de connexion à la base de données : " . $connexion->connect_error);
    }

    // Récupérer les rendez-vous de la semaine
    $requete = "SELECT * FROM prendre_rdv WHERE Date_rdv >= '" . $premierJourSemaine . "' AND Date_rdv < DATE_ADD('" . $premierJourSemaine . "', INTERVAL 7 DAY)";
    $resultat = $connexion->query($requete);


    // Tableau de rendez-vous pour chaque jour
    $rendezVous = array();
    while ($row = $resultat->fetch_assoc()) {
        $jour = $row["Date_rdv"];
        $Heure = $row["Plage_horaire"];
        $Coach = $row["ID_Coach"];
        $Client = $row["ID_Client"];
        $Statut= $row["Statut"];
        if (!isset($rendezVous[$jour])) {
            $rendezVous[$jour] = array();
        }
        $rendezVous[$jour][$Heure] = $Statut;
    }

    // Fermer la connexion à la base de données
    $connexion->close();

    // Afficher le calendrier
    echo "<h2>Calendrier de la semaine avec les rendez-vous</h2>";
    echo "<table>";

    // Afficher les jours de la semaine
    echo "<tr>";
    for ($i = 0; $i < 7; $i++) {
        $jour = date("Y-m-d", strtotime('+' . $i . ' day', strtotime($premierJourSemaine)));
        $jourAffiche = date("D", strtotime($jour));
        if ($jour == $dateActuelle) {
            echo "<th class='current-date'>" . $jourAffiche . "</th>";
        } else {
            echo "<th>" . $jourAffiche . "</th>";
        }
    }
    echo "</tr>";

    // Afficher les heures et les rendez-vous pour chaque jour
    for ($heure = 8; $heure < 16; $heure=$heure+2) {
        echo "<tr>";
        for ($i = 0; $i < 7; $i++) {
            $jour = date("Y-m-d", strtotime('+' . $i . ' day', strtotime($premierJourSemaine)));
            $heureCourante = sprintf("%02d:00", $heure);
            $heureSuivante = sprintf("%02d:00", $heure + 2);
            echo "<td>";
            echo "<div>" . $heureCourante . " - " . $heureSuivante . "</div>";
            if (isset($rendezVous[$jour]) && array_key_exists($heureCourante . " - " . $heureSuivante, $rendezVous[$jour])) {
                echo "<div class='appointment'> <p>dasgkjlökgjndg</p> </div>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

</body>
</html>
