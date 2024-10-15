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

if(isset($_POST['signUp'])) {
    $fullname = $_POST['signup-name'];
    $email = $_POST['signup-email'];
    $username = $_POST['username'];
    $password = $_POST['signup-password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname,username, email, password) VALUES ('$fullname','$username','$email' ,'$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header("Location: login.html");
    } else {
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
