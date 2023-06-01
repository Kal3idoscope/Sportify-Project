<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/chatroom.css">
<body>
<div class="wrapper">
    <section class="chat-area">
        <header>
            <?php
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            if ($_SESSION['user_type'] == 'client') {
                $sql = mysqli_query($conn, "SELECT * FROM coach WHERE ID_Coach = {$user_id}");
            } else {
                $sql = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client = {$user_id}");
            }

            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
            }else{
                echo "Une erreur est apparue";
                header("location: users.php");
            }
            ?>
            <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="php/pic/<?php echo $row['Photo']; ?>" alt="">
            <div class="details">
                <span><?php echo $row['Prenom']. " " . $row['Nom'] ?></span>
                <p><?php echo $row['Status']; ?></p>
            </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="./php/insert_chat.php" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>

<script src="javascript/chat.js"></script>

</body>
</html>
