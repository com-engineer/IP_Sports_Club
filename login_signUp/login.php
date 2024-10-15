<?php


session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_club_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['login-password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $user['email'];

            header("Location: ../sport_dashboard/sport.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
