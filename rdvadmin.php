<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/admin.css" type="text/css" />



<body>
<?php
$sql = mysqli_query($conn, "SELECT * FROM admin WHERE ID_Admin = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}
?>

<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre" style="padding:10%; line-height:190%">VOUS ETES ADMINISTRATEUR VOUS N'AVEZ PAS DE RENDEZ-VOUS <h1>
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
             <button style="width:100% ; height:95%; font-size: 200%"><a href="php/logout.php?logout_id=<?php echo $row['ID_Admin']; ?>" class="logout">LOG OUT</a></button>
        </div>
    </div>
</div>
<script src="javascript/recherche.js"></script>
</body>
</html>
