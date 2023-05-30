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
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First name" required>
                </div>
                <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last name" required>
                </div>
            </div>
            <div class="field input">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter new password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>Select Image</label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Continue to Chat">
            </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
</div>

<script src="javascript/show_hide_mdp.js"></script>
<script src="javascript/signup.js"></script>

</body>
</html>
