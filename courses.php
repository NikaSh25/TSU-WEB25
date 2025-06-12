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
          <?php
          $coursesJSON = file_get_contents(__DIR__ . "/courses/courses.json");
          $courses = json_decode($coursesJSON, true);
          foreach ($courses as $course):
          ?>
            <li class="courses-grid__item" data-category="<?php echo htmlspecialchars($course['category']) ?>">
              <a href="course.php?slug=<?php echo urlencode($course['slug']); ?>" class="courses-grid__link">
                <article class="course-card">
                  <img
                    src="<?php echo htmlspecialchars($course['image']) ?>"
                    alt="<?php echo htmlspecialchars($course['alt']) ?>"
                    class="course-card__image" />
                  <div class="course-card__time">
                    <span class="course-card__lessons"><?php echo htmlspecialchars($course['lessons']) ?> lessons</span>
                    <span class="course-card__duration"><?php echo htmlspecialchars($course['duration']) ?></span>
                  </div>
                  <h3 class="course-card__title">
                    <?php echo htmlspecialchars($course['title']) ?>
                  </h3>
                  <strong class="course-card__price">$<?php echo htmlspecialchars($course['price']) ?></strong>
                  <p class="course-card__author"><?php echo htmlspecialchars($course['author']) ?></p>
                </article>
              </a>
            </li>
          <?php endforeach ?>

        </ul>
      </section>
    </div>
  </main>
  <?php require_once 'php/footer.php' ?>
  <script src="js/script.js"></script>
  <script src="js/courses.js"></script>
</body>

</html>