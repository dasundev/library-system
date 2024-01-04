<?php
require_once "./../config.php";

session_start();

$_SESSION['message'] = "User registration successfully.";
$_SESSION['message_type'] = "success";

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


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['login'])) {
   // Login
   $userId = $_POST['user_id'];
   $email = $_POST['email'];
   $firstName = $_POST['firstname'];
   $lastName = $_POST['lastname'];
   $username = $_POST['username'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   $sql = "UPDATE user SET user_id = '$userID', email = '$email', firstname = '$firstName', lastname = '$lastName', username = '$username' , password = '$password'
    WHERE fuser_id = '$fuserID'";

   try {
       $database->query($sql);

       $_SESSION['message'] = "User updated successfully.";
       $_SESSION['message_type'] = "success";
   } catch (Exception $e) {
       $_SESSION['message'] = $e->getMessage();
       $_SESSION['message_type'] = "danger";
   }

   header("Location: /auth");
}

if (isset($_GET['delete'])) {
   // Logout
   $userID = $_GET['userId'];

   $sql = "DELETE FROM user WHERE user_id = '$userID'";

   try {
       $database->query($sql);

       $_SESSION['message'] = "User deleted successfully.";
       $_SESSION['message_type'] = "success";
   } catch (Exception $e) {
       $_SESSION['message'] = $e->getMessage();
       $_SESSION['message_type'] = "danger";
   }

   header("Location: /auth");
}