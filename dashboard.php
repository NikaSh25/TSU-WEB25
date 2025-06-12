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
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = str_replace(['@', '.'], ['_at_', '_dot_'], strtolower($_SESSION['userEmail'])) . '.' . $extension;
            $uploadFilePath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
                $message = "Image Uploaded: " . htmlspecialchars($fileName);
            } else {
                $message = "Failed to move uploaded file.";
            }
        }
        if (isset($message)) {
            echo "<p>$message</p>";
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
            <aside class="dashboard-sidebar">
                <nav class="dashboard-sidebar__nav">
                    <ul class="dashboard-sidebar__list">
                        <li class="dashboard-sidebar__item"><button type="button" class="dashboard-sidebar__btn">My Courses</button></li>
                        <li class="dashboard-sidebar__item"><button type="button" class="dashboard-sidebar__btn">Profile</button></li>
                    </ul>
                </nav>
            </aside>
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
                    <img class="dashboard-profile__image-wrapper" src="" alt="">
                    <form class="dashboard-profile__form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <label for="file">Upload Image:</label>
                        <input name="uploadedfile" type="file" id="file" accept="image/jpeg" />
                        <input type="submit" value="Submit" />
                    </form>
                </div>
            </section>
        </div>
    </main>
    <script src="js/script.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>