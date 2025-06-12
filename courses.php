<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses | SkillBoost</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
  <?php require_once 'php/header.php' ?>
  <main>
    <section class="courses-hero">
      <h2 class="courses-hero__title">Courses</h2>
      <p class="courses-hero__text">
        Explore our extensive catalog of courses designed to elevate your
        skills and open new doors.
      </p>
    </section>
    <div class="courses">
      <aside class="courses-filters">
        <form class="courses-filters__search-form">
          <label for="search_input" class="courses-filters__search-label">Search</label>
          <div class="courses-filters__search-wrapper">
            <input
              class="courses-filters__search-input"
              id="search_input"
              type="search"
              placeholder="Search Courses" />
            <button class="courses-filters__search-submit" type="submit">
              <img src="images/misc/search-icon.svg" alt="search icon" />
            </button>
          </div>
        </form>
        <div class="courses-filters__categories">
          <p class="courses-filters__tags">Tags</p>
          <ul class="courses-filters__filter">
            <li>
              <button
                class="courses-filters__filter-btn courses-filters__filter-btn--active"
                type="button"
                data-filter="all">
                All
              </button>
            </li>
            <li>
              <button
                class="courses-filters__filter-btn"
                type="button"
                data-filter="artificial">
                Artificial Intelligence
              </button>
            </li>
            <li>
              <button
                class="courses-filters__filter-btn"
                type="button"
                data-filter="featured">
                Featured
              </button>
            </li>
            <li>
              <button
                class="courses-filters__filter-btn"
                type="button"
                data-filter="marketing">
                Marketing
              </button>
            </li>
            <li>
              <button
                class="courses-filters__filter-btn"
                type="button"
                data-filter="language">
                Language
              </button>
            </li>
          </ul>
        </div>
      </aside>
      <section class="courses-grid">
        <p class="courses-grid__no-results courses-grid__no-results--hidden">
          No Courses found.
        </p>
        <ul class="courses-grid__cards">
          <li class="courses-grid__item" data-category="featured">
            <a href="course-figma.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-2.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">3 Lessons</span>
                  <span class="course-card__duration">2 hours 40 minutes</span>
                </div>
                <p class="course-card__title">
                  Learn Essentials of User Interface Design in Figma
                </p>
                <strong class="course-card__price">$60.00</strong>
                <p class="course-card__author">John Cena</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="marketing">
            <a href="course-designer-skills.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-5.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">5 Lessons</span>
                  <span class="course-card__duration">5 hours 40 minutes</span>
                </div>
                <p class="course-card__title">
                  Designer Essential Skills You Must Need To Know
                </p>
                <strong class="course-card__price">$40.00</strong>
                <p class="course-card__author">Jonas Schmedtmann</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="language">
            <a href="course-python-dsml.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-3.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">6 Lessons</span>
                  <span class="course-card__duration">12 hours 40 minutes</span>
                </div>
                <p class="course-card__title">
                  Python for Data Science & Machine Learning
                </p>
                <strong class="course-card__price">$86.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="artificial">
            <a href="course-strategy-law.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-1.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">4 Lessons</span>
                  <span class="course-card__duration">5 hours 55 minutes</span>
                </div>
                <p class="course-card__title">
                  Strategy Law and Organization Foundation
                </p>
                <strong class="course-card__price">$128.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="language">
            <a href="course-psych-success.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-5.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">3 Lessons</span>
                  <span class="course-card__duration">6 hours 40 minutes</span>
                </div>
                <p class="course-card__title">Psychology of Success</p>
                <strong class="course-card__price">$55.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="artificial">
            <a href="course-python-beginners.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-4.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">2 Lessons</span>
                  <span class="course-card__duration">4 hours 35 minutes</span>
                </div>
                <p class="course-card__title">
                  Learning A-Z: Hands-On Python for Beginners
                </p>
                <strong class="course-card__price">$20.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="featured">
            <a href="course-figma.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-2.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">3 Lessons</span>
                  <span class="course-card__duration">2 hours 40 minutes</span>
                </div>
                <p class="course-card__title">
                  Learn Essentials of User Interface Design in Figma
                </p>
                <strong class="course-card__price">$60.00</strong>
                <p class="course-card__author">John Cena</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="marketing">
            <a href="course-designer-skills.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-5.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">5 Lessons</span>
                  <span class="course-card__duration">5 hours 40 minutes</span>
                </div>
                <p class="course-card__title">
                  Designer Essential Skills You Must Need To Know
                </p>
                <strong class="course-card__price">$40.00</strong>
                <p class="course-card__author">Jonas Schmedtmann</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="language">
            <a href="course-python-dsml.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-3.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">6 Lessons</span>
                  <span class="course-card__duration">12 hours 40 minutes</span>
                </div>
                <p class="course-card__title">
                  Python for Data Science & Machine Learning
                </p>
                <strong class="course-card__price">$86.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="artificial">
            <a href="course-strategy-law.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-1.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">4 Lessons</span>
                  <span class="course-card__duration">5 hours 55 minutes</span>
                </div>
                <p class="course-card__title">
                  Strategy Law and Organization Foundation
                </p>
                <strong class="course-card__price">$128.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="language">
            <a href="course-psych-success.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-5.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">3 Lessons</span>
                  <span class="course-card__duration">6 hours 40 minutes</span>
                </div>
                <p class="course-card__title">Psychology of Success</p>
                <strong class="course-card__price">$55.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
          <li class="courses-grid__item" data-category="artificial">
            <a href="course-python-beginners.html" class="courses-grid__link">
              <article class="course-card">
                <img
                  src="images/homepage/course-images/course-image-4.png"
                  alt="Course Image"
                  class="course-card__image" />
                <div class="course-card__time">
                  <span class="course-card__lessons">2 Lessons</span>
                  <span class="course-card__duration">4 hours 35 minutes</span>
                </div>
                <p class="course-card__title">
                  Learning A-Z: Hands-On Python for Beginners
                </p>
                <strong class="course-card__price">$20.00</strong>
                <p class="course-card__author">Jhon Sina</p>
              </article>
            </a>
          </li>
        </ul>
      </section>
    </div>
  </main>
  <?php require_once 'php/footer.php' ?>
  <script src="js/script.js"></script>
  <script src="js/courses.js"></script>
</body>

</html>