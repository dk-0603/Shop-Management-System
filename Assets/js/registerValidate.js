function validateForm() {
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var termsCheckbox = document.getElementById('termsCheckbox');

    // Check for empty fields
    var fields = [document.getElementById('firstname'), document.getElementById('lastname'), document.getElementById('email'), document.getElementById('password'), document.getElementById('confirmPassword')];
    if (!validateEmptyFields(fields)) {
        return false;
    }

    // Validate email format
    if (!validateEmail(email)) {
        alert('Invalid email format');
        return false;
    }

    // Validate password strength
    var passwordStrengthMessage = document.getElementById('passwordStrengthMessage');
    if (!validatePassword(password)) {
        passwordStrengthMessage.innerHTML = 'Password must contain at least 8 characters, one uppercase letter, one lowercase letter, and one digit';
        return false;
    } else {
        passwordStrengthMessage.innerHTML = '';
    }

    // Check if passwords match
    if (!validatePasswordMatch(password, confirmPassword)) {
        alert('Passwords do not match');
        return false;
    }



    return true;
}

function validateEmptyFields(fields) {
    for (var i = 0; i < fields.length; i++) {
        if (fields[i].value.trim() === '') {
            alert('Please fill in all required fields');
            return false;
        }
    }
    return true;
}

function validateEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePassword(password) {
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(password);
}

function validatePasswordMatch(password, confirmPassword) {
    return password === confirmPassword;
}