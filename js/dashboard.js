const btns = document.querySelectorAll(".dashboard-nav__btn");
const courseView = btns[0];
const profileView = btns[1];
const cartView = btns[2];
const courses = document.querySelector(".dashboard-courses");
const profile = document.querySelector(".dashboard-profile");
const cart = document.querySelector(".dashboard-cart");
function toggleView(option) {
  switch (option) {
    case "course":
      courses.classList.remove("dashboard-courses--hidden");
      profile.classList.add("dashboard-profile--hidden");
      cart.classList.add("dashboard-cart--hidden");

      courseView.classList.add("dashboard-nav__btn--active");
      profileView.classList.remove("dashboard-nav__btn--active");
      cartView.classList.remove("dashboard-nav__btn--active");

      break;
    case "profile":
      courses.classList.add("dashboard-courses--hidden");
      profile.classList.remove("dashboard-profile--hidden");
      cart.classList.add("dashboard-cart--hidden");

      courseView.classList.remove("dashboard-nav__btn--active");
      profileView.classList.add("dashboard-nav__btn--active");
      cartView.classList.remove("dashboard-nav__btn--active");

      break;

    case "cart":
      courses.classList.add("dashboard-courses--hidden");
      profile.classList.add("dashboard-profile--hidden");
      cart.classList.remove("dashboard-cart--hidden");

      courseView.classList.remove("dashboard-nav__btn--active");
      profileView.classList.remove("dashboard-nav__btn--active");
      cartView.classList.add("dashboard-nav__btn--active");
      break;
    default:
      console.log("Error while switching tabs");
  }
}

courseView.addEventListener("click", () => toggleView("course"));
profileView.addEventListener("click", () => toggleView("profile"));
cartView.addEventListener("click", () => toggleView("cart"));
