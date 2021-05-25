<?php
session_start();
include('../Includes/dbconn.php');
if (isset($_SESSION['user_signin']))
        header('location:../index.php');
extract($_POST);
//When Login Request Comes
if ($_POST['type'] == 1) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_email`='$email' AND `user_password`='$password'");
        if (mysqli_num_rows($check) > 0) {
                $_SESSION['email'] = $email;
                $_SESSION["user_signin"] = true;
                echo json_encode(array("statusCode" => 200));
        } else {
                echo json_encode(array("statusCode" => 201));
        }
        mysqli_close($conn);
}
