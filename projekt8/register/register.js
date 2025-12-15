const input_name = document.getElementById("name");
const input_surname = document.getElementById("surname");
const input_email = document.getElementById("email");
const input_password = document.getElementById("password");
const input_password_repeat = document.getElementById("password_repeat");

input_email.value = "jan.kowalski" + Date.now() + "@example.com"

const warning_name = document.getElementById("warning_name");
const warning_surname = document.getElementById("warning_surname");
const warning_email = document.getElementById("warning_email");
const warning_password = document.getElementById("warning_password");
const warning_password_repeat = document.getElementById("warning_password_repeat");

input_name.addEventListener("input", () => {
    warning_name.style.display = "none";
});

input_surname.addEventListener("input", () => {
    warning_surname.style.display = "none";
});

input_email.addEventListener("input", () => {
    warning_email.style.display = "none";
});

input_password.addEventListener("input", () => {
    warning_password.style.display = "none";
});

input_password_repeat.addEventListener("input", () => {
    warning_password_repeat.style.display = "none";
});


function submitCheck(event) {
    if (input_password.value !== input_password_repeat.value) {
        warning_password_repeat.style.display = "flex";
        input_password.reportValidity();
        event.preventDefault();
    }
}

document.getElementById("mainForm").addEventListener("submit", submitCheck);
