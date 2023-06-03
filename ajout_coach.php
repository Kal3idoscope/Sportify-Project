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
                        </div>
                        <div class="fieldInput">
                        <label>Nom : </label>
                        <input class="in" type="text" name="nom" placeholder="Nom" required>
                        </div>
                    <div class="fieldInput">
                        <label>Telephone : </label>
                        <input class="in" type="number" name="telephone" placeholder="Telephone" required>
                    </div>
                    <div class="fieldInput">
                        <label>Bureau : </label>
                        <input class="in" type="text" name="bureau" placeholder="Bureau" required>
                    </div>
                        <div class="fieldInput">
                        <label>Adresse Email : </label>
                        <input class="in" type="text" name="email" placeholder="Saisir votre email" required>
                        </div>
                        <div class="fieldInput">
                        <label>Mot de Passe : </label>
                        <input class="in" type="password" name="password" placeholder="Enter new password" required>
                        <i class="fas fa-eye"></i>
                        </div>
                </div>
                <div class="fieldInput">
                    <label>Selectionner une image : </label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div> <br>
                <hr>
                <div class="options 2">
                <tr>
                    <td>

                        <div class ="fieldInput1">
                        <div class ="titre4">
                                                <p style="margin-top:3%"> ACTIVITES SPORTIVES </p>
                                                </div>
                        <input type="radio" name="sport" value="MUSCULATION">Musculation<br>
                        <input type="radio" name="sport" value="FITNESS">Fitness<br>
                        <input type="radio" name="sport" value="BIKING">Biking<br>
                        <input type="radio" name="sport" value="CARDIO-TRAINING">Cardio-Training<br>
                        <input type="radio" name="sport" value="COURS COLLECTIFS">Cours Collectifs<br>
                        </div>

                        <div class ="fieldInput1">
                         <div class ="titre4">
                                                <p> SPORTS DE COMPETITION </p>
                                                </div>
                        <input type="radio" name="sport" value="BASKETBALL">Basketball<br>
                        <input type="radio" name="sport" value="FOOTBALL">Football<br>
                        <input type="radio" name="sport" value="RUGBY">Rugby<br>
                        <input type="radio" name="sport" value="TENNIS">Tennis<br>
                        <input type="radio" name="sport" value="NATATION">Natation<br>
                        <input type="radio" name="sport" value="PLONGEON">Plongeon<br>
                        </div>
                    </td>

                </tr>
                </div>
                          <button>INSCRIRE UN COACH</button>


            </form>

        </section>

    </div>
    <div class="bloc2">

        <div class="header">
            <a href="./index.html">ACCUEIL</a> <br>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.php">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.php">SALLES DE SPORT OMNES</a>
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
