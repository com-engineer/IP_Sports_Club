<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

// If logged in, display the dashboard
echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
echo "<p>This is your dashboard.</p>";
echo "<p><a href='logout.php'>Logout</a></p>";
?>
