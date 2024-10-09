<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";  // Default username in XAMPP
$password = "";  // Default password for XAMPP (empty)
$dbname = "sports_club_database";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['signUp'])) {
    // Collect form data
    $fullname = $_POST['signup-name'];
    $email = $_POST['signup-email'];
    $username = $_POST['username'];
    $password = $_POST['signup-password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert user data into the users table
    $sql = "INSERT INTO users (fullname,username, email, password) VALUES ('$fullname','$username','$email' ,'$hashed_password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Start a session and log the user in
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        // Redirect to the login page or homepage
        header("Location: login.html");
    } else {
        // Handle errors if something goes wrong
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
