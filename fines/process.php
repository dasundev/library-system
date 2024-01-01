<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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