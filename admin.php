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
<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre">ADMINISTRATEUR <h1>
        <br>
                <div class="blocProfil">
                    <img class="photodeprofil" src="Images/mouhali.jpeg" alt="mouhali"/>
                    <div class="profildata">
                        <p>NOM :  </p>
                        <p>PRENOM : </p>
                         <p>MAIL :  </p>
                         <p class="modifInfo"> Modifier mes informations </p>
                    </div>
                </div>
                <div class="option1">
                            <button>LISTE DES COACHS</button>
                            <button>ENLEVER UN COACH</button>
                            <button>AJOUTER UN COACH</button>
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
        <div class="chat">
             <button>LOG <br> OUT</button>
        </div>
    </div>
</div>

</body>
</html>
