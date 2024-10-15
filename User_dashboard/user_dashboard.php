<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="user_dashboard.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../login_signUp/login.php');
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'sports_club_database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_SESSION['email'];

    $sql = "SELECT * FROM registrations WHERE email='$email'";
    $result = $conn->query($sql);

    $player_name = '';
    $birth_date = '';
    $address = '';
    $membership_type = '';
    $start_date = '';
    $duration = '';
    $skill_level = '';
    $training_time = '';
    $transaction_amount = '';


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $player_name = $user['player_name'];
        $birth_date = $user['birth_date'];
        $address = $user['address'];
        $membership_type = $user['membership_type'];
        $start_date = $user['start_date'];
        $duration = $user['duration'];
        $skill_level = $user['skill_level'];
        $training_time = $user['training_time'];
        $transaction_amount = $user['transaction_amount'];

    }

    $sql_enrollments = "SELECT sport_name, membership_type, duration, skill_level, training_time,transaction_amount FROM registrations WHERE email='$email'";
    $enrollment_result = $conn->query($sql_enrollments);
    
    $conn->close();
    ?>

    <header>
        <nav>
            <ul>
            <div id="profile">
                <li><img src="../assets/images/club_logo.png" alt="Sports Club Logo"></li>
               
                <li><a href="../sport_dashboard/sport.php">Enroll</a></li>
                <li><a href="logout.php">LogOut</a></li>
                </div>
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
                if ($enrollment_result->num_rows > 0) {
                    while ($enrollment = $enrollment_result->fetch_assoc()) {
                        echo "<p><strong>Sport Name:</strong> " . htmlspecialchars($enrollment['sport_name']) . "</p>";
                        echo "<p><strong>Membership Type:</strong> " . htmlspecialchars($enrollment['membership_type']) . "</p>";
                        echo "<p><strong>Duration:</strong> " . htmlspecialchars($enrollment['duration']) . "</p>";
                        echo "<p><strong>Skill Level:</strong> " . htmlspecialchars($enrollment['skill_level']) . "</p>";
                        echo "<p><strong>Training Time:</strong> " . htmlspecialchars($enrollment['training_time']) . "</p>";
                        echo "<p><strong>Amount Paid:</strong> " . htmlspecialchars($enrollment['transaction_amount']) . "</p>";

                        echo "<hr>";
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
