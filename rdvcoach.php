<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

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

            font-weight: bold;
        }
    </style>
</head>


<body>
<?php
$sql = mysqli_query($conn, "SELECT * FROM admin WHERE ID_Admin = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}
?>

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
    $requete = "SELECT * FROM prendre_rdv  NATURAL JOIN client WHERE ID_Coach = {$_SESSION['unique_id']} AND Date_rdv >= '" . $premierJourSemaine . "' AND Date_rdv < DATE_ADD('" . $premierJourSemaine . "', INTERVAL 7 DAY)" ;
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
        $Nom = $row["Nom"];;
    }



    // Fermer la connexion à la base de données
    $connexion->close();
  ?>
  <div class="blocHeader">
      <div class="bloc1">
    <?php
 echo "<table>";

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
                echo "<div class='appointment'> <p>adsfk<p>  </div>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
      ?>
  </div>

    <div class="bloc2">

        <div class="barrerecherche">
            <input class="rechercher" type="text" placeholder="Search..">
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.html">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./rdv.php">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>
        <div class="boutonLOGOUT">
             <button style="width:100% ; height:95%; font-size: 200%"><a href="php/logout.php?logout_id=<?php echo $Coach ; ?>" class="logout">LOG <br> OUT</a></button>
        </div>
    </div>
</div>

</body>
</html>

</body>
</html>




