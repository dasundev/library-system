<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $borrow_Id = $_POST['borrow_id'];
    $book_Id = $_POST['book_id'];
    $member_Id = $_POST['member_id'];
    $borrow_Status = $_POST['borrow_status'];
    $borrower_Date = $_POST['borrower_date_modified'];

    $sql = "INSERT INTO bookborrower (borrow_id,book_id,member_id,borrow_status,borrower_date_modified) VALUES ('$borrow_Id', '$book_Id', '$member_Id','$borrow_Status','$borrower_Date')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Borrowed-Book added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /book-borrowers");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $borrow_Id = $_POST['borrow_id'];
    $book_Id = $_POST['book_id'];
    $member_Id = $_POST['member_id'];
    $borrow_Status = $_POST['borrow_status'];
    $borrower_Date = $_POST['borrower_date_modified'];

    $sql = "UPDATE bookborrower SET book_id = '$book_Id', member_id = '$member_Id', borrow_status ='$borrow_Status', borrower_date_modified ='$borrower_Date' WHERE borrow_id = '$borrow_Id'";
    
    try {
        $database->query($sql);

        $_SESSION['message'] = "Borrowed-Book updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /book-borrowers");
}

if (isset($_GET['delete'])) {
    $borrow_Id = $_GET['borrow_Id'];

    $sql = "DELETE FROM bookborrower WHERE borrow_id = '$borrow_Id'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Borrowed-Book deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /book-borrowers");
}