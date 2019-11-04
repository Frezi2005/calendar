document.addEventListener("DOMContentLoaded", () => {
    const passwordInput = document.querySelector(".passwordInput");
    let showPasswordButton = document.querySelector(".eyeIcon");
    let passwordShown = false;

    showPasswordButton.addEventListener("click", () => {
        if (passwordShown == false) {
            passwordInput.type = "text";
            passwordShown = true;
        } else {
            passwordInput.type = "password";
            passwordShown = false;
        }
    });
    
});

