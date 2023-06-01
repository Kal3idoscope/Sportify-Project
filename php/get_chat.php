<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    if ($_SESSION['user_type'] == 'client') {
        $sql = "SELECT * FROM communiquer LEFT JOIN client ON client.ID_Client = communiquer.Envoyeur
                WHERE (Envoyeur = {$outgoing_id} AND Destinataire = {$incoming_id})
                OR (Envoyeur = {$incoming_id} AND Destinataire = {$outgoing_id}) ORDER BY ID_Message ";
    } else {
        $sql = "SELECT * FROM communiquer LEFT JOIN coach ON coach.ID_Coach = communiquer.Envoyeur
                WHERE (Envoyeur = {$outgoing_id} AND Destinataire = {$incoming_id})
                OR (Envoyeur = {$incoming_id} AND Destinataire = {$outgoing_id}) ORDER BY ID_Message ";
    }

    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['Envoyeur'] === $outgoing_id){
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['Message'] .'</p>
                                </div>
                                </div>';
            }else{
                $output .= '<div class="chat incoming">
                                <img src="php/pic/'.$row['Photo'].'" alt="">
                                <div class="details">
                                    <p>'. $row['Message'] .'</p>
                                </div>
                                </div>';
            }
        }
    }else{
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
}else{
    header("location: ../login.php");
}

?>