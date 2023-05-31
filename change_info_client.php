<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
<div class="blocHeader">
    <div class="bloc1">
        <section class="formLogin">
            <h1 class="titre">Changement des informations</h1>
            <form action="php/change_info_client.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="fieldInput">
                    <label>Prénom : </label>
                    <input class="in" type="text" name="prenom" placeholder="Saisir un nouveau prénom">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="fieldInput">
                    <label>Nom : </label>
                    <input class="in" type="text" name="nom" placeholder="Saisir un nouveau nom">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="fieldInput">
                    <label>Adresse Email : </label>
                    <input class="in"  type="text" name="email" placeholder="Saisir un nouvel email">
                </div>
                <div class="fieldInput">
                    <label>Mot de Passe : </label>
                    <input class="in" type="password" name="password" placeholder="Saisir un nouveau mot de passe">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Changer les informations">
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
</div>

<script src="javascript/show_hide_mdp.js"></script>
<script src="javascript/login.js"></script>

</body>
</html>
