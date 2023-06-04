<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="styles/Fichecoach.css" type="text/css" />
<link rel="stylesheet" href="styles/scrollmenu.css" type="text/css" />
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
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>
<body>
<?php
    $ID = $_GET['ID'];
     $requete = "SELECT * FROM coach WHERE ID_Coach = $ID";
    $resultat = $conn->query($requete);

    $Deporte = array();

    while ($row = $resultat->fetch_assoc()) {
        $sport = $row["Sport"];
        $NomC = $row["Nom"];
        $PrenomC = $row["Prenom"];
        $Mail= $row["Email"];
        $photo=$row["Photo"];
        $bur= $row["Bureau"];
        $tel = $row["Telephone"];
        $CV=$row["CV"];
        }
           $dateActuelle = date("Y-m-d");
            $heureActuelle = date("H:i");

            // Calculer la date du premier jour de la semaine (lundi)
            $premierJourSemaine = date("Y-m-d", strtotime('monday this week', strtotime($dateActuelle)));


        $req = "SELECT * FROM prendre_rdv  NATURAL JOIN client WHERE ID_Coach = $ID AND Date_rdv >= '" . $premierJourSemaine . "' AND Date_rdv < DATE_ADD('" . $premierJourSemaine . "', INTERVAL 7 DAY)" ;
            $res = $conn->query($req);



           // Tableau de rendez-vous pour chaque jour
           $rendezVous = array();
           while ($row = $res->fetch_assoc()) {
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
    <?php
  if ($ID == 99) {
      echo "<h1 class='titre'>SALLE</h1>
          <br>
          <div class='blocProfil'>
              <div class='profildata' style='margin-top:-12%'>
                  <p>NOM : SALLES OMNES </p>
                  <p>PRENOM : SC402 </p>
                  <p>MAIL : " . $Mail . " </p>
              </div>
          </div>
      </div>";
  }
    else {
        echo "<h1 class='titre'>" . $sport . "</h1>
            
            <br>
            <div class='blocProfil'>
                <img class='photodeprofil' style='height:40%; width:40%' src='php/pic/" . $photo . "' alt=''>
                <div class='profildata' style='margin-top:-6%'>
                    <p>NOM : " . $NomC . "</p>
                    <p>PRENOM : " . $PrenomC . "</p>
                    <p>MAIL : " . $Mail . "</p>
               <p>BUREAU : " . $bur . "</p>
                    <p>TELEPHONE : 0" . $tel . "</p>
                </div>
            </div>
            <button style='margin-left:40%; margin-top:-6%'><a href='CVxml/" . $CV . "'>VOIR LE CV DU COACH</a></button>
        </div>";
    }
     ?>

    <div class="bloc2">
        <div class="barrerecherche">
            <div class="dropdown2">
                <input class="rechercher" type="text" placeholder="Rechercher..." id="searchInput">
                <div class="dropdown2-content" id="searchResults">

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

    </div>
</div>
      <div class="bloc1", style="margin-top:-1.5%">
      <h1 class="titre"> <br> MES DISPONIBILITES</h1>
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
            else {


                echo "<a href='paiement.php?coach_id=" . $ID . "&date=" . $jour . "&heure=" . $heureCourante . " - " . $heureSuivante . "'><button> RESERVER </button></a>";
                             }
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
      ?>
       <br>
  </div>


<script src="javascript/recherche.js"></script>
</body>
</html>
