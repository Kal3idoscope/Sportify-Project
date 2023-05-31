<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/admin.css" type="text/css" />
<body>


<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre">ADMINISTRATEUR <h1>
        <br>
                <div class="blocProfil">
                    <img class="photodeprofil" src="Images/mouhali.jpeg" alt="mouhali"/>
                    <div class="profildata">
                        <p>NOM :  </p>
                        <p>PRENOM : </p>
                          <p>MAIL :  </p>


                    </div>
                </div>
                <div class="bouton">
                    <button>PRENDRE RENDEZ-VOUS</button>
                    <button>VOIR LE CV</button>
                    <button>PRENDRE RENDEZ-VOUS</button>
             </div>
            </div>


    <div class="bloc2">

        <div class="barrerecherche">
            <input class="rechercher" type="text" placeholder="Search..">
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a> <br>
            <div id="flip">TOUT PARCOURIR</div>
            <div id="panel">
                <a href="./Activites_Sportives.html">ACTIVITÉS SPORTIVES</a>
                <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
            </div>
            <a href="./RDV.html">RDV</a> <br>
            <a href="./login.php">COMPTE</a> <br>
        </div>

    </div>
</div>

</body>
</html>
