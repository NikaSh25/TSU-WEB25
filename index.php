<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | SkillBoost</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
  <?php require_once 'php/header.php'; ?>
  <main class="main">
    <section class="hero">
      <p class="hero__tag">Education Solution</p>
      <h1 class="hero__title">Massive Courses Available for Anyone</h1>
      <form class="hero__search-bar">
        <input
          class="hero__search-input"
          type="search"
          placeholder="AI-Powered Search: Discover the Perfect Course for You" />
        <button class="hero__search-submit" type="submit">Search</button>
      </form>
      <ul class="hero__list">
        <li>More than 2k Courses</li>
        <li>1.1k Free Courses</li>
        <li>150+ Instructors</li>
      </ul>
    </section>

    <section class="partners">
      <ul class="partners__list">
        <li class="partners__logo">
          <img
            src="images/homepage/partners/atlas-logo.svg"
            alt="Partner Company - Atlas logo" />
        </li>
        <li class="partners__logo">
          <img
            src="images/homepage/partners/circle-logo.svg"
            alt="Partner Company - Circle logo" />
        </li>
        <li class="partners__logo">
          <img
            src="images/homepage/partners/hexa-logo.svg"
            alt="Partner Company - hexa logo" />
        </li>
        <li class="partners__logo">
          <img
            src="images/homepage/partners/josef-logo.svg"
            alt="Partner Company - Josef logo" />
        </li>

        <li class="partners__logo">
          <img
            src="images/homepage/partners/treva-logo.svg"
            alt="Partner Company - Treva logo" />
        </li>
      </ul>
    </section>

    <section class="course-categories">
      <ul class="course-categories__list">
        <li class="course-categories__item">
          <h5 class="course-categories__title">Artificial Intelligence</h5>
          <span class="course-categories__count">14 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Communication</h5>
          <span class="course-categories__count">23 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Language</h5>
          <span class="course-categories__count">24 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Management</h5>
          <span class="course-categories__count">10 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Marketing</h5>
          <span class="course-categories__count">14 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Servers</h5>
          <span class="course-categories__count">20 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Programming</h5>
          <span class="course-categories__count">34 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">SEO</h5>
          <span class="course-categories__count">10 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Technology</h5>
          <span class="course-categories__count">14 Courses</span>
        </li>
        <li class="course-categories__item">
          <h5 class="course-categories__title">Design</h5>
          <span class="course-categories__count">30 Courses</span>
        </li>
      </ul>
    </section>

    <section class="course-list">
      <span class="course-list__tag">Course List</span>
      <h2 class="course-list__title">
        Perfect Online
        <span class="course-list__title--red">Courses</span> For Your Career
      </h2>
      <ul class="course-list__categories">
        <li>
          <button
            class="course-list__filter-btn course-list__filter-btn--active"
            type="button"
            data-filter="all">
            All
          </button>
        </li>
        <li>
          <button
            class="course-list__filter-btn"
            type="button"
            data-filter="artificial">
            Artificial Intelligence
          </button>
        </li>
        <li>
          <button
            class="course-list__filter-btn"
            type="button"
            data-filter="featured">
            Featured
          </button>
        </li>
        <li>
          <button
            class="course-list__filter-btn"
            type="button"
            data-filter="marketing">
            Marketing
          </button>
        </li>
        <li>
          <button
            class="course-list__filter-btn"
            type="button"
            data-filter="language">
            Language
          </button>
        </li>
      </ul>
      <ul class="course-list__cards">
        <li class="course-list__item" data-category="featured">
          <a href="course-figma.html" class="course-list__link">
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
        <li class="course-list__item" data-category="marketing">
          <a href="course-designer-skills.html" class="course-list__link">
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
        <li class="course-list__item" data-category="language">
          <a href="course-python-dsml.html" class="course-list__link">
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
        <li class="course-list__item" data-category="artificial">
          <a href="course-strategy-law.html" class="course-list__link">
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
        <li class="course-list__item" data-category="language">
          <a href="course-psych-success.html" class="course-list__link">
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
        <li class="course-list__item" data-category="artificial">
          <a href="course-python-beginners.html" class="course-list__link">
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
    <section class="stats">
      <div class="stats__container">
        <img
          class="stats__icon"
          src="images/misc/medal-icon.svg"
          alt="Medal Icon" />
        <strong class="stats__numbers">54+</strong>
        <span class="stats__title">Total Achievements</span>
      </div>
      <div class="stats__container">
        <img
          class="stats__icon"
          src="images/misc/student-icon.svg"
          alt="Student Icon" />
        <strong class="stats__numbers">154k+</strong>
        <span class="stats__title">Total Students</span>
      </div>
      <div class="stats__container">
        <img
          class="stats__icon"
          src="images/misc/instructor-icon.svg"
          alt="Instructor Icon" />
        <strong class="stats__numbers">4k</strong>
        <span class="stats__title">Total Instructors</span>
      </div>
      <div class="stats__container">
        <img
          class="stats__icon"
          src="images/misc/earth-icon.svg"
          alt="Earth Location Icon" />
        <strong class="stats__numbers">530+</strong>
        <span class="stats__title">Happy Clients</span>
      </div>
    </section>
    <section class="register">
      <span class="register__tag">Join Us</span>
      <h2 class="register__title">
        Register Your Account and Get Free Access to
        <strong class="register__title--orange">60000</strong> Online Courses
      </h2>
      <p class="register__desc">
        Learn Something new & Build Your Career From Anywhere In The World
      </p>
      <a href="register.html" class="register__link">Register now!</a>
    </section>
    <section class="pricing">
      <span class="pricing__tag">Pricing Plan</span>
      <h2 class="pricing__title">
        Choose The Best Package For
        <span class="pricing__title--red">Your</span> Learning
      </h2>
      <div class="pricing__columns">
        <article class="pricing__column">
          <h4 class="pricing__plan">FREE</h4>
          <p class="pricing__price">
            $0<span class="pricing__price--small">/month</span>
          </p>
          <p class="pricing__description">Perfect for starting</p>
          <ul class="pricing__features">
            <li class="pricing__users">1 User</li>
            <li class="pricing__collab">No Team Collaboration</li>
            <li class="pricing__export">No Export Code</li>
            <li class="pricing__gift">No Monthly Free Course</li>
            <li class="pricing__courses">Can't make your own courses</li>
          </ul>
          <p class="pricing__credit">No Credit Card Required</p>
        </article>
        <article class="pricing__column">
          <h4 class="pricing__plan">BASIC</h4>
          <p class="pricing__price">
            $29<span class="pricing__price--small">/month</span>
          </p>
          <p class="pricing__description">Perfect for beginners</p>
          <ul class="pricing__features">
            <li class="pricing__users">3 User</li>
            <li class="pricing__collab">No Team Collaboration</li>
            <li class="pricing__export">No Export Code</li>
            <li class="pricing__gift">Monthly Free Course</li>
            <li class="pricing__courses">Can't make your own courses</li>
          </ul>
          <p class="pricing__credit">No Credit Card Required</p>
        </article>
        <article class="pricing__column">
          <h4 class="pricing__plan">PRO</h4>
          <p class="pricing__price">
            $59<span class="pricing__price--small">/month</span>
          </p>
          <p class="pricing__description">Perfect for Pros</p>
          <ul class="pricing__features">
            <li class="pricing__users">15 User</li>
            <li class="pricing__collab">Team Collaboration</li>
            <li class="pricing__export">Export Code</li>
            <li class="pricing__gift">Monthly Free Course</li>
            <li class="pricing__courses">Can Make your own courses</li>
          </ul>
          <p class="pricing__credit">No Credit Card Required</p>
        </article>
      </div>
    </section>
    <section class="reviews">
      <div class="reviews__container">
        <span class="reviews__tag">Reviews</span>
        <h2 class="reviews__title">What They Say About Us</h2>
        <p class="reviews__desc">Discover what others are saying about us.</p>
      </div>
      <div class="reviews__review">
        <p class="reviews__text">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis
          tenetur ab neque. Dolor quam, iusto.
        </p>
        <div class="reviews__authors">
          <img
            src="images/homepage/reviews/review-author.png"
            alt="Author's picture" />
          <p class="reviews__author">
            John Doe <span class="reviews__author--gray"> - Designer</span>
          </p>
        </div>
      </div>
      <div class="reviews__review">
        <p class="reviews__text">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis
          tenetur ab neque. Dolor quam, iusto.
        </p>
        <div class="reviews__authors">
          <img
            src="images/homepage/reviews/review-author.png"
            alt="Author's picture" />
          <p class="reviews__author">
            John Doe <span class="reviews__author--gray"> - Designer</span>
          </p>
        </div>
      </div>
    </section>
    <section class="news-blog">
      <span class="news-blog__tag">News Blog</span>
      <h2 class="news-blog__title">Latest News and Blogs</h2>
      <div class="news-blog__cards">
        <a href="#" class="news-blog__link">
          <article class="news-blog__card">
            <img
              class="news-blog__image"
              src="images/homepage/news-blogs/start-up.png"
              alt="Girl presenting start up project" />
            <h3 class="news-blog__name">
              We are helping our community with Starting
            </h3>
            <div class="news-blog__author">
              <img
                class="news-blog__author-image"
                src="images/homepage/reviews/review-author.png"
                alt="Author's picture" />
              <p class="news-blog__author-name">John Doe</p>
            </div>
          </article>
        </a>
        <a class="news-blog__link">
          <article class="news-blog__card">
            <img
              class="news-blog__image"
              src="images/homepage/news-blogs/random-text.jpg"
              alt="random lorem ipsum text" />
            <h3 class="news-blog__name">Lorem ipsum the origins</h3>
            <div class="news-blog__author">
              <img
                class="news-blog__author-image"
                src="images/homepage/reviews/review-author.png"
                alt="Author's picture" />
              <p class="news-blog__author-name">John Doe</p>
            </div>
          </article>
        </a>

        <a class="news-blog__link">
          <article class="news-blog__card">
            <img
              class="news-blog__image"
              src="images/homepage/news-blogs/news-blog-consumers-370x222.jpg.png"
              alt="boy thinking about consumer feedback" />
            <h3 class="news-blog__name">
              Delivering what consumers really want?
            </h3>
            <div class="news-blog__author">
              <img
                class="news-blog__author-image"
                src="images/homepage/reviews/review-author.png"
                alt="Author's picture" />
              <p class="news-blog__author-name">John Doe</p>
            </div>
          </article>
        </a>
      </div>
    </section>
  </main>


  <?php require_once 'php/footer.php'; ?>


  <script src="js/script.js"></script>
  <script src="js/home.js"></script>
</body>

</html>