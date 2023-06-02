<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    if ($_SESSION['user_type'] == 'admin') {
        header("location: admin.php");
    } elseif ($_SESSION['user_type'] == 'client') {
        header("location: client.php");
    } elseif ($_SESSION['user_type'] == 'coach') {
        header("location: coach.php");
    }
}
?>

<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/co.css" type="text/css" />
<body>

<div class="blocHeader">
    <div class="bloc1">
    <section class="formSignup">
        <h1 class="titre">SIGN UP</h1>
        <form action="php/signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="fieldInput">
                    <label>Prenom : </label>
                    <input class="in" type="text" name="prenom" placeholder="Prenom" required>
                </div>
                <div class="fieldInput">
                    <label>Nom : </label>
                    <input class="in" type="text" name="nom" placeholder="Nom" required>
                </div>
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
            <div class="fieldInput">
                <label>Selectionner une image : </label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="fieldButton">
            <button> S'INSCRIRE </button>

            </div>
        </form>
        <div class="link">Déjà inscrit? <a href="login.php">Se connecter</a></div>
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
                  <a href="./rdv.php">RDV</a> <br>
                  <a href="./login.php">COMPTE</a> <br>
                </div>
</div>

<script src="javascript/show_hide_mdp.js"></script>
<script src="javascript/signup.js"></script>

</body>
</html>
