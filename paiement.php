<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<head>

<link rel="stylesheet" href="styles/paiement.css" type="text/css" />
</head>
<body>

<div class="blocHeader">
    <div class="bloc1">
        <section class="formSignup">
            <h1 class="titre">Paiement<br> </h1>

            <form action="php/ajout_coach.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                <div class="option48">
                <div class="INFOCLIENT">
                        <div class="fieldInput3">
                        <label><br>Prenom : </label>
                        <input class="in" type="text" name="prenom" placeholder="Prenom" required>
                        </div>
                        <div class="fieldInput3">
                        <label>Nom : </label>
                        <input class="in" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="fieldInput3">
                        <label>Numéro de téléphone : </label>
                        <input class="in" type="text" name="numTel" placeholder="Telephone" required>
                         </div>
                        <div class="fieldInput3">
                        <label>Numéro étudiant :</label>
                        <input class="in" type="text" name="numEtu" placeholder="Numero etudiant" required>
                        </div>
                        <div class="fieldInput3">
                        <label>Numéro étudiant :</label>
                        <input class="in" type="text" name="numEtu" placeholder="Numero etudiant" required>
                        </div>
                        <div class="fieldInput3">
                        <label>Adresse Ligne 1 :</label>
                        <input class="in" type="text" name="adresse1" required>
                        </div>
                        <div class="fieldInput3", style="margin-left:10%">
                        <label>Adresse Ligne 2 :</label>
                        <input class="in" type="text" name="adresse2" required>
                        </div>
                        <div class="fieldInput3", style="margin-left:10%">
                        <label>Ville :</label>
                        <input class="in" type="text" name="ville" required>
                        </div>
                        <div class="fieldInput3", style="margin-left:10%">
                        <label>Code postal :</label>
                        <input class="in" type="text" name="codePostal" required>
                        </div>
                        <div class="fieldInput3", style="margin-left:10%">
                        <label>Pays :</label>
                        <input class="in" type="text" name="pays" required>
                        </div>

                </div>
           <div class="CARTEDECREDIT">
           <div class="fieldInput3">
                        <label>Type de carte :</label>
           </div>

                <tr>
                    <td>
                        <div class ="fieldInput3", style="line-height:150%">
                        <input type="radio" name="carte" value="1">VISA<br>
                        <input type="radio" name="carte" value="2">MASTERCARD<br>
                        <input type="radio" name="carte" value="3">AMERICAN EXPRESS<br>
                        </div>
                    </td>

                </tr>
                <div class="fieldInput3">
                <label>Numéro de la carte :</label>
                <input class="in" type="text" name="numCarte" required>
                </div> <br>
                <div class="fieldInput3">
                <label>Nom sur la carte:</label>
                <input class="in" type="text" name="nomCarte" required>
                </div> <br>
                <div class="fieldInput3">
                <label>Date d'expiration :</label>
                <input class="in" type="text" name="dateExpi" required>
                </div> <br>
                <div class="fieldInput3">
                <label>Code de sécurité : </label>
                <input class="in" type="text" name="codeSecu" required>
                </div> <br>
</div>


            </div>
            </div>
                <div class="fieldInput3" style="text-align:right; margin-right:9%">
                <label> PRIX : </label>
                   </div> <br>
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
        <button> VALIDER LE PAIEMENT </button>
    </div>

    <script src="javascript/show_hide_mdp.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>
