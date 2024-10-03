// Function to show the sign-up form and hide the login form
function showSignUp() {
    document.getElementById('login-box').classList.add('hidden');
    document.getElementById('signup-box').classList.remove('hidden');
}

// Function to show the login form and hide the sign-up form
function showLogin() {
    document.getElementById('login-box').classList.remove('hidden');
    document.getElementById('signup-box').classList.add('hidden');
}

// Handle form submission (Login or Sign Up)
// document.getElementById('loginForm').addEventListener('submit', function(event) {
//     event.preventDefault();
//     // Simulating successful login
//     alert('Login successful! Redirecting to homepage...');
//     window.location.href = "index.html";  // Redirect to homepage after login
// });

// document.getElementById('signupForm').addEventListener('submit', function(event) {
//     event.preventDefault();
//     // Simulating successful sign up
//     alert('Sign up successful! Redirecting to homepage...');
//     window.location.href = "index.html";  // Redirect to homepage after sign-up
// });
