<?php
session_start();
include_once "php/config.php";
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
<link rel="stylesheet" href="styles/admin.css" type="text/css" />
    <body>
    <div class="blocHeader">
      <div class="bloc1">
        <section class="formLogin">
            <h1 class="titre">LOGIN</h1>
            <form action="php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="fieldInput", style="margin-left:2.3%">
                    <label>E-mail : </label>
                    <input class="in"  type="text" name="email" placeholder="Saisir votre email" required>
                </div>
                <div class="fieldInput">
                    <label>Mot de Passe : </label>
                    <input class="in" type="password" name="password" placeholder="Saisir votre mot de passe" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <button style="margin-top:3.5%">ME CONNECTER</button>
                </div>
            </form>
            <div class="link" id="lien" style="margin-top:-1%">Pas inscrit ? <a href="signup.php">S'inscrire</a></div>
        </section>
    </div>
    <div class="bloc2" style="margin-top:-0.1%">

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
      </div>

    <script src="javascript/show_hide_mdp.js"></script>
    <script src="javascript/login.js"></script>

    </body>
    </html>
