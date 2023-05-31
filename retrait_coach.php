<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/connexion.css" type="text/css" />
<body>

<div class="blocHeader">
    <div class="bloc1">
        <section class="formSignup">
            <h1 class="titre">Retrait Coach</h1>
            <h2 class="titre">Saisir email ou ID</h2>
            <form action="php/retrait_coach.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="fieldInput">
                    <label>Adresse Email : </label>
                    <input class="in" type="text" name="email" placeholder="Saisir l'email">
                </div>
                <div class="fieldInput">
                    <label>ID : </label>
                    <input class="in" type="int" name="id" placeholder="Saisir l'ID">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="fieldButton">
                    <input class="bouton" type="submit" name="submit" value="Supprimer le coach">
                </div>
            </form>
        </section>
    </div>
    <div class="bloc2">

        <div class="header">
            <a href="./index.html">ACCUEIL</a> <br>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.html">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./RDV.php">RDV</a> <br>
            <a href="./login.php">COMPTE</a> <br>
        </div>
    </div>

    <script src="javascript/show_hide_mdp.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>
