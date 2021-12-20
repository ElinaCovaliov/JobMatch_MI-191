<?php

// Initialize the session
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("location: login.html");
}
