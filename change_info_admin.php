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
            <form action="php/change_info_admin.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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

        <div class="barrerecherche">
            <input class="rechercher" type="text" placeholder="Search..">
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a> <br>
            <a href="./Parcourir.html">TOUT PARCOURIR</a> <br>
            <a href="./RDV.html">RDV</a> <br>
            <a href="./COMPTE.html">COMPTE</a> <br>
        </div>
    </div>
</div>

<script src="javascript/show_hide_mdp.js"></script>
<script src="javascript/login.js"></script>

</body>
</html>
