<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION = [];

// If you want to destroy the session completely
session_destroy();

// Redirect to login page or home page
header('Location: ../Home/index.html');
exit();
?>
