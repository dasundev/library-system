<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['register'])) {
   // register
    $userId = $_POST['user_id'];
    $email = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (user_id, email, firstname, lastname, username, password) VALUES ('$userId', '$email', '$firstName', 
    '$lastName', '$username', '$password')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "User registration successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /auth/login");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['login'])) {
   // login
}

if (isset($_GET['delete'])) {
   // logout
}