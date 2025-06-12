<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up | SkillBoost</title>
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
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $birthday = ($_POST["birthday"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $nameRegex = "/^[a-zA-Z]{1,30}$/";
    $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/";

    if (!preg_match($nameRegex, $fname)) {
      exit("Invalid First name");
    }
    if (!preg_match($nameRegex, $lname)) {
      exit("Invalid Last name");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      exit("Invalid Email Input.");
    }
    if (!preg_match($passRegex, $password)) {
      exit("Invalid Password");
    }
    $currDate = new DateTime();
    $birthDate = new DateTime($birthday);
    $age = $birthDate->diff($currDate)->y;
    if ($age < 18) {
      exit("You must be at least 18 years old");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $userData = [
      'first_name' => $fname,
      'last_name' => $lname,
      'birthday' => $birthday,
      'email' => $email,
      'password' => $hashedPassword
    ];

    $fileName = str_replace(['@', '.'], ['_at_', '_dot_'], strtolower($email));

    $filepath = __DIR__ . "/users/{$fileName}.json";
    if (file_exists($filepath)) {
      exit("User Already Exists");
    }

    $jsonData = json_encode($userData, JSON_PRETTY_PRINT);
    if ($jsonData === false) {
      exit("Error encoding user data to JSON.");
    }
    if (file_put_contents($filepath, $jsonData) === false) {
      exit("Error writing user data to file.");
    }
    header("Location: login.php");
    exit();
  }

  ?>
  <main>
    <section class="sign-up">
      <div class="sign-up__container">
        <h2 class="sign-up__title">Sign Up</h2>
        <form class="sign-up__form" method="POST">
          <label class="sign-up__label">First Name
            <input
              type="text"
              class="sign-up__input"
              name="fname"
              placeholder="Enter your first name"
              required />
            <span class="sign-up__error sign-up__error--hidden">First name must be 1-30 letters.</span>
          </label>
          <label class="sign-up__label">Last Name
            <input
              type="text"
              class="sign-up__input"
              name="lname"
              placeholder="Enter your last name"
              required />
            <span class="sign-up__error sign-up__error--hidden">Last name must be 1-30 letters.</span>

          </label>
          <label class="sign-up__label">Birthday
            <input
              type="date"
              class="sign-up__input sign-up__input--date"
              name="birthday"
              required />
            <span class="sign-up__error sign-up__error--hidden">You must be at least 18 years old.</span>
          </label>
          <label class="sign-up__label">Email
            <input
              type="email"
              class="sign-up__input"
              name="email"
              placeholder="Enter your email"
              required />
            <span class="sign-up__error sign-up__error--hidden">Invalid email address.</span>
          </label>
          <label class="sign-up__label">Password
            <input
              type="password"
              class="sign-up__input"
              name="password"
              placeholder="Enter your password"
              required />
            <span class="sign-up__error sign-up__error--hidden">Password must have 8+ chars, 1 uppercase, 1 number, 1 special char.</span>
            <button type="button" class="sign-up__toggle-visibility">
              <img
                src="images/login/eye-slash.svg"
                alt="Eye closed"
                class="sign-up__toggle-img" />
            </button>
          </label>
          <button type="submit" class="sign-up__btn">Sign up</button>
        </form>
        <p class="sign-up__signin">
          Already a member?
          <a class="sign-up__login" href="login.php">Log In</a>
        </p>
      </div>
      <img
        src="images/register/register-image.svg"
        alt="Person signing up image"
        class="sign-up__image" />
    </section>
  </main>
  <?php require_once 'php/footer.php' ?>
  <script src="js/script.js"></script>
  <script src="js/register.js"></script>
</body>

</html>