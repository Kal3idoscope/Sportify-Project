<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/admin.css" type="text/css" />
<link rel="stylesheet" href="styles/pagecoach.css" type="text/css" />
<link rel="stylesheet" href="styles/scrollmenu.css" type="text/css" />
    <script type="text/javascript">
        $("document").ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
    </script>

<body>
<div class="blocHeader">
    <div class="blocCoach">
        <h1 class="natation">  <br> NATATION</h1>
        <br>
        <div class="blocProfil">
            <img class="photodeprofil" src="Images/mouhali.jpeg" alt="mouhali"/>
            <div class="profildata2">
                <p>NOM :  </p>
                <p>PRENOM : </p>
                <p>BUREAU : </p>
                <p>TELEPHONE : </p>
                <p>MAIL :  </p>
            </div>
        </div> <br>
        <div class="option10">
            <button>PRENDRE RENDEZ-VOUS</button>
            <button>VOIR LE CV</button>
            <button>COMMUNIQUER</button>
        </div> <br>
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
            <a href="./rdv.php">RDV</a><br>
            <a href="./login.php">COMPTE</a><br>
        </div>
        <div class="calendrier">
            <div class="">CALENDRIER</div>
        </div>

    </div>
</div>
</div>

<div class="dates">
    <p>""</p>
</div>
</body>
</html>