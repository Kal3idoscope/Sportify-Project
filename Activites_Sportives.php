<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php";?>
<head>
    <meta charset="UTF-8">
    <title>Activités sportives</title>
    <link rel="stylesheet" href="styles/home.css" type="text/css" />

    <link rel="stylesheet" href="styles/activites_sportives.css" type="text/css" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            $("#flip").click(function(){
                $("#panel").toggle("slow");
            });
        });
        $(document).ready(function(){
            $(".contain").hover(function(){
                $(this).children("img").css("filter", "brightness(50%)");
                $(this).children("p").show();
            }, function() {
                $(this).children("img").css("filter", "brightness(100%)");
                $(this).children("p").hide();

            });
        });
    </script>
    <?php

    $requete = "SELECT * FROM coach";
    $resultat = $conn->query($requete);

    $Deporte = array();

    for ($i = 0; $i < 6; $i++) {
        $Deporte[$i] = '';
    }

    while ($row = $resultat->fetch_assoc()) {
        $sport = $row["ID_sport"];
        $Nom = $row["Nom"];
        $Prenom = $row["Prenom"];

        if (isset($Deporte[$sport])) {
            $Deporte[$sport] .= " <br> " . $Prenom . " " . $Nom;
        } else {
              $requete = "SELECT * FROM coach";
              $resultat = $conn->query($requete);

              $Deporte = array();

              for ($i = 0; $i < 6; $i++) {
                  $Deporte[$i] = '';
              }

              while ($row = $resultat->fetch_assoc()) {
                  $sport = $row["ID_sport"];
                  $Nom = $row["Nom"];
                  $Prenom = $row["Prenom"];

                  if (isset($Deporte[$sport])) {
                      $Deporte[$sport] .= " <br> " .' <a href="./FicheCoach"> '. $Prenom . " " . $Nom .  ' </a> ';
                  } else {
                    $Deporte[$sport] = ' <a href="./FicheCoach"> ' . $Prenom . ' ' . $Nom . ' </a> ';
                  }
              }
        }
    }
    ?>
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
</head>
<body>
<div class="option1">
    <div class="bloc1">
        <img style="margin-top:1.5%" src="Images/sportifylogo 1.png"/>
        <h1 class = actSport >ACTIVITÉS<br>
            SPORTIVES</h1>
        <img class="imageActiviteSport" src="Images/image 6.png" alt="activite photo"/>
    </div>

    <div class="bloc2">
        <div class="barrerecherche">
            <input class="rechercher" type="text" placeholder="Search..">
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a><br>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./rdv.php">RDV</a> <br>
            <a href="./login.php">COMPTE</a> <br>
        </div>
    </div>
</div>


<div  class="centré">
    <p style="text-align:center">
        Découvrez chez Sportify un large éventail d'activités sportives, telles que le fitness, la musculation,
        le biking, le cardio-training et les cours collectifs. Rejoignez-nous dès maintenant pour vivre une expérience
        sportive complète et atteindre vos objectifs
    </p>
</div>

<div class="contain">
    <img class="imageAS" src="Images/image 7.png" alt="activite1 photo"/>
    <p class="Coach"> <?php echo $Deporte["1"]; ?> </p>
    <div class="muscu">MUSCULATION</div>
</div>
<p>&nbsp;</p>
<div class="contain">
    <img class="imageAS" src="Images/image 8.png" alt="activite1 photo"/>
    <p class="Coach"><?php echo $Deporte["2"]; ?></p>
    <div class="muscu">FITNESS</div>
</div>
    <p>&nbsp;</p>
<div class="contain">
    <img class="imageAS" src="Images/image 9.png" alt="activite1 photo"/>
    <p class="Coach"><?php echo $Deporte["3"]; ?></p>
    <div class="muscu">BIKING</div>
</div>
    <p>&nbsp;</p>
<div class="contain">
    <img class="imageAS" src="Images/image 10.png" alt="activite1 photo"/>
    <p class="Coach"><?php echo $Deporte["4"]; ?></p>
    <div class="muscu">CARDIO-TRAINING</div>
</div>
    <p>&nbsp;</p>
<div class="contain">
    <img class="imageAS" src="Images/image 11.png" alt="activite1 photo"/>
    <p class="Coach"><?php echo $Deporte["5"]; ?>E</p>
    <div class="muscu">COURS COLLECTIFS</div>
</div>
<p>&nbsp;</p>
<div class="footer">
    <div class="bloc7">
        <h1 class="titleFooter">Contactez-nous</h1>
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.361323803101!2d2.286033275703404!3d48.851319971331215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b461cfb0b%3A0x826182e3c9eae061!2s6%20Rue%20Sextius%20Michel%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1685440191786!5m2!1sfr!2sfr"
                    width="650" height="495" style="border-radius:21px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="bloc8">
        <div class="RS">
            <p><img src="Images/insta.png"/>  INSTAGRAM : @ecoleece</p>
            <p><img src="Images/facebook.png"/>   FACEBOOK : ECE Paris</p>
        </div>
        <div class="Contact">
            <p><img src="Images/envelope.png"/>   MAIL : sportify.assistance@gmail.com</p>
            <p><img src="Images/phone.png"/>  TELEPHONE : 01 67 28 45 29</p>
            <p><img src="Images/marker.png"/>   ADRESSE : 6 rue Sextius Michel 75015</p>
            <p>PAYS : FRANCE</p>
        </div>
    </div>
</div>
</body>
</html>
