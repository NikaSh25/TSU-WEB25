document
  .querySelector(".sign-up__toggle-visibility")
  .addEventListener("click", () => {
    const passwordInput = document.querySelector('input[name="password"]');
    const icon = document.querySelector(".sign-up__toggle-img");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.src = "images/login/eye.svg";
    } else {
      passwordInput.type = "password";
      icon.src = "images/login/eye-slash.svg";
    }
  });

const form = document.querySelector(".sign-up__form");
const inputs = form.querySelectorAll(".sign-up__input");

function isAdult(birthday) {
  const today = new Date();
  const birthdate = new Date(birthday);
  let age = today.getFullYear() - birthdate.getFullYear();
  const monthDiff = today.getMonth() - birthdate.getMonth();
  const dayDiff = today.getDate() - birthdate.getDate();

  if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
    age--;
  }
  return age >= 18;
}

function showError(input) {
  const errorElement = input.nextElementSibling;
  errorElement.classList.remove("sign-up__error--hidden");
}
function hideError(input) {
  const errorElement = input.nextElementSibling;
  errorElement.classList.add("sign-up__error--hidden");
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
  const fnameInput = form.querySelector('input[name="fname"]');
  const lnameInput = form.querySelector('input[name="lname"]');
  const birthdayInput = form.querySelector('input[name="birthday"]');
  const emailInput = form.querySelector('input[name="email"]');
  const passwordInput = form.querySelector('input[name="password"]');

  const fname = fnameInput.value.trim();
  const lname = lnameInput.value.trim();
  const birthday = birthdayInput.value;
  const email = emailInput.value.trim();
  const password = passwordInput.value;

  let isValid = true;
  const nameRegex = /^[a-zA-Z]{1,30}$/;
  const emailRegex = /^([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
  const passRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;
  if (!nameRegex.test(fname)) {
    showError(fnameInput);
    isValid = false;
  }
  if (!nameRegex.test(lname)) {
    showError(lnameInput);
    isValid = false;
  }
  if (!isAdult(birthday)) {
    showError(birthdayInput);
    isValid = false;
  }
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
