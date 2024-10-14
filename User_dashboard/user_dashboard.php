<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="user_dashboard.css">
</head>
<body>
    <!-- Start the session -->
    <?php
    session_start();
    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        header('Location: ../login_signUp/login.php');
        exit();
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'sports_club_database');

    // Check for database connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the email from the session to fetch user details
    $email = $_SESSION['email'];

    // Fetch user details from the database
    $sql = "SELECT * FROM registrations WHERE email='$email'";
    $result = $conn->query($sql);

    // Initialize variables to store user details
    $player_name = '';
    $birth_date = '';
    $address = '';
    $membership_type = '';
    $start_date = '';
    $duration = '';
    $skill_level = '';
    $training_time = '';

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        $player_name = $user['player_name'];
        $birth_date = $user['birth_date'];
        $address = $user['address'];
        $membership_type = $user['membership_type'];
        $start_date = $user['start_date'];
        $duration = $user['duration'];
        $skill_level = $user['skill_level'];
        $training_time = $user['training_time'];
    }

    // Fetch all sports enrollments for the user
    $sql_enrollments = "SELECT sport_name, membership_type, duration, skill_level, training_time FROM registrations WHERE email='$email'";
    $enrollment_result = $conn->query($sql_enrollments);
    
    // Close the database connection
    $conn->close();
    ?>

    <!-- Navbar -->
    <header>
        <nav>
            <ul>
                <li><img src="../assets/images/club_logo.png" alt="Sports Club Logo"></li>
                <li><a href="../sport_dashboard/sport.php">Enroll</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </nav>
    </header>

    <section class="dashboard">
        <h1>Welcome, <?php echo htmlspecialchars($player_name); ?>!</h1>

        <div class="profile-details">
            <h2>Profile Details</h2>
            <div class="profile-card">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($player_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Birth Date:</strong> <?php echo htmlspecialchars($birth_date); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
            </div>
        </div>

        <div class="membership-details">
            <h2>Membership Details</h2>
            <div class="membership-card">
                <h3>Your Enrollments:</h3>
                <?php
                // Check if there are any enrollments
                if ($enrollment_result->num_rows > 0) {
                    while ($enrollment = $enrollment_result->fetch_assoc()) {
                        echo "<p><strong>Sport Name:</strong> " . htmlspecialchars($enrollment['sport_name']) . "</p>";
                        echo "<p><strong>Membership Type:</strong> " . htmlspecialchars($enrollment['membership_type']) . "</p>";
                        echo "<p><strong>Duration:</strong> " . htmlspecialchars($enrollment['duration']) . "</p>";
                        echo "<p><strong>Skill Level:</strong> " . htmlspecialchars($enrollment['skill_level']) . "</p>";
                        echo "<p><strong>Training Time:</strong> " . htmlspecialchars($enrollment['training_time']) . "</p>";
                        echo "<hr>"; // Optional: adds a line separator between different enrollments
                    }
                } else {
                    echo "<p>No enrollments found.</p>";
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
