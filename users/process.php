<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    // Register
     $userId = $_POST['user_id'];
     $email = $_POST['email'];
     $firstName = $_POST['first_name'];
     $lastName = $_POST['last_name'];
     $username = $_POST['username'];
     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
     $sql = "INSERT INTO user (user_id, email, first_name, last_name, username, password) VALUES ('$userId', '$email', '$firstName', '$lastName', '$username', '$password')";
 
     try {
         $database->query($sql);
 
         $_SESSION['message'] = "User added successfully.";
         $_SESSION['message_type'] = "success";
     } catch (Exception $e) {
         $_SESSION['message'] = $e->getMessage();
         $_SESSION['message_type'] = "danger";
     }
 
     header("Location: /users");
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $userId = $_POST['user_id'];
    $email = $_POST['email'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE user SET email = '$email', first_name = '$firstName', last_name = '$lastName', username = '$username', password = 'password' WHERE user_id = '$userId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "User updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /users");
}

if (isset($_GET['delete'])) {
    $userId = $_GET['userId'];

    $sql = "DELETE FROM user WHERE user_id = '$userId'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "User deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /users");
}