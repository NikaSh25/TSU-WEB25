const trail = (str) => str.replace(/^\/+/, "");
const pages = document.querySelectorAll(".header__nav-link");
const currPath = trail(window.location.pathname);
const currFile = currPath.split("/").pop() || "index.php";

pages.forEach((page) => {
  const link = page.getAttribute("href");
  if (!link) return;

  const linkFile = trail(link).split("/").pop();

  if (currFile === linkFile) {
    page.classList.add("header__nav-link--active");
  } else {
    page.classList.remove("header__nav-link--active");
  }
});

document
  .querySelector(".header__nav-hamburger")
  .addEventListener("click", () => {
    const dropdown_list = document.querySelector(".header__nav");
    dropdown_list.classList.toggle("header__nav--dropdown");
  });

window.addEventListener("scroll", () => {
  const dropdownList = document.querySelector(".header__nav");

  if (dropdownList.classList.contains("header__nav--dropdown")) {
    dropdownList.classList.remove("header__nav--dropdown");
  }
});
