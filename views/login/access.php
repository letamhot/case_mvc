<?php
function accessIndex()
{
    // Initialize the session
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: views/login/login.php");
        exit;
    }
}
function accessView()
{
    // Initialize the session
    session_start();
    if (!($_SESSION['email'] == 'admin1@admin.com' && $_SESSION['password'] = 123123)) {
        header("location: ../login/login.php");
        exit;
    }
}
function adminView()
{
    session_start();
    if (!($_SESSION['email'] == 'admin1@admin.com' && !($_SESSION['password'] = password_verify($_SESSION["password"], '$2y$10$MjmOcqFGhsRcwkh4s/U5V.F4wlgCxd6Jo.EcdnC0HGpkk9sSC7NL6')))) {
        // Go home page
        header("location: ../login/login.php");
        exit;
    }
}