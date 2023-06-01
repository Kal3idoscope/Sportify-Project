<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
if ($_SESSION['user_type'] == 'client') {
    $sql = "SELECT * FROM coach ORDER BY ID_Coach DESC";
} else {
    $sql = "SELECT * FROM client ORDER BY ID_Client DESC";
}
$query = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($query) == 0){
    $output .= "No users are available to chat";
}elseif(mysqli_num_rows($query) > 0){
    include_once "data.php";
}
echo $output;
?>