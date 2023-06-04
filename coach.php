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


    $requete = "SELECT * FROM coach WHERE ID_Coach = {$_SESSION['unique_id']}";
    $resultat = $conn->query($requete);


    // Tableau de rendez-vous pour chaque jour
    $admin = array();
    while ($row = $resultat->fetch_assoc()) {
        $bur= $row["Bureau"];
        $tel = $row["Telephone"];

        $nom = $row["Nom"];
        $prenom = $row["Prenom"];
        $mail = $row["Email"];
        $id=$row["ID_Coach"];
        $photo=$row["Photo"];
    }
 
?>
<div class="blocHeader">
    <div class="bloc1">
        <h1 class="titre1">COMPTE COACH <h1>

                <div class="blocProfil">
                    <img class="photodeprofil" src="php/pic/<?php echo $photo ?>" alt="">
                                        <div class="profildata">
                                            <p>NOM : <?php echo $nom; ?></p>
                                            <p>PRENOM : <?php echo $prenom; ?></p>

                                            <p>MAIL : <?php echo $mail; ?></p>



                    </div>
                </div>
                <div class="option7 ">
                            <button><a href="./change_info_coach.php">MODIFIER MES INFOS</a></button>
                            <button><a href="users.php">CHATROOM</a></button>

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
            <button style="width:115% ; font-size: 220%; margin-top:8%" ><a href="php/logout.php?logout_id=<?php echo $id ?>" class="logout">LOG OUT</a></button>
        </div>
    </div>
</div>

<div class="option9">

<div class="dispo", style ="height : 150%">
<p> Mes futurs rendez-vous <br> <br> <p>
</div>

</div>
<script src="javascript/recherche.js"></script>
</body>
</html>
