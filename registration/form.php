<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login_signUp/login.php');
    exit();
}
$sport = isset($_GET['sport']) ? $_GET['sport'] : '';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'sports_club_database');

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // session_start();  // Start session if not already started
    $email = $_SESSION['email'];  // Assuming email is stored in the session
    $player_name = $_POST['playerName'];
    $birth_date = $_POST['birthDate'];
    $address = $_POST['address'];
    $membership_type = $_POST['membershipType'];
    $duration = $_POST['Duration'];
    $skill_level = $_POST['Skill-level'];
    $training_time = $_POST['trainingTime'];
    $sport = $_POST['sport'];  // Hidden input for sport name
    $start_date = $_POST['startDate'];  // Capture start date from form

    // Insert form data into the registrations table, including the start date
    $sql = "INSERT INTO registrations (email, sport_name, player_name, birth_date, address, membership_type, duration, skill_level, training_time, start_date)
            VALUES ('$email', '$sport', '$player_name', '$birth_date', '$address', '$membership_type', '$duration', '$skill_level', '$training_time', '$start_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='../User_dashboard/user_dashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
