document.getElementById('cricketProceedBtn').addEventListener('click', function() {
    document.getElementById('cricketForm').classList.remove('hidden');
    document.getElementById('services').classList.add('hidden');  // Hide the services section
});

document.getElementById('cricketRegistrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert("Cricket Club Registration Submitted Successfully!");
});
