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
        header("location: admin.php");
    } elseif (mysqli_num_rows($client_query) > 0) {
        $_SESSION['user_type'] = 'client';
        header("location: client.php");
    } elseif (mysqli_num_rows($coach_query) > 0) {
        $_SESSION['user_type'] = 'coach';
        header("location: coach.php");
    }
}
?>

<?php include_once "header.php"; ?>
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
