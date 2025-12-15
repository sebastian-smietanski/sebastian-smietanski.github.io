let password_visibility_buttons = document.querySelectorAll(".visibility-btn");

password_visibility_buttons.forEach(button => {
    button.addEventListener("click", (event) => {
        let password_inputs = button.parentElement.querySelectorAll("input");

        password_inputs.forEach(input => {
            if (input.type === "password") {
                input.type = "text";
                button.src = "/icons/eye_off.png";
            }
            else {
                input.type = "password";
                button.src = "/icons/eye_on.png";
            }
        })
    })
})
