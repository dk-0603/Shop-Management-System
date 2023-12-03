

let form = document.getElementById("login-form");

form.addEventListener('submit', function (event) {
    
    let username = document.getElementById("username");
    let password = document.getElementById("password"); 

    if (username.value.trim() === '') {
        // Display error message and prevent form submission
        document.getElementById('username-error').textContent = 'Username or Email is required';
        event.preventDefault(); // Prevent form submission
    }

    if (password.value.trim() === '') {
        // Display error message and prevent form submission
        document.getElementById('password-error').textContent = 'Password cannot be empty';
        event.preventDefault(); // Prevent form submission
    }
}
);