
let invalidCount = 0;

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
        const errorContainer = document.getElementById('errorMessages');
    const attemptContainer = document.getElementById('attemptCounter');
    const countDisplay = document.getElementById('countDisplay');
    const successContainer = document.getElementById('successMessage');
    errorContainer.innerHTML = '';
    successContainer.innerHTML = '';
    let errors = [];

    if (!email.includes('@')) {
        errors.push('Email must contain an "@" symbol.');
    }

    if (password.length < 6) {
        errors.push('Password must be at least 6 characters long.');
    }

    if (!password.includes('#')) {
        errors.push('Password must contain a "#" symbol.');
    }

    if (errors.length > 0) {
        
        invalidCount++;
        
        attemptContainer.style.display = 'block';
        countDisplay.innerHTML = invalidCount;

        let errorHtml = '<ul>';
        for (let i = 0; i < errors.length; i++) {
            errorHtml += '<li>' + errors[i] + '</li>';
        }
        errorHtml += '</ul>';
        
        errorContainer.innerHTML = errorHtml;
    } else {
    
        successContainer.innerHTML = 'Form submitted successfully!';
        
        attemptContainer.style.display = 'none';
        invalidCount = 0; 
    }
});