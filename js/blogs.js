const form = document.querySelector(".blogs__search-form");

form.addEventListener("submit", (event) => {
  event.preventDefault();

  const searchValue = document
    .querySelector(".blogs__search-input")
    .value.trim()
    .toUpperCase();

  const posts = document.querySelectorAll(".blogs__item");
  const noResults = document.querySelector(".blogs__no-results");

  let showing = 0;

  posts.forEach((post) => {
    const titleElement = post.querySelector(".blogs__name");
    const title = titleElement.textContent.toUpperCase();
    if (title.includes(searchValue)) {
      post.classList.remove("blogs__item--hidden");
      showing++;
    } else {
      post.classList.add("blogs__item--hidden");
    }
  });
  if (showing === 0) {
    noResults.classList.remove("blogs__no-results--hidden");
  } else {
    noResults.classList.add("blogs__no-results--hidden");
  }
});
