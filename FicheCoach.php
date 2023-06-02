<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/Fichecoach.css" type="text/css" />
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
    $ID = $_GET['ID'];
     $requete = "SELECT * FROM coach WHERE ID_Coach = $ID";
    $resultat = $conn->query($requete);

    $Deporte = array();

    while ($row = $resultat->fetch_assoc()) {
        $sport = $row["ID_sport"];
        $Nom = $row["Nom"];
        $Prenom = $row["Prenom"];
        $Mail= $row["Email"];
        }
?>
<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre"><?php echo $sport ?> <h1>
        <br>
                <div class="blocProfil">
                    <img class="photodeprofil" src="Images/mouhali.jpeg" alt="mouhali"/>
                    <div class="profildata">
                        <p>NOM : <?php echo $Nom ?> </p>
                        <p>PRENOM : <?php echo $Prenom ?> </p>
                        <p>MAIL : <?php echo $Mail ?> </p>


                    </div>
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
                    <a href="./Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
                    <a href="./Sport_Compet.html">SPORTS DE COMPÉTITION</a>
                    <a href="./salleOmnes.html">SALLES DE SPORT OMNES</a>
                </div>
            </div>
            <a href="./RDV.html">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>

    </div>
</div>



</body>
</html>
