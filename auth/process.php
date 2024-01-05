<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['register'])) {
   // Register
    $userId = $_POST['user_id'];
    $email = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (user_id, email, first_name, last_name, username, password) VALUES ('$userId', '$email', '$firstName', '$lastName', '$username', '$password')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "User registration successfully. You can login now!";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /auth/register.php");
}

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
 
     header("Location: /auth/user");
 }


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   try {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $database->query($sql);

        $row = $result->fetch_row();

        $hashedPassword = $row[5];

        $isPasswordVerified = password_verify($password, $hashedPassword);

        if($isPasswordVerified) {
                $_SESSION['username'] = $username;

                header("Location: /books");
        } else {
                $_SESSION['message'] = "Login failed.";
                $_SESSION['message_type'] = "danger";

                header("Location: /auth/login.php");
        }
   } catch (Exception $e) {
       $_SESSION['message'] = $e->getMessage();
       $_SESSION['message_type'] = "danger";

       header("Location: /auth/login.php");
   }
}

if (isset($_GET['logout'])) {
   unset($_SESSION['username']);
   header("Location: /auth/login.php");
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

    header("Location: /auth/user");
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

    header("Location: /auth/user");
}