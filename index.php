<?php

session_start();

/**
 * Authenticated users will be redirected to the requested uri
 * and others will be redirected to the login page.
 */

// Check user session exists
if (! isset($_SESSION['username'])) {
    header('Location: /auth/login.php');
} else {
    header('Location: /books');
}