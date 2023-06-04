<?php
session_start();
include_once "config.php";
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
$bureau = mysqli_real_escape_string($conn, $_POST['bureau']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$sport = mysqli_real_escape_string($conn, $_POST['sport']);

if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($password) && !empty($sport)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}' UNION SELECT * FROM client WHERE email = '{$email}' UNION SELECT * FROM coach WHERE email = '{$email}'");
        $sql_coach = mysqli_query($conn, "SELECT * FROM coach WHERE Email = '{$email}'");
        if (mysqli_num_rows($sql_coach) > 0 ) {
            echo "$email - This email already exist!";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, "pic/" . $new_img_name)) {
                            $ran_id = rand(time(), 100000000);
                            $status = "Offline now";
                            $encrypt_pass = $password;
                            $insert_query = mysqli_query($conn, "INSERT INTO coach (ID_Coach , Nom, Prenom, Email, Pass, Photo, Sport, Status, Telephone, Bureau)
                            VALUES ('$ran_id', '$nom', '$prenom', '$email', '$encrypt_pass', '$new_img_name', '$sport' ,'$status', '$telephone', '$bureau')");
                            //echo $insert_query;
                            if ($insert_query) {
                                $select_sql_client = mysqli_query($conn, "SELECT * FROM coach WHERE Email = '{$email}'");
                                if (mysqli_num_rows($select_sql_client) > 0){
                                    $result = mysqli_fetch_assoc($select_sql_client);
                                    echo "success";
                                    header("location: ../admin.php");
                                } else {
                                    echo "This email address not Exist!";
                                }
                            } else {
                                echo "Something went wrong. Please try again!";
                            }
                        }
                    } else {
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                } else {
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }
        }
    } else {
        echo "$email is not a valid email!";
        header("location: ../ajout_coach.php");
    }
} else {
    echo "All input fields are required!";
    header("location: ../ajout_coach.php");
}
?>