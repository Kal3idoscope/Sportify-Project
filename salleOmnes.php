<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>

  <link rel="stylesheet" href="styles/general.css" type="text/css" />
  <link rel="stylesheet" href="styles/salleOmnes.css" type="text/css" />
  <link rel="stylesheet" href="styles/scrollmenu.css" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;500&family=Shrikhand&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    $("document").ready(function() {
      $("#flip").click(function() {
        $("#panel").toggle("slow");
      });

      $(".quoi a").click(function(event) {
        event.preventDefault();
        $(".overlay").fadeIn("slow");
      });

      $(".overlay").click(function(event) {
        if ($(event.target).hasClass("overlay")) {
          $(".overlay").fadeOut("slow");
        }
      });
    });

  </script>
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
</head>
<body>
<div class="blocHeader">
  <div class="bloc1">
    <img style="margin-top:1.5%" src="Images/sportifylogo 1.png"/>
    <img class="image1" src="Images/sportifyphoto.png" alt="Sportify photo"/>
    <h1 class = "consult">SALLE DE SPORT <br> OMNES </h1>

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
      <a href="./index.html">ACCUEIL</a> <br>
      <div class="dropdown">
        <div onclick="myFunction()" class="dropbtn">TOUT PARCOURIR</div>
        <div id="myDropdown" class="dropdown-content">
          <a href="Activites_Sportives.php">ACTIVITÉS SPORTIVES</a>
          <a href="Sport_Compet.php">SPORTS DE COMPÉTITION</a>
          <a href="./salleOmnes.php">SALLES DE SPORT OMNES</a>
        </div>
      </div>
      <a href="./rdv.php">RDV</a> <br>
      <a href="./login.php">COMPTE</a> <br>
    </div>
    <div class="fleche">
      <img src="Images/flechepho.png" alt="flechePho"/>
    </div>
  </div>
</div>
<div  class="centré">
  <p style="text-align:center">
    Dans une déco inspirée des années retro, Salle Omnes vous propose une surface de plusieurs centaines de mètres carrés. Le club propose un espace fitness, des cours collectifs ainsi que des consultations privatives. Que ce soit en solo ou en groupe, nos coachs vous ferons progresser </p>
</div>
<hr>
<br> <br> <br>
<div class="bloc6">
  <div class="bloc6-1">
  </div>
  <div class="options">
    <div class="blocblur3">
      <p class ="quand"> QUAND? <br> <br> Du lundi au samedi <br> 9h00-22h00</p>
      <p class ="ou"> OÙ? <br> <br> 6 rue Sextius Michel <br> 75015, Paris en SC402</p>
      <p class ="qui"> <a href="affichage_coach.php">QUI? <br> <br> Liste du personnel</a></p>
      <p class ="quoi"> <a href="#">QUOI? <br> <br> Voir le matériel</a> </p>
    </div>
  </div>
  <div class="options">
  <div class="blocblur3", style="margin-top:-3%">
    <div class="centré">
    <p style="text-align:center">REGLES SUR L'UTILISATION DES MACHINES CHEZ SPORTIFY</p>
    </div>
    <div class="centré">
      <p style="text-align:center">Lorsque vous vous rendez dans une salle de sport, il est essentiel de connaître et de respecter
      les règles d'utilisation des machines pour garantir votre sécurité et celle des autres.
      Téléchargez la fiche des règles <a href="Images/Regles_sportify.pdf" download><span class="souligne">ici</span></a> !"</p>
    </div>
  </div>
  </div>
  <div class="bloc6-2">
  </div>
  <button style="margin-left:41%; height:100%; width:20%; font-size:200%; margin-top:-5%">  <a href="ficheCoach.php?ID=99" >JE SOUHAITE VISITER LA SALLE </button>
</div>

<div class="citation">
  <p>
    "Retrouvez notre programme de nutrition <a href="Images/NutritionSportive.pdf" download><span class="souligne">ici</span></a> !"
  </p>
</div>
<div class="overlay">
  <img src="Images/listeMat.png" alt="mat" />
</div>
<div class="footer">
  <div class="bloc7">
    <h1 class="titleFooter">Contactez-nous</h1>
    <div class="maps">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.361323803101!2d2.286033275703404!3d48.851319971331215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b461cfb0b%3A0x826182e3c9eae061!2s6%20Rue%20Sextius%20Michel%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1685440191786!5m2!1sfr!2sfr"
              width="650" height="495" style="border-radius:21px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <div class="bloc8">
    <div class="RS">
      <p><img src="Images/insta.png" alt="insta"/>  INSTAGRAM : @ecoleece</p>
      <p><img src="Images/facebook.png"/>   FACEBOOK : ECE Paris</p>
    </div>
    <div class="Contact">
      <p><img src="Images/envelope.png"/>   MAIL : salle.omnes@gmail.com</p>
      <p><img src="Images/phone.png"/>  TELEPHONE : 01 67 28 45 29</p>
      <p><img src="Images/marker.png"/>   ADRESSE : 6 rue Sextius Michel 75015</p>
      <p>PAYS : FRANCE</p>
    </div>
  </div>
</div>
