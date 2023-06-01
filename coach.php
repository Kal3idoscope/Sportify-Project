<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/pagecoach.css" type="text/css" />
<link rel="stylesheet" href="styles/scrollmenu.css" type="text/css" />
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<body>
<?php
$sql = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}

 $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "sportify";

  $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
$requete = "SELECT * FROM coach WHERE ID_Coach = {$_SESSION['unique_id']}";
$resultat = $connexion->query($requete);


    // Tableau de rendez-vous pour chaque jour
    $admin = array();
    while ($row = $resultat->fetch_assoc()) {

        $nom = $row["Nom"];
        $prenom = $row["Prenom"];
        $mail = $row["Email"];
        $id=$row["ID_Coach"];
     $photo=$row["Photo"];
    }

     $connexion->close();
?>
<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre1">COMPTE COACH <h1>
        <br>
                <div class="blocProfil">
                    <img class="photodeprofil" src="php/pic/<?php echo $photo ?>" alt="">
                                        <div class="profildata">
                                            <p>NOM : <?php echo $nom; ?></p>
                                            <p>PRENOM : <?php echo $prenom; ?></p>

                                            <p>MAIL : <?php echo $mail; ?></p>


                    </div>
                </div>
                <div class="option7">
                            <button><a href="./change_info_admin.php">MODIFIER MES INFOS</a></button>
                            <button><a href="users.php">CHATROOM</a></button>
                            <button>HISTORIQUE DE MES RDV</button>
                </div>
            </div>



    <div class="bloc2">

        <div class="barrerecherche">
            <input class="rechercher" type="text" placeholder="Search..">
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.html">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./RDV.html">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>
        <div class="calendrier">
                     <p class ="calend"> CALENDRIER </p>
                </div>
    </div>
</div>

<div class="option9">

<div class="dispo", style ="height : 150%">
<p> Mes disponibilités <br> <br> <p>
</div>

</div>

</body>
</html>
