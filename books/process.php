<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $bookId = $_POST['book_id'];
    $bookName = $_POST['book_name'];
    $categoryId = $_POST['category_id'];

    $sql = "INSERT INTO book (book_id, book_name, category_id) VALUES ('$bookId', '$bookName', '$categoryId')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Book added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /books");
}