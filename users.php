<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
if($_SESSION['user_type'] == 'admin'){
    header("location: admin.php");
}
?>

<?php include_once "header.php"; ?>
<link rel="stylesheet" href="styles/chatroom.css">
<body>
<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <?php
                if($_SESSION['user_type'] == 'client'){
                    $sql = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client = {$_SESSION['unique_id']}");
                    $id = "ID_Client";
                } else {
                    $sql = mysqli_query($conn, "SELECT * FROM coach WHERE ID_Coach = {$_SESSION['unique_id']}");
                    $id = "ID_Coach";
                }
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <img src="php/pic/<?php echo $row['Photo']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['Prenom']. " " . $row['Nom'] ?></span>
                    <p><?php echo $row['Status']; ?></p>
                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row[$id]; ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
    </section>
</div>

<script src="javascript/users.js"></script>

</body>
</html>
