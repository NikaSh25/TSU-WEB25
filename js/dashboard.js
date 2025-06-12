const btns = document.querySelectorAll(".dashboard-nav__btn");
const courseView = btns[0];
const profileView = btns[1];
const courses = document.querySelector(".dashboard-courses");
const profile = document.querySelector(".dashboard-profile");

function toggleView(showCourses) {
  if (showCourses) {
    courses.classList.remove("dashboard-courses--hidden");
    profile.classList.add("dashboard-profile--hidden");
    courseView.classList.add("dashboard-nav__btn--active");
    profileView.classList.remove("dashboard-nav__btn--active");
  } else {
    courses.classList.add("dashboard-courses--hidden");
    profile.classList.remove("dashboard-profile--hidden");
    courseView.classList.remove("dashboard-nav__btn--active");
    profileView.classList.add("dashboard-nav__btn--active");
  }
}

courseView.addEventListener("click", () => toggleView(true));
profileView.addEventListener("click", () => toggleView(false));
