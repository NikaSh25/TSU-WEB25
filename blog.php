<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>News And Blogs | SkillBoost</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
  <?php require_once 'php/header.php' ?>
  <main>
    <section class="blog-hero">
      <h2 class="blog-hero__title">News and Blogs</h2>
      <p class="blog-hero__text">
        "Explore inspiring stories and practical advice designed to fuel your
        continuous growth."
      </p>
    </section>
    <section class="blogs">
      <div class="blogs__container">
        <?php
        $postsJson = file_get_contents(__DIR__ . '/blogs/posts.json');
        $posts = json_decode($postsJson, true);
        ?>
        <ul class="blogs__list">
          <?php foreach ($posts as $post): ?>
            <li class="blogs__item">
              <a href="blogpost.php?slug=<?php echo urlencode($post['slug']); ?>" class="blogs__link">
                <article class="blogs__card">
                  <img
                    class="blogs__image"
                    src="<?php echo htmlspecialchars($post['image']); ?>"
                    alt="<?php echo htmlspecialchars($post['alt']); ?>" />
                  <div class="blogs__details">
                    <p class="blogs__author-name">By <?php echo htmlspecialchars($post['author']); ?></p>
                    <time class="blogs__author-date" datetime="<?php echo htmlspecialchars($post['date']); ?>">
                      <?php echo htmlspecialchars($post['date']); ?>
                    </time>
                  </div>
                  <h3 class="blogs__name"><?php echo htmlspecialchars($post['title']); ?></h3>
                  <p class="blogs__text">
                    <?php echo htmlspecialchars(substr($post['content'], 0, 150)) . '...'; ?>
                  </p>
                </article>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <p class="blogs__no-results blogs__no-results--hidden">
          No posts found.
        </p>
      </div>
      <aside class="blogs__aside">
        <form class="blogs__search-form">
          <label for="search_input" class="blogs__search-label">Search</label>
          <div class="blogs__search-wrapper">
            <input
              class="blogs__search-input"
              id="search_input"
              type="search"
              placeholder="Type to search" />
            <button class="blogs__search-submit" type="submit">
              <img src="images/misc/search-icon.svg" alt="search icon" />
            </button>
          </div>
        </form>
        <div class="blogs__gallery">
          <h3 class="blogs__gallery-title">Photo Gallery</h3>
          <ul class="blogs__gallery-list">
            <li class="blogs__gallery-item">
              <img
                class="blogs__gallery-img"
                src="images/homepage/news-blogs/news-blog-consumers-370x222.jpg.png"
                alt="consumers image" />
            </li>
            <li class="blogs__gallery-item">
              <img
                class="blogs__gallery-img"
                src="images/homepage/news-blogs/news-blog-course-2-370x222.jpg.png"
                alt="course image" />
            </li>
            <li class="blogs__gallery-item">
              <img
                class="blogs__gallery-img"
                src="images/homepage/news-blogs/random-text.jpg"
                alt="lorem ipsum image" />
            </li>
            <li class="blogs__gallery-item">
              <img
                class="blogs__gallery-img"
                src="images/homepage/news-blogs/start-up.png"
                alt="start up image" />
            </li>
            <li class="blogs__gallery-item">
              <img
                class="blogs__gallery-img"
                src="images/homepage/news-blogs/random-text.jpg"
                alt="lorem ipsum image" />
            </li>
            <li class="blogs__gallery-item">
              <img
                class="blogs__gallery-img"
                src="images/homepage/news-blogs/news-blog-consumers-370x222.jpg.png"
                alt="consumers image" />
            </li>
          </ul>
        </div>
      </aside>
    </section>
  </main>
  <?php require_once 'php/footer.php' ?>
  <script src="js/script.js"></script>
  <script src="js/blogs.js"></script>
</body>

</html>