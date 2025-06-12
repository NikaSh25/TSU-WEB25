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
    }
    $newFileName = str_replace(['@', '.'], ['_at_', '_dot_'], strtolower($_SESSION['userEmail'])) . '.jpg';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedfile'])) {
        $fileName = $_FILES['uploadedfile']['name'];
        $fileTmpName = $_FILES['uploadedfile']['tmp_name'];
        $fileSize = $_FILES['uploadedfile']['size'];
        $fileError = $_FILES['uploadedfile']['error'];

        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, false);
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
                </ul>
            </nav>
            <section class="dashboard-courses">
                <ul class="dashboard-courses__cards">
                    <li class="dashboard-courses__item">
                        <a href="course-figma.html" class="dashboard-courses__link">
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
                                <p class="course-card__author">John Cena</p>
                            </article>
                        </a>
                    </li>
                    <li class="dashboard-courses__item">
                        <a href=" course-designer-skills.html" class="dashboard-courses__link">
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
                                <p class="course-card__author">Jonas Schmedtmann</p>
                            </article>
                        </a>
                    </li>
                    <li class="dashboard-courses__item">
                        <a href="course-python-dsml.html" class="dashboard-courses__link">
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
                                <p class="course-card__author">Jhon Sina</p>
                            </article>
                        </a>
                    </li>
                    <li class="dashboard-courses__item">
                        <a href="course-strategy-law.html" class="dashboard-courses__link">
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
                                <p class="course-card__author">Jhon Sina</p>
                            </article>
                        </a>
                    </li>
                    <li class="dashboard-courses__item">
                        <a href="course-psych-success.html" class="dashboard-courses__link">
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
                                <p class="course-card__author">Jhon Sina</p>
                            </article>
                        </a>
                    </li>
                    <li class="dashboard-courses__item">
                        <a href="course-python-beginners.html" class="dashboard-courses__link">
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
                                <p class="course-card__author">Jhon Sina</p>
                            </article>
                        </a>
                    </li>
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
            </section>
        </div>
    </main>
    <?php require_once 'php/footer.php' ?>

    <script src="js/script.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>