<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/admin.css" type="text/css" />
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

$sql = mysqli_query($conn, "SELECT * FROM admin WHERE ID_Admin = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

$requete = "SELECT * FROM admin WHERE ID_Admin = {$_SESSION['unique_id']}";
$resultat = $conn->query($requete);


    // Tableau de rendez-vous pour chaque jour
    $admin = array();
    while ($row = $resultat->fetch_assoc()) {

        $nom = $row["Nom"];
        $prenom = $row["Prenom"];
        $mail = $row["Email"];
        $id=$row["ID_Admin"];

    }

?>

<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre">ADMINISTRATEUR </h1>

                <div class="blocProfil">
                    <div class="profildata", style="font-size:200%; margin-left:30%; margin-bottom:5%; line-height:175%">
                        <p>NOM :  <?php echo $nom; ?> </p>
                        <p>PRENOM : <?php echo $prenom; ?> </p>
                         <p>MAIL : <?php echo $mail; ?> </p>
                         <p class="modifInfo"> <a href="./change_info_admin.php">Modifier mes informations</a></p>
                    </div>
                </div>
                <div class="option1", style="margin-bottom:2.3%">
                    <button><a href="affichage_coach.php">LISTE DES COACHS</a></button>
                    <button><a href="retrait_coach.php">ENLEVER UN COACH</a></button>
                    <button><a href="ajout_coach.php">AJOUTER UN COACH</a></button>
                </div>
            </div>



    <div class="bloc2">

        <div class="barrerecherche">
            <div class="dropdown2">
                <input class="rechercher" type="text" placeholder="Rechercher..." id="searchInput">
                <div class="dropdown2-content" id="searchResults">
                    <!-- Les résultats de la recherche seront ajoutés ici -->
                </div>
            </div>
        </div>
        <div class="header">
            <a href="./index.html">ACCUEIL</a>
            <div class="dropdown">
                <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./rdv.php">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>
        <div class="boutonLOGOUT">
             <button style="width:100% ; height:50%; font-size: 200%"><a href="php/logout.php?logout_id=<?php echo $id ?>" class="logout">LOG OUT</a></button>
        </div>
    </div>
</div>
<img style="width:98%; height:85%; margin-left:1%" src="Images/admin1.png" alt="admin"/>
<script src="javascript/recherche.js"></script>
</body>
</html>
