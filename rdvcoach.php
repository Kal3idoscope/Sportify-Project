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
            border-radius:50%;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #BBAE90;
            color: #BBAE90;
            font-family: "dosis", sans-serif;

        }

        th {
            background-color: #2B2525;
        }

        .current-date {
            font-weight: bold;
        }

        .appointment {

            font-weight: bold;
        }

        .titre
        {
            font-family: "shrikhand", cursive;
            margin-top: 2%;
            font-size: 300%;
            text-align: center;
            color: #BBAE90;
            margin-bottom:1%;
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

    // Récupérer la date et l'heure actuelles
    $dateActuelle = date("Y-m-d");
    $heureActuelle = date("H:i");

    // Calculer la date du premier jour de la semaine (lundi)
    $premierJourSemaine = date("Y-m-d", strtotime('monday this week', strtotime($dateActuelle)));

    // Récupérer les rendez-vous de la semaine
    $requete = "SELECT * FROM prendre_rdv  NATURAL JOIN client WHERE ID_Coach = {$_SESSION['unique_id']} AND Date_rdv >= '" . $premierJourSemaine . "' AND Date_rdv < DATE_ADD('" . $premierJourSemaine . "', INTERVAL 7 DAY)" ;
    $resultat = $conn->query($requete);



    // Tableau de rendez-vous pour chaque jour
    $rendezVous = array();
    while ($row = $resultat->fetch_assoc()) {
        $jour = $row["Date_rdv"];
        $Heure = $row["Plage_horaire"];
        $Coach = $row["ID_Coach"];
        $Client = $row["ID_Client"];
        $Statut= $row["Statut"];
           $Nom= $row["Nom"];
           $Prenom= $row["Prenom"];
        if (!isset($rendezVous[$jour])) {
            $rendezVous[$jour] = array();
        }
       $rendezVous[$jour][$Heure] = $Prenom . " " .$Nom;

    }


  ?>
  <div class="blocHeader">
      <div class="bloc1">
      <h1 class="titre">MES FUTURS RENDEZ-VOUS</h1>
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
               echo "<div class='appointment'> <p>" . $rendezVous[$jour][$heureCourante . " - " . $heureSuivante] . "</p></div>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
      ?> <br>
  </div>

    <div class="bloc2">

        <div class="barrerecherche">
            <div class="dropdown2">
                <input class="rechercher" type="text" placeholder="Rechercher..." id="searchInput">
                <div class="dropdown2-content" id="searchResults">
                    <!-- Les résultats de la recherche seront ajoutés ici -->
                </div>
            </div>
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.php">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.php">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./rdv.php">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>
        <div class="boutonLOGOUT">
             <button style="width:100% ; height:95%; font-size: 200%"><a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>" class="logout">LOG OUT</a></button>
        </div>
    </div>
</div>

</body>
</html>
<script src="javascript/recherche.js"></script>
</body>
</html>




