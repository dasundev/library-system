<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['create'])) {
    $category_id = $_POST['category_id'];
    $category_Name = $_POST['category_Name'];
    $date_modified = $_POST['date_modified'];
    

    $sql = "INSERT INTO bookcategory (category_id,category_Name,date_modified) VALUES ('$category_id', '$category_Name','$date_modified')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Book category added successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /categories");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['update'])) {
    $category_id = $_POST['category_id'];
    $category_Name = $_POST['category_Name'];
    $date_modified = $_POST['date_modified'];

    $sql = "UPDATE bookcategory SET category_Name = '$category_Name',date_modified = '$date_modified' WHERE category_id = '$category_id'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Book category updated successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /categories");
}

if (isset($_GET['delete'])) {
    $category_id = $_GET['category_id'];

    $sql = "DELETE FROM bookcategory WHERE category_id = '$category_id'";

    try {
        $database->query($sql);

        $_SESSION['message'] = "Category deleted successfully.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";
    }

    header("Location: /categories");
}