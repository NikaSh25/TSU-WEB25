  <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>
  <header class="header">
      <div class="logo">
          <a href="index.php" class="logo__link">
              <img
                  src="images/header/Logo.png"
                  alt="SkillBoost Logo"
                  class="logo__image" />
              <h1 class="logo__title">SkillBoost</h1>
          </a>
      </div>
      <button class="header__nav-hamburger" onclick="">☰</button>
      <nav class="header__nav">
          <ul class="header__nav-list">
              <li>
                  <a class="header__nav-link" href="index.php">Home</a>
              </li>
              <li><a class="header__nav-link" href="about.php">About</a></li>
              <li><a class="header__nav-link" href="courses.php">Courses</a></li>
              <li><a class="header__nav-link" href="blog.php">Blog</a></li>
              <li><a class="header__nav-link" href="contact.php">Contact</a></li>
              <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true):
                ?>
                  <li>
                      <a
                          href="dashboard.php"
                          class="header__nav-link">Dashboard</a>
                  </li>
                  <li>
                      <a
                          href="php/logout.php"
                          class="header__nav-link">Log out</a>
                  </li>
              <?php else: ?>
                  <li>
                      <a
                          href="login.php"
                          class="header__nav-link header__nav-link--login">Login</a>
                  </li>
              <?php endif ?>

          </ul>
      </nav>
  </header>