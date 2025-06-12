const btns = document.querySelectorAll(".dashboard-sidebar__btn");
const courseView = btns[0];
const profileView = btns[1];
const courses = document.querySelector(".dashboard-courses");
const profile = document.querySelector(".dashboard-profile");

function toggleView(showCourses) {
  if (showCourses) {
    courses.classList.remove("dashboard-courses--hidden");
    profile.classList.add("dashboard-profile--hidden");
  } else {
    courses.classList.add("dashboard-courses--hidden");
    profile.classList.remove("dashboard-profile--hidden");
  }
}

courseView.addEventListener("click", () => toggleView(true));
profileView.addEventListener("click", () => toggleView(false));
