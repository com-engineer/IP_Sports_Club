<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
<?php
if (isset($_GET['sport'])) {
    $sport = htmlspecialchars($_GET['sport']); 
} else {
    $sport = 'Unknown Sport';
}

?>
    <header>
        <nav>
            <ul>
                <li><img src="../assets/images/club_logo.png" alt="Sports Club Banner">
                </li>
                <div class="user-section">
                    <p id="user">
                        <?php
                         session_start();
                         if (isset($_SESSION['username'])) {
                              echo "Hi!! " . $_SESSION['username']; 
                         } else {
                             echo "Hi!! Guest";  
                         }
                         ?>
                    </p>
                    <a href="../User_dashboard/user_dashboard.html"><img id="logo" src="../assets/images/user_logo.jpeg" alt="User"></a>
                </div>
                
            </ul>
        </nav>
    </header>

   
    <section class="registration-form">
        <h1>Membership Form</h1>
        <form id="RegistrationForm" action="form.php" method="post">
        <input type="hidden" name="sport" value="<?php echo $sport; ?>">
        <input type="hidden" id="payment_id" name="payment_id">
    <input type="hidden" id="payment_amount" name="payment_amount">

        <label for="playerName">Player Name*</label>
            <input type="text" id="playerName" name="playerName" required>


            <label for="birthDate">Player Birth Date*</label>
            <input type="date" id="birthDate" name="birthDate" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" cols="50" placeholder="Enter your address here..."></textarea>
            <section class="Membership-Details">
            <h2 >Membership Details</h2>
                 
            <label for="membershipType">Membership Type*</label><br>
            <select id="membershipType" name="membershipType">
                <option value="Individual">Individual</option>
                <option value="Family">Family</option>
                <option value="Premium">Premium</option>
                <option value="Student">Student</option>
                <option value="Youth">Youth</option>
                <option value="Senior">Senior</option>

            </select>
            <label for="startDate">Preferred Start Date*</label>
            <input type="date" id="startDate" name="startDate" required>
            <label >Duration*</label>
            <select id="Duration" name="Duration">
                <option value="Monthly">Monthly</option>
                <option value="Quarterly">Quarterly</option>
                <option value="Annually">Annually</option>
                <option value="Lifetime">Lifetime</option>
                <option value="Seasonal">Seasonal</option>
            </select>
            <label >Skill-level</label>
            <select id="Skill-level" name="Skill-level">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
            <label for="trainingTime">Preferred Training Time*</label>
            <input type="time" id="trainingTime" name="trainingTime" required>
            
           
        <h2>Proceed for Payment</h2>
        <button id="rzp-button1">Pay ₹500</button>

        </form>
    </section> 
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
document.getElementById('rzp-button1').onclick = function(e){
    e.preventDefault();

    var options = {
        "key": "rzp_test_GcZZFDPP0jHtC4", 
        "amount": "50000", 
        "currency": "INR",
        "name": "Sports Club",
        "description": "Membership Registration Fee",
        "image": "https://your-logo-url.com", 
        "handler": function (response){
            alert("Payment successful. Payment ID: " + response.razorpay_payment_id);

    
            document.getElementById('payment_amount').value = 500;
            document.getElementById('RegistrationForm').submit(); 
        },
        "prefill": {
            "name": "<?php echo $_SESSION['username'] ?? 'Guest'; ?>", 
            "email": "<?php echo $_SESSION['email'] ?? ''; ?>",  
            "contact": "9999999999"  
        },
        "theme": {
            "color": "#3399cc"  
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
}
</script>

</script>
</body>
</html>
