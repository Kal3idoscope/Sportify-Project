<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/client.css" type="text/css" />


<body>
<?php
$sql = mysqli_query($conn, "SELECT * FROM admin WHERE ID_Admin = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}
?>
<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre">COMPTE CLIENT <h1>
        <br>
                <div class="blocProfil">
                    <img class="photodeprofil" src="Images/mouhali.jpeg" alt="mouhali"/>
                    <div class="profildata">
                        <p>NOM :  </p>
                        <p>PRENOM : </p>
                         <p>ADRESSE :  </p>
                         <p>MAIL :  </p>
                         <p>CARTE ETUDIANTE :  </p>
                         <p class="modifInfo"> INFORMATIONS DE PAIEMENT </p>


                    </div>
                </div>
                <div class="option1">
                            <button>MODIFIER MES INFOS</button>
                            <button>PRENDRE UN RDV</button>
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
        <div class="chat">
            <button><a href="php/logout.php?logout_id=<?php echo $row['ID_Admin']; ?>" class="logout">LOG <br> OUT</a></button>
        </div>
    </div>
</div>
<div class="RDV">
    <p>RENDEZ-VOUS <br> à venir </p>
</div>

</body>
</html>
