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
    // Récupérer la date et l'heure actuelles
    $dateActuelle = date("Y-m-d");
    $heureActuelle = date("H:i");

    // Connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "rdv";

    $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérifier la connexion
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Calculer la date du premier jour de la semaine (lundi)
    $premierJourSemaine = date("Y-m-d", strtotime('monday this week', strtotime($dateActuelle)));

    // Fonction pour récupérer les rendez-vous d'un jour
    function getRendezVous($date) {
        global $connexion;

        $query = "SELECT heure, description FROM rendez_vous WHERE date = '$date'";
        $resultat = mysqli_query($connexion, $query);

        $rendezVous = array();

        while ($row = mysqli_fetch_assoc($resultat)) {
            $heure = $row['heure'];
            $description = $row['description'];
            $rendezVous[$heure] = $description;
        }

        return $rendezVous;
    }

    // Fonction pour enregistrer un rendez-vous
    function enregistrerRendezVous($date, $heure, $description) {
        global $connexion;

        $query = "INSERT INTO rendez_vous (date, heure, description) VALUES ('$date', '$heure', '$description')";
        mysqli_query($connexion, $query);
    }

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
    for ($heure = 6; $heure < 18; $heure++) {
        echo "<tr>";
        for ($i = 0; $i < 7; $i++) {
            $jour = date("Y-m-d", strtotime('+' . $i . ' day', strtotime($premierJourSemaine)));
            $heureCourante = sprintf("%02d:00", $heure);
            $heureSuivante = sprintf("%02d:00", $heure + 1);
            echo "<td>";
            echo "<div>" . $heureCourante . " - " . $heureSuivante . "</div>";
            $rendezVous = getRendezVous($jour);
            if (isset($rendezVous[$heureCourante])) {
                echo "<div class='appointment'>" . $rendezVous[$heureCourante] . "</div>";
            } else {
                // Formulaire d'ajout de rendez-vous
                echo "<form method='POST'>";
                echo "<input type='hidden' name='date' value='$jour'>";
                echo "<input type='hidden' name='heure' value='$heureCourante'>";
                echo "<input type='text' name='description' placeholder='Description'>";
                echo "<input type='submit' value='Ajouter'>";
                echo "</form>";

                // Vérifier si un rendez-vous est ajouté
                if (isset($_POST['date']) && isset($_POST['heure']) && isset($_POST['description'])) {
                    $date = $_POST['date'];
                    $heure = $_POST['heure'];
                    $description = $_POST['description'];

                    enregistrerRendezVous($date, $heure, $description);
                    header("Location: ".$_SERVER['PHP_SELF']);
                }
            }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
    ?>
</body>
</html>
