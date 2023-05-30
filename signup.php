<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];
    $admin_query = mysqli_query($conn, "SELECT * FROM admin WHERE ID_admin = '{$unique_id}'");
    $client_query = mysqli_query($conn, "SELECT * FROM client WHERE ID_Client = '{$unique_id}'");
    $coach_query = mysqli_query($conn, "SELECT * FROM coach WHERE ID_C = '{$unique_id}'");

    if (mysqli_num_rows($admin_query) > 0) {
        $_SESSION['user_type'] = 'admin';
        header("location: admin.php");
    } elseif (mysqli_num_rows($client_query) > 0) {
        $_SESSION['user_type'] = 'client';
        header("location: client.php");
    } elseif (mysqli_num_rows($coach_query) > 0) {
        $_SESSION['user_type'] = 'coach';
        header("location: coach.php");
    }
}
?>

<?php include_once "header.php"; ?>
<body>
<div class="wrapper">
    <section class="form signup">
        <header>wsh</header>
        <form action="php/signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label>Prenom</label>
                    <input type="text" name="prenom" placeholder="Prenom" required>
                </div>
                <div class="field input">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="Nom" required>
                </div>
            </div>
            <div class="field input">
                <label>Adresse Email</label>
                <input type="text" name="email" placeholder="Saisir votre email" required>
            </div>
            <div class="field input">
                <label>Mot de Passe</label>
                <input type="password" name="password" placeholder="Enter new password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>Selectionner une image</label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="S'inscrire">
            </div>
        </form>
        <div class="link">Déjà inscrit? <a href="login.php">Se connecter</a></div>
    </section>
</div>

<script src="javascript/show_hide_mdp.js"></script>
<script src="javascript/signup.js"></script>

</body>
</html>
