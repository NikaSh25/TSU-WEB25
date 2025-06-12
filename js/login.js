document
  .querySelector(".login-page__toggle-visibility")
  .addEventListener("click", () => {
    const passwordInput = document.querySelector('input[name="password"]');
    const icon = document.querySelector(".login-page__toggle-img");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.src = "images/login/eye.svg";
    } else {
      passwordInput.type = "password";
      icon.src = "images/login/eye-slash.svg";
    }
  });

const form = document.querySelector(".login-page__form");
const inputs = form.querySelectorAll(".login-page__input");

function showError(input) {
  const errorElement = input.nextElementSibling;
  errorElement.classList.remove("login-page__error--hidden");
}
function hideError(input) {
  const errorElement = input.nextElementSibling;
  errorElement.classList.add("login-page__error--hidden");
}

function clearErrors() {
  const inputs = form.querySelectorAll("input");
  inputs.forEach((element) => {
    hideError(element);
  });
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  clearErrors();
  const emailInput = form.querySelector('input[name="email"]');
  const passwordInput = form.querySelector('input[name="password"]');

  const email = emailInput.value.trim();
  const password = passwordInput.value;

  let isValid = true;
  const emailRegex = /^([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
  const passRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

  if (!emailRegex.test(email)) {
    showError(emailInput);
    isValid = false;
  }
  if (!passRegex.test(password)) {
    showError(passwordInput);
    isValid = false;
  }
  if (isValid) {
    form.submit();
  }
});
