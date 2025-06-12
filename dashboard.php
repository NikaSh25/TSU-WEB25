<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | SkillBoost</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/header/Logo.png" />
</head>

<body>
    <?php require_once 'php/header.php' ?>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit();
    }
    $newFileName = str_replace(['@', '.'], ['_at_', '_dot_'], strtolower($_SESSION['userEmail'])) . '.jpg';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedfile'])) {
        $fileName = $_FILES['uploadedfile']['name'];
        $fileTmpName = $_FILES['uploadedfile']['tmp_name'];
        $fileSize = $_FILES['uploadedfile']['size'];
        $fileError = $_FILES['uploadedfile']['error'];

        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                $message = "Failed to create upload directory.";
            }
        }

        if ($fileError !== UPLOAD_ERR_OK) {
            $message = getUploadErrorMessage($fileError);
        } elseif (mime_content_type($fileTmpName) !== 'image/jpeg') {
            $message = "Only JPEG images are allowed.";
        } elseif ($fileSize > 5000000) {
            $message = "File size must not exceed 5MB.";
        } else {
            $uploadFilePath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
                $message = "Image Uploaded: " . htmlspecialchars($fileName);
            } else {
                $message = "Failed to move uploaded file.";
            }
        }
    }


    function getUploadErrorMessage($errorCode)
    {
        $uploadErrors = [
            UPLOAD_ERR_OK => "File uploaded successfully.",
            UPLOAD_ERR_INI_SIZE => "File exceeds php.ini upload_max_filesize.",
            UPLOAD_ERR_FORM_SIZE => "File exceeds the MAX_FILE_SIZE directive in the HTML form.",
            UPLOAD_ERR_PARTIAL => "File was only partially uploaded.",
            UPLOAD_ERR_NO_FILE => "No file was uploaded.",
            UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder.",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
        ];

        return $uploadErrors[$errorCode] ?? "Unknown upload error.";
    }
    if (isset($_GET['reset'])) {
        setcookie("visit_count", "", time() - 3600);
        setcookie("last_visit", "", time() - 3600);
        header("Location: dashboard.php");
        exit();
    }

    $current_time = date("Y-m-d H:i:s");
    if (isset($_COOKIE['visit_count'])) {
        $visit_count = $_COOKIE['visit_count'] + 1;
    } else {
        $visit_count = 1;
    }

    $last_visit = isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : "First visit!";

    setcookie("visit_count", $visit_count, time() + (30 * 24 * 60 * 60));
    setcookie("last_visit", $current_time, time() + (30 * 24 * 60 * 60));
    ?>
    <main>
        <section class="dashboard-hero">
            <h2 class="dashboard-hero__title">Dashboard</h2>
            <h3 class="dashboard-hero__text">Welcome Back <span class="dashboard-hero__text--red"><?php echo $_SESSION['firstName'] ?>!</span></h3>
        </section>
        <div class="dashboard-wrapper">
            <nav class="dashboard-nav">
                <ul class="dashboard-nav__list">
                    <li class="dashboard-nav__item"><button type="button" class="dashboard-nav__btn dashboard-nav__btn--active">My Courses</button></li>
                    <li class="dashboard-nav__item"><button type="button" class="dashboard-nav__btn">Profile</button></li>
                    <li class="dashboard-nav__item"><button type="button" class="dashboard-nav__btn">Cart</button></li>
                </ul>
            </nav>
            <section class="dashboard-courses">
                <ul class="dashboard-courses__cards">
                    <?php
                    $coursesJSON = file_get_contents(__DIR__ . "/courses/courses.json");
                    $courses = json_decode($coursesJSON, true);

                    $count = 0;
                    foreach ($courses as $course):
                        if ($count === 6) break;
                    ?>
                        <li class="course-list__item" data-category="<?php echo htmlspecialchars($course['category']) ?>">
                            <a href="course.php?slug=<?php echo urlencode($course['slug']); ?>" class="course-list__link">
                                <article class="course-card">
                                    <img src="<?php echo htmlspecialchars($course['image']) ?>" alt="<?php echo htmlspecialchars($course['alt']) ?>" class="course-card__image" />
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
                    <?php
                        $count++;
                    endforeach;
                    ?>
                </ul>

            </section>
            <section class="dashboard-profile dashboard-profile--hidden">
                <div class="dashboard-profile__image-wrapper">
                    <?php if (file_exists('uploads/' . $newFileName)): ?>
                        <img class="dashboard-profile__image" src="<?php echo 'uploads/' . $newFileName; ?>" alt="Profile image">
                    <?php else: ?>
                        <img class="dashboard-profile__image" src="images/misc/placeholder.svg" alt="Profile image">
                    <?php endif; ?>

                    <form class="dashboard-profile__form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <label class="dashboard-profile__label" for="file">Upload Image</label>
                        <input class="dashboard-profile__upload" name="uploadedfile" type="file" id="file" accept="image/jpeg" />
                        <input class="dashboard-profile__submit" type="submit" value="Submit" />
                    </form>
                    <?php if (isset($message)) echo "<p class='upload-message'>" . htmlspecialchars($message) . "</p>" ?>
                </div>
                <div class="dashboard-profile__information">
                    <h4 class="dashboard-profile__title">Your Info:</h4>
                    <ul class="dashboard-profile__list">
                        <li class="dashboard-profile__item">Name: <?php echo htmlspecialchars($_SESSION['firstName']) . " " . htmlspecialchars($_SESSION['lastName']); ?></li>
                        <li class="dashboard-profile__item">Email: <?php echo htmlspecialchars($_SESSION['userEmail']); ?></li>
                        <li class="dashboard-profile__item">Member Since: <br> <?php echo htmlspecialchars($_SESSION['memberSince']); ?></li>
                    </ul>
                    <p class="dashboard-profile__msg">We are happy to have you as a member! <br> We hope you enjoy your time with us.</p>
                </div>
                <div class="dashboard-profile__information">
                    <h4 class="dashboard-profile__title">Fun Fact!:</h4>
                    <ul class="dashboard-profile__list">
                        <li class="dashboard-profile__item">You have visited this page <strong><?= $visit_count ?></strong> time(s).</li>
                        <li class="dashboard-profile__item">Your last visit was on: <strong><?= htmlspecialchars($last_visit) ?></strong></li>
                    </ul>
                    <form method="get">
                        <button class="dashboard-profile__submit" type="submit" name="reset">Clear History</button>
                    </form>
                </div>
            </section>
            <section class="dashboard-cart dashboard-cart--hidden">
                <ul class="dashboard-cart__cards">
                    <?php
                    $cart = [];
                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                        $cart = $_SESSION['cart'];
                    }

                    $coursesJSON = file_get_contents(__DIR__ . "/courses/courses.json");
                    $all_courses = json_decode($coursesJSON, true);

                    if ($coursesJSON === false) {
                        echo '<p>Error: Could not read courses data for cart.</p>';
                        $all_courses = [];
                    } elseif ($all_courses === null && json_last_error() !== JSON_ERROR_NONE) {
                        echo '<p>Error: Invalid courses data in JSON file for cart: ' . json_last_error_msg() . '</p>';
                        $all_courses = [];
                    }

                    $cart_courses = [];
                    foreach ($cart as $slug) {
                        foreach ($all_courses as $course_data) {
                            if ($course_data['slug'] === $slug) {
                                $cart_courses[] = $course_data;
                                break;
                            }
                        }
                    }

                    if (empty($cart_courses)) {
                    } else {
                        foreach ($cart_courses as $course):
                    ?>
                            <li class="course-list__item" data-category="<?php echo htmlspecialchars($course['category']) ?>">
                                <a href="course.php?slug=<?php echo urlencode($course['slug']); ?>" class="course-list__link">
                                    <article class="course-card">
                                        <img src="<?php echo htmlspecialchars($course['image']) ?>" alt="<?php echo htmlspecialchars($course['alt']) ?>" class="course-card__image" />
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
                    <?php
                        endforeach;
                    }
                    ?>
                </ul>
                <?php
                if (!empty($cart_courses)) {
                ?>
                    <form action="php/empty_cart.php" method="post" class="dashboard-cart__form">
                        <button type="submit" class="dashboard-cart__btn">Clear Cart</button>
                    </form>
                <?php
                } else {
                    echo '<p class="dashboard-cart__empty-message">Your cart is empty. Start exploring our courses!</p>';
                }
                ?>
            </section>
        </div>
    </main>
    <?php require_once 'php/footer.php' ?>

    <script src="js/script.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>