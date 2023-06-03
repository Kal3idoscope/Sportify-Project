<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/client.css" type="text/css" />
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

$requete = "SELECT * FROM client WHERE ID_Client = {$_SESSION['unique_id']}";
$resultat = $conn->query($requete);


    // Tableau de rendez-vous pour chaque jour
    $client = array();
    while ($row = $resultat->fetch_assoc()) {
        $nom = $row["Nom"];
        $prenom = $row["Prenom"];
        $mail = $row["Email"];
        $id=$row["ID_Client"];
        $photo=$row["Photo"];

    }
?>
<div class="blocHeader">
    <div class="bloc1">

        <h1 class="titre">COMPTE CLIENT </h1>

                <div class="blocProfil">
                     <img class="photodeprofil" src="php/pic/<?php echo $photo ?>" alt="">
                    <div class="profildata", style="line-height:150%; margin-top:4%">
                        <p>NOM : <?php echo $nom; ?></p>
                        <p>PRENOM : <?php echo $prenom; ?></p>

                        <p>MAIL : <?php echo $mail; ?></p>
                        <p>CARTE ETUDIANTE : <?php echo $id; ?></p>
                        <p class="modifInfo"> MODIFIER INFORMATIONS </p>


                    </div>
                </div>
                <div class="option7", style="margin-bottom:3%; margin-top:0.5%">
                            <button><a href="./change_info_client.php">MODIFIER MES INFOS</a></button>
                            <button><a href="users.php">CHATROOM</a></button>
                            <button><a href="historique_reservation.php">HISTORIQUE DE MES RDV</a></button>
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
                    <a href="./Sport_Compet.php">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.php">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./rdv.php">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>
        <div class="boutonLOGOUT">
                     <button style="width:120% ; height:50%; font-size: 150%; margin-top:5%"><a href="php/logout.php?logout_id=<?php echo $id ?>" class="logout">LOG OUT</a></button>
                </div>
    </div>
</div>
<script src="javascript/recherche.js"></script>

</body>
</html>
