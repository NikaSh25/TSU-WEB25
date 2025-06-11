document
  .querySelector(".login-page__toggle-visibility")
  .addEventListener("click", () => {
    const passwordInput = document.querySelector(".login-page__password");
    const icon = document.querySelector(".login-page__toggle-img");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.src = "images/login/eye.svg";
    } else {
      passwordInput.type = "password";
      icon.src = "images/login/eye-slash.svg";
    }
  });
