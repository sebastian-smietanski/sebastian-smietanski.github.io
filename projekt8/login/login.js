let error_smg = document.getElementById("credentials_error_msg")
let input_email = document.getElementById("email");
let input_password = document.getElementById("password");

// error message
input_email.addEventListener('input', () => {
    error_smg.style.display = "none";
}, {once: true});

input_password.addEventListener('input', () => {
    error_smg.style.display = "none";
}, {once: true});