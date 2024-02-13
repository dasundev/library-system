<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $memberID = $_POST['member_id'];
    $fName = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $bday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = "INSERT INTO member (member_id, first_name, last_name,birthday,email) VALUES ('$memberID', '$fName', '$lname' , '$bday','$email' )";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Member added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /members");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $memberID = $_POST['member_id'];
    $fName = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $bday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = "UPDATE member SET member_id = '$memberID', first_name = '$fName', last_name = '$lname', birthday = '$bday', email = '$email'  WHERE member_id = '$memberID'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Member updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /members");
}

if (isset($_GET['delete'])) {
    $MemberID = $_GET['member_id'];

    $sql = "DELETE FROM member WHERE member_id = '$MemberID'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Member deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /members");
}