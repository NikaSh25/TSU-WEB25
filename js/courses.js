let currentFilter = "all";
let currentSearch = "";

function filterCourses() {
  const posts = document.querySelectorAll(".courses-grid__item");
  const noResults = document.querySelector(".courses-grid__no-results");
  let showing = 0;

  posts.forEach((post) => {
    const category = post.getAttribute("data-category").toLowerCase();
    const title = post
      .querySelector(".course-card__title")
      .textContent.trim()
      .toLowerCase();

    const matchesFilter = currentFilter === "all" || category === currentFilter;
    const matchesSearch = title.includes(currentSearch);

    if (matchesFilter && matchesSearch) {
      post.classList.remove("courses-grid__item--hidden");
      showing++;
    } else {
      post.classList.add("courses-grid__item--hidden");
    }
  });

  if (showing === 0) {
    noResults.classList.remove("courses-grid__no-results--hidden");
  } else {
    noResults.classList.add("courses-grid__no-results--hidden");
  }
}

document.querySelectorAll(".courses-filters__filter-btn").forEach((button) => {
  button.addEventListener("click", () => {
    currentFilter = button.getAttribute("data-filter").toLowerCase();

    document.querySelectorAll(".courses-filters__filter-btn").forEach((btn) => {
      btn.classList.remove("courses-filters__filter-btn--active");
    });

    button.classList.add("courses-filters__filter-btn--active");

    filterCourses();
  });
});

const form = document.querySelector(".courses-filters__search-form");
form.addEventListener("submit", (event) => {
  event.preventDefault();

  const searchInput = document.querySelector(".courses-filters__search-input");
  currentSearch = searchInput.value.trim().toLowerCase();

  filterCourses();
});
