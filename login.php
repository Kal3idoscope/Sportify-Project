<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];
    $admin_query = mysqli_query($conn, "SELECT * FROM admin WHERE ID_admin = '{$unique_id}'");
    $client_query = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client = '{$unique_id}'");
    $coach_query = mysqli_query($conn, "SELECT * FROM coach WHERE ID_C = '{$unique_id}'");

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
    <section class="form login">
    <head>
      <meta charset="UTF-8">
      <title>Home</title>
      <link rel="stylesheet" href="styles/connexion.css" type="text/css" />
      <link rel="stylesheet" href="styles/general.css" type="text/css" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;500&family=Shrikhand&display=swap" rel="stylesheet">

    </head>
    <body>
    <div class="blocHeader">
      <div class="bloc1">
        <section class="formLogin">
            <h1 class="titre">LOGIN</h1>
            <form action="php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="fieldInput">
                    <label>Adresse Email : </label>
                    <input class="in"  type="text" name="email"required>
                </div>
                <div class="fieldInput">
                    <label>Mot de Passe : </label>
                    <input class="in" type="password" name="password"  required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field Button">
                    <input type="submit" name="submit" value="Se Connecter">
                </div>
            </form>
            <div class="link">Déjà inscrit? <a href="signup.php">S'inscrire</a></div>
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

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>

    </body>
    </html>
