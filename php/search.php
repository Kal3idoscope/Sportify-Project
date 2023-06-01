<?php
session_start();
include_once "config.php";

$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

if ($_SESSION['user_type'] == 'client') {
    $sql = "SELECT * FROM coach WHERE (Prenom LIKE '%{$searchTerm}%' OR Nom LIKE '%{$searchTerm}%') ";
} else {
    $sql = "SELECT * FROM client WHERE (Prenom LIKE '%{$searchTerm}%' OR Nom LIKE '%{$searchTerm}%') ";
}
$output = "";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    include_once "data.php";
} else {
    $output .= 'No user found related to your search term';
}
echo $output;
?>