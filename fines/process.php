<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $fineID = $_POST['fine_id'];
    $memberID = $_POST['member_id'];
    $bookID = $_POST['book_id'];
    $fineAmount = $_POST['amount'];
    $date = $_POST['date'];

    $sql = "INSERT INTO fine (fine_id, member_id, book_id, fine_amount, fine_date_modified) VALUES ('$fineID', '$memberID', '$bookID', '$fineAmount', '$date')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Fine added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /fines");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $fineID = $_POST['fine_id'];
    $memberID = $_POST['member_id'];
    $bookID = $_POST['book_id'];
    $fineAmount = $_POST['amount'];
    $date = $_POST['date'];

    $sql = "UPDATE fine SET member_id = '$memberID', book_id = '$bookID', fine_amount = '$fineAmount', fine_date_modified = '$date' WHERE fine_id = '$fineID'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Fine updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /fines");
}

if (isset($_GET['delete'])) {
    $fineID = $_GET['fineId'];

    $sql = "DELETE FROM fine WHERE fine_id = '$fineID'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Fine deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /fines");
}