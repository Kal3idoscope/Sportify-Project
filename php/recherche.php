<?php
session_start();
include_once "config.php";

$term = $_GET['term'];

// Effectuer la requête pour rechercher les coachs par nom ou prénom
$sql = "SELECT * FROM coach WHERE Prenom LIKE '%$term%' OR Nom LIKE '%$term%' OR Sport LIKE '%$term%'";

$output = "";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_assoc($query)) {
        $output .= '<a href="FicheCoach.php?ID=' . $row['ID_Coach'] . '">
                    <div class="content">
                    <div class="details">
                        <span>' . $row['Prenom'] . " " . $row['Nom'] . '</span>
                    </div>
                    </div>
                </a>';
    }
} else {
    $output .= 'No user found related to your search term';
}
echo $output;


?>
