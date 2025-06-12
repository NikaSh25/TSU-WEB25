<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | SkillBoost</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
  <?php require_once 'php/header.php' ?>
  <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: dashboard.php');
  }
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error_message'] = "Invalid Email Address format.";
      header("Location: login.php");
      exit();
    }
    if (!preg_match($passRegex, $password)) {
      $_SESSION['error_message'] = "Invalid Password.";
      header("Location: login.php");
      exit();
    }
    $fileName = str_replace(['@', '.'], ['_at_', '_dot_'], strtolower($email));

    $filePath = __DIR__ . "/users/{$fileName}.json";
    if (!file_exists($filePath)) {
      $_SESSION['error_message'] = "User Doesn't Exist";
      header("Location: login.php");
      exit();
    }
    $userDataLine = file_get_contents($filePath);
    $userData = json_decode($userDataLine, true);
    if (isset($userData['password']) && password_verify($password, $userData['password'])) {
      $_SESSION['logged_in'] = true;
      $_SESSION['firstName'] = $userData['first_name'];
      $_SESSION['lastName'] = $userData['last_name'];
      $_SESSION['userEmail'] = $email;
      $_SESSION['success_message'] = "Login Successful!";
      session_regenerate_id(true);
      header('Location: dashboard.php');
      exit();
    }
  }
  ?>
  <main>
    <section class="login-page">
      <div class="login-page__container">
        <h2 class="login-page__title">Log in</h2>
        <form class="login-page__form" method="POST">
          <label class="login-page__label">Email
            <input
              type="email"
              class="login-page__input"
              name="email"
              placeholder="Enter your email"
              required />
            <span class="login-page__error login-page__error--hidden">Invalid email address.</span>
          </label>
          <label class="login-page__label">Password
            <input
              type="password"
              class="login-page__input"
              name="password"
              placeholder="Enter your password"
              required />
            <span class="login-page__error login-page__error--hidden">Password must have 8+ chars, 1 uppercase, 1 number, 1 special char.</span>
            <button type="button" class="login-page__toggle-visibility">
              <img
                src="images/login/eye-slash.svg"
                alt="Eye closed"
                class="login-page__toggle-img" />
            </button>
          </label>
          <button type="submit" class="login-page__btn">Log in</button>
          <?php if (isset($_SESSION['error_message'])): ?>
            <div class="login-page__error-message">
              <?php
              echo $_SESSION['error_message'];
              unset($_SESSION['error_message']);
              ?>
            </div>
          <?php endif; ?>
        </form>
        <p class="login-page__signup">
          Don't have an account?
          <a class="login-page__register" href="register.php">Sign up</a>
        </p>
      </div>
      <img
        src="images/login/login-book-image.png"
        alt="Book image"
        class="login-page__image" />
    </section>
  </main>
  <?php require_once 'php/footer.php' ?>
  <script src="js/script.js"></script>
  <script src="js/login.js"></script>
</body>

</html>