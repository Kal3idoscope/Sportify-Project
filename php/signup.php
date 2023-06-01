<?php
session_start();
include_once "config.php";
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}' UNION SELECT * FROM client WHERE email = '{$email}' UNION SELECT * FROM coach WHERE email = '{$email}'");
        //$sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
        $sql_client = mysqli_query($conn, "SELECT * FROM client WHERE email = '{$email}'");
        //$sql_coach = mysqli_query($conn, "SELECT * FROM coach WHERE email = '{$email}'");
        if (mysqli_num_rows($sql_client) > 0 ) {
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
                            $status = "Active now";
                            $encrypt_pass = md5($password);
                           /*$insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$prenom}','{$nom}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");*/
                            /*if (mysqli_num_rows($sql_admin) > 0) {
                                $insert_query = mysqli_query($conn, "INSERT INTO admin (ID_admin , Nom, Prenom, Email, Pass, Photo)
                            VALUES ('{$ran_id}', '{$nom}', '{$prenom}', '{$email}', '{$encrypt_pass}', '{$new_img_name}')");
                            } elseif (mysqli_num_rows($sql_client) > 0) {
                                $insert_query = mysqli_query($conn, "INSERT INTO client (ID_Coach , Nom, Prenom, Email, Pass, Photo)
                            VALUES ('{$ran_id}', '{$nom}', '{$prenom}', '{$email}', '{$encrypt_pass}', '{$new_img_name}')");
                            } elseif (mysqli_num_rows($sql_coach) > 0) {
                                $insert_query = mysqli_query($conn, "INSERT INTO coach (ID_Client , Nom, Prenom, Email, Pass, Photo)
                            VALUES ('{$ran_id}', '{$nom}', '{$prenom}', '{$email}', '{$encrypt_pass}', '{$new_img_name}')");
                            }*/

                            /*if ($insert_query) {
                                $select_sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
                                $select_sql_client = mysqli_query($conn, "SELECT * FROM client WHERE email = '{$email}'");
                                $select_sql_coach = mysqli_query($conn, "SELECT * FROM coach WHERE email = '{$email}'");
                                if (mysqli_num_rows($select_sql_admin) > 0) {
                                    $result = mysqli_fetch_assoc($select_sql_admin);
                                    $_SESSION['unique_id'] = $result['ID_Admin'];
                                    echo "success";
                                } else if (mysqli_num_rows($select_sql_client) > 0){
                                    $result = mysqli_fetch_assoc($select_sql_client);
                                    $_SESSION['unique_id'] = $result['ID_Client'];
                                    echo "success";
                                } else if (mysqli_num_rows($select_sql_coach) > 0){
                                    $result = mysqli_fetch_assoc($select_sql_coach);
                                    $_SESSION['unique_id'] = $result['ID_C'];
                                    echo "success";
                                } else {
                                    echo "This email address not Exist!";
                                }
                            } else {
                                echo "Something went wrong. Please try again!";
                            }*/

                            $insert_query = mysqli_query($conn, "INSERT INTO client (ID_Client , Nom, Prenom, Email, Pass, Photo, Status)
                            VALUES ('$ran_id', '$nom', '$prenom', '$email', '$encrypt_pass', '$new_img_name', '$status')");
                            echo $insert_query;
                            if ($insert_query) {
                                $select_sql_client = mysqli_query($conn, "SELECT * FROM client WHERE Email = '{$email}'");

                                if (mysqli_num_rows($select_sql_client) > 0){
                                    $result = mysqli_fetch_assoc($select_sql_client);
                                    $_SESSION['unique_id'] = $result['ID_Client'];
                                    $_SESSION['user_type'] = 'client';
                                    echo "success";
                                    header("location: ../client.php");
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
        header("location: ../signup.php");
    }
} else {
    echo "All input fields are required!";
    header("location: ../signup.php");
}
?>