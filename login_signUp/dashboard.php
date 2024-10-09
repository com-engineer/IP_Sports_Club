<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}

echo "Welcome " . $_SESSION['username'];
?>

<a href="logout.php">Logout</a>
