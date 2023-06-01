<?php
while($row = mysqli_fetch_assoc($query)){
    if ($_SESSION['user_type'] == 'client') {
        $sql2 = "SELECT * FROM communiquer WHERE (Destinataire = {$row['ID_Coach']}
                OR Envoyeur = {$row['ID_Coach']}) AND (Envoyeur = {$outgoing_id} 
                OR Destinataire = {$outgoing_id}) ORDER BY ID_Message  DESC LIMIT 1";
    } else {
        $sql2 = "SELECT * FROM communiquer WHERE (Destinataire = {$row['ID_Client']}
                OR Envoyeur = {$row['ID_Client']}) AND (Envoyeur = {$outgoing_id} 
                OR Destinataire = {$outgoing_id}) ORDER BY ID_Message  DESC LIMIT 1";
    }

    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['Message'] : $result ="No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if(isset($row2['Envoyeur'])){
        ($outgoing_id == $row2['Envoyeur']) ? $you = "You: " : $you = "";
    }else{
        $you = "";
    }
    ($row['Status'] == "Offline now") ? $offline = "offline" : $offline = "";
    if ($_SESSION['user_type'] == 'client') {
        ($outgoing_id == $row['ID_Coach']) ? $hid_me = "hide" : $hid_me = "";
        $output .= '<a href="chat.php?user_id='. $row['ID_Coach'] .'">
                    <div class="content">
                    <img src="php/pic/'. $row['Photo'] .'" alt="">
                    <div class="details">
                        <span>'. $row['Prenom']. " " . $row['Nom'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    } else {
        ($outgoing_id == $row['ID_Client']) ? $hid_me = "hide" : $hid_me = "";
        $output .= '<a href="chat.php?user_id='. $row['ID_Client'] .'">
                    <div class="content">
                    <img src="php/pic/'. $row['Photo'] .'" alt="">
                    <div class="details">
                        <span>'. $row['Prenom']. " " . $row['Nom'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }

}
?>