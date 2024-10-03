// Listen for the click event on the Cricket Proceed button
document.getElementById('cricketProceedBtn').addEventListener('click', function() {
    // Show the Cricket Registration Form
    document.getElementById('cricketForm').classList.remove('hidden');
    document.getElementById('services').classList.add('hidden');  // Hide the services section
});

// Form submission event listener
document.getElementById('cricketRegistrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert("Cricket Club Registration Submitted Successfully!");
});
