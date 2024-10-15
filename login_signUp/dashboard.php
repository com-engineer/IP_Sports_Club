<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}

echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
echo "<p>This is your dashboard.</p>";
echo "<p><a href='logout.php'>Logout</a></p>";
?>
