document.querySelectorAll(".course-list__filter-btn").forEach((button) =>
  button.addEventListener("click", () => {
    const filter = button.getAttribute("data-filter");
    const courses = document.querySelectorAll(
      ".course-list__cards .course-list__item"
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
