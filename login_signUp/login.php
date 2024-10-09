<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_club_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['login-password'];

    // Prepare and execute the query to fetch the user data
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user's data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start the session
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            // Redirect to a logged-in area, e.g., dashboard.php
            header("Location: /sport_dashboard/sport.html");
            exit();
        } else {
            // Invalid password
            echo "Invalid password. Please try again.";
        }
    } else {
        // User not found
        echo "No user found with that username.";
    }
}

// Close connection
$conn->close();
?>
