const trail = (str) => str.replace(/^\/+/, "");
const pages = document.querySelectorAll(".header__nav-link");
const curr = trail(window.location.pathname);
console.log(curr);
pages.forEach((page) => {
  const link = page.getAttribute("href");
  console.log(link);

  if (link === curr) {
    page.classList.add("header__nav-link--active");
  } else {
    page.classList.remove("header__nav-link--active");
  }
});

document.querySelectorAll(".course-list__filter-btn").forEach((button) =>
  button.addEventListener("click", () => {
    const filter = button.getAttribute("data-filter");
    const courses = document.querySelectorAll(
      ".course-list__cards .course-card"
    );

    document.querySelectorAll(".course-list__filter-btn").forEach((button) => {
      button.classList.remove("course-list__filter-btn--active");
    });

    button.classList.add("course-list__filter-btn--active");

    courses.forEach((card) => {
      const category = card.getAttribute("data-category");
      const hide =
        filter.toLowerCase() !== "all" &&
        category.toLowerCase() !== filter.toLowerCase();
      if (hide) {
        card.classList.add("hidden");
      } else {
        card.classList.remove("hidden");
      }
    });
  })
);
