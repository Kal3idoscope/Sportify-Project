<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/Fichecoach.css" type="text/css" />
<link rel="stylesheet" href="styles/scrollmenu.css" type="text/css" />
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
        $Nom = $row["Nom"];
        $Prenom = $row["Prenom"];
        $Mail= $row["Email"];
        $photo=$row["Photo"];
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
        <h1 class="titre"><?php echo $sport ?> <h1>
        <br>
                <div class="blocProfil">
                    <img class="photodeprofil" src="php/pic/<?php echo $photo ?>" alt="">
                    <div class="profildata">
                        <p>NOM : <?php echo $Nom ?> </p>
                        <p>PRENOM : <?php echo $Prenom ?> </p>
                        <p>MAIL : <?php echo $Mail ?> </p>
                    </div>
                </div>
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
                    <a href="./Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./RDV.html">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>

    </div>
</div>
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



</body>
</html>
