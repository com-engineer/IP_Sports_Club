<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club Programs</title>
    <link rel="stylesheet" href="sport.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

    <!-- Navbar -->
    <header>
        <nav>
            <ul>
                <li><img src="../assets/images/club_logo.png" alt="Sports Club Banner">
                </li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
                <div class="user-section">
                    <p id="user">
                        <?php
                        // Start session and check if user is logged in
                         session_start();
                         if (isset($_SESSION['username'])) {
                              echo "Hi!! " . $_SESSION['username'];  // Display username from session
                         } else {
                             echo "Hi!! Guest";  // Default message if user not logged in
                         }
                         ?>
                    </p>
                    <a href="../User_dashboard/user_dashboard.html"><img id="logo" src="../assets/images/user_logo.jpeg" alt="User"></a>
                </div>
            </ul>
        </nav>
    </header>

    <!-- Welcome Section -->
    <section class="welcome">
        <h1>Welcome to our Sports Club!</h1>
        <p>Here’s your chance to get involved and stay active. Below you'll find a variety of sports displayed. Whether you're a seasoned player or a beginner looking to learn something new, we have a place for you. Dive into the sport you love, meet new friends, and stay fit!</p>
    </section>

    <section id="services">
        <h2>Our Services</h2>
        <div class="services-list">
            <div class="service-item">
                <img src="../assets/images/cricket.jpeg" alt="Cricket Club">
                <p>Cricket Club</p>
                <a href="../registration/registration.php?sport=Cricket"><button id="ProceedBtn" >Proceed</button></a>
            </div>
            <div class="service-item">
                <img src="../assets/images/football.jpeg" alt="Football">
                <p>Football</p>
                <a href="../registration/registration.php?sport=Football"><button id="ProceedBtn" >Proceed</button></a>

            </div>
            <div class="service-item">
                <img src="../assets/images/Batminton.jpeg" alt="Badminton">
                <p>Badminton</p>
                <a href="../registration/registration.php?sport=Badminton"><button id="ProceedBtn" >Proceed</button></a>

            </div>
            <div class="service-item">
                <img src="../assets/images/swimming.jpeg" alt="Swimming">
                <p>Swimming</p>
                <a href="../registration/registration.php?sport=Swimming"><button id="ProceedBtn" >Proceed</button></a>

            </div>
            <div class="service-item">
                <img src="../assets/images/chess.jpeg" alt="chess">
                <p>chess</p>

                <a href="../registration/registration.php?sport=chess"><button id="ProceedBtn" >Proceed</button></a>

            </div>
            <div class="service-item">
                <img src="../assets/images/carrom.jpeg" alt="carrom">
                <p>carrom</p>

                <a href="../registration/registration.php?sport=carrom"><button id="ProceedBtn" >Proceed</button></a>

            </div>
            <div class="service-item">
                <img src="../assets/images/bowling.jpeg" alt="bowling">
                <p>bowling</p>

                <a href="../registration/registration.php?sport=bowling"><button id="ProceedBtn" >Proceed</button></a>

            </div>
            <div class="service-item">
                <img src="../assets/images/table_tennis.jpeg" alt="table_tennis">
                <p>table_tennis</p>

                <a href="../registration/registration.php?sport=table_tennis"><button id="ProceedBtn" >Proceed</button></a>

            </div>
        </div>
    </section>
    <script src="scripts.js"></script>
</body>
</html>
