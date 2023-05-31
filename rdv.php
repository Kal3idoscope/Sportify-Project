<?php
session_start();
include_once "php/config.php";
if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];
    $admin_query = mysqli_query($conn, "SELECT * FROM admin WHERE ID_admin = '{$unique_id}'");
    $client_query = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client = '{$unique_id}'");
    $coach_query = mysqli_query($conn, "SELECT * FROM coach WHERE ID_Coach = '{$unique_id}'");

    if (mysqli_num_rows($admin_query) > 0) {
        $_SESSION['user_type'] = 'admin';
        header("location: rdvadmin.php");
    } elseif (mysqli_num_rows($client_query) > 0) {
        $_SESSION['user_type'] = 'client';
        header("location: rdvclient.php");
    } elseif (mysqli_num_rows($coach_query) > 0) {
        $_SESSION['user_type'] = 'coach';
        header("location: rdvcoach.php");
    }
}
?>


<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/connexion.css" type="text/css" />
<link rel="stylesheet" href="styles/admin.css" type="text/css" />
    <body>
    <div class="blocHeader">
      <div class="bloc1">
        <section class="formLogin">
            <h1 class="titre">LOGIN</h1>
            <form action="php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="fieldInput">
                    <label>Adresse Email : </label>
                    <input class="in"  type="text" name="email" placeholder="Saisir votre email" required>
                </div>
                <div class="fieldInput">
                    <label>Mot de Passe : </label>
                    <input class="in" type="password" name="password" placeholder="Saisir votre mot de passe" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Se Connecter">
                </div>
            </form>
            <div class="link" id="lien">Pas inscrit ? <a href="signup.php">S'inscrire</a></div>
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
