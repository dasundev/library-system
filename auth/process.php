<?php
require_once "./../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['register'])) {
   // register
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['login'])) {
   // login
}

if (isset($_GET['delete'])) {
   // logout
}