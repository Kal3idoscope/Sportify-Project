<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<head>
<link rel="stylesheet" href="styles/co.css" type="text/css" />
</head>
<body>

<div class="blocHeader">
    <div class="bloc1">
        <section class="formSignup">
            <h1 class="titre">Ajout Coach <br> </h1>

            <form action="php/ajout_coach.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="fieldInput">
                        <label><br>Prenom : </label>
                        <input class="in" type="text" name="prenom" placeholder="Prenom" required>
                        <label>Nom : </label>
                        <input class="in" type="text" name="nom" placeholder="Nom" required>
                        <label>Adresse Email : </label>
                        <input class="in" type="text" name="email" placeholder="Saisir votre email" required>
                        <label>Mot de Passe : </label>
                        <input class="in" type="password" name="password" placeholder="Enter new password" required>
                        <i class="fas fa-eye"></i>
                </div>
                <div class="fieldInput">
                    <label>Selectionner une image : </label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div> <br>
                <hr>
                <tr>
                    <td>
                        <div class ="titre4">
                        <p style="margin-top:3%"> ACTIVITES SPORTIVES </p>
                        </div>
                        <div class ="fieldInput1">
                        <input type="radio" name="sport" value="1">Musculation<br>
                        <input type="radio" name="sport" value="2">Fitness<br>
                        <input type="radio" name="sport" value="3">Biking<br>
                        <input type="radio" name="sport" value="4">Cardio-Training<br>
                        <input type="radio" name="sport" value="5">Cours Collectifs<br>
                        </div>
                        <div class ="titre4">
                        <p> SPORTS DE COMPETITION </p>
                        </div>
                        <div class ="fieldInput1">
                        <input type="radio" name="sport" value="6">Basketball<br>
                        <input type="radio" name="sport" value="7">Football<br>
                        <input type="radio" name="sport" value="8">Rugby<br>
                        <input type="radio" name="sport" value="9">Tennis<br>
                        <input type="radio" name="sport" value="10">Natation<br>
                        <input type="radio" name="sport" value="11">Plongeon<br>
                        </div>
                    </td>

                </tr>
                <div class="button">
                    <input class="button" type="submit" name="submit" value="INSCRIRE UN COACH">
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
